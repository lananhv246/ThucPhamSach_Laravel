<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TonKho;
use App\PhieuXuatKho;

class PhieuXuatKhoChiTiet extends Model
{
    protected $table = 'phieu_xuat_kho_chi_tiets';
    protected $fillable =[
        'id_tonkho','id_phieuxuatkho','soluong','dongia','thue',
    ];
    public function tonkho(){
        return $this->belongsTo(TonKho::class,'id_tonkho','id');
    }
    public function phieuxuatkho(){
        return $this->belongsTo(PhieuXuatKho::class,'id_phieuxuatkho','id');
    }
}
