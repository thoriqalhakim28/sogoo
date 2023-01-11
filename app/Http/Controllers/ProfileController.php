<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use DB;
use App\Models\Item;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function password()
    {
        return view('profile.password');
    }

    public function delete()
    {
        return view('profile.delete');
    }

    public function allItem()
    {
        $items = DB::table('items as i')
        ->select('i.id', 'i.item_name', 'c.cate_name', 'i.price', 'i.image', 'i.location', 'i.condition', 'i.description', 'i.status')
        ->where('i.user_id', '=', auth()->user()->id)
        ->join('categories as c', 'i.cate_id', '=', 'c.id')
        ->get();

        // dd($items);

        return view('profile.item', ['items' => $items]);
    }
}
