<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\LoaiSanPham;
use Laravel\Scout\Searchable;

class DanhMucLoai extends Model
{
    // use Searchable;

    protected $table = 'danh_muc_loais';
    protected $fillable = [
        'ten_danhmuc',
    ];
    public function loaisanpham(){
        return $this->hasMany(LoaiSanPham::class,'id_danhmuc' );
    }
    // public function searchableAs()
    // {
    //     return 'danhmucloai';
    // }
}
