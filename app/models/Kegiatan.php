<?php
require_once __DIR__ . "/../config/database.php";

class Kegiatan
{
    public static function all()
    {
        $db = Database::connect();
        return $db->query("
            SELECT kegiatan.*, anggota.nama AS nama_anggota
            FROM kegiatan
            LEFT JOIN anggota ON kegiatan.anggota_id = anggota.id
            ORDER BY tanggal DESC
        ");
    }

    public static function find($id)
    {
        $db = Database::connect();
        return $db->query("SELECT * FROM kegiatan WHERE id='$id'")->fetch_assoc();
    }

    public static function store($data)
    {
        $db = Database::connect();
        return $db->query("
            INSERT INTO kegiatan (nama_kegiatan, tanggal, deskripsi, anggota_id)
            VALUES (
                '$data[nama_kegiatan]',
                '$data[tanggal]',
                '$data[deskripsi]',
                '$data[anggota_id]'
            )
        ");
    }

    public static function update($id, $data)
    {
        $db = Database::connect();
        return $db->query("
            UPDATE kegiatan SET
                nama_kegiatan='$data[nama_kegiatan]',
                tanggal='$data[tanggal]',
                deskripsi='$data[deskripsi]',
                anggota_id='$data[anggota_id]'
            WHERE id='$id'
        ");
    }

    public static function delete($id)
    {
        $db = Database::connect();
        return $db->query("DELETE FROM kegiatan WHERE id='$id'");
    }
}
