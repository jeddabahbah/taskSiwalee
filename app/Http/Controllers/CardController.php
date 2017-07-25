<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\TaskRequest;
use App\Http\Requests\CardRequest;
use App\Task;
use App\Card;


class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cards = Task::all();
        return view('cards.index',compact('cards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cards.create');
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
        return redirect()->route('card.index')->with('message','item has been added successfully');
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
    public function edit(Task $card)
    {   
        return view('cards.edit',compact('card'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CardRequest $request, Card $card)
    {   
        /*$card = Card::where(1);
        $newTask = $card->replicate();
        $newTask->IdCardT = $request->newID;
        $newTask->IDCard = $request->newID;
        $newTask->save();*/

        $card->update($request->all());   
        return redirect()->route('card.index')->with('message','item has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $card)
    {
        $card->delete();
        return redirect()->route('card.index')->with('message','item has been deleted successfully');
    }

    public function search2(Request $req)
    {
        if($req->ajax())
        {
           $output="";
           $card=DB::table('tasks')->where('Other','LIKE','%'.$req->search.'%')
                                   ->orWhere('Platecar','LIKE','%'.$req->search.'%')
                                   ->orWhere('Name','LIKE','%'.$req->search.'%')
                                   ->orWhere('Telhand','LIKE','%'.$req->search.'%')
                                   ->orWhere('IdCardT','LIKE','%'.$req->search.'%')->get();
           //$task=DB::table('tasks')->where('title','LIKE','%'.$req['data'].'%')->get();

            if ($card) {
                foreach ($card as $key => $cards){

                    $output .= '<tr>'.

                               '<td>'.$cards->Other.'</td>'.
                               '<td>'.$cards->Name.'</td>'.
                               '<td>'.$cards->Platecar.'</td>'.
                               '<td>'.$cards->IdCardT.'</td>'.
                               '<td>'.$cards->Telhand.'</td>'.
                               '<td>'.$cards->CtID.'</td>'.
                               '<td>'.$cards->Status.'</td>'.
                               '<td>
                               <form method="POST" action="http://task.siwalee.com/task/'.$cards->id.'" accept-charset="UTF-8"><input name="_method" type="hidden" value="DELETE"><input name="_token" type="hidden" value="ZOqHLDfu5v5OeNQDjTs1TkbDd4WBuMxbZcz7W2Il">                            
                                    <a href="http://task.siwalee.com/task/'.$cards->id.'/edit" class="btn btn-primary">Edit</a>
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






}
