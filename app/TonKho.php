<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SanPham;
use App\PhieuXuatKhoChiTiet;

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
        return $this->hasMany(PhieuXuatKhoChiTiet::class,'id_tonkho');
    }
}
