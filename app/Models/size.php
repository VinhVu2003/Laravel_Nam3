<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class size extends Model
{
    use HasFactory;
    protected $table = 'size'; // Đặt tên bảng tại đây
    protected $primaryKey="MaSize";
    protected $fillable = ['TenSize','Ghichu'];
}
