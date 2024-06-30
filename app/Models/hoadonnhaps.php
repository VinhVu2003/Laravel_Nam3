<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hoadonnhaps extends Model
{
    use HasFactory;
    protected $table = 'hoadonnhaps'; 
    protected $primaryKey="MaHoaDon";
    public $timestamps = false;
    protected $fillable = ['MaNhaPhanPhoi','NgayTao','KieuThanhToan','TongTien'];
    public function getNameProvider(){
        return $this->hasOne(nhaphanphois::class,'MaNhaPhanPhoi','MaNhaPhanPhoi');
    }
}
