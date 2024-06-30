@extends('shared.user')
@section('title','Đặt hàng')
@section('main')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./anh/fontawesome-free-6.4.0-web/css/all.css">
    <link rel="stylesheet" href="./user_assets/css/giohang.css">
    <title>Document</title>
    <link rel="icon" href="https://4menshop.com/images/4men-192x192.png">

</head>

<body>
    <div id="giohang">

        <div class="botom-head">
            <ul>
                <li><a href="">4MEN &nbsp; / &nbsp;</a></li>
                <li><a href="">Đơn đặt hàng</a></li>
            </ul>
        </div>

        <div class="content">
            <div class="content-left">
                <form id="contactForm">
                    <legend>Thông tin liên hệ giao hàng</legend>
                    <div class="form-group">
                        <label for="">Họ và tên*</label>
                        <div class="form-group-input">
                            <input value="{{$cus->TenKH}}" readonly type="text" class="content-left-input">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <div class="form-group-input">
                            <input type="email" name="email" id="email" placeholder="Không bắt buộc" class="content-left-input">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Số điện thoại</label>
                        <div class="form-group-input">
                            <input value="{{$cus->SDT}}" readonly type="text" class="content-left-input">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Cách thức nhận hàng</label>
                        <div class="form-group-input-div">

                            <select name="" id="">
                                <option selected value="Giao hàng tận nơi">Giao hàng tận nơi</option>
                                <option value="Nhận hàng tại shop">Nhận hàng tại shop</option>
                            </select>
                        </div>

                    </div>
                </form>

                <form id="deliveryForm">
                    <legend>Địa chỉ giao hàng</legend>
                   
                    <div class="form-group">
                        <label for="">Địa chỉ</label>
                        <div class="form-group-input">
                            <input name="diachi" id="diachi" cols="49" rows="3" style="outline-color:rgb(150, 179, 225);"></input>
                        </div>
                    </div>

                </form>

                <form id="paymentForm" style="margin-top: 30px;">
                    <legend>Hình thức thanh toán</legend>
                    <div class="thanh_toan">
                        <label class="COD">
                            <input type="radio" name="paymentMethod">
                            <span><img style="width: 56px;height: 31px;margin-top: 6px;" src="./anh/giohang-radio1.svg"></span>
                            <div style="width: 70%;margin-top: 5px;float: right;">
                                COD<br>
                                <em>Thanh toán khi nhận hàng</em>
                            </div>
                        </label>

                        <label class="COD">
                            <input type="radio" name="paymentMethod">
                            <span><img style="width: 56px;height: 31px;margin-top: 6px;" src="./anh/money.png"></span>
                            <div style="width: 70%;margin-top: 5px;float: right;">
                                COD<br>
                                <em>Thanh toán khi nhận hàng</em>
                            </div>
                        </label>
                    </div>
                </form>
                <form action="{{ route('cart.create') }}" method="post">
                    @csrf
                    <input type="hidden" name="DiaChiGiaoHang" id="DiaChiGiaoHang" type="text" >
                    <input type="hidden" name="carts" value="{{ json_encode($carts) }}">
                    <button type="submit" id="btn_thanh_toan">THANH TOÁN</button>
                </form>
            </div>

            <div class="content-right">
                <form>
                    <legend>Giỏ hàng của bạn</legend>
                    <table class="content-right-giohang">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Hình</th>
                                <th>Tên sản phẩm</th>
                                <th style="width: 40px;">SL</th>
                                <th>Size</th>
                                <th style="width: 70px;">Đơn giá</th>
                                <th>Tổng</th>
                                <th style="width: 50px;">Xóa</th>
                            </tr>
                        </thead>
                        <tbody class="parentListCart">
                            @foreach ($carts as $item)
                            <tr class="listCart">
                                <td>{{$loop->iteration }}</td>
                                <!-- <td>{{$item->MaGH}} và {{$item->MaSanPham}}</td> -->
                                <td style="padding: 5px;"><img src="/anh/{{$item->AnhDaiDien}}" style="width: 50px;"></td>
                                <td>
                                    <p><span class="TTSP">{{$item->TenSanPham}}</span></p>
                                </td>
                                <td style="display: flex;margin-top: 13px;">
                                    <!-- <div><button class="tang" type="button">+</button></div> -->
                                    <input class="sl" type="text" value="{{$item->SoLuong}}">
                                    <!-- <div><button class="giam" type="button">-</button></div> -->
                                </td>
                                <td>
                                    @php
                                    $sizes = [
                                    1 => 'S',
                                    2 => 'M',
                                    3 => 'L',
                                    4 => 'XL',
                                    5 => 'XXL',
                                    ];
                                    @endphp
                                    <option value="">{{ $sizes[$item->Size] ?? '' }}</option>
                                </td>
                                <td>
                                    <p><span class="gia">{{$item->Gia}}</span></p>
                                </td>
                                <td>
                                    <p><span class="TTSP">{{$item->TongTien}}</span></p>
                                </td>
                                <td>
                                    <form action="{{route('cart.destroy',$item->MaGH)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="xoa">Xóa</button>
                                    </form>
                                </td>
                                
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                </form>

                <form>
                    <legend>Mã giảm giá (nếu có)</legend>
                    <div class="form-group">

                        <div class="form-group-input" style="padding: 0px;">
                            <input type="text" class="content-left-input">
                        </div>
                        <button class="apdung">Áp dụng</button>
                    </div>

                </form>
                <form>
                    <legend>Tổng:</legend>
                    <!-- <div style="width: 100%;height: 30px;font-size: 14px; border-bottom: 1px solid gray;padding: 5px;">Số tiền mua sản phẩm:
                        <span  style="float: right;"></span>
                    </div>
                    <div style="width: 100%;height: 30px;font-size: 14px; border-bottom: 1px solid gray;padding: 5px;">Chi tiết giảm giá</div>
                    <div style="width: 100%;height: 30px;font-size: 14px; border-bottom: 1px solid gray;padding: 5px;font-weight: bold;margin-top: 15px;">
                        Vận chuyển
                    </div>
                    <div style="width: 100%;height: 30px;font-size: 12px;padding: 5px;margin: 0px 0px 20px 10px;">
                        Tổng trọng lượng sản phẩm: 400Gram
                    </div> -->
                    <div style="width: 100%;height: 30px;font-size: 14px; border-top: 1px solid gray;padding: 5px;font-weight: bold;">
                        Tổng tiền thanh toán
                        <span class="total-span" style="float: right;">{{$totalAmount}}</span>
                    </div>
                </form>
            </div>
        </div>





    </div>
    <!-- <script src="../js/giohang.js"></script>
    <script src="../jquery/jquery.2.1.1.min.js"></script> -->
    <script>
        document.getElementById("diachi").addEventListener("input", function() {
            // Lấy giá trị của size đã chọn
            var value = this.value;
            console.log(value)

            document.getElementById("DiaChiGiaoHang").value = value;
        });
    </script>
</body>

</html>
@stop();