<?php

namespace App\Http\Controllers;

use App\Models\Task as Task;
use App\Http\Resources\TaskResource;
use App\Models\User;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();

        $tasks  = Task::where('user_id', $user->id)->get();

        return TaskResource::collection($tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $task = new Task;
        $task->title = $request->input('title');
        $task->user_id = $request->input('user_id');
        $task->conclusion = $request->input('conclusion');
        $task->status = $request->input('status');

        return new TaskResource($task);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task;
        $task->title = $request->input('title');
        $task->user_id = $request->input('user_id');
        $task->conclusion = $request->input('conclusion');
        $task->status = $request->input('status');

        if( $task->save() ){
            return new TaskResource( $task );
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
        $task = Task::findOrFail( $id );
        return new TaskResource( $task );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::findOrFail( $id );
        return new TaskResource( $task );
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
        $task = Task::findOrFail( $request->id );
        $task->title = $request->input('title');
        $task->user_id = $request->input('user_id');
        $task->conclusion = $request->input('conclusion');
        $task->status = $request->input('status');

        if( $task->save() ){
            return new TaskResource( $task );
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
        $task = Task::findOrFail($id);
        if( $task->delete() ) {
            return new TaskResource($task);
        }
    }
}
