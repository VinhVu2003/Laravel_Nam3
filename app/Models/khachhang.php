<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class khachhang extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'khachhang'; // Đặt tên bảng tại đây
    protected $primaryKey="MaKH";
    protected $fillable = ['TenKH','DiaChi','SDT'];
}
