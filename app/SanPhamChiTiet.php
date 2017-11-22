<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SanPham;
use App\ImagesList;
use Laravel\Scout\Searchable;

class SanPhamChiTiet extends Model
{
    // use Searchable;

    protected $table = 'san_pham_chi_tiets';
     protected $fillable = [
        'id_sanpham','mieuta','danhgia','chebien','thanhphan',
    ];
    public function sanpham(){
        return $this->belongsTo(SanPham::class,'id_sanpham', 'id');
    }
    public function imagelist(){
        return $this->hasMany(ImagesList::class,'id_sanphamchitiet');
    }
    // public function searchableAs()
    // {
    //     return 'sanphamchitiet';
    // }
}
