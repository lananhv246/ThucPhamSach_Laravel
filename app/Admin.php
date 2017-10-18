<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\ChucVu;
use App\HoaDon;
use App\PhieuNhap;
use Laravel\Scout\Searchable;

class Admin extends Authenticatable
{
    use Searchable;
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
    public function chucvu(){
        return $this->hasMany(ChucVu::class,'id_admin' );
    }
    public function phieunhap(){
        return $this->hasMany(PhieuNhap::class,'id_admin' );
    }
    public function hoadon(){
        return $this->hasMany(HoaDon::class,'id_admin' );
    }
    public function searchableAs()
    {
        return 'admin';
    }
}
