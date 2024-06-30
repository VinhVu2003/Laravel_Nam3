@extends('ad_shared.admin')
@section('title','Quản lý sản phẩm')
@section('main')


@if(session('ok'))
<div style="top: -54px;
            left: 28%;font-size: 24px;
            position: absolute;
            width: 26%;" 
    class="alert alert-success" id="success-alert">
    {{ session('ok') }}
</div>
@endif

<script>
   
    setTimeout(function() {
        document.getElementById('success-alert').style.display = 'none';
    }, 1000);
</script>

<form action="" method="POST" class="form-inline" role="form">

    <div class="form-group">
        <label class="sr-only" for="">label</label>
        <input type="email" class="form-control" id="" placeholder="Input field">
    </div>



    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
    <a href="{{route('product.create')}}" class="btn btn-success pull-right"><i class="fa fa-plus"></i>Thêm mới</a>
</form>
<br>


<table class="table table-hover">
    <thead>
        <tr>
            <th>STT</th>
            <th>Chuyên mục</th>
            <th>Tên sản phẩm</th>
            <th>Ảnh</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Size</th>
        </tr>
    </thead>
    <tbody>
        @foreach($query as $value)
        <tr style="cursor:pointer">
            <td>{{$loop->iteration }}</td>
            <td>{{$value ->category-> TenChuyenMuc}}</td>
            <td title="{{$value -> TenSanPham}}">{{Str::limit($value -> TenSanPham,10)}}</td>
            <td><img src="/anh/{{$value->AnhDaiDien}}" alt="" width="40"></td>
            <td>{{ number_format($value->Gia, 0, ',', '.') }}</td>
            <td>{{$value -> SoLuong}}</td>
            <td>{{$value ->size-> TenSize}}</td>
            <td class="text-right">
                <form action="{{route('product.destroy',$value->MaSanPham)}}" method="post">
                    @csrf @method('DELETE')
                    <a href="{{route('product.edit',$value->MaSanPham)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i>Sửa</a>
                    <button onclick="return confirm('bạn chắc chắn muốn xóa không')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="pagination clearfix style2">
    <div style="margin-left: 527px;">
        {{ $query->links('pagination::bootstrap-4') }}
    </div>
</div>

@stop();