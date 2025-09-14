<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domains\Skema\Models\SkemaUnit;
use App\Http\Resources\ResponseResource;
use Illuminate\Support\Arr;

class SkemaController extends Controller
{
    public function index(Request $request)
    {
        try {
            $searchParams = $request->all();
            $id_skema = Arr::get($searchParams, 'id_skema', '');


            $querySkemaUnit = SkemaUnit::query()
                ->join('mst_skema_sertifikasi_elemen_kompetensi as b', 'b.id_unit', '=', 'mst_skema_sertifikasi_unit_kompetensi.id')
                ->join('mst_skema_sertifikasi_kuk_elemen as c', 'c.id_elemen', '=', 'b.id')
                ->where('id_skema', $id_skema)
                ->select(
                    'mst_skema_sertifikasi_unit_kompetensi.*',
                    'b.nama_elemen',
                    'c.id as id_kuk',
                    'c.kuk',
                    'c.pertanyaan_kuk',
                );

            $data = [];

            $items = $querySkemaUnit->get();

            if($items->count() > 0) {
                foreach ($items as $item) {
                    $key = $item->id_skema . '_' . $item->kode_unit;

                    if (!isset($data[$key])) {
                        $data[$key] = [
                            'id_skema' => $item->id_skema,
                            'kode_unit' => $item->kode_unit,
                            'unit_kompetensi' => $item->unit_kompetensi,
                            'elemen' => [
                                'nama' => $item->nama_elemen,
                                'kuk' => []
                            ]
                        ];
                    }

                    $data[$key]['elemen']['kuk'][] = [
                        'id' => $item->id_kuk,
                        'pertanyaan' => $item->pertanyaan_kuk,
                        'is_kompeten' => 0
                    ];
                }

                $data = array_values($data);
                return ResponseResource::success($data, 'Data skema berhasil diambil');
            }

            // Jika tidak ada data ditemukan
            return ResponseResource::success([], 'Data skema kosong');
            
        } catch (\Exception $e) {
            return ResponseResource::error($e->getMessage(), 500);
        }
    }
}
