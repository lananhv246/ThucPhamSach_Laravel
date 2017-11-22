<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PhieuNhap;
use App\SanPham;
use Laravel\Scout\Searchable;

class PhieuNhapChiTiet extends Model
{
    use Searchable;

    protected $table = 'phieu_nhap_chi_tiets';
     protected $fillable = [
        'id_phieunhap','id_sanpham','soluong','dongia','donvitinh',
    ];
    public function phieunhap(){
        return $this->belongsTo(PhieuNhap::class,'id_phieunhap','id');
    }
    public function sanpham(){
        return $this->belongsTo(SanPham::class,'id_sanpham','id');
    }
    // public function searchableAs()
    // {
    //     return 'phieunhapchitiet';
    // }
}
