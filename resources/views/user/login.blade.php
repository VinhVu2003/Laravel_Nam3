<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./anh/fontawesome-free-6.4.0-web/css/all.css">
    <link rel="stylesheet" href="/user_assets/css/Login.css">
    <title>Document</title>
    <link rel="icon" href="https://4menshop.com/images/4men-192x192.png">

</head>

<body>

    <div class="dangnhap">
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

            <a href="./trangchu.html"><img class="logo" src="./anh/banner2.png" alt=""></a>



            <div class="banner2right">
                <div class="b1">
                    <span class="banner2span">

                        <a href="#"> <i class="fa-solid fa-cart-shopping" style="color: brown;" onclick="showgiohang()"></i></a>


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
            <div id="loginMessage"></div>
            
            @if (session('error'))
            <div class="alert alert-danger" style="width: 331px; height: 50px; background-color: red; color: white; padding: 15px; margin: auto; position: absolute; top: 65px; left: 455px; z-index: 3;">
                <p>{{ session('error') }}</p>
            </div>
            @endif

            @if (session('success'))
            <div class="alert alert-success" style="width: 331px; height: 50px; background-color: green; color: white; padding: 15px; margin: auto; position: absolute; top: 65px; left: 455px; z-index: 3;">
                <p>{{ session('success') }}</p>
            </div>
            @endif
            <form action="{{route('login.create')}}">
                <legend>Đăng nhập</legend>

                <div class="form-group">
                    <label for="">Tài khoản</label>
                    <div class="form-group-input">
                        <input name="TenTaiKhoan" id="taikhoan" type="text" class="content-left-input" placeholder="Tài khoản">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Mật khẩu</label>
                    <div class="form-group-input">
                        <input name="MatKhau" id="matkhau" type="password" class="content-left-input" placeholder="Mật khẩu">
                    </div>
                </div>


                <div class="nut">
                    <!-- onclick="checkLogin()" -->
                    <button href type="submit" id="DangNhap" style="color: white;">Đăng Nhập</button>
                    &nbsp;
                    <a href="{{route('registry.index')}}">Đăng kí</a>
                    &nbsp;
                    <a href="">Quên mật khẩu</a>
                </div>
            </form>
        </div>

        <div class="footer">
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
    <script>
        // Lấy đối tượng thông báo thành công
        var successMessage = document.getElementById('alert alert-success');
        // Kiểm tra xem đối tượng tồn tại
        if (successMessage) {
            // Ẩn thông báo sau 2 giây
            setTimeout(function() {
                successMessage.style.display = 'none';
            }, 2000); // 2000 milliseconds = 2 giây
        }
        var fail = document.getElementById('alert alert-danger');
        // Kiểm tra xem đối tượng tồn tại
        if (fail) {
            // Ẩn thông báo sau 2 giây
            setTimeout(function() {
                fail.style.display = 'none';
            }, 2000); // 2000 milliseconds = 2 giây
        }
    </script>
    <script>
        var listTaiKhoan = <?= $listTaiKhoan ?>;
    </script>
    <script src="/user_assets/js/Login.js"></script>
</body>

</html>