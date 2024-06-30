<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class giohang extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'giohang'; // Đặt tên bảng tại đây
    protected $primaryKey="MaGH";
    protected $fillable = ['MaTaiKhoan','MaSanPham','AnhDaiDien','TenSanPham','SoLuong','Gia','TongTien','Size'];
}
