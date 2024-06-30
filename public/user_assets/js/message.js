function a(){
    // Lấy đối tượng thông báo thành công
var successMessage = document.getElementById('successMessage');
// Kiểm tra xem đối tượng tồn tại
if (successMessage) {
    // Ẩn thông báo sau 2 giây
    setTimeout(function() {
        successMessage.style.display = 'none';
    }, 2000); // 2000 milliseconds = 2 giây
}
}
a();