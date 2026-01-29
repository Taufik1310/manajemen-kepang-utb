<?php
include "../layout/header.php";
require_once "../../models/Divisi.php";

$data = Divisi::find($_GET['id']);
?>

<h3 class="text-2xl font-bold mb-4">Ubah Data Divisi</h3>

<form action="<?= BASE_URL ?>app/controllers/DivisiController.php" method="POST" class="bg-white text-gray-500 w-full p-6 text-left text-sm rounded border border-gray-300/60">
    <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
        <div class="hidden">
            <label class="font-medium" for="id">id</label>
            <input name="id" id="id" value="<?= $data['id'] ?>" class="w-full border mt-1.5 border-gray-500/30 outline-none rounded py-2.5 px-3" type="text" placeholder="Masukkan id" required>
        </div>
        <div>
            <label class="font-medium" for="nama_divisi">Nama Divisi</label>
            <input name="nama_divisi" id="nama_divisi" value="<?= $data['nama_divisi'] ?>" class="w-full border mt-1.5 border-gray-500/30 outline-none rounded py-2.5 px-3" type="text" placeholder="Masukkan nama divisi" required>
        </div>
    </div>
    <div class="flex items-center justify-start space-x-4">
        <button type="submit" name="update" class="my-3 bg-amber-900 py-2 px-5 rounded text-white font-medium cursor-pointer">Simpan</button>
        <a href="<?= BASE_URL ?>app/views/divisi/index.php" class="w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-amber-900 focus:outline-none bg-white rounded border border-amber-900 hover:bg-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-200 cursor-pointer">Kembali</a>
    </div>
</form>


<?php include "../layout/footer.php"; ?>