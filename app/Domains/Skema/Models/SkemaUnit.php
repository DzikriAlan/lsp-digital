<?php

namespace App\Domains\Skema\Models;

use Illuminate\Database\Eloquent\Model;
use App\Domains\Skema\Models\SkemaElemenUnit;

class SkemaUnit extends Model
{
    public $guard_name = 'api';

    protected $table = "mst_skema_sertifikasi_unit_kompetensi";
    protected $fillable = ['id_skema','kode_unit', 'unit_kompetensi'];
}