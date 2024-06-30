@extends('ad_shared.admin')
@section('title','Thông tin tài khoản')
@section('main')



<script>
    // Sử dụng setTimeout để ẩn thông báo sau 3 giây (3000 ms)
    setTimeout(function() {
        document.getElementById('success-alert').style.display = 'none';
    }, 1000);
</script>
<div class="row">

    <form action="" method="POST" enctype="multipart/form-data" role="form">
        @csrf
        <div class="col-md-9">
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
        
    </form>


</div>


@stop();