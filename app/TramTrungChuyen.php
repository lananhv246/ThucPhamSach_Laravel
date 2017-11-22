<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\HangCungCap;
use App\PhieuNhap;
use Laravel\Scout\Searchable;

class TramTrungChuyen extends Model
{
    // use Searchable;

    protected $table = 'tram_trung_chuyens';
     protected $fillable = [
        'ten_tram','diachi','dienthoai','email','lat','lng'
    ];
    public function hangcungcap(){
        return $this->hasMany(HangCungCap::class,'id_tram');
    }
    public function phieunhap(){
        return $this->hasMany(PhieuNhap::class,'id_tram' );
    }
    // public function searchableAs()
    // {
    //     return 'tramtrungchuyen';
    // }
}
