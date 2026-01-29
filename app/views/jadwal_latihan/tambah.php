<?php
include "../layout/header.php";
require_once "../../config/database.php";

$db = Database::connect();
$kegiatan = $db->query("SELECT id, nama_kegiatan FROM kegiatan");
?>

<h3 class="text-2xl font-bold mb-4">Tambah Jadwal Latihan</h3>

<form action="<?= BASE_URL ?>app/controllers/JadwalLatihanController.php" method="POST"
    class="bg-white text-gray-500 w-full p-6 text-left text-sm rounded border border-gray-300/60">

    <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">

        <div>
            <label class="font-medium" for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal"
                class="w-full border mt-1.5 border-gray-500/30 outline-none rounded py-2.5 px-3"
                required>
        </div>

        <div>
            <label class="font-medium" for="waktu">Waktu</label>
            <input type="time" name="waktu" id="waktu"
                class="w-full border mt-1.5 border-gray-500/30 outline-none rounded py-2.5 px-3"
                required>
        </div>

        <div>
            <label class="font-medium" for="tempat">Tempat</label>
            <input type="text" name="tempat" id="tempat"
                class="w-full border mt-1.5 border-gray-500/30 outline-none rounded py-2.5 px-3"
                placeholder="Masukkan tempat latihan"
                required>
        </div>

        <div>
            <label class="font-medium" for="kegiatan_id">Kegiatan</label>
            <select name="kegiatan_id" id="kegiatan_id"
                class="w-full border mt-1.5 border-gray-500/30 outline-none rounded py-2.5 px-3 cursor-pointer"
                required>
                <option value="">-- Pilih Kegiatan --</option>
                <?php while ($k = $kegiatan->fetch_assoc()): ?>
                    <option value="<?= $k['id'] ?>">
                        <?= $k['nama_kegiatan'] ?>
                    </option>
                <?php endwhile ?>
            </select>
        </div>

    </div>

    <div class="flex items-center justify-start space-x-4">
        <button type="submit" name="simpan"
            class="my-3 bg-amber-900 py-2 px-5 rounded text-white font-medium">
            Simpan
        </button>

        <a href="<?= BASE_URL ?>app/views/jadwal_latihan/index.php"
            class="flex items-center justify-center py-2 px-4 text-sm font-medium text-amber-900 bg-white rounded border border-amber-900 hover:bg-gray-100">
            Kembali
        </a>
    </div>
</form>

<?php include "../layout/footer.php"; ?>