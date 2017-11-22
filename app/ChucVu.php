<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Admin;
use Laravel\Scout\Searchable;

class ChucVu extends Model
{
    // use Searchable;

    protected $table = 'chuc_vus';
    protected $fillable = [
        'id_admin',	'ten_chucvu','quyen','lever',
    ];
    public function admin(){
        return $this->belongsTo(Admin::class, 'id_admin', 'id');
    }
    // public function searchableAs()
    // {
    //     return 'chucvu';
    // }
}
