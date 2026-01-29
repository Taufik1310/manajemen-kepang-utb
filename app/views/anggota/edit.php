<?php
include "../layout/header.php";
require_once "../../models/Anggota.php";
require_once "../../config/database.php";

$data = Anggota::find($_GET['id']);
$db = Database::connect();
$divisi = $db->query("SELECT * FROM divisi");
?>

<h3 class="text-2xl font-bold mb-4">Ubah Data Anggota</h3>

<form action="<?= BASE_URL ?>app/controllers/AnggotaController.php" method="POST" class="bg-white text-gray-500 w-full p-6 text-left text-sm rounded border border-gray-300/60">
    <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
        <div class="hidden">
            <label class="font-medium" for="id">id</label>
            <input name="id" id="id" value="<?= $data['id'] ?>" class="w-full border mt-1.5 border-gray-500/30 outline-none rounded py-2.5 px-3" type="text" placeholder="Masukkan id" required>
        </div>
        <div>
            <label class="font-medium" for="nama">Nama Lengkap</label>
            <input name="nama" id="nama" value="<?= $data['nama'] ?>" class="w-full border mt-1.5 border-gray-500/30 outline-none rounded py-2.5 px-3" type="text" placeholder="Masukkan nama" required>
        </div>
        <div>
            <label class="font-medium" for="nim">NIM</label>
            <input name="nim" id="nim" value="<?= $data['nim'] ?>" class="w-full border mt-1.5 border-gray-500/30 outline-none rounded py-2.5 px-3" type="text" placeholder="Masukkan nim" required>
        </div>
        <div>
            <label class="font-medium" for="jurusan">Jurusan</label>
            <input name="jurusan" id="jurusan" value="<?= $data['jurusan'] ?>" class="w-full border mt-1.5 border-gray-500/30 outline-none rounded py-2.5 px-3" type="text" placeholder="Masukkan jurusan" required>
        </div>
        <div>
            <label class="font-medium" for="angkatan">Angkatan</label>
            <input name="angkatan" id="angkatan" value="<?= $data['angkatan'] ?>" class="w-full border mt-1.5 border-gray-500/30 outline-none rounded py-2.5 px-3" type="number" placeholder="Masukkan angkatan" required>
        </div>
        <div>
            <label class="font-medium" for="divisi">Divisi</label>
            <select name="divisi_id" class="w-full border mt-1.5 border-gray-500/30 outline-none rounded py-2.5 px-3 cursor-pointer" required>
                <?php while ($d = $divisi->fetch_assoc()): ?>
                    <option value="<?= $d['id'] ?>"
                        <?= isset($data) && $data['divisi_id'] == $d['id'] ? 'selected' : '' ?>>
                        <?= $d['nama_divisi'] ?>
                    </option>
                <?php endwhile ?>
            </select>
        </div>
    </div>
    <div class="flex items-center justify-start space-x-4">
        <button type="submit" name="update" class="my-3 bg-amber-900 py-2 px-5 rounded text-white font-medium cursor-pointer">Simpan</button>
        <a href="<?= BASE_URL ?>app/views/anggota/index.php" class="w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-amber-900 focus:outline-none bg-white rounded border border-amber-900 hover:bg-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-200 cursor-pointer">Kembali</a>
    </div>
</form>


<?php include "../layout/footer.php"; ?>