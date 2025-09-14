<?php

namespace App\Laravue\Models;

use Illuminate\Database\Eloquent\Model;
use App\Domains\Skema\Models\SkemaKukElemen;

class SkemaElemenUnit extends Model
{
    public $guard_name = 'api';

    protected $table = "mst_skema_sertifikasi_elemen_kompetensi";
    protected $fillable = ['id_unit','nama_elemen'];
}