@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

        <input type="text" class="form-control" name="search" id="search"></input><br><br>

            
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Other</th>
                        <th>Name</th>
                        <th>Platecar</th>
                        <th>IdCardT</th>
                        <th>IDCard</th>
                        <th>Telhome</th>
                        <th>Telhand</th>
                        <th>Carbrand1</th>
                        <th>CarColor1</th>
                        <th>CtID</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <tbody>
                    </tbody>

                </thead>
            </table>
            
            
            
        @if(Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') }}</div>
        @endif

            <div class="panel panel-default">
                <div class="panel-heading">Tasks</div>

                <div class="panel-body">


                <table class="table">
                    <tr>
                        <th>Other</th>
                        <th>Name</th>
                        <th>Platecar</th>
                        <th>IdCardT</th>
                        <th>IDCard</th>
                        <th>Telhome</th>
                        <th>Telhand</th>
                        <th>Carbrand1</th>
                        <th>CarColor1</th>
                        <th>CtID</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                
                    @foreach($tasks as $task)
                        <tr>
                            <td>{{ link_to_route('task.show',$task->Other,[$task->id]) }}</td>
                            <td>{{ link_to_route('task.show',$task->Name,[$task->id]) }}</td>
                            <td>{{ link_to_route('task.show',$task->Platecar,[$task->id]) }}</td>
                            <td>{{ link_to_route('task.show',$task->IdCardT,[$task->id]) }}</td>
                            <td>{{ link_to_route('task.show',$task->IDCard,[$task->id]) }}</td>
                            <td>{{ link_to_route('task.show',$task->Telhome,[$task->id]) }}</td>
                            <td>{{ link_to_route('task.show',$task->Telhand,[$task->id]) }}</td>
                            <td>{{ link_to_route('task.show',$task->Carbrand1,[$task->id]) }}</td>
                            <td>{{ link_to_route('task.show',$task->CarColor1,[$task->id]) }}</td>
                            <td>{{ link_to_route('task.show',$task->CtID,[$task->id]) }}</td>
                            <td>{{ link_to_route('task.show',$task->Status,[$task->id]) }}</td>
                            
                            <td>
                                {!! Form::open(array('route' => ['task.destroy',$task->id],'method'=>'DELETE')) !!}                            
                                    {{ link_to_route('task.edit','Edit',[$task->id],['class'=>'btn btn-primary']) }}
                                |
                                    {!! Form::button('Delete',['type'=>'submit','class'=>'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>                         
                        </tr>
                    @endforeach   
                </table>                 

                </div>
            </div>

            
            {{ link_to_route('task.create','Add Member',null,['class'=>'btn btn-success']) }} <br><br><br>
        </div>
    </div>
</div>

@endsection
