<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DiaChiKH;
use App\NhaCungCap;
use App\TramTrungChuyen;
use Laravel\Scout\Searchable;

class Map extends Model
{
    // use Searchable;

    protected $table = 'maps';
    protected $fillable = [
        'name','lat','lng',
    ];
    public function user(){
        return $this->hasMany(User::class,'id_loai' );
    }
    // public function searchableAs()
    // {
    //     return 'map';
    // }
}
