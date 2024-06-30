<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sanphams extends Model
{
    use HasFactory;
    // public $timestamps=false;
    protected $table = 'sanphams'; 
    protected $primaryKey="MaSanPham";
    public $timestamps = false;
    protected $fillable = ['MaChuyenMuc','TenSanPham','AnhDaiDien','Gia','SoLuong','MaSize','MaNhaPhanPhoi'];
    public function category() {
        return $this->hasOne(chuyenmucs::class,'MaChuyenMuc','MaChuyenMuc');
    }
    public function size(){
        return $this->hasOne(size::class,'MaSize','MaSize');
    }
    public function provider(){
        return $this->hasOne(nhaphanphois::class,'MaNhaPhanPhoi','MaNhaPhanPhoi');
    }
    public function chitiethoadon() {
        return $this->hasMany(chitiethoadons::class, 'MaSanPham', 'MaSanPham');
    }
}
