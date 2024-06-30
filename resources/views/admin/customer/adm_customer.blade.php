<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin_KH.css">
    <link rel="stylesheet" href="/anh/fontawesome-free-6.4.0-web/css/all.css">
    <title>4MenShop</title>
</head> 

<body >
    <div class="admin">
        

        

        @include('shared.adm_header');
        <div class="content">
            <div class="content-left">
                <!-- <div class="content-logo">
                    <a href="">
                        <img src="./anh/admin.png" alt="">
                    </a>
                    <p>Vũ Đình Vinh</p>
                </div> -->
                <div class="content-menu">

                    <ul class="menu-baiviet">
                        <li>
                            <i class="fa-solid fa-book"></i>
                            <a href="">Quản lý nhân sự</a></li>
                        <ul class="baiviet-list">
                            <li ><a href="./adm_NhanVien.html">Quản lý nhân viên</a></li>
                            
                        </ul>
                    </ul>


                    <ul class="menu-sanpham">
                        <li>
                            <i class="fa-solid fa-bars"></i>
                            <a href="">Quản lí sản phẩm</a>
                        </li>
                        <ul class="sanpham-list">
                            <li ><a href="./admin_chuyen_muc.html">Chủng loại-Ngành hàng</a></li>
                            <li ><a href="./admin_nha_phan_phoi.html">Nhà phân phối</a></li>
                            <li ><a href="{{route("sanpham.index")}}">Sản phẩm </a></li>
                        </ul>
                    </ul>

                    <ul class="menu-khachhang">
                        <li >
                            <i class="fa-solid fa-people-group"></i>
                            <a href="">Quản lí khách hàng</a></li>
                        <ul class="khachhang-list">
                         
                            <li style="background-color: brown;">
                                <a href="./adm_KhachHang.html">Khách hàng</a>
                            </li>
                        </ul>
                    </ul>

                    <ul class="menu-donhang">
                        <li>
                            <i class="fa-solid fa-clipboard-list"></i>
                            <a href="">Quản lí đơn hàng</a></li>
                        <ul class="donhang-list">
                            <li><a href="./adm_HDN.html">Đơn hàng nhập</a></li>
                            <li ><a href="./adm_HDB.html">Đơn hàng bán</a></li>
                            <li><a href="">Đang giao cho khách</a></li>
                            <li><a href="">Đã giao thành công</a></li>
                            <!-- <li><a href="">Đơn hàng bị hủy</a></li> -->
                        </ul>
                    </ul>

                    <ul class="menu-nhanvien">
                        <li>
                            <i class="fa-solid fa-clipboard-list"></i>
                            <a href="">Thống kê</a>
                        </li>
                        <ul class="donhang-list" >
                            <li><a href="./admin_ThongKe.html">Thống kê dữ liệu</a></li>
                        </ul>
                    </ul>
                </div>
            </div>

            <div class="content-right">
                <div class="bt-head">
                    <button id="nutThem" ng-click="Nut_Them()" type="button" >
                        <i class="fa-regular fa-plus"></i>
                        Thêm mới
                    </button>
                    <button type="button" class="bt-create" >
                        <i class="fa-solid fa-trash"></i>
                        Delete
                    </button>
                    <div id="div-search">
                        <input type="text" placeholder="Từ khóa tìm kiếm"  >
                        <button> <i class="fa-solid fa-magnifying-glass" style="color: gray;"></i></button>
                    </div>
                </div>
                <div class="danhmuc">
                    <h2>Quản lí khách hàng</h3><br>
                    
                    <table class="table-sp" border="1" style="border-collapse: collapse;">
                        <tr>
                            
                            <th style="width: 120px;">STT</th>
                            <th>Tên khách hàng</th>
                            <th>Địa chỉ</th>
                            <th style="width: 130px;">Số điện thoại</th>
                            <th colspan="2">Hành động</th>
                        </tr>
                        <tbody  id="contenlistnv">
                            <?php $stt=1 ?>
                            @foreach($info as $value)
                            <tr class="listnhanvien">
                                <td><?= $stt++?></td>
                                <td >{{$value -> TenKH}}</td>
                                <td >{{$value -> DiaChi}}</td>
                                <td >{{$value -> SDT}}</td>
                                <td class="sua" ><button >Sửa </button></td>
                                <td class="xoa"><button >Xóa</button></td>
                            </tr>
                            @endforeach
                        </tbody>
                     
                    </table>

                    <div class="xemthem">
                        <ul>
                            <li class="xemthem4"><a href=""><i class="fa-solid fa-chevron-left"></i></a></li>
                            <li class="xemthem1" ><a href="">1</a></li>
                            <li class="xemthem2"  ><a href="">2</a></li>
                            <li class="xemthem3" ><a href="">3</a></li>
                            <li class="xemthem4"><a href=""><i class="fa-solid fa-chevron-right"></i></a></li>
                            
                        </ul>
                    </div>
                </div>
                

            </div>
        </div>
        <div class="footer">
            <div class="footer-one" style="margin-left: 40px;">
                <img type="image" src="https://4menshop.com/logo-footer.png?v=1" >
                <ul class="footer-list" style="text-decoration: none;" >
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
                <ul class="footer-list" style="text-decoration: none;" >
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
                <a href="/cua-hang.html" title="cua hang"><img  type="image" src="https://4menshop.com/images/footer-map.jpg" alt="dang ky bo cong thuong" style="margin-bottom: 10px;" have-change="1"></a>
                <ul class="footer-list" >
                    <li>
                        <a href="" title="gioi thieu" style="text-decoration: none; color: #666;font-size: 14px;">
                            Tìm địa chỉ gần CỬA HÀNG gần bạn</a>
                    </li>
                </ul>
            </div>

            <div class="footer-one-ggmap">
                <h5 class="footer-h5" style="color: #eee;"><a href="">Kết nối với 4MEN</a></h5>
                <a href="/cua-hang.html" title="cua hang"><img  type="image" src="./anh/slideshow1.jpg" alt="dang ky bo cong thuong" style="margin-bottom: 10px;" have-change="1"></a>
                <ul class="footer-list" >
                    <li>
                        <li>
                             <a href="https://www.facebook.com/4men.com.vn" class="facebook" title="facebook page" rel="noreferrer" target="_blank"></a> 
                        </li>  
                        <li style="float: left;font-size: 23px;
                        ;color: cornflowerblue;" >
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
                        <!-- <li><div class="fb-like fb_iframe_widget" data-href="https://4menshop.com/" data-send="false" data-layout="button_count" data-width="100" data-show-faces="true" data-font="arial" data-share="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=&amp;container_width=0&amp;font=arial&amp;href=https%3A%2F%2F4menshop.com%2F&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;send=false&amp;share=true&amp;show_faces=true&amp;width=100"><span style="vertical-align: bottom; width: 100px; height: 28px;"><iframe name="f1b2a34e4d987dc" width="100px" height="1000px" data-testid="fb:like Facebook Social Plugin" title="fb:like Facebook Social Plugin" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" src="https://www.facebook.com/v2.4/plugins/like.php?app_id=&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df10f16ad1618a14%26domain%3D4menshop.com%26is_canvas%3Dfalse%26origin%3Dhttps%253A%252F%252F4menshop.com%252Ff3c70ad7c551ac%26relation%3Dparent.parent&amp;container_width=0&amp;font=arial&amp;href=https%3A%2F%2F4menshop.com%2F&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;send=false&amp;share=true&amp;show_faces=true&amp;width=100" style="border: none; visibility: visible; width: 150px; height: 28px" class=""></iframe></span></div> </li>  -->
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
    
    <!-- <script src="../angular/angular.min.js"></script>
    <script src="../angular/global.js"></script>
    <script src="../angular/admin_KH.js"></script> -->
    <script src="../js/adm_KhachHang.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script> 
       

    </script>
</body>
</html>