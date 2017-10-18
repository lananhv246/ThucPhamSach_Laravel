<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\HangCungCap;
use Laravel\Scout\Searchable;

class NhaCungCap extends Model
{
    use Searchable;

    protected $table = 'nha_cung_caps';
    protected $fillable = 
    [
        'ten_ncc','email','diachi','dienthoai','lat','lng','maso_thue','ghichu',
    ];

    public function hangcungcap(){
        return $this->hasMany(HangCungCap::class,'id_ncc' );
    }
    public function searchableAs()
    {
        return 'nhacungcap';
    }
}
