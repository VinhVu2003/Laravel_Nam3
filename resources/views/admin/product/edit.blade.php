@extends('ad_shared.admin')

@section('title', 'Sửa sản phẩm')

@section('main')

<script>
    // Sử dụng setTimeout để ẩn thông báo sau 3 giây (3000 ms)
    setTimeout(function() {
        document.getElementById('success-alert').style.display = 'none';
    }, 1000);
</script>

<div class="row">
    <form action="{{ route('product.update', $sanpham->MaSanPham) }}" method="POST" enctype="multipart/form-data" role="form">
        @csrf
        @method('PUT')
        <div class="col-md-5">
            <div class="form-group">
                <label for="">Tên sản phẩm</label>
                <input type="text" name="TenSanPham" class="form-control" id="" placeholder="Input field" value="{{ $sanpham->TenSanPham }}">
            </div>
            <div class="form-group">
                <label for="">Số lượng</label>
                <input type="text" name="SoLuong" class="form-control" id="" placeholder="Input field" value="{{ $sanpham->SoLuong }}">
            </div>
            <div class="form-group">
                <label for="">Giá</label>
                <input type="text" name="Gia" class="form-control" id="" placeholder="Input field" value="{{ $sanpham->Gia }}">
            </div>
            <div class="form-group">
                <label for="">Ảnh đại diện</label>
                <input type="file" name="AnhDaiDien" class="form-control" id="" placeholder="Input field">
                <img src="/anh/{{ $sanpham->AnhDaiDien }}" alt="">
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Lưu</button>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="MaChuyenMuc">Chuyên mục</label>
                <select name="MaChuyenMuc" class="form-control">
                    <option value="">Chuyên mục</option>
                    @foreach ($categorys as $cat)
                    <option value="{{ $cat->MaChuyenMuc }}" {{ $cat->MaChuyenMuc == $sanpham->MaChuyenMuc ? 'selected' : '' }}>{{ $cat->TenChuyenMuc }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Size</label>
                <select name="MaSize" class="form-control">
                    <option value="">Size</option>
                    @foreach ($sizes as $s)
                    <option value="{{ $s->MaSize }}" {{ $s->MaSize == $sanpham->MaSize ? 'selected' : '' }}>{{ $s->TenSize }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Nhà phân phối</label>
                <select name="MaNhaPhanPhoi" class="form-control">
                    <option value="">Nhà phân phối</option>
                    @foreach ($providers as $s)
                    <option value="{{ $s->MaNhaPhanPhoi }}" {{ $s->MaNhaPhanPhoi == $sanpham->MaNhaPhanPhoi ? 'selected' : '' }}>{{ $s->TenNhaPhanPhoi }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>
</div>

@stop
