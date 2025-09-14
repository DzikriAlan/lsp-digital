<?php

namespace App\Domains\Apl02\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apl02 extends Model
{
    use HasFactory;

    protected $table = 'trx_uji_komp_apl_02';

    protected $fillable = [
        'status',
        'ttd_asesor',
        'updated_by',
    ];

    protected $casts = [
        'status' => 'integer',
        'ttd_asesor' => 'string',
        'updated_by' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
