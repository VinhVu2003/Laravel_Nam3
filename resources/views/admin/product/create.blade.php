@extends('ad_shared.admin')
@section('title','Thêm mới sản phẩm')
@section('main')



<script>
    // Sử dụng setTimeout để ẩn thông báo sau 3 giây (3000 ms)
    setTimeout(function() {
        document.getElementById('success-alert').style.display = 'none';
    }, 1000);
</script>
<div class="row">

    <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data" role="form">
        @csrf
        <div class="col-md-5">
            <div class="form-group">
                <label for="">Tên sản phẩm</label>
                <input type="text" name="TenSanPham" class="form-control" id="" placeholder="Input field">
            </div>
            <div class="form-group">
                <label for="">Số lượng</label>
                <input type="text" name="SoLuong" class="form-control" id="" placeholder="Input field">
            </div>
            <div class="form-group">
                <label for="">Giá</label>
                <input type="text" name="Gia" class="form-control" id="" placeholder="Input field">
            </div>
            <div class="form-group">
                <label for="">Ảnh đại diện</label>
                <input type="file" name="AnhDaiDien" class="form-control" id="" placeholder="Input field">
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Add</button>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="">Chuyên mục</label>
                <select name="MaChuyenMuc" class="form-control">
                    <option value="">Chuyên mục</option>
                    @foreach ($categorys as $cat)
                    <option value="{{$cat->MaChuyenMuc}}">{{$cat->TenChuyenMuc}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Size</label>
                <select name="MaSize" class="form-control">
                    <option value="">Size</option>
                    @foreach ($sizes as $s)
                    <option value="{{$s->MaSize}}">{{$s->TenSize}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Size</label>
                <select name="MaNhaPhanPhoi" class="form-control">
                    <option value="">Nhà phân phối</option>
                    @foreach ($providers as $s)
                    <option value="{{$s->MaNhaPhanPhoi}}">{{$s->TenNhaPhanPhoi}}</option>
                    @endforeach
                </select>
            </div>

        </div>
    </form>


</div>


@stop();