<?php
require_once __DIR__ . "/../config/database.php";

class JadwalLatihan
{
    public static function all()
    {
        $db = Database::connect();
        return $db->query("
            SELECT j.*, k.nama_kegiatan
            FROM jadwal_latihan j
            LEFT JOIN kegiatan k ON j.kegiatan_id = k.id
            ORDER BY j.tanggal DESC, j.waktu DESC
        ");
    }

    public static function find($id)
    {
        $db = Database::connect();
        return $db->query(
            "SELECT * FROM jadwal_latihan WHERE id='$id'"
        )->fetch_assoc();
    }

    public static function store($data)
    {
        $db = Database::connect();
        return $db->query("
            INSERT INTO jadwal_latihan (tanggal, waktu, tempat, kegiatan_id)
            VALUES (
                '$data[tanggal]',
                '$data[waktu]',
                '$data[tempat]',
                '$data[kegiatan_id]'
            )
        ");
    }

    public static function update($id, $data)
    {
        $db = Database::connect();
        return $db->query("
            UPDATE jadwal_latihan SET
                tanggal = '$data[tanggal]',
                waktu = '$data[waktu]',
                tempat = '$data[tempat]',
                kegiatan_id = '$data[kegiatan_id]'
            WHERE id = '$id'
        ");
    }

    public static function delete($id)
    {
        $db = Database::connect();
        return $db->query(
            "DELETE FROM jadwal_latihan WHERE id='$id'"
        );
    }
}
