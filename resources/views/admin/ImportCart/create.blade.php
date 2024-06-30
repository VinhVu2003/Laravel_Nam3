@extends('ad_shared.admin')
@section('title','Thêm mới hóa đơn nhập')
@section('main')



<script>
    // Sử dụng setTimeout để ẩn thông báo sau 3 giây (3000 ms)
    setTimeout(function() {
        document.getElementById('success-alert').style.display = 'none';
    }, 1000);
</script>
<div class="row">

    <form action="{{route('importcart.store')}}" method="POST" enctype="multipart/form-data" role="form">
        @csrf
        <div class="col-md-5">
            
            <div class="form-group">
                <label for="">Giá nhập</label>
                <input type="text" name="GiaNhap" class="form-control" id="" placeholder="Input field">
            </div>
            <div class="form-group">
                <label for="">Số lượng</label>
                <input type="text" name="SoLuong" class="form-control" id="" placeholder="Input field">
            </div>
            <div class="form-group">
                <label for="">Đơn vị tính</label>
                <input type="text" name="DonViTinh" class="form-control" id="" placeholder="Input field">
            </div>
            <div class="form-group">
                <label for="">Kiểu thanh toán</label>
                <input type="text" name="KieuThanhToan" class="form-control" id="" placeholder="Input field">
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Add</button>
        </div>
        <div class="col-md-3">
            
            <div class="form-group">
                <label for="">Nhà phân phối</label>
                <select name="MaNhaPhanPhoi" class="form-control">
                    <option value="">Nhà phân phối</option>
                    @foreach ($providers as $s)
                    <option value="{{$s->MaNhaPhanPhoi}}">{{$s->TenNhaPhanPhoi}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Sản phẩm</label>
                <select name="MaSanPham" class="form-control">
                    <option value="">Sản phẩm</option>
                    @foreach ($products as $s)
                    <option value="{{$s->MaSanPham}}">{{$s->TenSanPham}}</option>
                    @endforeach
                </select>
            </div>
           

        </div>
    </form>


</div>


@stop();