<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Admin;
use App\User;
use App\KhoHang;
use App\HoaDonChiTiet;
use App\TrangThaiDonHang;
use App\SanPham;
use Laravel\Scout\Searchable;

class HoaDon extends Model
{
    use Searchable;

    protected $table = 'hoa_dons';
     protected $fillable = [
        'ten_hoadon','id_khachhang','tonggia','tongsoluong','donvitien',
    ];
    public function admin(){
        return $this->belongsTo(Admin::class,'id_admin','id' );
    }
    public function user(){
        return $this->belongsTo(User::class,'id_khachhang','id' );
    }
    public function khohang(){
        return $this->belongsTo(KhoHang::class,'id_kho','id' );
    }
    public function hoadonchitiet(){
        return $this->hasMany(HoaDonChiTiet::class,'id_hoadon' );
    }
    public function trangthaidonhang(){
        return $this->belongsTo(TrangThaiDonHang::class,'id_trangthai','id' );
    }
    public function sanpham(){
        return $this->belongsToMany(SanPham::class ,'hoa_don_chi_tiets','id_hoadon','id_sanpham');
    }
    public function searchableAs()
    {
        return 'hoadon';
    }

}
