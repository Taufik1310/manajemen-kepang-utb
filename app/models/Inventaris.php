<?php
require_once __DIR__ . "/../config/database.php";

class Inventaris
{
    public static function all()
    {
        $db = Database::connect();
        return $db->query("SELECT * FROM inventaris ORDER BY id ASC");
    }

    public static function find($id)
    {
        $db = Database::connect();
        return $db->query("SELECT * FROM inventaris WHERE id='$id'")->fetch_assoc();
    }

    public static function store($data)
    {
        $db = Database::connect();
        return $db->query("
            INSERT INTO inventaris (nama_alat, jumlah, kondisi)
            VALUES (
                '$data[nama_alat]',
                '$data[jumlah]',
                '$data[kondisi]'
            )
        ");
    }

    public static function update($id, $data)
    {
        $db = Database::connect();
        return $db->query("
            UPDATE inventaris SET
                nama_alat='$data[nama_alat]',
                jumlah='$data[jumlah]',
                kondisi='$data[kondisi]'
            WHERE id='$id'
        ");
    }

    public static function delete($id)
    {
        $db = Database::connect();
        return $db->query("DELETE FROM inventaris WHERE id='$id'");
    }
}
