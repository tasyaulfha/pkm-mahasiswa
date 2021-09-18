<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usulan extends Model
{

    use SoftDeletes;
    
    protected $fillable =[
        'name','nim_mhs','no_hp','nidn_dosen','judul_usulan','skema_usulan','abstrak',
        'url_usulan'
    ];

}
