@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Update changecard</div>

                <div class="panel-body">
                        
                    {!! Form::model($changecard,array('route' => ['editcard.update',$changecard->id],'method'=>'PUT')) !!}
                            <div class="form-group">
                                {!! Form::label('Other','Entersss บ้านเลขที่') !!}
                                {!! Form::text('Other',null,['class'=>'form-control'] ) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Name','Enter ชื่อ') !!}
                                {!! Form::text('Name',null,['class'=>'form-control'] ) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Platecar','Enter ทะเบียนรถ') !!}
                                {!! Form::text('Platecar',null,['class'=>'form-control'] ) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('IdCardT','Enter IdCardT') !!}
                                {!! Form::text('IdCardT',null,['class'=>'form-control'] ) !!}
                            </div>


                            <div class="form-group">
                                {!! Form::label('Telhome','Enter Telhome') !!}
                                {!! Form::text('Telhome',null,['class'=>'form-control'] ) !!}
                            </div>


                            <div class="form-group">
                                {!! Form::label('CtID','Enter CtID') !!}
                                {!! Form::text('CtID',null,['class'=>'form-control'] ) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Status','Enter Status') !!}
                                {!! Form::text('Status',null,['class'=>'form-control'] ) !!}
                            </div>


                            <div class="form-group">
                                {!! Form::button('Update',['type'=>'submit','class'=>'btn btn-primary']) !!}                            
                            </div>


                        {!! Form::close() !!}
                        
                </div>
            </div>

            @if($errors->has())
                <ul class="aler alert-danger">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>
@endsection
