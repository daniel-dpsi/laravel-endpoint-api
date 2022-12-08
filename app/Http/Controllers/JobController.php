<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Job::orderBy('id', 'ASC')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $job = new Job;
            $job->name = $request->get('name');
            $job->dateStart = $request->get('dateStart');
            $job->dateEnd = $request->get('dateEnd');
            $job->location = $request->get('location');
            $job->type = $request->get('type');
            $job->field = $request->get('field');
            $job->salary = $request->get('salary');
            $job->info = $request->get('info');
            $job->contact = $request->get('contact');
            $job->url = $request->get('url');

            $job->save();

            return response()->json(['changes' => 'saved.'],200);
        } catch (\Exception $e) {
            return response()->json(['error' => '404 invalid'], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $job = Job::findOrFail($id);
            $job->name = $request->input('name');
            $job->dateStart = $request->input('dateStart');
            $job->dateEnd = $request->input('dateEnd');
            $job->location = $request->input('location');
            $job->type = $request->input('type');
            $job->field = $request->input('field');
            $job->salary = $request->input('salary');
            $job->info = $request->input('info');
            $job->contact = $request->input('contact');
            $job->url = $request->input('url');

            $job->update();

            return response()->json(['changes' => 'updated.'],200);
         } catch (\Exception $e) {
             return response()->json(['error' => '404 invalid'],200);
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
        $job = Job::findOrFail($id);
        $job->delete();

            return response()->json(['changes' => 'deleted.'],200);
         } catch (\Exception $e) {
             return response()->json(['error' => '404 invalid'],200);
         }
    }
}
