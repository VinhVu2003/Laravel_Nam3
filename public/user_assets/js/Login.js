function checkLogin() {
  // console.log("ok")
  // console.log(listTaiKhoan)
  var listtk = listTaiKhoan;
  var taikhoan = document.getElementById('taikhoan').value;
  var matkhau = document.getElementById('matkhau').value;
  // console.log(taikhoan)
  // Kiểm tra nếu tài khoản là số điện thoại và mật khẩu không trống
  // console.log(listTaiKhoan[0].LoaiTaiKhoan)
  var found = false;
  listtk.forEach(function(value, index){
      if(listtk[index].TenTaiKhoan === taikhoan && listtk[index].MatKhau === matkhau && listtk[index].LoaiTaiKhoan.toString() == '2') {
          // console.log("đúng");
          alert("Đăng nhập thành công!")
          localStorage.setItem('MaTaiKhoan', listtk[index].MaTaiKhoan);
          getUserHome();
          found = true; // Đánh dấu là tài khoản đã được tìm thấy
          return; // Dừng vòng lặp
      }
      else if(listtk[index].TenTaiKhoan === taikhoan && listtk[index].MatKhau === matkhau && listtk[index].LoaiTaiKhoan.toString() == '1') {
        // console.log("đúng");
        alert("Đăng nhập thành công!")
        getAdminHome();
        found = true; // Đánh dấu là tài khoản đã được tìm thấy
        return; // Dừng vòng lặp
      }
  });
  if (!found) { // Nếu tài khoản không được tìm thấy
      alert('Tài khoản, mật khẩu không chính xác');
      document.getElementById('taikhoan').value = '';
      document.getElementById('matkhau').value = '';
  }
}
function getUserHome(){
  // Tạo URL động sử dụng productId
  var url = '/user/home';
  window.location.href = url;
}
function getAdminHome(){
  // Tạo URL động sử dụng productId
  var url = '/admin';
  window.location.href = url;
}




  
