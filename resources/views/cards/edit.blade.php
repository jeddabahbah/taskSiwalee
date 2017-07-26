@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">เปลี่ยนแปลงเลขบัตร</div>

                <div class="panel-body">
                    <table class="table">
                        
                    </table>

                        {!! Form::model($card,array('route' => ['card.update',$card->id],'method'=>'PUT')) !!}
                            
                            <div class="form-group">
                                {!! Form::hidden('Other','Enter บ้านเลขที่') !!}
                                {!! Form::hidden('Other',null,['class'=>'form-control'] ) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::hidden('Name','Enter ชื่อ') !!}
                                {!! Form::hidden('Name',null,['class'=>'form-control'] ) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::hidden('Platecar','Enter ทะเบียนรถ') !!}
                                {!! Form::hidden('Platecar',null,['class'=>'form-control'] ) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('IdCardT','ใส่เลขที่บัตรใหม่') !!}
                                {!! Form::text('IdCardT',null,['class'=>'form-control'] ) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('IDCard','ใส่เลขบัตรใหม่อีกครั้ง') !!}
                                {!! Form::text('IDCard',null,['class'=>'form-control'] ) !!}
                            </div>

                        
                            <div class="form-group">
                                {!! Form::hidden('Telhand','Enter Telhand') !!}
                                {!! Form::hidden('Telhand',null,['class'=>'form-control'] ) !!}
                            </div>


                            <div class="form-group">
                                {!! Form::hidden('CtID','Enter CtID') !!}
                                {!! Form::hidden('CtID',null,['class'=>'form-control'] ) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::hidden('Status','Enter Status') !!}
                                {!! Form::hidden('Status',null,['class'=>'form-control'] ) !!}
                            </div>


                            <div class="form-group">
                                {!! Form::button('ยืนยัน',['type'=>'submit','class'=>'btn btn-primary']) !!}                            
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
