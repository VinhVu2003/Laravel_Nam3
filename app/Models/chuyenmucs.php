<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chuyenmucs extends Model
{
    use HasFactory;
    protected $table = 'chuyenmucs';
    protected $primaryKey="MaChuyenMuc";
    protected $fillable = ['MaChuyenMuc','TenChuyenMuc', 'NoiDung'];
    // 1-n
    // public function sanpham()
    // {
    //     return $this->hasMany(Sanpham::class, 'id_loai', 'id')->orderBy('created_at','DESC');
    // }
    public $timestamps = false;
}
