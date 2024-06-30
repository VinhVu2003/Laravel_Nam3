<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chitiethoadonnhaps extends Model
{
    use HasFactory;
    protected $table = 'chitiethoadonnhaps'; 
    protected $primaryKey="Id";
    public $timestamps = false;
    protected $fillable = ['MaHoaDon','MaSanPham','SoLuong','DonViTinh','GiaNhap','TongTien'];
}
