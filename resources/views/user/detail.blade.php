@extends('shared.user')
@section('title','Chi tiết sản phẩm')
@section('main')

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="./fontawesome-free-6.4.0-web/fontawesome-free-6.4.0-web/css/all.css"> -->
    <link rel="stylesheet" href="./anh/fontawesome-free-6.4.0-web/css/all.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="./user_assets/css/chitietsanpham.css">
    <title>@yield('title')</title>
</head>
<div id="chitietsanpham">
    @if(session('success'))
    <div id="successMessage" style="width: 257px;
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
    @if(session('error'))
    <div id="successMessage" style="width: 288px;
                            height: 50px;
                            background-color: red;
                            color: white;
                            padding: 15px;
                            margin: auto;
                            position: absolute;
                            top: 65px;
                            left: 542px;
                            z-index: 3;">
        {{ session('error') }}
    </div>
    @endif
    <div class="botom-head">
        <ul>
            <li><a href="">4MEN &nbsp; / &nbsp;</a></li>
            <li><a href="">Áo Nam &nbsp; / &nbsp;</a></li>
            <li><a class="title" href="">{{$product->TenSanPham}}</a></li>
        </ul>
    </div>
    <div class="content">
        <div class="content-left">

            <div id="content-left-right">
                <img class="productimg" style="height: auto;" src="/anh/{{$product->AnhDaiDien}}" alt="" id="img-main">
            </div>
        </div>
        <div class="content-right">
            <div class="content-right-header">
                <h1 class="productname">{{$product->TenSanPham}}</h1>
                <div class="feadback">
                    <i class="fa-solid fa-star" style="color: yellow;font-size: 12px;"></i>
                    <i class="fa-solid fa-star" style="color: yellow;font-size: 12px;"></i>
                    <i class="fa-solid fa-star" style="color: yellow;font-size: 12px;"></i>
                    <i class="fa-solid fa-star" style="color: yellow;font-size: 12px;"></i>
                    <i class="fa-solid fa-star" style="color: yellow;font-size: 12px;"></i>
                    <span>(35 đánh giá / 78 lượt mua)</span>
                </div>
                <div class="money-left" style="width:100%">
                    <span style="font-size: 14px;margin-top: 10px;"><u>Giá bán:</u></span>
                    <span class="productprice" style="font-size: 22px; color:#c80204;margin-left: 10px; ">{{$product->Gia}}đ</span>
                </div>
                <!-- <div class="money-right">
                    <span class="productprice" style="font-size: 22px; color:#c80204;"></span>
                    <span style="font-size: 13px;margin-left: 10px;color: #666666;"> Giá gốc:</span>
                    <span style="font-size: 18px;color: #aaaaaa;"><del>1.000.000 đ</del></span>
                </div> -->
                <!-- <div style="width: 100%;height: 1px; background-color: #cccccc;float: left; margin: 5px 0px;"></div> -->
                <div class="size">
                    <div>
                        SIZE*
                        <a href=""><em>Hướng dẫn chọn size</em></a>
                    </div>
                    <select name="size" id="size">
                        <option value="">Chọn size</option>
                        @foreach ($sizes as $s)
                        <option value="{{$s->MaSize}}">{{$s->TenSize}}</option>
                        @endforeach
                    </select>
                    <!-- <button> <i class="fa fa-shopping-cart" style="margin-right: 10px;"></i>ĐĂNG KÍ MUA</button>
                         -->
                    <form action="{{route('detail.create') }}" method="">


                        <input type="hidden" name="MaSanPham" value="{{$product->MaSanPham}}">
                        <input type="hidden" name="MaSize" id="selectedMaSize">
                        <input type="hidden" name="TenSanPham" value="{{$product->TenSanPham}}">
                        <input type="hidden" name="AnhDaiDien" value="{{$product->AnhDaiDien}}">
                        <input type="hidden" name="Gia" value="{{$product->Gia}}">
                        <input type="hidden" name="SoLuong" id="selectSoLuong">
                        <!-- Nút "ĐĂNG KÍ MUA" -->
                        <button type="submit" class="btn_addcart">
                            <i class="fa fa-shopping-cart" style="margin-right: 10px;"></i>
                            ĐĂNG KÍ MUA
                        </button>
                    </form>

                    <span>
                        <i class="fa-sharp fa-solid fa-location-dot"></i>
                        <a href="" style="color: #000000;"><u>Xem địa chỉ còn sản phẩm này</u></a>
                    </span>
                    <div class="like-share">
                        <button>
                            <i class="fa-solid fa-thumbs-up"></i>
                            Thích 711
                        </button>
                        <button id="share">
                            Chia sẻ
                        </button>
                    </div>
                </div>
                <div class="number">
                    <div>SỐ LƯỢNG*</div>
                    <select id="soluong">
                        <option value="1" >1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                    <span class="themgiohang" style="margin-left: 15px;cursor: pointer;"><a>+ Thêm vào giỏ hàng</a></span>
                </div>
            </div>

        </div>
    </div>

    <div class="product-selling ">

        <!-- <h5 class="fashion-most-selling">sản phẩm cùng danh mục</h5> -->
        <div class="fashion-most-selling">
            <h5>sản phẩm cùng danh mục</h5>
        </div>
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
                        <a href="" class="spannote" title="Áo Khoác Dạ Regular Phối sọc AK405 Màu Be" style="width: 100%;text-align: center;">Áo Sơ Mi Loose Summner Escape ASM094 Màu Xanh</a>
                    </div>
                    <div class="protect-money-selling">
                        <p style="color: brown; text-align: center;">540.000</p>
                    </div>
                </div>
            </div>

            <div class="contentsmall-selling">
                <div class="productimg-selling">
                    <div class="productimgpig-selling">
                        <div style="width: 100%;height: 100%; position: absolute;">
                            <a href=""><img src="./anh/thoitrangbanchay2.1.jpg" alt=""></a>
                            <div class="overlay-selling" style="position: absolute;">
                                <div class="hoverlay-img"><a href=""><img src="./anh/thoitrangbanchay2.2.jpg" alt=""></a></div>
                            </div>
                            <!-- <div class="overlayitem-selling">
                                    <span class="overlayitemicon-selling">
                                        <i class="fa-solid fa-cart-shopping" style="color: white;rotate: -20deg;"></i>
                                    </span>
                                </div> -->
                        </div>

                    </div>
                    <div class="productimgsmall-selling">

                        <a href=""><img src="./anh/thoitrangbanchay2.1.jpg" alt=""></a>

                    </div>
                    <div class="producttext-selling">
                        <a href="" class="spannote" title="Áo Khoác Dạ Regular Phối sọc AK405 Màu Be" style="width: 100%;text-align: center;">Quần Tây NAZAFU QT003 Màu Xanh Đen</a>
                    </div>
                    <div class="protect-money-selling">
                        <p style="color: brown; text-align: center;">440.000</p>
                    </div>
                </div>
            </div>

            <div class="contentsmall-selling">
                <div class="productimg-selling">
                    <div class="productimgpig-selling">
                        <div style="width: 100%;height: 100%; position: absolute;">
                            <a href=""><img src="./anh/thoitrangbanchay3.1.jpg" alt=""></a>
                            <div class="overlay-selling" style="position: absolute;">
                                <div class="hoverlay-img"><a href=""><img src="./anh/thoitrangbanchay3.2.jpg" alt=""></a></div>
                            </div>
                            <!-- <div class="overlayitem-selling">
                                    <span class="overlayitemicon-selling">
                                        <i class="fa-solid fa-cart-shopping" style="color: white;rotate: -20deg;"></i>
                                    </span>
                                </div> -->
                        </div>

                    </div>
                    <div class="productimgsmall-selling">

                        <a href=""><img src="./anh/thoitrangbanchay3.1.jpg" alt=""></a>

                    </div>
                    <div class="producttext-selling">
                        <a href="" class="spannote" title="Áo Khoác Dạ Regular Phối sọc AK405 Màu Be" style="width: 100%;text-align: center;">Quần Tây NAZAFU Xám Muối Tiêu QT1131</a>
                    </div>
                    <div class="protect-money-selling">
                        <p style="color: brown; text-align: center;">740.000</p>
                    </div>
                </div>
            </div>

            <div class="contentsmall-selling">
                <div class="productimg-selling">
                    <div class="productimgpig-selling">
                        <div style="width: 100%;height: 100%; position: absolute;">
                            <a href=""><img src="./anh/thoitrangbanchay4.1.jpg" alt=""></a>
                            <div class="overlay-selling" style="position: absolute;">
                                <div class="hoverlay-img"><a href=""><img src="./anh/thoitrangbanchay4.2.jpg" alt=""></a></div>
                            </div>
                            <!-- <div class="overlayitem-selling">
                                    <span class="overlayitemicon-selling">
                                        <i class="fa-solid fa-cart-shopping" style="color: white;rotate: -20deg;"></i>
                                    </span>
                                </div> -->
                        </div>

                    </div>
                    <div class="productimgsmall-selling">

                        <a href=""><img src="./anh/thoitrangbanchay4.1.jpg" alt=""></a>

                    </div>
                    <div class="producttext-selling">
                        <a href="" class="spannote" title="Áo Khoác Dạ Regular Phối sọc AK405 Màu Be" style="width: 100%;text-align: center;">Quần Tây Phối Dây Dệt QT012 Màu Đen</a>
                    </div>
                    <div class="protect-money-selling">
                        <p style="color: brown; text-align: center;">425.000</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Lắng nghe sự kiện khi người dùng thay đổi lựa chọn trong dropdown list
        document.getElementById("size").addEventListener("change", function() {
            // Lấy giá trị của size đã chọn
            var selectedSize = this.value;
            console.log(selectedSize)
            // Gắn giá trị của size vào trường input
            document.getElementById("selectedMaSize").value = selectedSize;
        });
        document.getElementById("soluong").addEventListener("change", function() {
            // Lấy giá trị của size đã chọn
            var selectedSize = this.value;
            console.log(selectedSize)

            document.getElementById("selectSoLuong").value = selectedSize;
        });
    </script>
</div>

</div>




@stop();