@extends('ad_shared.admin')
@section('title','Trang chủ')
@section('main')

<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>{{$soLuongHoaDon}}</h3>

                <p>Đơn hàng</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>{{$doanhthu}}<sup style="font-size: 20px">$</sup></h3>
                <p>Doanh thu</p>
            </div>
            <div class="icon">
                <i class="ion ion-cash"></i>
            </div>
            <a href="#" class="small-box-footer">Xem thêm<i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>{{$soLuongKH}}</h3>

                <p>Khách hàng</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">Xem thêm<i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>{{$chuyenmucs}}</h3>

                <p>Chuyên mục</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">Xem thêm<i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->

</div>
<table class="table table-hover">
    <h3>

        Sản phẩm bán chạy
    </h3>
    <thead>
        <tr>
            <th>STT</th>

            <th>Tên sản phẩm</th>
            <th>Ảnh</th>
            <th>Size</th>
            <th>Giá</th>
            <th>Doanh số</th>
            <th>Doanh thu</th>
        </tr>
    </thead>
    <tbody>

        @foreach($products as $value)
        <tr>
            <td>{{$loop->iteration }}</td>
            <td>{{$value -> TenSanPham}}</td>
            <td><img src="/anh/{{$value->AnhDaiDien}}" alt="" width="40"></td>
            <td>{{$value ->size-> TenSize}}</td>
            <td>{{ number_format($value->Gia, 0, ',', '.') }}đ</td>
            <td>{{$value -> TongSoLuong}}</td>
            <td>{{$value -> TongTien}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop();