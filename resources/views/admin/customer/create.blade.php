@extends('ad_shared.admin')
@section('title','Create new a customer')
@section('main')


<div class="row">
    <div class="col-md-4">
        
        <form action="" method="POST" role="form">   
            <div class="form-group">
                <label for="">Customer Name</label>
                <input type="text" class="form-control" id="" placeholder="Input field">
            </div>
            <div class="form-group">
                <label for="">Customer Address</label>
                <input type="text" class="form-control" id="" placeholder="Input field">
            </div>
            <div class="form-group">
                <label for="">Customer Phone</label>
                <input type="number" class="form-control" id="" placeholder="Input field">
            </div>
            
        
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Add</button>
        </form>
        
    </div>
</div>


@stop();