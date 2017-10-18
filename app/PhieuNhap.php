<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PhieuNhapChiTiet;
use App\Admin;
use App\KhoHang;
use App\TramTrungChuyen;
use App\SanPham;
use Laravel\Scout\Searchable;

class PhieuNhap extends Model
{
    use Searchable;

    protected $table = 'phieu_nhaps';
     protected $fillable = [
        'id_tram','id_admin','ten_phieunhap',
    ];
    public function phieunhapchitiet(){
        return $this->hasMany(PhieuNhapChiTiet::class ,'id_phieunhap');
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin','id');
    }
    public function khohang(){
        return $this->belongsTo(KhoHang::class, 'id_kho','id');
    }
    public function tramtrungchuyen(){
        return $this->belongsTo(TramTrungChuyen::class,'id_tram','id');
    }
    public function sanpham(){
        return $this->belongsToMany(SanPham::class,'phieu_nhap_chi_tiets','id_phieunhap','id_sanpham' );
    }
    public function searchableAs()
    {
        return 'phieunhap';
    }

}
