<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="./fontawesome-free-6.4.0-web/fontawesome-free-6.4.0-web/css/all.css"> -->
    <link rel="stylesheet" href="./anh/fontawesome-free-6.4.0-web/css/all.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="./user_assets/css/trangchu.css">
    <title>@yield('title')</title>
</head>

<body>

    <div id="trangchu">
        <div class="header1">

            <div class="left">
                <i class="fa-solid fa-phone" style="color: white;"></i>
                &nbsp; Hotline:
                <a href="tel:0868444644" title="4MEN Hot Line" rel="nofollow">0868.444.644</a>
            </div>
            <div class="right">
                <ul>
                    <li><a href="">Cách chọn size</a></li>
                    <li><a href="">Chính sách khách vip</a></li>
                    <li><a href="">Giới thiệu</a></li>
                    <li><a><i class="fa-solid fa-user"></i></a></li>
                    <li  >
                        <!-- Hiển thị tên khách hàng từ session -->
                        @if(Session::has('tenKH'))
                        <p class="inforCustomerlogo">{{ Session::get('tenKH') }}</p>
                        @endif
                        <div class="inforCustomer">
                            <div  class="inforCustomer2">Thông tin của tôi</div>
                            <div class="inforCustomer2"> <a style="color:black;" href="{{route('history.index')}}"> Đơn mua</a></div>
                            <div class="inforCustomer2"> <a style="color:black;" href="{{route('user.login')}}"> Đăng xuất</a> 
                            </div>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
        <div class="header2">
            <a href="{{route('user.home')}}"><img class="logo" src="./anh/banner2.png" alt=""></a>


            <div class="header2div">
                <ul class="banner2ul">
                    <li>
                        <div>
                            <a href="">KHUYẾN MÃI
                                <div class="banneritem1">
                                    <span class="hot" style="color: white;">
                                        Hot
                                    </span>
                                </div>
                        </div>
                        </a>


                    </li>
                    <li><a href="">HÀNG MỚI VỀ
                            <div class="banneritem2">
                                <span class="hot" style="color: white;">
                                    Hot
                                </span>
                            </div>
                        </a>

                    </li>
                    <li><a href="">ÁO NAM</a>
                        <ul class="sub-banner2ul">
                            @foreach ($categoryAo as $item)

                            <li><a href="{{route('user.category')}}?cate={{$item->MaChuyenMuc}}">{{$item->TenChuyenMuc}}</a></li>
                            @endforeach

                        </ul>
                    </li>
                    <li><a href="">QUẦN NAM</a>
                        <ul class="sub-banner2ul">

                            @foreach ($category as $item)
                            @if(str_starts_with($item->TenChuyenMuc, 'Quần'))
                            <li><a href="{{route('user.category')}}?cate={{$item->MaChuyenMuc}}">{{$item->TenChuyenMuc}}</a></li>
                            @endif
                            @endforeach

                        </ul>
                    </li>
                    <li><a href="">PHỤ KIỆN</a>
                        <ul class="sub-banner2ul">
                            @foreach ($category as $item)
                            @if (!str_starts_with($item->TenChuyenMuc, 'Áo') && !str_starts_with($item->TenChuyenMuc, 'Quần') && !str_starts_with($item->TenChuyenMuc, 'Dép') && !str_starts_with($item->TenChuyenMuc, 'Giày'))
                            <li><a href=" {{route('user.category')}}?cate={{$item->MaChuyenMuc}}">{{$item->TenChuyenMuc}}</a></li>
                            @endif
                            @endforeach


                        </ul>
                    </li>
                    <li><a href="">GIÀY DÉP</a>
                        <ul class="sub-banner2ul">
                            @foreach ($category as $item)
                            @if(str_starts_with($item->TenChuyenMuc,'Dép') || str_starts_with($item->TenChuyenMuc, 'Giày'))
                            <li><a href="{{route('user.category')}}?cate={{$item->MaChuyenMuc}}">{{$item->TenChuyenMuc}}</a></li>
                            @endif
                            @endforeach

                        </ul>
                    </li>
                </ul>
            </div>

            <div class="banner2right">
                <div class="b1">
                    <span class="banner2span" style="padding-top: 9px;">
                        <a href="{{route('cart.index')}}"> <i class="fa-solid fa-cart-shopping" style="color: brown;"></i></a>

                        <!-- <a href="./giohang.html"> <i class="fa-solid fa-cart-shopping" style="color: brown;" onclick="showgiohang()"></i></a> -->
                        <div class="giohang">
                            <h4 style="margin: 10px;">Sản phẩm trong giỏ hàng</h4>
                            <hr>
                            <div class="giohang-chung">

                            </div>
                            <div class="price-total">Tổng: <span>0</span><sup>đ</sup></div>

                            <a href="giohang.html"><button class="guidonhang">Gửi đơn hàng</button></a>
                        </div>
                    </span>

                </div>

                <div class="b1">
                    <span class="banner3span" style="padding-top: 9px;" onclick=HienThiDIV()><i class="fa-solid fa-magnifying-glass" style="color: brown;"></i></span>
                    <!-- <div class="inputContainer">
                        <input ng-model="inputData" ng-keypress="checkEnterKey($event)" id="Search" type="text" placeholder="Tìm kiếm">
                    </div> -->
                    <form action="{{route('user.search')}}" method="get">
                        <input class="input_Search" name="dataSearch" type="text" oninput="SearchProduct(event)">
                    </form>
                    <div id="KQ_Search">
                        <table style="cursor: pointer;">
                            <tbody id="content">
                                <!-- <tr>
                                        <td style="width:40px;padding:2px;"><img src="./anh/adm_SP2.jpg" alt="" style="width: 100%;"></td>
                                        <td style="padding: 5px;width: 205px;">Áo nam</td>
                                        <td style="padding: 5px;">200.000</td>
                                    </tr> -->
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>
        <!-- -----------content---------- -->
        @yield('main')

        <!-- -----------end-content---------- -->
        <!-- ----footer------------ -->
        <div class="footer">
            <div class="footer-one" style="margin-left: 40px;">
                <img type="image" src="https://4menshop.com/logo-footer.png?v=1">
                <ul class="footer-list" style="text-decoration: none;">
                    <li>
                        <a href="" title="gioi thieu">Giới thiệu</a>
                    </li>
                    <li><a href="" title="lien he">Liên hệ</a></li>
                    <li><a href="" title="tuyen dung">Tuyển dụng</a></li>
                    <li><a href="" title="tin tuc 4MEN">Tin tức</a></li>
                    <ul style="text-decoration: none; list-style: none;font-size: 14px;">
                        <li>
                            <i class="fa-regular fa-envelope"></i>
                            Email:
                            <a href="" rel="" title="4MEN EMAIL">info@4menshop.com</a>
                        </li>
                        <li>
                            <i class="fa fa-phone"></i>
                            Hotline:
                            <a href="tel:0868444644" title="4MEN HOTLINE">0868.444.644</a>
                        </li>
                        <div>
                            <form class="newsletter" action="" method="">
                                <label>
                                    Đăng ký nhận email khuyến mãi <br>
                                    <input type="text" placeholder="Email của bạn" name="email">
                                </label>

                                <button type="submit">
                                    Đăng ký
                                </button>
                            </form>
                        </div>
                    </ul>
                </ul>
            </div>


            <div class="footer-one">
                <h5 class="footer-h5" style="color: #eee;"><a href="">Hỗ trợ khách hàng</a></h5>
                <ul class="footer-list" style="text-decoration: none;">
                    <li>
                        <a href="" title="gioi thieu">Hướng dẫn đặt hàng</a>
                    </li>
                    <li><a href="" title="lien he">Hướng dẫn chọn size</a></li>
                    <li><a href="" title="tuyen dung">Câu hỏi thường gặp</a></li>
                    <li><a href="" title="tin tuc 4MEN">Chính sách khách VIP</a></li>
                    <li><a href="">Thanh toán - Giao hàng</a></li>
                    <li><a href="">Chính sách đổi hàng</a></li>
                    <li><a href="">Chính sách bảo mật</a></li>
                    <li><a href="">Chính sách cookie</a></li>
                </ul>
            </div>

            <div class="footer-one-ggmap">
                <h5 class="footer-h5" style="color: #eee;"><a href="">hệ thống cửa hàng</a></h5>
                <a href="/cua-hang.html" title="cua hang"><img type="image" src="https://4menshop.com/images/footer-map.jpg" alt="dang ky bo cong thuong" style="margin-bottom: 10px;" have-change="1"></a>
                <ul class="footer-list">
                    <li>
                        <a href="" title="gioi thieu" style="text-decoration: none; color: #666;font-size: 14px;">
                            Tìm địa chỉ gần CỬA HÀNG gần bạn</a>
                    </li>
                </ul>
            </div>

            <div class="footer-one-ggmap">
                <h5 class="footer-h5" style="color: #eee;"><a href="">Kết nối với 4MEN</a></h5>
                <a href="/cua-hang.html" title="cua hang"><img type="image" src="./anh/slideshow1.jpg" alt="dang ky bo cong thuong" style="margin-bottom: 10px;" have-change="1"></a>
                <ul class="footer-list">
                    <li>
                    <li>
                        <a href="https://www.facebook.com/4men.com.vn" class="facebook" title="facebook page" rel="noreferrer" target="_blank"></a>
                    </li>
                    <li style="float: left;font-size: 23px;
                            ;color: cornflowerblue;">
                        <i class="fa-brands fa-facebook"></i>
                    </li>
                    <li style="float: left;font-size: 23px;
                            ">
                        <img style="border-radius: 5px;width: 20px;height: 20px;" src="./anh/íntragram.jpg">
                    </li>
                    <lis style="float: left;margin-left:7px;font-size: 23px;
                            ;color: red; display: flex;">
                        <i class="fa-brands fa-youtube"></i>
                        </li>
                        </li>
                </ul>
            </div>
            <div class="footer-bottom">
                <div class="footer-bottom-content">
                    <p>Copyright 2023 · Thiết kế và phát triển bởi <a href="https://4menshop.com/" title="4MEN SHOP">4MEN SHOP</a> All rights reserved</p>

                    <p class="line-top">
                        Chủ quản: ông Nguyễn Ngọc Năm. <br>
                        MST cá nhân: 0312028096 <br>
                        Số ĐKKD: 41G8031109 do UBND Quận 7 - Tp.HCM cấp ngày 05/06/2017
                    </p>


                    <p class="line-top f-brand" style="color: #ff0000;">Nhãn hiệu "4MEN" đã được đăng kí độc quyền tại Cục sở hữu trí tuệ Việt Nam</p>

                </div>
                <div class="footer-bottom-img"><a href=""><img src="./anh/footer-bottom.png"></a></div>

            </div>
        </div>
        <!-- ----end-footer------------ -->
        <a href="#">
            <div class="back-top">
                <i class="fa-solid fa-chevron-up"></i>
            </div>
        </a>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <script src="./user_assets/js/trangchu.js"></script>
    <!-- <script src="./user_assets/js/message.js"></script> -->
    <script src="./angular/angular.min.js"></script>
    <script src="./angular/agl_trangchu.js"></script>

</body>

</html>