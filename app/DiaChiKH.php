<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Laravel\Scout\Searchable;

class DiaChiKH extends Model
{
    // use Searchable;

    protected $table = 'diachi_khachhang';
    protected $fillable = [
        'id_khachhang','diachi','dienthoai','lat','lng',
    ];
    public function user(){
        return $this->belongsTo(User::class, 'id_khachhang', 'id' );
    }
    // public function searchableAs()
    // {
    //     return 'diachikhachhang';
    // }
}
