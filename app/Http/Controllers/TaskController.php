<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use DB;

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

 /*   public function updatecard(TaskRequest $request, Task $task)
    {
        $task->update($request->all());   
        return redirect()->route('task.indexeditcard')->with('message','item has been updated successfully');
    }*/

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


    public function search(Request $req)
    {
        if($req->ajax())
        {
           $output="";
           $task=DB::table('tasks')->where('Other','LIKE','%'.$req->search.'%')
                                   ->orWhere('Platecar','LIKE','%'.$req->search.'%')
                                   ->orWhere('Name','LIKE','%'.$req->search.'%')
                                   ->orWhere('Telhand','LIKE','%'.$req->search.'%')
                                   ->orWhere('IdCardT','LIKE','%'.$req->search.'%')->get();
           //$task=DB::table('tasks')->where('title','LIKE','%'.$req['data'].'%')->get();

            if ($task) {
                foreach ($task as $key => $tasks){

                    $output .= '<tr>'.
                               '<td>'.$tasks->id.'</td>'.
                               '<td>'.$tasks->Other.'</td>'.
                               '<td>'.$tasks->Name.'</td>'.
                               '<td>'.$tasks->Platecar.'</td>'.
                               '<td>'.$tasks->IdCardT.'</td>'.
                               '<td>'.$tasks->IDCard.'</td>'.
                               '<td>'.$tasks->Telhome.'</td>'.
                               '<td>'.$tasks->Telhand.'</td>'.
                               '<td>'.$tasks->Carbrand1.'</td>'.
                               '<td>'.$tasks->CarColor1.'</td>'.
                               '<td>'.$tasks->CtID.'</td>'.
                               '<td>'.$tasks->Status.'</td>'.
                               '<td>
                               <form method="POST" action="http://task.siwalee.com/task/'.$tasks->id.'" accept-charset="UTF-8"><input name="_method" type="hidden" value="DELETE"><input name="_token" type="hidden" value="ZOqHLDfu5v5OeNQDjTs1TkbDd4WBuMxbZcz7W2Il">                            
                                    <a href="http://task.siwalee.com/task/'.$tasks->id.'/edit" class="btn btn-primary">Edit</a>
                                |
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                               </td>'.
                               '</tr>';
                }

                return Response($output);
                }

        }
    }


    public function search2(Request $req)
    {
        if($req->ajax())
        {
           $output="";
           $task=DB::table('tasks')->where('Other','LIKE','%'.$req->search.'%')
                                   ->orWhere('Platecar','LIKE','%'.$req->search.'%')
                                   ->orWhere('Name','LIKE','%'.$req->search.'%')
                                   ->orWhere('Telhand','LIKE','%'.$req->search.'%')
                                   ->orWhere('IdCardT','LIKE','%'.$req->search.'%')->get();
           //$task=DB::table('tasks')->where('title','LIKE','%'.$req['data'].'%')->get();

            if ($task) {
                foreach ($task as $key => $tasks){

                    $output .= '<tr>'.
                               '<td>'.$tasks->id.'</td>'.
                               '<td>'.$tasks->Other.'</td>'.
                               '<td>'.$tasks->Name.'</td>'.
                               '<td>'.$tasks->Platecar.'</td>'.
                               '<td>'.$tasks->IdCardT.'</td>'.
                               '<td>'.$tasks->IDCard.'</td>'.
                               /*'<td>'.$tasks->Telhome.'</td>'.
                               '<td>'.$tasks->Telhand.'</td>'.
                               '<td>'.$tasks->Carbrand1.'</td>'.
                               '<td>'.$tasks->CarColor1.'</td>'.*/
                               '<td>'.$tasks->CtID.'</td>'.
                               '<td>'.$tasks->Status.'</td>'.
                               '<td>                      
                                    <a href="http://task.siwalee.com/task/'.$tasks->id.'/editcard" class="btn btn-primary">Edit</a>
                               
                        
                               </td>'.
                               '</tr>';
                }

                return Response($output);
                }

        }
    }
    

}
