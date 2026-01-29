<?php
require_once __DIR__ . "/../config/database.php";

class Divisi
{
    public static function all()
    {
        $db = Database::connect();
        return $db->query("SELECT * FROM divisi ORDER BY id ASC");
    }

    public static function find($id)
    {
        $db = Database::connect();
        return $db->query("SELECT * FROM divisi WHERE id='$id'")->fetch_assoc();
    }

    public static function store($data)
    {
        $db = Database::connect();
        return $db->query("
            INSERT INTO divisi (nama_divisi)
            VALUES ('$data[nama_divisi]')
        ");
    }

    public static function update($id, $data)
    {
        $db = Database::connect();
        return $db->query("
            UPDATE divisi SET
                nama_divisi='$data[nama_divisi]'
            WHERE id='$id'
        ");
    }

    public static function delete($id)
    {
        $db = Database::connect();
        return $db->query("DELETE FROM divisi WHERE id='$id'");
    }
}
