<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SanPham;
use App\DanhMucLoai;
use Laravel\Scout\Searchable;

class LoaiSanPham extends Model
{
    // use Searchable;

    protected $table = 'loai_san_phams';
     protected $fillable = [
        'ten_loai','id_danhmuc',
    ];
    public function sanpham(){
        return $this->hasMany(SanPham::class,'id_loai','id' );
    }
    public function danhmucloai(){
        return $this->belongsTo(DanhMucLoai::class, 'id_danhmuc', 'id');
    }
    // public function searchableAs()
    // {
    //     return 'loaisanpham';
    // }
}
