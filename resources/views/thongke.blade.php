@extends('layouts.app')
@section('content')
<section class="section-main">
    <div class="container">
        <div class="row">
            @include('layouts.list')
            <div class="col-md-8">
                <div class="right-container bg-light mt-3 px-3 py-3">
                    <div class="form-revenue">
                        {!! Form::open(['action' => 'PagesController@thongke','method'=>'get']) !!}
                            <label>Báo cáo từ ngày:</label>
                            <input type="date" name="startdate" class="form-control">
                            <label>Đến ngày:</label>
                            <input type="date" name="enddate" class="form-control">
                            <input type="submit" class="btn btn-primary mt-2" value="Xem">
                        {!! Form::close() !!}
                    </div>
                    <div class="table-detail mt-3">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Tên hàng hóa</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Đơn giá</th>
                                <th scope="col">Ngày bán</th>
                                <th scope="col">Thành tiền</th>
                                <th scope="col">Tổng(<span class="getTotalDay"></span>)</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($db as $one)
                            <tr>
                                <td>{{$one->name_food}}</td>
                                <td>{{$one->count_food}}</td>
                                <td>{{$one->price_food}}</td>
                                <td>{{$one->create_at}}</td>
                                <td class="price-total-day">{{$one->total_price}}đ</td>
                                <th scope="row">VND</th>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    @endsection
