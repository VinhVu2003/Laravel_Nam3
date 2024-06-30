@extends('ad_shared.admin')
@section('title','Quản lý hóa đơn bán')
@section('main')


@if(session('ok'))
<div class="alert alert-success" id="success-alert">
    {{ session('ok') }}
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
    <a href="" class="btn btn-success pull-right"><i class="fa fa-plus"></i>Thêm mới</a>
</form>
<br>


<table class="table table-hover">
    <thead>
        <tr>
            <th>STT</th>
            <th>Trạng thái</th>
            <th>Tổng tiền</th>
            <th>Địa chỉ giao hàng</th>
            <th>Tên khách hàng</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($query as $value )
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>@if ($value->TrangThai == 0)
                Đang giao
                @else
                Đã giao
                @endif

            </td>
            <td>{{$value -> TongGia}}</td>
            <td>{{$value -> DiaChiGiaoHang}}</td>
            <td>{{$value -> getNameCus->TenKH}}</td>
            <td class="text-right">
                <form action="{{route('exportcart.destroy',$value->MaHoaDon)}}" method="post">
                    @csrf @method('DELETE')
                    <a href="{{route('exportcart.edit',$value->MaHoaDon)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
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