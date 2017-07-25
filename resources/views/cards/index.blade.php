@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

        <input type="text" class="form-control" name="search" id="search2"></input><br><br>

            
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Other</th>
                        <th>Name</th>
                        <th>Platecar</th>
                        <th>IdCardT</th>
                        <th>Telhand</th>
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
                <div class="panel-heading">Edit card</div>

                <div class="panel-body">


                <table class="table">
                    <tr>
                        <th>Other</th>
                        <th>Name</th>
                        <th>Platecar</th>
                        <th>IdCardT</th>
                        <th>Telhand</th>
                        <th>CtID</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                
                    @foreach($cards as $card)
                        <tr>
                            <td>{{ link_to_route('card.show',$card->Other,[$card->id]) }}</td>
                            <td>{{ link_to_route('card.show',$card->Name,[$card->id]) }}</td>
                            <td>{{ link_to_route('card.show',$card->Platecar,[$card->id]) }}</td>
                            <td>{{ link_to_route('card.show',$card->IdCardT,[$card->id]) }}</td>
                            <td>{{ link_to_route('card.show',$card->Telhand,[$card->id]) }}</td>
                            <td>{{ link_to_route('card.show',$card->CtID,[$card->id]) }}</td>
                            <td>{{ link_to_route('card.show',$card->Status,[$card->id]) }}</td>
                            
                            <td>
                                {!! Form::open(array('route' => ['card.destroy',$card->id],'method'=>'DELETE')) !!}                            
                                    {{ link_to_route('card.edit','Edit',[$card->id],['class'=>'btn btn-primary']) }}
                                |
                                    {!! Form::button('Delete',['type'=>'submit','class'=>'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>                         
                        </tr>
                    @endforeach   
                </table>                 

                </div>
            </div>

            
            {{ link_to_route('card.create','Add New Card',null,['class'=>'btn btn-success']) }} <br><br><br>
        </div>
    </div>
</div>

@endsection
