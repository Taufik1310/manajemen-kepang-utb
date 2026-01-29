<?php
include __DIR__ . "/../layout/header.php";
require_once "../../models/JadwalLatihan.php";
$data = JadwalLatihan::all();
?>

<h2 class="text-3xl font-bold mb-4">Data Jadwal Latihan</h2>

<div class="bg-white relative shadow-md rounded w-full overflow-hidden">
    <div class="flex flex-col md:flex-row items-stretch md:items-center md:space-x-3 space-y-3 md:space-y-0 justify-between mx-4 py-4">

        <div class="w-full md:w-1/2">
            <form class="flex items-center">
                <label class="sr-only">Cari</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
                        </svg>
                    </div>
                    <input type="text" placeholder="Cari Data"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-900 focus:border-amber-900 block w-full pl-10 p-2">
                </div>
            </form>
        </div>

        <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-3">
            <a href="<?= BASE_URL ?>app/views/jadwal_latihan/tambah.php"
                class="flex items-center justify-center text-white bg-amber-900 hover:bg-amber-800 rounded-lg text-sm px-4 py-2">
                Tambah Data
            </a>

            <a href="<?= BASE_URL ?>app/controllers/JadwalLatihanController.php?export=pdf"
                target="_blank"
                class="flex items-center justify-center px-4 py-2 text-sm font-medium text-amber-900 bg-white border border-amber-900 rounded-lg hover:bg-gray-100">
                Export PDF
            </a>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th class="p-4">
                        <input type="checkbox" class="w-4 h-4 bg-gray-100 border-gray-300 rounded">
                    </th>
                    <th class="p-4">Tanggal</th>
                    <th class="p-4">Waktu</th>
                    <th class="p-4">Tempat</th>
                    <th class="p-4">Kegiatan</th>
                    <th class="p-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $data->fetch_assoc()): ?>
                    <tr class="hover:bg-gray-100">
                        <td class="p-4">
                            <input type="checkbox" class="w-4 h-4 bg-gray-100 border-gray-300 rounded">
                        </td>
                        <td class="px-4 py-3"><?= date('d-m-Y', strtotime($row['tanggal'])) ?></td>
                        <td class="px-4 py-3"><?= $row['waktu'] ?></td>
                        <td class="px-4 py-3"><?= $row['tempat'] ?></td>
                        <td class="px-4 py-3"><?= $row['nama_kegiatan'] ?></td>
                        <td class="px-4 py-3">
                            <div class="flex space-x-2">
                                <a href="<?= BASE_URL ?>app/views/jadwal_latihan/edit.php?id=<?= $row['id'] ?>"
                                    class="px-3 py-2 text-sm text-white bg-blue-700 rounded hover:bg-blue-800">
                                    Edit
                                </a>
                                <a href="<?= BASE_URL ?>app/controllers/JadwalLatihanController.php?hapus=<?= $row['id'] ?>"
                                    class="px-3 py-2 text-sm text-white bg-red-700 rounded hover:bg-red-800"
                                    onclick="return confirm('Hapus data ini?')">
                                    Hapus
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endwhile ?>
            </tbody>
        </table>
    </div>
</div>

<?php include __DIR__ . "/../layout/footer.php"; ?>