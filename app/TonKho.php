<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SanPham;
use App\PhieuXuatKhoChiTiet;
use App\PhieuXuatKho;
class TonKho extends Model
{
    protected $table = 'tonkhos';
    protected $fillable = [
        'id_sanpham','soluong'
    ];
    public function sanpham(){
        return $this->belongsTo(SanPham::class,'id_sanpham','id');
    }
    public function phieuxuatkhochitiet(){
        return $this->hasMany(PhieuXuatKhoChiTiet::class,'id_tonkho','id');
    }

    public function phieuxuatkho(){
        return $this->belongsToMany(PhieuXuatKho::class,'phieu_xuat_kho_chi_tiets','id_tonkho','id_phieuxuatkho');
    }
}
