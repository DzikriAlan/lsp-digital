<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Arr;
use App\Domains\User\Models\User;
use App\Domains\JadwalAsesmen\Models\JadwalAsesmen;
use App\Domains\Skema\Models\SkemaUnit;
use App\Http\Controllers\Api\SkemaController;
use App\Http\Resources\JadwalAsesmenResource;
use App\Http\Resources\ResponseResource;

class PendaftaranController extends Controller
{
    public function getJadwalAsesmen(Request $request)
    {
        try {
            $queryJadwal = JadwalAsesmen::query();
            $queryJadwal->join('mst_skema_sertifikasi as b', 'b.id', '=', 'trx_jadwal_asesmen.id_skema')
                ->join('mst_tuk as c', 'c.id', '=', 'trx_jadwal_asesmen.id_tuk')
                ->join('mst_asesor as e', 'e.id', '=', 'trx_jadwal_asesmen.id_asesor')
                ->select(
                    'trx_jadwal_asesmen.id',
                    'trx_jadwal_asesmen.jadwal as nama_jadwal',
                    'trx_jadwal_asesmen.start_date as tanggal_mulai',
                    'b.id as id_skema',
                    'b.skema_sertifikasi as nama_skema',
                    'c.id as id_tuk',
                    'c.nama as nama_tuk',
                    'e.id as id_asesor',
                    'e.nama as nama_asesor'
                );

            $jadwal = JadwalAsesmenResource::collection($queryJadwal->get());
            
            return new ResponseResource($jadwal, 'Data jadwal berhasil diambil');
        } catch (\Exception $e) {
            return ResponseResource::error('Terjadi kesalahan: ' . $e->getMessage(), 500);
        }
    }

    public function findNik(Request $request)
    {
        try {
            $nik = $request->input('nik');
            $user = User::where('nik', $nik)->first();

            if (!$user) {
                // ✅ sekarang ini pasti JSON
                return ResponseResource::invalid('NIK tidak ditemukan');
            }

            return ResponseResource::success($user, 'NIK ditemukan');

        } catch (\Exception $e) {
            return ResponseResource::error('Terjadi kesalahan: ' . $e->getMessage(), 500);
        }
    }

}
