<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/user_assets/css/registry.css">
    <link rel="stylesheet" href="./anh/fontawesome-free-6.4.0-web/css/all.css">
    <title>Document</title>
    <link rel="icon" href="https://4menshop.com/images/4men-192x192.png">

</head>

<body>
    <div class="registry">
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
                    <li><a href="Login.html"><i class="fa-solid fa-user"></i></a></li>
                </ul>
            </div>
        </div>

        <div class="header2">

            <a href=""><img class="logo" src="./anh/banner2.png" alt=""></a>




            <div class="banner2right">
                <div class="b1">
                    <span class="banner2span">

                        <a href="#"> <i class="fa-solid fa-cart-shopping" style="color: brown;" onclick="showgiohang()"></i></a>
                    </span>

                </div>
                <div class="b1">
                    <span class="banner2span"><i class="fa-solid fa-magnifying-glass" style="color: brown;"></i></span>

                    <!-- <span class="banner2span"><a href="Login.html"><i class="fa-solid fa-user" style="color: brown;"></i></a></span> -->

                </div>

            </div>

        </div>

        <div class="botom-head">
            <ul>
                <li><a href="">4MEN &nbsp; / &nbsp;</a></li>
                <li><a href="">Đăng kí</a></li>
            </ul>
        </div>
        <div class="content">
            @if ($errors->any())
            <div id="alert alert-danger" style=" width: 38%;
                height: 50px;
                background-color: red;
                color: white;
                padding: 15px;
                margin: auto;
                position: absolute;
                top: 65px;
                left: 400px;
                z-index: 3;">
                <ul>
                    @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{route('registry.create')}}">
                <legend>Thông tin đăng kí</legend>

                <div class="form-group">
                    <label for="">Tài khoản</label>
                    <div class="form-group-input">
                        <input name="TenTaiKhoan" type="text" class="content-left-input" oninput="checktk(this)">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Mật khẩu</label>
                    <div class="form-group-input">
                        <input name="MatKhau" type="" placeholder="" class="content-left-input" oninput="checkmk(this)">
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <div class="form-group-input">
                        <input name="Email" type="text" placeholder="" class="content-left-input" oninput="checkmknhaplai(this)">
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Họ và tên</label>
                    <div class="form-group-input">
                        <input name="TenKH" type="text" class="content-left-input" oninput="checkname(this)">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Địa chỉ</label>
                    <div class="form-group-input">
                        <input name="DiaChi" type="text" class="content-left-input" oninput="checkname(this)">
                    </div>
                </div>
                <div class="form-group">
                    <label>Số điện thoại</label>
                    <div class="form-group-input">
                        <input name="SDT" type="text" class="content-left-input" oninput="checksdt(this)">
                    </div>
                </div>
                <div class="nut">
                    <button type="submit" id="button" style="color: white;">Đăng kí</button>
                    &nbsp;
                    <a href="/">Đăng nhập</a>
                </div>
            </form>
        </div>

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
                            <a href="mailto:info@4menshop.com" rel="nofollow" title="4MEN EMAIL">info@4menshop.com</a>
                        </li>
                        <li>
                            <i class="fa fa-phone"></i>
                            Hotline:
                            <a href="tel:0868444644" rel="nofollow" title="4MEN HOTLINE" track="Phone-Footer-0868.444.644">0868.444.644</a>
                        </li>
                        <div>
                            <form class="newsletter" action="https://4menshop.com/dang-ky-nhan-mail-khuyen-mai.html" method="post">
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
                        <li>
                            <div class="fb-like fb_iframe_widget" data-href="https://4menshop.com/" data-send="false" data-layout="button_count" data-width="100" data-show-faces="true" data-font="arial" data-share="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=&amp;container_width=0&amp;font=arial&amp;href=https%3A%2F%2F4menshop.com%2F&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;send=false&amp;share=true&amp;show_faces=true&amp;width=100"><span style="vertical-align: bottom; width: 100px; height: 28px;"><iframe name="f1b2a34e4d987dc" width="100px" height="1000px" data-testid="fb:like Facebook Social Plugin" title="fb:like Facebook Social Plugin" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" src="https://www.facebook.com/v2.4/plugins/like.php?app_id=&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df10f16ad1618a14%26domain%3D4menshop.com%26is_canvas%3Dfalse%26origin%3Dhttps%253A%252F%252F4menshop.com%252Ff3c70ad7c551ac%26relation%3Dparent.parent&amp;container_width=0&amp;font=arial&amp;href=https%3A%2F%2F4menshop.com%2F&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;send=false&amp;share=true&amp;show_faces=true&amp;width=100" style="border: none; visibility: visible; width: 150px; height: 28px" class=""></iframe></span></div>
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

    </div>
    </div>


    </div>
    <script src="../js/dangki.js"></script>
    <script>
        // Lấy đối tượng thông báo thành công
        var successMessage = document.getElementById('alert alert-danger');
        // Kiểm tra xem đối tượng tồn tại
        if (successMessage) {
            // Ẩn thông báo sau 2 giây
            setTimeout(function() {
                successMessage.style.display = 'none';
            }, 2000); // 2000 milliseconds = 2 giây
        }
    </script>
</body>

</html>