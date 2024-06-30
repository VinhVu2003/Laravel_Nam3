<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nhaphanphois extends Model
{
    use HasFactory;
    protected $table = 'nhaphanphois'; // Đặt tên bảng tại đây
    protected $primaryKey="MaNhaPhanPhoi";
    protected $fillable = ['TenNhaPhanPhoi','DiaChi','SoDienThoai'];

}
