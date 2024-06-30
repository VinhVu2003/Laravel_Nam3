<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hoadons extends Model
{
    use HasFactory;
    protected $table = 'hoadons'; 
    protected $primaryKey="MaHoaDon";
    public $timestamps = false;
    protected $fillable = ['TrangThai','NgayTao','TongGia','DiaChiGiaoHang','MaKH'];
    public function chitiethoadon() {
        return $this->hasMany(chitiethoadons::class, 'MaHoaDon', 'MaHoaDon');
    }
    public function getNameCus(){
        return $this->hasOne(khachhang::class,'MaKH','MaKH');
    }
    
}
