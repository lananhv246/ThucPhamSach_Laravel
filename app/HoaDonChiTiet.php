<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SanPham;
use App\HoaDon;
use Laravel\Scout\Searchable;

class HoaDonChiTiet extends Model
{
    // use Searchable;

    protected $table ='hoa_don_chi_tiets';
     protected $fillable = [
        'id_hoadon','id_sanpham','soluong','dongia','thue',
    ];
    public function sanpham(){
        return $this->belongsTo(SanPham::class,'id_sanpham','id' );
    }
    public function hoadon(){
        return $this->belongsTo(HoaDon::class,'id_hoadon','id' );
    }
    // public function searchableAs()
    // {
    //     return 'hoadonchitiet';
    // }
}
