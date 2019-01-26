<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller{
    public function index(){
        return response()->json([
            Task::all()->toArray()
        ]);
    }

    public function create(){

    }

    public function store(Request $request){
        $task = Task::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'user_id' => $request->user_id,
            'order' => $request->order
        ]);

        $data = [
            'data' => $task,
            'status' => (bool)$task,
            'message' => $task ? 'Task Created!' : 'Error Creating Task'
        ];

        return response()->json($data);
    }

    public function show(Task $task){
        return response()->json($task);
    }

    public function edit(Task $task){

    }

    public function update(Request $request, Task $task){
        $status = $task->update(
            $request->only([
                'name', 'category_id', 'user_id', 'order'
            ])
        );

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Task Updated!' : 'Error Updating Task'
        ]);
    }

    public function destroy(Task $task){
        $status = $task->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Task Deleted' : 'Error Deleting Task'
        ]);
    }
}
