@extends('ad_shared.admin')
@section('title','Thêm mới chuyên mục')
@section('main')


<div class="row">
    <div class="col-md-4">
        
        <form action="{{route('category.store')}}" method="POST" role="form">   
            @csrf
            <div class="form-group">
                <label for="">Category Name</label>
                <input type="text" name="TenChuyenMuc" class="form-control" id="" placeholder="Input field">
            </div>
            <div class="form-group">
                <label for="">Category Content</label>
                <input type="text" name="NoiDung" class="form-control" id="" placeholder="Input field">
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Add</button>
        </form>
        
    </div>
</div>


@stop();