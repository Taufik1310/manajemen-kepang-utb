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
                class="flex items-center justify-center text-white bg-amber-900 hover:bg-amber-800 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-4 py-2 focus:outline-none">
                <svg class="h-3.5 w-3.5 mr-1.5 -ml-1"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path clip-rule="evenodd" fill-rule="evenodd"
                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                </svg>
                Tambah Data
            </a>

            <a href="<?= BASE_URL ?>app/controllers/JadwalLatihanController.php?export=pdf"
                target="_blank"
                class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-amber-900 bg-white rounded-lg border border-amber-900 hover:bg-gray-100 focus:ring-4 focus:ring-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-4 w-4 mr-1.5 -ml-1 text-amber-900">
                    <path fill-rule="evenodd" d="M12 2.25a.75.75 0 0 1 .75.75v11.69l3.22-3.22a.75.75 0 1 1 1.06 1.06l-4.5 4.5a.75.75 0 0 1-1.06 0l-4.5-4.5a.75.75 0 1 1 1.06-1.06l3.22 3.22V3a.75.75 0 0 1 .75-.75Zm-9 13.5a.75.75 0 0 1 .75.75v2.25a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5V16.5a.75.75 0 0 1 1.5 0v2.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V16.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
                </svg>
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
                        <td class="px-4 py-3 text-gray-900 font-medium"><?= date('d-m-Y', strtotime($row['tanggal'])) ?></td>
                        <td class="px-4 py-3 text-gray-900 font-medium"><?= $row['waktu'] ?></td>
                        <td class="px-4 py-3 text-gray-900 font-medium"><?= $row['tempat'] ?></td>
                        <td class="px-4 py-3"><?= $row['nama_kegiatan'] ?></td>
                        <td class="px-4 py-3">
                            <div class="flex space-x-2">
                                <a href="<?= BASE_URL ?>app/views/jadwal_latihan/edit.php?id=<?= $row['id'] ?>"
                                    class="py-2 px-3 flex items-center text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                    </svg>
                                    Edit
                                </a>
                                <a href="<?= BASE_URL ?>app/controllers/JadwalLatihanController.php?hapus=<?= $row['id'] ?>"
                                    onclick="return confirm('Hapus data?')"
                                    class="flex items-center text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
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