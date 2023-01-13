<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use DB;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('pages.item.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'cate_id' => ['required'],
            'price' => ['required'],
            'image' => ['required', 'image', 'mimes:png,jpg'],
            'location' => ['required'],
            'condition' => ['required'],
            'description' => ['required'],
        ]);

        $image = $request->image;
        $slug = Str::slug($image->getClientOriginalName());
        $new_image = time() .'_'. $slug;
        $image->move('images/', $new_image);

        $item = new Item;
        $item->item_name = $request->name;
        $item->user_id = auth()->user()->id;
        $item->cate_id = $request->cate_id;
        $item->price = $request->price;
        $item->image = 'images/'.$new_image;
        $item->location = $request->location;
        $item->condition = $request->condition;
        $item->description = $request->description;
        $item->status = $request->status = 1;
        $item->save();

        return to_route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show($item)
    {
        $items = Item::with('user')->where('id', $item)->first();
        return view('includes.detail-item', ['items' => $items]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit($item)
    {
        $categories = Category::all();
        $items = DB::table('items as i')
        ->select('i.id', 'i.item_name', 'i.cate_id', 'c.cate_name', 'i.price', 'i.image', 'i.location', 'i.condition', 'i.description', 'i.status')
        ->join('categories as c', 'i.cate_id', '=', 'c.id')
        ->where('i.id', '=', $item)
        ->first();
        return view('pages.item.edit', ['items' => $items], ['categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => ['required'],
            'cate_id' => ['required'],
            'price' => ['required'],
            'location' => ['required'],
            'condition' => ['required'],
            'description' => ['required'],
            'status' => ['required'],
        ]);

        // $image = $request->image;
        // $slug = Str::slug($image->getClientOriginalName());
        // $new_image = time() .'_'. $slug;
        // $image->move('images/', $new_image);

        $item->update($request->all());

        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $image->storeAs('public/images', $image->hashName());
        //     Storage::delete('public/images/'.$item->image);

        //     $item->update([
        //         'item_name'     => $request->name,
        //         'cate_id'       => $request->cate_id,
        //         'price'         => $request->price,
        //         'image'         => $image->hashName(),
        //         'location'      => $request->location,
        //         'condition'     => $request->condition,
        //         'description'   => $request->description,
        //         'status'        => $request->status,
        //     ]);

        // } else {

        //     $post->update([
        //         'item_name'     => $request->name,
        //         'cate_id'       => $request->cate_id,
        //         'price'         => $request->price,
        //         'location'      => $request->location,
        //         'condition'     => $request->condition,
        //         'description'   => $request->description,
        //         'status'        => $request->status,
        //     ]);
        // }

        return redirect()->route('profile.item');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        Storage::delete('public/images/'. $item->image);
        $item->delete();
        return redirect()->route('profile.item');
    }
}

