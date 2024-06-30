@extends('ad_shared.admin')
@section('title','Sửa chuyên mục')
@section('main')


<div class="row">
    <div class="col-md-4">
        <form action="{{route('category.update',$chuyenmuc->MaChuyenMuc)}}" method="post">   
        @csrf
        @method('PUT')
        <div class="form-group">
                <label for="">Category ID</label>
                <input type="text" disabled class="form-control" value="{{$chuyenmuc->MaChuyenMuc}}" id="" placeholder="Input field">
            </div>
            <div class="form-group">
                <label for="">Category Name</label>
                <input type="text" name="TenChuyenMuc" class="form-control" value="{{$chuyenmuc->TenChuyenMuc}}" id="" placeholder="Input field">
            </div>
            <div class="form-group">
                <label for="">Category Status</label>
                <input type="text"  name="NoiDung" class="form-control" value="{{$chuyenmuc->NoiDung}}" id="" placeholder="Input field">
            </div>
            
        
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Save</button>
        </form>
        
    </div>
</div>


@stop();