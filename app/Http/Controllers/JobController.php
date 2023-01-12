<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use DB;

class JobController extends Controller
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
        return view('pages.job.create');
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
            'job_name' => 'required',
            'salary' => 'required',
            'description' => 'required'
        ]);

        $job = new Job;
        $job->job_name = $request->job_name;
        $job->user_id = auth()->user()->id;
        $job->salary = $request->salary;
        $job->description = $request->description;
        $job->save();

        return to_route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show($job)
    {
        $jobs = Job::with('user')->where('id', $job)->first();
        return view('includes.detail-job', ['jobs' => $jobs]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit($job)
    {
        $jobs = DB::table('jobs as j')
        ->select('j.id', 'j.job_name', 'j.salary', 'j.description')
        ->where('j.id', '=', $job)
        ->first();
        return view('pages.job.edit', ['jobs' => $jobs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        $request->validate([
            'job_name' => 'required',
            'salary' => 'required',
            'description' => 'required'
        ]);

        $job->update($request->all());

        return redirect()->route('profile.job');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->route('profile.job');
    }
}
