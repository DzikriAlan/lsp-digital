<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PendaftaranController;
use App\Http\Controllers\Api\SkemaController;

Route::prefix('v1')->group(function () {
    Route::get('jadwal-asesmen', [PendaftaranController::class, 'getJadwalAsesmen']);
    Route::get('nik', [PendaftaranController::class, 'findNik']);

    Route::get('unit-kompetensi', [SkemaController::class, 'index']);
});
