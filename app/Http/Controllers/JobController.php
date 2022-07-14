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
      $jobs = Job::select('id', 'summary', 'description', 'status_id', 'property_id')->get();

      foreach ($jobs as $job) {
        $job->status_name = $job->getStatusName();
        $job->property_name = $job->getPropertyName();
      }

      return $jobs;
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'summary'=>'required',
        'description'=>'required',
        'property_id'=>'required',
        'status_id'=>'required',
      ]);

      try{
        Job::create($request->post());

        return response()->json([
            'message'=>'Job created successfully!!'
        ]);
      }catch(\Exception $e){
        \Log::error($e->getMessage());
        return response()->json([
            'message'=>'Something went wrong while creating a job.',
            'error' => $e->getMessage()
        ],500);
      }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
      return response()->json(['job' => $job]);
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
        'summary'=>'required',
        'description'=>'required',
        'property'=>'required',
      ]);

      try{
        $job->fill($request->post())->update();

        return response()->json(['message' => 'Job updated successfully!!']);

      }catch(\Exception $e){
          \Log::error($e->getMessage());
          return response()->json(['message' => 'Something went wrong while updating a job.'], 500);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
      try {
        $job->delete();

        return response()->json([
            'message'=>'Job deleted successfully!!'
        ]);
        
      } catch (\Exception $e) {
          \Log::error($e->getMessage());
          return response()->json([
              'message'=>'Something went wrong while deleting a job.'
          ]);
      }
    }
}
