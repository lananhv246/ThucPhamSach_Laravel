<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PhieuXuatKhoChiTiet;

class DonHangNo extends Model
{
    protected $table = 'don_hang_nos';
    protected $fillable =[
        'ten_donhangno','id_phieu_xuat_kho_chi_tiet','soluong_no'
    ];

    public function phieuxuatkhochitiet(){
        return $this->belongsTo(PhieuXuatKhoChiTiet::class,'id_phieu_xuat_kho_chi_tiet','id');
    }
}
