<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Admin;
use App\User;
use App\PhieuXuatKhoChiTiet;

class PhieuXuatKho extends Model
{
    protected $table = 'phieu_xuat_khos';
    protected $fillable = [
        'ten_phieuxuatkho', 'id_admin', 'id_khachhang','tongsoluong','tonggia','donvitien',
    ];
    public function admin(){
        return $this->belongsTo(Admin::class,'id_admin','id');
    }
    public function khachhang(){
        return $this->belongsTo(User::class,'id_khachhang','id');
    }
    public function phieuxuatkhochitiet(){
        return $this->hasMany(PhieuXuatKhoChiTiet::class,'id_phieuxuatkho');
    }
}
