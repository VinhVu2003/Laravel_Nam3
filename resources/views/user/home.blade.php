@extends('shared.user')
@section('title','Trang chủ')
@section('main')
<div class="slideshow">
    <a href=""><img id="img" src="./anh/slideshow1.jpg" alt=""></a>

    <button class="dieuhuong-left"><i class="fa-solid fa-chevron-left" onclick="prev()"></i></button>
    <button class="dieuhuong-right"><i class="fa-solid fa-chevron-right" onclick="next()"></i></button>
</div>
<div class="content">
    @if(session('success'))
    <div id="successMessage" style="width: 199px;
                            height: 50px;
                            background-color: cornflowerblue;
                            color: white;
                            padding: 15px;
                            margin: auto;
                            position: absolute;
                            top: 65px;
                            left: 542px;
                            z-index: 3;">
        {{ session('success') }}
    </div>
    @endif
    <div class="product-hot">
        <h5 class="fashion-most-hot">4menshop</h5>
        <!-- <div class="hot"> -->
        @foreach($query as $value)
        <div class="contentsmall">
            <div class="productimg">
                <div class="productimgpig">
                    <a href="{{route('user.detail')}}?id={{$value->MaSanPham}}"><img src="/anh/{{$value->AnhDaiDien}}" alt=""></a>
                    <!-- <div class="overlay" style="position: absolute;">
                        <div class="hoverlay-img"><a href=""><img src="/anh/AoSoMi/{{$value->AnhDaiDien}}" alt=""></a></div>
                    </div> -->
                    <div class="overlayitem">
                        <span class="overlayitemicon" ng-click="cart()">
                            <i class="fa-solid fa-cart-shopping" style="color: white;rotate: -20deg;"></i>
                        </span>
                    </div>
                </div>
                <div class="productimgsmall">
                    <a href=""><img src="/anh/{{$value->AnhDaiDien}}" alt=""></a>
                </div>
                <div class="producttext">
                    <a href="" class="spannote" title="">{{$value ->TenSanPham}}</a>
                </div>
                <div class="protect-money">
                    <p> {{ number_format($value->Gia, 0, ',', '.') }}đ</p>
                </div>

            </div>
        </div>
        @endforeach
        <!-- </div> -->

        <div id="CuaSo_SP">
            <div id="CuaSo_SP_DIV_IMG">

            </div>

        </div>

    </div>
    <!-- ----------------------------------------------------------------------------------------------------------------- -->
    <div class="productbannermid">

        <div class="imgleft">
            <a href="" class="img1"><img src="./anh/productbannerleft.jpg" alt=""></a>
        </div>
        <div class="imgmid">
            <a href="" class="img2"><img src="./anh/productbannermid.jpg" alt=""></a>
        </div>
        <div class="imgright">
            <a href="" class="img3"><img src="./anh/productbannerright.jpg" alt=""></a>
        </div>

    </div>
    <!-- ----------------------------------------------------------------------------------------------------------------------- -->
    <div class="product-new">
        <h5 class="fashion-most-new">thời trang mới nhất</h5>
        <div class="new">
            @foreach ($query as $a)
            <div class="contentsmall-new"> 
                <div class="productimg-new">
                    <div class="productimgpig-new">
                        <a href=""><img src="/anh/{{$a->AnhDaiDien}}" alt=""></a>
                        <div class="overlayitem-new">
                            <span class="overlayitemicon-new">
                                <i class="fa-solid fa-cart-shopping" style="color: white;rotate: -20deg;font-size: 20px;"></i>
                            </span>
                        </div>
                    </div>
                    <div class="productimgsmall-new">
                        <a class="img1" href=""><img src="/anh/{{$a->AnhDaiDien}}" alt=""></a>
                    </div>
                    <div class="producttext-new">
                        <a class="spannote-new" title="Áo Khoác Dạ Regular Phối sọc AK405 Màu Be" style="width: 100%;text-align: center;">
                            <p class="p-product-new-1">{{$a ->TenSanPham}}</p>
                        </a>
                    </div>
                    <div class="protect-money-new">
                        <p style="color: brown; text-align: center;">
                            {{ number_format($a->Gia, 0, ',', '.')}}
                            <em style="text-decoration:line-through;font-size: 13px;color: black;"></em>
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- ------------------------------------------------------------------------------------------------------------------------------- -->
    <div class="product-selling ">

        <h5 class="fashion-most-selling" style="text-align: center;">thời trang hot nhất</h5>

        <div class="product-selling-content">
            <div class="contentsmall-selling ">
                <div class="productimg-selling">
                    <div class="productimgpig-selling">
                        <div style="width: 100%;height: 100%; position: absolute;">
                            <a href=""><img src="./anh/thoitrangbanchay1.2.jpg" alt=""></a>
                            <div class="overlay-selling" style="position: absolute;">
                                <div class="hoverlay-img"><a href=""><img src="./anh/thoitrangbanchay1.1.jpg" alt=""></a></div>
                            </div>
                            <!-- <div class="overlayitem-selling">
                                        <span class="overlayitemicon-selling">
                                            <i class="fa-solid fa-cart-shopping" style="color: white;rotate: -20deg;"></i>
                                        </span>
                                    </div> -->
                        </div>

                    </div>
                    <div class="productimgsmall-selling">

                        <a href=""><img src="./anh/thoitrangbanchay1.2.jpg" alt=""></a>

                    </div>
                    <div class="producttext-selling">
                        <a class="spannote" title="Áo Khoác Dạ Regular Phối sọc AK405 Màu Be" style="width: 100%;text-align: center;">Áo Sơ Mi Loose Summner Escape ASM094 Màu Xanh</a>
                    </div>
                    <div class="protect-money-selling">
                        <p style="color: brown; text-align: center;">540.000</p>
                    </div>
                </div>
            </div>




        </div>
    </div>
    <!-- - --------------------------------------------------------------------------------------------------------------------->
    <div class="footer1">
        <div class="footer1-a">
            <div class="footer1-content">
                <a href=""><i style="transform: rotate(-25deg);font-size: 35px;" class="fa fa-plane" aria-hidden="true"></i></a>
                <h4>
                    Thanh toán & giao hàng
                </h4>
                <p>
                    Miễn phí vận chuyển cho đơn hàng trên 499.000 VNĐ
                    <br>
                    - Giao hàng và thu tiền tận nơi
                    <br>
                    - Chuyển khoản và giao hàng
                    <br>
                    - Mua hàng tại shop
                </p>
            </div>
        </div>
        <div class="footer1-a">
            <div class="footer1-content">
                <a href=""><i style="font-size: 35px;" class="fa fa-credit-card" aria-hidden="true"></i></a>
                <h4>
                    Thẻ thành viên
                </h4>
                <p>
                    Ché độ ưu đãi thành viên VIP:
                    <br>
                    - 5% cho thành viên Bạc
                    <br>
                    - 10% cho thành viên Vàng
                    <br>
                    - 15% cho thành viên Kim cương
                </p>
            </div>
        </div>
        <div class="footer1-a">
            <div class="footer1-content">
                <a href=""><i style="font-size: 35px;" class="fa-regular fa-clock" aria-hidden="true"></i></a>
                <h4>
                    Giờ mở cửa
                </h4>
                <p>
                    8h30 đến 22:00
                    <br>
                    - Tất cả các ngày trong tuần
                    <br>
                    Áp dụng cho tất cả các chi nhánh hệ thông cửa hàng 4MEN

                </p>
            </div>

        </div>
        <div class="footer1-a">
            <div class="footer1-content">
                <a href=""><i style="font-size: 35px;" class="fa fa-headphones" aria-hidden="true"></i></a>
                <h4>
                    Hỗ trợ 24/7
                </h4>
                <p>
                    Gọi ngay cho chúng tôi khi bạn có thắc mắc
                    <br>
                    - 0868.444.644

                </p>
            </div>
        </div>

    </div>
    <!-- ------------------------------------------------------------------------------- -->
    
    <script>
        // Lấy đối tượng thông báo thành công
        var successMessage = document.getElementById('successMessage');
        // Kiểm tra xem đối tượng tồn tại
        if (successMessage) {
            // Ẩn thông báo sau 2 giây
            setTimeout(function() {
                successMessage.style.display = 'none';
            }, 2000); // 2000 milliseconds = 2 giây
        }
    </script>
    <script>
        var listProduct = <?= $listProduct ?>;
        // var listProduct = <?= json_encode($listProduct) ?>;
    </script>
    <script src="/user_assets/js/message.js"></script>
</div>
@stop();