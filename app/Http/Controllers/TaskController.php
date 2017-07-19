<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

use App\Http\Requests\TaskRequest;
use DB_DATABASE;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $tasks = Task::all();
        return view('tasks.index',compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        Task::create($request->all());
        return redirect()->route('task.index')->with('message','item has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
       return view('tasks.show',compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return view('tasks.edit',compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request, Task $task)
    {
        $task->update($request->all());   
        return redirect()->route('task.index')->with('message','item has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('task.index')->with('message','item has been deleted successfully');
    }

   public function search(TaskRequest $request, Task $task)
    {
        if($request->ajax()){
            $output="";
            $task=DB_DATABASE::table('tasks')->where('title','LIKE','%'.$task->search.'%')->get();

            if ($task) {
                foreach ($task as $key => $tasks) {
                    $output='<tr>'.
                            '<td>'.$tasks->id.'</td>'.
                            '<td>'.$tasks->title.'</td>'.
                            '<td>'.$tasks->body.'</td>'.
                            /*'<td>'.$tasks->id.'</td>'.
                            '<td>'.$tasks->id.'</td>'.*/
                            '</tr>';
                }

                return Response($output);
            }
        }
    }
    

}