@extends('layouts.app')
@section('content')
    <div class="container">
        <section class="section-main">
            <div class="container">
                <div class="row">
                    @include('layouts.list')
                    <div class="col-8">
        <h1>Menu</h1>
                        <a href="{{url('food/create')}}" class="btn btn-success float-left">Create New Food</a>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>

        @if(count($foods)>0)
            @foreach($foods as $food)
                    <tr>
                        <th scope="row">{{$food->id}}</th>
                        <td>{{$food->name_food}}</td>
                        <td>{{$food->price_food}}</td>
                        <td class="d-flex"><a href='{{url("food/".$food->id."/edit")}}' class="btn btn-primary">Edit</a>
                            {!! Form::open(['action' => ['FoodController@destroy',$food->id],'method'=>'POST']) !!}
                                @method('DELETE')
                                {{Form::submit('Delete',['class'=>'btn btn-danger'])}}

                            {!! Form::close() !!}
                        </td>
                    </tr>

                @endforeach

            </tbody>
        </table>
                        {{$foods->links()}}
            @else
            <p>No foods in menu</p>
            @endif

    </div>
                </div>

    @endsection
