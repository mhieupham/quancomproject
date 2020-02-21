@extends('layouts.app')

@section('content')

    <section class="section-main">
        <div class="container">
            <div class="row">
                @include('layouts.list')
                <div class="col-8">
                    <div class="right-container bg-light mt-3 px-3 py-3">
                        <div class="input-group">
                            <select name='list-food' class="custom-select" id="inputGroupSelect03" aria-label="Example select with button addon">
                                @foreach($foods as $food)
                                       <option data-tenmon ='{{$food->name_food}}' data-giatien='{{$food->price_food}}' value="1">{{$food->name_food}}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <button class="add-item btn bg-primary text-light" type="button">Thêm</button>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row d-flex align-items-center">
                                    <div class="col-md-3"><label class="my-0">Đã nhận</label></div>
                                    <div class="col-md-8"><input type="number" name='money-receive' class="money-receive form-control"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row d-flex align-items-center">
                                    <div class="col-md-6"><p class="my-0">Trả lại:<span class="tralai"></span></p></div>
                                    <div class="col-md-6"><button class="btn bg-primary text-light" type="button" data-toggle="modal" data-target="#exampleModal">Thanh toán</button></div>
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Thanh toán</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Bạn có chắc không
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                                    {!! Form::open(['action' => 'HistoryController@insert','method'=>'POST']) !!}
                                                        @csrf
                                                        <div class="get-order"></div>
                                                        {{Form::submit('Thanh toán',['class'=>'btn btn-primary'])}}
                                                    {!! Form::close() !!}
{{--                                                    <form action="http://localhost/old%20code/quancomproject/public/insertfood" method="POST" accept-charset="UTF-8">--}}
{{--                                                        <meta name="csrf-token" content="{{csrf_token()}}">--}}
{{--                                                        <div class="get-order"></div>--}}

{{--                                                        <input class="btn btn-primary" type="submit" value="Thanh toán">--}}
{{--                                                    </form>--}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="main-table-order mt-5">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên món</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Thành tiền(<span class="total-price"></span>)</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody class="show-cart">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
