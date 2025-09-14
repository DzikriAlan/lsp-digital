<?php

namespace App\Domains\JadwalAsesmen\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalAsesmen extends Model
{
    public $guard_name = 'api';

    protected $table = "trx_jadwal_asesmen";
    protected $fillable = ['id_skema','persyaratan', 'visibility', 'password_asesi', 'id_tuk', 'id_asesor', 'jadwal', 'start_date', 'end_date'];
}
