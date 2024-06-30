@extends('ad_shared.admin')
@section('title','Quản lý chuyên mục')

@section('main')

<form action="" method="POST" class="form-inline" role="form">

    <div class="form-group">
        <label class="sr-only" for="">label</label>
        <input type="email" class="form-control" id="" placeholder="Input field">
    </div>



    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
    <a href="{{route('category.create')}}" class="btn btn-success pull-right"><i class="fa fa-plus"></i>Add new</a>
</form>
<br>


<table class="table table-hover">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên chuyên mục</th>
            <th>Nội dung</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php $stt = 1 ?>
        @foreach($query as $value)
        <tr>
            <td><?= $stt++ ?></td>
            <td>{{$value -> TenChuyenMuc}}</td>
            <td>{{$value -> NoiDung}}</td>
            <td class="text-right">
                <!-- <a href="" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a> -->

                <form action="{{ route('category.destroy', $value->MaChuyenMuc) }}" method="post">
                    @csrf @method('DELETE')
                    <a href="{{route('category.edit',$value->MaChuyenMuc)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                    <button class="btn btn-sm btn-danger" onclick="return confirm('bạn chắc chắn muốn xóa không')"><i class="fa fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@stop();