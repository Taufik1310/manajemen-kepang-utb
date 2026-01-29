<?php
include "../layout/header.php";
require_once "../../config/database.php";

$db = Database::connect();
$anggota = $db->query("SELECT id, nama FROM anggota");
?>

<h3 class="text-2xl font-bold mb-4">Tambah Data Kegiatan</h3>

<form action="<?= BASE_URL ?>app/controllers/KegiatanController.php" method="POST"
    class="bg-white text-gray-500 w-full p-6 text-left text-sm rounded border border-gray-300/60">

    <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
        <div>
            <label class="font-medium" for="nama_kegiatan">Nama Kegiatan</label>
            <input name="nama_kegiatan" id="nama_kegiatan"
                class="w-full border mt-1.5 border-gray-500/30 outline-none rounded py-2.5 px-3"
                type="text" placeholder="Masukkan nama kegiatan" required>
        </div>

        <div>
            <label class="font-medium" for="tanggal">Tanggal</label>
            <input name="tanggal" id="tanggal"
                class="w-full border mt-1.5 border-gray-500/30 outline-none rounded py-2.5 px-3"
                type="date" required>
        </div>

        <div class="md:col-span-2">
            <label class="font-medium" for="anggota_id">Penanggung Jawab</label>
            <select name="anggota_id"
                class="w-full border mt-1.5 border-gray-500/30 outline-none rounded py-2.5 px-3 cursor-pointer"
                required>
                <option value="">-- Pilih Anggota --</option>
                <?php while ($a = $anggota->fetch_assoc()): ?>
                    <option value="<?= $a['id'] ?>">
                        <?= $a['nama'] ?>
                    </option>
                <?php endwhile ?>
            </select>
        </div>

        <div class="md:col-span-2">
            <label class="font-medium" for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" rows="4"
                class="w-full border mt-1.5 border-gray-500/30 outline-none rounded py-2.5 px-3"
                placeholder="Deskripsi kegiatan" required></textarea>
        </div>
    </div>

    <div class="flex items-center justify-start space-x-4">
        <button type="submit" name="simpan"
            class="my-3 bg-amber-900 py-2 px-5 rounded text-white font-medium">
            Simpan
        </button>
        <a href="<?= BASE_URL ?>app/views/kegiatan/index.php"
            class="flex items-center justify-center py-2 px-4 text-sm font-medium text-amber-900 bg-white rounded border border-amber-900 hover:bg-gray-100">
            Kembali
        </a>
    </div>
</form>

<?php include "../layout/footer.php"; ?>