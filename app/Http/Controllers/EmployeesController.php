<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Employee as EmployeeResource;
use App\Employee;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new EmployeeResource(Employee::first());
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
        $post = new Employee();
        $post->full_name = $request->full_name;
        $post->addition_information = $request->addition_information;
        $post->position = $request->position;
        $post->status = $request->status;
        $post->join_date = $request->join_date;
        $post->end_date = $request->end_date;
        $post->contract_duration = $request->contract_duration;
        $post->save();

        return new EmployeeResource($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new EmployeeResource(Employee::FindOrFail($id));
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
        $post = Employee::findOrFail($id);
        $post->full_name = $request->full_name;
        $post->addition_information = $request->addition_information;
        $post->position = $request->position;
        $post->status = $request->status;
        $post->join_date = $request->join_date;
        $post->end_date = $request->end_date;
        $post->contract_duration = $request->contract_duration;
        $post->save();

        return new EmployeeResource($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Employee::findOrFail($id);
        $post->delete();

        return new EmployeeResource($post);
    }
}
