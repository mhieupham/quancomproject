@extends('layouts.app')
@section('content')
    <section class="section-main">
        <div class="container">
            <div class="row">
                @include('layouts.list')
                <div class="col-8">
{!! Form::open(['action' =>'FoodController@store','method'=>'POST']) !!}
                    <div class="form-group">
                        {{Form::label('name','Name Foods')}}
                        {{Form::text('name','',['class'=>'form-control','placeholder'=>'Enter Name Foods'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('price','Price Foods')}}
                        {{Form::number('price','',['class'=>'form-control','placeholder'=>'Enter Price Foods'])}}
                    </div>
                    {{Form::submit('Add',['class'=>'btn btn-success'])}}
{!! Form::close() !!}
                </div>
    @endsection
