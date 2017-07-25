<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\TaskRequest;
use App\Task;

class ChangeCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $changecards = Task::all();
        return view('changecards.index',compact('changecards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('changecards.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Task $request)
    {
        Task::create($request->all());
        return redirect()->route('edicard.index')->with('message','item has been added successfully');
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
    public function edit(Task $changecard)
    {
        return view('changecards.editcard',compact('changecard'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request, Task $changecard)
    {
        $changecard->update($request->all());   
        return redirect()->route('editcard.index')->with('message','item has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $changecard)
    {
         $changecard->delete();
        return redirect()->route('editcard.index')->with('message','item has been deleted successfully');
    }

     public function search2(Request $req)
    {
        if($req->ajax())
        {
           $output="";
           $changecard=DB::table('tasks')->where('Other','LIKE','%'.$req->search.'%')
                                   ->orWhere('Platecar','LIKE','%'.$req->search.'%')
                                   ->orWhere('Name','LIKE','%'.$req->search.'%')
                                   ->orWhere('Telhand','LIKE','%'.$req->search.'%')
                                   ->orWhere('IdCardT','LIKE','%'.$req->search.'%')->get();
           

            if ($changecard) {
                foreach ($changecard as $key => $changecards){

                    $output .= '<tr>'.
                               '<td>'.$changecards->Other.'</td>'.
                               '<td>'.$changecards->Name.'</td>'.
                               '<td>'.$changecards->Platecar.'</td>'.
                               '<td>'.$changecards->IdCardT.'</td>'.
                               '<td>'.$changecards->IDCard.'</td>'.
                               '<td>'.$changecards->CtID.'</td>'.
                               '<td>'.$changecards->Status.'</td>'.
                               '<td>                      
                                    <a href="http://task.siwalee.com/task/'.$changecards->id.'/editcard" class="btn btn-primary">Edit</a>
                               </td>'.
                               '</tr>';
                }

                return Response($output);
                }

        }
    }
    
}
