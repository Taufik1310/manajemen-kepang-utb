<?php
include "../layout/header.php";
require_once "../../models/JadwalLatihan.php";
require_once "../../config/database.php";

$data = JadwalLatihan::find($_GET['id']);

$db = Database::connect();
$kegiatan = $db->query("SELECT id, nama_kegiatan FROM kegiatan");
?>

<h3 class="text-2xl font-bold mb-4">Ubah Jadwal Latihan</h3>

<form action="<?= BASE_URL ?>app/controllers/JadwalLatihanController.php"
    method="POST"
    class="bg-white text-gray-500 w-full p-6 text-sm rounded border border-gray-300/60">

    <input type="hidden" name="id" value="<?= $data['id'] ?>">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">

        <div>
            <label class="font-medium">Tanggal</label>
            <input type="date" name="tanggal"
                value="<?= $data['tanggal'] ?>"
                class="w-full border mt-1.5 rounded py-2.5 px-3"
                required>
        </div>

        <div>
            <label class="font-medium">Waktu</label>
            <input type="time" name="waktu"
                value="<?= $data['waktu'] ?>"
                class="w-full border mt-1.5 rounded py-2.5 px-3"
                required>
        </div>

        <div class="md:col-span-2">
            <label class="font-medium">Tempat</label>
            <input type="text" name="tempat"
                value="<?= $data['tempat'] ?>"
                class="w-full border mt-1.5 rounded py-2.5 px-3"
                required>
        </div>

        <div class="md:col-span-2">
            <label class="font-medium">Kegiatan</label>
            <select name="kegiatan_id"
                class="w-full border mt-1.5 rounded py-2.5 px-3"
                required>
                <?php while ($k = $kegiatan->fetch_assoc()): ?>
                    <option value="<?= $k['id'] ?>"
                        <?= $data['kegiatan_id'] == $k['id'] ? 'selected' : '' ?>>
                        <?= $k['nama_kegiatan'] ?>
                    </option>
                <?php endwhile ?>
            </select>
        </div>

    </div>

    <div class="flex space-x-4">
        <button type="submit" name="update"
            class="bg-amber-900 text-white px-5 py-2 rounded">
            Simpan
        </button>

        <a href="<?= BASE_URL ?>app/views/jadwal_latihan/index.php"
            class="px-4 py-2 border border-amber-900 text-amber-900 rounded">
            Kembali
        </a>
    </div>
</form>

<?php include "../layout/footer.php"; ?>