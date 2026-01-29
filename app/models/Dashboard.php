<?php
require_once __DIR__ . '/../config/database.php';

class Dashboard
{

    public static function count($table)
    {
        $db = Database::connect();
        $result = $db->query("SELECT COUNT(*) AS total FROM $table");
        return $result->fetch_assoc()['total'];
    }

    public static function kegiatanTerbaru()
    {
        $db = Database::connect();
        return $db->query("
            SELECT k.nama_kegiatan, k.tanggal, a.nama AS penanggung_jawab
            FROM kegiatan k
            JOIN anggota a ON k.anggota_id = a.id
            ORDER BY k.tanggal DESC
            LIMIT 5
        ");
    }

    public static function jadwalTerdekat()
    {
        $db = Database::connect();
        return $db->query("
            SELECT k.nama_kegiatan AS nama_kegiatan, j.tanggal, j.waktu, j.tempat
            FROM jadwal_latihan j
            JOIN kegiatan k ON j.kegiatan_id = k.id
            WHERE j.tanggal >= CURDATE()
            ORDER BY j.tanggal ASC
            LIMIT 5
        ");
    }
}
