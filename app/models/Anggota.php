<?php
require_once __DIR__ . "/../config/database.php";

class Anggota
{

    public static function all()
    {
        $db = Database::connect();
        return $db->query("
            SELECT anggota.*, divisi.nama_divisi
            FROM anggota
            LEFT JOIN divisi ON anggota.divisi_id = divisi.id
        ");
    }

    public static function find($id)
    {
        $db = Database::connect();
        return $db->query("SELECT * FROM anggota WHERE id='$id'")->fetch_assoc();
    }

    public static function store($data)
    {
        $db = Database::connect();
        return $db->query("
            INSERT INTO anggota (nama, nim, jurusan, angkatan, divisi_id)
            VALUES (
                '$data[nama]',
                '$data[nim]',
                '$data[jurusan]',
                '$data[angkatan]',
                '$data[divisi_id]'
            )
        ");
    }

    public static function update($id, $data)
    {
        $db = Database::connect();
        return $db->query("
            UPDATE anggota SET
                nama='$data[nama]',
                nim='$data[nim]',
                jurusan='$data[jurusan]',
                angkatan='$data[angkatan]',
                divisi_id='$data[divisi_id]'
            WHERE id='$id'
        ");
    }

    public static function delete($id)
    {
        $db = Database::connect();
        return $db->query("DELETE FROM anggota WHERE id='$id'");
    }
}
