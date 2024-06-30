@extends('ad_shared.admin')
@section('title','Sửa hóa đơn')
@section('main')

    
<script>
   setTimeout(function() {
       document.getElementById('success-alert').style.display = 'none';
   }, 2000);
</script>
<div class="row">
    @if(session('success'))
    <div style="    top: -54px;
                    left: 28%;
                    position: absolute;
                    width: 26%;" 
    class="alert alert-success" id="success-alert">
        {{ session('success') }}
    </div>
    @endif
    <form action="{{route('exportcart.update',$hoadon->MaHoaDon) }}" method="post">
        @csrf
        @method('PUT')
        <div class="col-md-5">
            <div class="form-group" style="display: none;">
                <label for="">Mã hóa đơn</label>
                <input name="MaHoaDon" type="text" disabled class="form-control" value="{{$hoadon->MaHoaDon}}" id="" placeholder="Input field">
            </div>
            <div class="form-group">
                <label for="">Trạng thái</label>
                <div>
                    <label>
                        <input type="radio" name="TrangThai" value="1" {{ $hoadon->TrangThai == 1 ? 'checked' : '' }}>
                        Hoàn thành
                    </label>
                </div>
                <div>
                    <label>
                        <input type="radio" name="TrangThai" value="0" {{ $hoadon->TrangThai == 0 ? 'checked' : '' }}>
                        Đang giao
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="">Ngày tạo</label>
                <input type="text" name="NgayTao" class="form-control" value="{{$hoadon->NgayTao}}" id="" placeholder="Input field" readonly>
            </div>
            <div class="form-group">
                <label for="">Tổng tiền</label>
                <input type="text" name="TongGia" class="form-control" value="{{$hoadon->TongGia}}" id="" placeholder="Input field" readonly>
            </div>
            <div class="form-group">
                <label for="">Địa chỉ</label>
                <input type="text" name="DiaChiGiaoHang" class="form-control" value="{{$hoadon->DiaChiGiaoHang}}" id="" placeholder="Input field">
            </div>
            <div class="form-group">
                <label for="">Khách hàng</label>
                <input type="text" name="MaKH" class="form-control" value="{{$hoadon->getNameCus->TenKH}}" id="" placeholder="Input field" readonly>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Lưu</button>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <label for="">Sản phẩm</label>
                <select name="MaSanPham" class="form-control">
                    <option value="">Size</option>
                    @foreach ($products as $s)
                    <option value="{{ $s->MaSanPham }}" {{ $s->MaSanPham == $cthoadon->MaSanPham ? 'selected' : '' }}>{{ $s->TenSanPham }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <img style="width: 30%;" src="/anh/{{ $sanpham->AnhDaiDien }}" alt="">
            </div>
            <div class="form-group">
                <label for="">Số lượng</label>
                <input type="text" name="SoLuong" class="form-control" value="{{$cthoadon->SoLuong}}" id="" placeholder="Input field">
            </div>
            <div class="form-group">
                <label for="">Size</label>
                <div class="form-group">

                    <select name="MaSize" class="form-control">
                        <option value="">Size</option>
                        @foreach ($sizes as $s)
                        <option value="{{ $s->MaSize }}" {{ $s->MaSize == $sanpham->MaSize ? 'selected' : '' }}>{{ $s->TenSize }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </form>
    <button style="margin-left: 59px;"><a href="{{route('exportcart.index')}}">Trở lại</a></button>

</div>


@stop();