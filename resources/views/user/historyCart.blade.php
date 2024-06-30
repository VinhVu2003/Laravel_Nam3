@extends('shared.user')
@section('title','Đơn mua')
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
                <li><a href="">Đơn hàng của bạn</a></li>
            </ul>
        </div>
        @if(session('success'))
        <div id="successMessage" style="    width: 284px;
                                font-size: 23px;
                                height: 69px;
                                background-color: cornflowerblue;
                                color: white;
                                padding: 15px;
                                margin: auto;
                                position: absolute;
                                top: 51px;
                                left: 542px;
                                text-align: center;
                                z-index: 3;
                                border-radius: 8px;">
            <p style="margin:6px">{{ session('success') }}</p>
        </div>
        @endif
        <div class="content">
            <div class="content-left" style=" width: 40%;">
                <form id="contactForm">
                    <legend>Tài khoản của tôi</legend>
                    <div class="form-group">
                        <label for="">Họ và tên:</label>
                        <div class="form-group-input" style="width: 58%;display: flex; justify-content: center; align-items: center;">
                            <p>{{$cus->TenKH}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Địa chỉ:</label>
                        <div class="form-group-input" style=" width: 58%;display: flex; justify-content: center; align-items: center;">
                            <p>{{$cus->DiaChi}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Số điện thoại:</label>
                        <div class="form-group-input" style="width: 58%;display: flex; justify-content: center; align-items: center;">
                            <p>{{$cus->SDT}}</p>
                        </div>
                    </div>
                </form>
            </div>

            <div class="content-right">
                <form>
                    <legend>Đơn hàng của bạn</legend>
                    <table class="content-right-giohang">
                        <thead>
                            <tr>
                                <th>Hình</th>
                                <th>Thông tin sản phẩm</th>
                                <th style="width: 40px;">SL</th>
                                <th>Size</th>
                                <th style="width: 70px;">Đơn giá</th>
                                <th>Thành tiền</th>
                                <th colspan="2">Hành động</th>
                            </tr>
                        </thead>
                        <tbody class="parentListCart">

                            @foreach ($cart as $item)
                            <tr class="listCart">
                                <td style="padding: 5px;"><img src="/anh/{{$item->AnhDaiDien}}" style="width: 50px;"></td>
                                <td>
                                    <p><span class="TTSP">{{$item->TenSanPham}}</span></p>
                                </td>
                                <td>
                                    <p><span class="gia">{{$item->SoLuong}}</span></p>
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
                                    <option value="">{{ $sizes[$item->MaSize] ?? '' }}</option>
                                </td>
                                <td>
                                    <p><span class="gia">{{$item->Gia}}</span></p>
                                </td>
                                <td>
                                    <p><span class="TTSP">{{$item->TongGia}}</span></p>
                                </td>
                                <td>
                                    <p><span class="TTSP">
                                            @if($item->TrangThai == 0)
                                            Đang giao
                                            @else
                                            Đã giao
                                            @endif
                                        </span></p>
                                </td>
                                <td>Hủy</td>
                            </tr>
                            @endforeach



                        </tbody>
                    </table>
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