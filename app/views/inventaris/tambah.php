<?php
include "../layout/header.php";
?>

<h3 class="text-2xl font-bold mb-4">Tambah Data Inventaris</h3>

<form action="<?= BASE_URL ?>app/controllers/InventarisController.php" method="POST"
    class="bg-white text-gray-500 w-full p-6 text-left text-sm rounded border border-gray-300/60">

    <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">

        <div>
            <label class="font-medium" for="nama_alat">Nama Alat</label>
            <input name="nama_alat" id="nama_alat"
                class="w-full border mt-1.5 border-gray-500/30 outline-none rounded py-2.5 px-3"
                type="text" placeholder="Masukkan nama alat" required>
        </div>

        <div>
            <label class="font-medium" for="jumlah">Jumlah</label>
            <input name="jumlah" id="jumlah"
                class="w-full border mt-1.5 border-gray-500/30 outline-none rounded py-2.5 px-3"
                type="number" min="1" placeholder="Masukkan jumlah" required>
        </div>

        <div>
            <label class="font-medium" for="kondisi">Kondisi</label>
            <select name="kondisi" id="kondisi"
                class="w-full border mt-1.5 border-gray-500/30 outline-none rounded py-2.5 px-3 cursor-pointer"
                required>
                <option value="">-- Pilih Kondisi --</option>
                <option value="Baik">Baik</option>
                <option value="Rusak">Rusak</option>
            </select>
        </div>

    </div>

    <div class="flex items-center justify-start space-x-4">
        <button type="submit" name="simpan"
            class="my-3 bg-amber-900 py-2 px-5 rounded text-white font-medium cursor-pointer">
            Simpan
        </button>

        <a href="<?= BASE_URL ?>app/views/inventaris/index.php"
            class="w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-amber-900 bg-white rounded border border-amber-900 hover:bg-gray-100 focus:ring-4 focus:ring-gray-200">
            Kembali
        </a>
    </div>

</form>

<?php include "../layout/footer.php"; ?>