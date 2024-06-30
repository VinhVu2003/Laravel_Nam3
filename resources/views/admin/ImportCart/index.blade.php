@extends('ad_shared.admin')
@section('title','Quản lý hóa đơn nhập')
@section('main')


@if(session('success'))
<div class="alert alert-success" id="success-alert">
    {{ session('success') }}
</div>
@endif

<script>
    // Sử dụng setTimeout để ẩn thông báo sau 3 giây (3000 ms)
    setTimeout(function() {
        document.getElementById('success-alert').style.display = 'none';
    }, 2000);
</script>

<form action="" method="POST" class="form-inline" role="form">

    <div class="form-group">
        <label class="sr-only" for="">label</label>
        <input type="email" class="form-control" id="" placeholder="Input field">
    </div>



    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
    <a href="{{route('importcart.create')}}" class="btn btn-success pull-right"><i class="fa fa-plus"></i>Thêm mới</a>
</form>
<br>


<table class="table table-hover">
    <thead>
        <tr>
            <th>STT</th>
            <th>Nhà phân phối</th>
            <th>Ngày tạo</th>
            <th>Kiểu thanh toán</th>
            <th>Tổng tiền</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($query as $value )
        <tr>
            <td>{{ $loop->iteration }}</td>
            
            <td>{{$value -> getNameProvider->TenNhaPhanPhoi}}</td>
            <td>{{$value -> NgayTao}}</td>
            <td>{{$value -> KieuThanhToan}}</td>
            <td>{{$value -> TongTien}}</td>
            <td class="text-right">
                <form action="{{route('exportcart.destroy',$value->MaHoaDon)}}" method="post">
                    @csrf @method('DELETE')
                    <a href="{{route('importcart.edit',$value->MaHoaDon)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                    <button onclick="return confirm('bạn chắc chắn muốn xóa không')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
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