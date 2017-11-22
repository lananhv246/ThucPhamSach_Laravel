<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\NhaCungCap;
use App\TramTrungChuyen;
use Laravel\Scout\Searchable;

class HangCungCap extends Model
{
    // use SearchAble;

    protected $table = 'hang_cung_caps';
    protected $fillable = [
        'id_ncc','id_tram','giatri',
    ];
    public function nhacungcap(){
        return $this->belongsTo(NhaCungCap::class,'id_ncc','id' );
    }
    public function tramtrungchuyen(){
        return $this->belongsTo(TramTrungChuyen::class, 'id_tram','id' );
    }
    // public function searchableAs()
    // {
    //     return 'hangcungcap';
    // }
}
