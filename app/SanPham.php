<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SanPhamChiTiet;
use App\HoaDonChiTiet;
use App\PhieuNhapChiTiet;
use App\LoaiSanPham;
use App\PhieuNhap;
use App\HoaDon;
use App\TonKho;
use Laravel\Scout\Searchable;

class SanPham extends Model
{
    use Searchable;

    protected $table = 'san_phams';
     protected $fillable = [
        'ten_sanpham','id_loai','dongia','donvitien','donvitinh','giamgia','giacu','image',
    ];
    public function sanphamchitiet(){
        return $this->hasOne(SanPhamChiTiet::class,'id_sanpham','id' );
    }
    public function tonkho(){
        return $this->hasOne(TonKho::class,'id_sanpham','id' );
    }
    public function hoadonchitiet(){
        return $this->hasMany(HoaDonChiTiet::class,'id_sanpham' );
    }
    public function phieunhapchitiet(){
        return $this->hasMany(PhieuNhapChiTiet::class,'id_sanpham' );
    }
    public function loaisanpham(){
        return $this->belongsTo(LoaiSanPham::class, 'id_loai','id');
    }
    public function phieunhap(){
        return $this->belongsToMany(PhieuNhap::class,'phieu_nhap_chi_tiets','id_sanpham','id_phieunhap');
    }
    public function hoadon(){
        return $this->belongsToMany(HoaDon::class,'hoa_don_chi_tiets','id_sanpham','id_hoadon');
    }
    public function searchableAs()
    {
        return 'sanpham';
    }
}
