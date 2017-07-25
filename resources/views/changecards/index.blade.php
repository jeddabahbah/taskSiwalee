@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">


         <input type="text" class="form-control" name="searchcard" id="search2"></input><br><br>

            
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Other</th>
                        <th>Name</th>
                        <th>Platecar</th>
                        <th>IdCardT</th>
                        <th>Telhome</th>
                        <th>CtID</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <tbody>
                    </tbody>

                </thead>
            </table>


            <div class="panel panel-default">
                <div class="panel-heading">Edit card</div>

                <div class="panel-body">   

                <table class="table">
                    <tr>
                        <th>Other</th>
                        <th>Name</th>
                        <th>Platecar</th>
                        <th>IdCardT</th>
                        <th>Telhome</th>
                        <th>CtID</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                
                    @foreach($changecards as $changecard)
                        <tr>
                            <td>{{ $changecard -> Other }} </td>
                            <td>{{ $changecard -> Name }} </td>
                            <td>{{ $changecard -> Platecar }} </td>
                            <td>{{ $changecard -> IdCardT }} </td>
                            <td>{{ $changecard -> Telhome }} </td>
                            <td>{{ $changecard -> CtID }} </td>
                            <td>{{ $changecard -> Status }} </td>
                            
                            <td>
                                {{ link_to_route('editcard.edit','Edit Card',[$changecard->id],['class'=>'btn btn-primary'])}}

                            </td>                         
                        </tr>
                    @endforeach   
                </table>                

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
