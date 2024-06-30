@extends('shared.user')
@section('title','Trang chủ')
@section('main')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./user_assets/css/aonam.css">
    <link rel="stylesheet" href="./anh/fontawesome-free-6.4.0-web/css/all.css">

    <!-- <script src="./angular/ChiTietSanPham.js"></script> -->
    <title>4MENSHOP-Tìm kiếm sản phẩm</title>
</head>

<body>
    <div class="aonam">
        <div class="botom-head">
            <ul>
                <li><a href="">4MEN &nbsp; / &nbsp;</a></li>
                <li><a href="">Tìm Kiếm</a></li>
            </ul>
        </div>

        <div class="bottom">
            <div class="botom-left">
                <h1>Tìm kiếm sản phẩm</h1>


            </div>

            <div class="bottom-right">
                <ul>
                    <li><a href="">Lọc Danh Mục</a>
                        <ul class="sub-banner2ul">
                            <li><a href="">Áo sơ mi</a></li>
                            <li><a href="">Áo thun</a></li>
                            <li><a href="">Áo polo</a></li>
                            <li><a href="">Áo khoác</a></li>
                            <li><a href="">Áo len</a></li>
                        </ul>
                        <i class="fa-solid fa-chevron-down"></i>
                    </li>
                    <li><a href="">
                            <span><img src="./anh/aonamicon.svg" style="margin-left: 17px;width: 18px; height: 18px;"> </span>
                        </a></li>
                    <li><a href="">
                            <span> <img class="aonamiconlogo" src="./anh/aonamicon2.svg" style="margin-left: 17px;width: 18px; height: 18px;"></span>
                            <span> <img class="aonamicon2" src="./anh/aonamicon2.1.svg"></span>
                        </a></li>
                </ul>
            </div>

        </div>

        <div>
            <div class="content-left">
                <div style="margin-bottom: 15px;">
                    <input type="text" value="{{$dataSearch}}" style="padding: 10px;width: 400px;">
                    <button style=" padding: 10px;position: absolute;left: 420px;background-color: #ffffff;border: 0px;margin-top: 3px;"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
                @foreach ($searchResults as $value)
                <div class="contentsmall">
                    <div class="productimg">
                        <div class="productimgpig">
                            <div style="width: 100%;height: 100%; position: absolute;">
                                <a href=""><img src="/anh/{{$value->AnhDaiDien}}" alt=""></a>
                                <div class="overlayitem">
                                    <span class="overlayitemicon">
                                        <i class="fa-solid fa-cart-shopping" style="color: white;rotate: -20deg;"></i>
                                    </span>
                                </div>

                            </div>
                        </div>
                        <div class="productimgsmall">
                            <a href=""><img src="/anh/{{$value->AnhDaiDien}}" alt=""></a>
                        </div>
                        <div class="producttext" style="text-align: center;">
                            <a href="" class="spannote" title="Áo Khoác Dạ Regular Phối sọc AK405 Màu Be" style="width: 100%;">{{$value->TenSanPham}}</a>
                        </div>
                        <div class="protect-money">
                            <!-- <em style="text-decoration:line-through;font-size: 13px;color:#666;">35.000</em> -->
                            <p style="color: brown; text-align: center;">{{$value->Gia}}</p>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="like-share">
                    <button>
                        <i class="fa-solid fa-thumbs-up"></i>
                        Thích 711
                    </button>
                    <button id="share">
                        Chia sẻ
                    </button>

                    <div class="pagination clearfix style2">
                        <div style="margin-left: 527px;">
                            {{ $searchResults->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>

            </div>

            <div class="content-right">
                <div class="div-search">
                    <div>
                        <span>
                            <h5 style="font-size: 14px;color: #666666;">TÌM KIẾM
                                <hr style="
                            width: 75%;
                            float: right;
                            padding: 0px;
                            height: 1px;
                           
                            background-color: #cccccc;
                            border: 0px;
                            margin-top: 8px;
                        ">
                            </h5>
                            <br>
                            <form action="">
                                <label for="">Sản phẩm tại 4MEN</label><br>
                                <input type="text" placeholder="Từ khóa tìm kiếm">
                                <button> <i class="fa-solid fa-magnifying-glass" style="color: gray;"></i></button>
                                <!-- <i class="fa-solid fa-magnifying-glass"></i> -->
                            </form>
                        </span>
                    </div>
                </div>
                <div class="product-hot">
                    <h5 style="font-size: 14px;color: #666666;">SẢN PHẨM BÁN CHẠY
                        <hr style="
                        width: 56%;
                        float: right;
                        padding: 0px;
                        height: 1px;
                       
                        background-color: #cccccc;
                        border: 0px;
                        margin-top: 8px;
                    ">
                    </h5>
                    @foreach ($products as $value)
                    
                        <div class="product-hot-content">
                            <div class="div-img">
                                <img src="/anh/{{$value->AnhDaiDien}}" alt="">
                            </div>
                            <div class="div-information">
                                <a href="">{{$value->TenSanPham}}</a>
                                <p style="color:brown;font-size: 16px;">{{$value->Gia}}</p>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
            <div id="back-top">
                <i class="fa-solid fa-chevron-up"></i>
            </div>
        </div>

    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $(window).scroll(function() {
            if ($(this).scrollTop()) {
                $('#back-top').fadeIn();
            } else {
                $('#back-top').fadeOut();
            }
        })
        $("#back-top").click(function() {
            $('html,body').animate({
                scrollTop: 0
            }), 500
        })
    })
</script>

<script src="./angular/angular.min.js"></script>
<script src="./angular/global.js"></script>
<script src="./angular/admin.js"></script>
<script src="./angular/agl_SP_Search.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</html>
@stop();