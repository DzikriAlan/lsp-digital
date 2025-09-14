<?php

namespace App\Domains\SkemaKukElemen\Models\SkemaKukElemen;

use Illuminate\Database\Eloquent\Model;

class SkemaKukElemen extends Model
{
    public $guard_name = 'api';

    protected $table = "mst_skema_sertifikasi_kuk_elemen";
    protected $fillable = ['id_elemen','kuk', 'pertanyaan_kuk', 'jumlah_bukti', 'jenis_bukti_id', 'bukti'];
}