@extends('ad_shared.admin')
@section('title','Quản lý khách hàng')
@section('main')

<form action="" method="POST" class="form-inline" role="form">

    <div class="form-group">
        <label class="sr-only" for="">label</label>
        <input type="email" class="form-control" id="" placeholder="Input field">
    </div>

    

    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
    <a href="{{route('customer.create')}}" class="btn btn-success pull-right"><i class="fa fa-plus"></i>Add new</a>
</form>
<br>


<table class="table table-hover">
    <thead>
        <tr>
            <th>STT</th>
            <th>Name</th>
            <th>Address</th>
            <th>Phone </th>
        </tr>
    </thead>
    <tbody>
        @foreach($query as $value)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{$value -> TenKH}}</td>
            <td>{{$value -> DiaChi}}</td>
            <td>{{$value -> SDT}}</td>
            <td class="text-right">
                <a href="" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                <a href="" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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