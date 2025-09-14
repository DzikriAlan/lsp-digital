<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class JadwalAsesmenResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'jadwal' => $this->nama_jadwal . ' / ' . $this->nama_asesor . ' / ' . $this->tanggal_mulai,
            'skema_sertifikasi' => $this->nama_skema,
            'tempat_uji_kompetensi' => $this->nama_tuk,
        ];
    }
}
