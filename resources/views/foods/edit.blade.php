@extends('layouts.app')
@section('content')
    <section class="section-main">
        <div class="container">
            <div class="row">
                @include('layouts.list')
                <div class="col-8">
                    {!! Form::open(['action' => ['FoodController@update',$query->id],'method'=>'POST']) !!}
                    @csrf
                    <div class="form-group">
                        {{Form::label('name','Name Foods')}}
                        {{Form::text('name',$query->name_food,['class'=>'form-control','placeholder'=>'Enter Name Foods'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('price','Price Foods')}}
                        {{Form::number('price',$query->price_food,['class'=>'form-control','placeholder'=>'Enter Price Foods'])}}
                    </div>
                    @method('PUT')
                    {{Form::submit('Add',['class'=>'btn btn-success'])}}
                    {!! Form::close() !!}
                </div>
@endsection
