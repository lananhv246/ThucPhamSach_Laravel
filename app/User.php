<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\DiaChiKH;
use App\HoaDon;
use App\PhieuXuatKho;
use Laravel\Scout\Searchable;

class User extends Authenticatable
{
    // use Searchable;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function diachikh(){
        return $this->hasOne(DiaChiKH::class,'id_khachhang');
    }
    public function hoadon(){
        return $this->hasMany(HoaDon::class,'id_khachhang','id' );
    }

    public function phieuxuatkho(){
        return $this->hasMany(PhieuXuatKho::class,'id_khachhang','id' );
    }
    // public function searchableAs()
    // {
    //     return 'user';
    // }

}
