<?php
include "../layout/header.php";
require_once "../../models/Kegiatan.php";
require_once "../../config/database.php";

$data = Kegiatan::find($_GET['id']);
$db = Database::connect();
$anggota = $db->query("SELECT id, nama FROM anggota");
?>

<h3 class="text-2xl font-bold mb-4">Ubah Data Kegiatan</h3>

<form action="<?= BASE_URL ?>app/controllers/KegiatanController.php" method="POST"
    class="bg-white text-gray-500 w-full p-6 text-left text-sm rounded border border-gray-300/60">

    <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
        <div class="hidden">
            <label class="font-medium">ID</label>
            <input name="id" value="<?= $data['id'] ?>"
                class="w-full border mt-1.5 border-gray-500/30 outline-none rounded py-2.5 px-3"
                type="text" required>
        </div>

        <div>
            <label class="font-medium">Nama Kegiatan</label>
            <input name="nama_kegiatan" value="<?= $data['nama_kegiatan'] ?>"
                class="w-full border mt-1.5 border-gray-500/30 outline-none rounded py-2.5 px-3"
                type="text" required>
        </div>

        <div>
            <label class="font-medium">Tanggal</label>
            <input name="tanggal" value="<?= $data['tanggal'] ?>"
                class="w-full border mt-1.5 border-gray-500/30 outline-none rounded py-2.5 px-3"
                type="date" required>
        </div>

        <div class="md:col-span-2">
            <label class="font-medium">Penanggung Jawab</label>
            <select name="anggota_id"
                class="w-full border mt-1.5 border-gray-500/30 outline-none rounded py-2.5 px-3 cursor-pointer"
                required>
                <?php while ($a = $anggota->fetch_assoc()): ?>
                    <option value="<?= $a['id'] ?>"
                        <?= $data['anggota_id'] == $a['id'] ? 'selected' : '' ?>>
                        <?= $a['nama'] ?>
                    </option>
                <?php endwhile ?>
            </select>
        </div>

        <div class="md:col-span-2">
            <label class="font-medium">Deskripsi</label>
            <textarea name="deskripsi" rows="4"
                class="w-full border mt-1.5 border-gray-500/30 outline-none rounded py-2.5 px-3"
                required><?= $data['deskripsi'] ?></textarea>
        </div>
    </div>

    <div class="flex items-center justify-start space-x-4">
        <button type="submit" name="update"
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