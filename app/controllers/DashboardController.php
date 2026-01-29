<?php
require_once __DIR__ . '/../models/Dashboard.php';

class DashboardController
{
    public static function index()
    {
        return [
            'anggota'   => Dashboard::count('anggota'),
            'divisi'    => Dashboard::count('divisi'),
            'kegiatan'  => Dashboard::count('kegiatan'),
            'inventaris' => Dashboard::count('inventaris'),
            'kegiatanTerbaru' => Dashboard::kegiatanTerbaru(),
            'jadwalTerdekat'  => Dashboard::jadwalTerdekat()
        ];
    }
}
