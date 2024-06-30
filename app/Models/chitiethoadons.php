<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chitiethoadons extends Model
{
    use HasFactory;
    protected $table = 'chitiethoadons'; 
    protected $primaryKey="MaChiTietHoaDon";
    public $timestamps = false;
    protected $fillable = ['MaHoaDon','MaSanPham','SoLuong','TongGia'];
    public function hoadon() {
        return $this->belongsTo(hoadons::class, 'MaHoaDon', 'MaHoaDon');
    }

    public function sanpham() {
        return $this->belongsTo(sanphams::class, 'MaSanPham', 'MaSanPham');
    }
}
