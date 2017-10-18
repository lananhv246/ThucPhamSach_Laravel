<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SanPhamChiTiet;
use Laravel\Scout\Searchable;

class ImagesList extends Model
{
    use Searchable;

    protected $table = 'images_lists';
     protected $fillable = [
        'id_sanphamchitiet','ten_image','duongdan',
    ];
    public function sanphamchitiet(){
        return $this->belongsTo(SanPhamChiTiet::class,'id_sanphamchitiet','id' );
    }
    public function searchableAs()
    {
        return 'imagelist';
    }
}
