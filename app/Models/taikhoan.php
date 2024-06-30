<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class taikhoan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'taikhoan'; // Đặt tên bảng tại đây
    protected $primaryKey="MaTaiKhoan";
    protected $fillable = ['LoaiTaiKhoan','TenTaiKhoan','MatKhau','Email','MaKH'];
    public function getCusName(){
        return $this->hasOne(khachhang::class,'MaKH','MaKH');
    }
}
