<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class JadwalAsesmenResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id_skema' => $this->id_skema,
            'id_tuk' => $this->id_tuk,
            'id_asesor' => $this->id_asesor,
            'jadwal' => $this->nama_jadwal . ' / ' . $this->nama_asesor . ' / ' . $this->tanggal_mulai,
            'skema_sertifikasi' => $this->nama_skema,
            'tempat_uji_kompetensi' => $this->nama_tuk,
        ];
    }
}
