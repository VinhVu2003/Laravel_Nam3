@extends('ad_shared.admin')
@section('title','Provider Manager')
@section('main')

<form action="" method="POST" class="form-inline" role="form">

    <div class="form-group">
        <label class="sr-only" for="">label</label>
        <input type="email" class="form-control" id="" placeholder="Input field">
    </div>

    

    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
    <a href="" class="btn btn-success pull-right"><i class="fa fa-plus"></i>Add new</a>
</form>
<br>


<table class="table table-hover">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên nhà phân phối</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
           
        </tr>
    </thead>
    <tbody>
    <?php $stt=1 ?>
        @foreach($query as $value)
        <tr>
            <td><?= $stt++ ?></td>
            <td>{{$value -> TenNhaPhanPhoi}}</td>
            <td>{{$value -> DiaChi}}</td>
            <td>{{$value -> SoDienThoai}}</td>
           
            <td class="text-right">
                <a href="" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                <a href="" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@stop();