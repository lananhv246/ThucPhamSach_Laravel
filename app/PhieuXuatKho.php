<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Admin;
use App\User;
use App\PhieuXuatKhoChiTiet;
use App\TonKho;
use Illuminate\Notifications\Notifiable;

class PhieuXuatKho extends Model
{
    use Notifiable;
    protected $table = 'phieu_xuat_khos';
    protected $fillable = [
        'ten_phieuxuatkho', 'id_admin', 'id_khachhang','tongso_sanpham','tonggia',
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

    public function tonkho(){
        return $this->belongsToMany(TonKho::class,'phieu_xuat_kho_chi_tiets','id_phieuxuatkho','id_tonkho');
    }
}
