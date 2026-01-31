<?php
require_once __DIR__ . '/../../middlewares/auth.php';
require_once __DIR__ . "/../../controllers/DashboardController.php";
$data = DashboardController::index();

include __DIR__ . "/../layout/header.php";

?>


<h1 class="text-3xl font-bold mb-8">Dashboard</h1>

<div class="flex flex-col w-full gap-4">
    <div class="py-12 px-10 w-full flex flex-col items-center justify-center text-center bg-gradient-to-b from-amber-900 to-amber-600 rounded text-white">
        <h1 class="text-4xl md:text-5xl md:leading-[60px] font-semibold max-w-xl bg-gradient-to-r from-white to-amber-100 text-transparent bg-clip-text">Wilujeng Sumping !</h1>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 w-full min-w-0">
        <?php
        $cards = [
            ['Anggota', $data['anggota']],
            ['Divisi', $data['divisi']],
            ['Kegiatan', $data['kegiatan']],
            ['Inventaris', $data['inventaris']],
        ];
        foreach ($cards as $card):
        ?>
            <div class="flex flex-col px-6 py-2 bg-white shadow rounded overflow-hidden">
                <div class="flex flex-col items-center space-y-2">
                    <div class="text-4xl font-bold tracking-tight leading-none text-amber-900"><?= $card[1] ?></div>
                    <div class="text-lg font-medium text-gray-600">Total <?= $card[0] ?></div>
                </div>
            </div>
        <?php endforeach ?>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="bg-white shadow rounded mb-4 p-4 sm:p-6 h-full">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-xl font-bold leading-none text-gray-900">Kegiatan Terbaru</h3>
                <a href="<?= BASE_URL ?>app/views/kegiatan/index.php" class="text-sm font-medium text-amber-900 hover:bg-gray-100 rounded-lg inline-flex items-center p-2">
                    Lihat Semua
                </a>
            </div>
            <div class="flow-root">
                <ul role="list" class="divide-y divide-gray-200">
                    <?php while ($row = $data['kegiatanTerbaru']->fetch_assoc()): ?>
                        <li class="py-3 sm:py-4">
                            <div class="flex items-center space-x-4">
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate">
                                        <?= $row['nama_kegiatan'] ?>
                                    </p>
                                    <p class="text-sm text-gray-500 truncate">
                                        Penanggung Jawab: <?= $row['penanggung_jawab'] ?>
                                    </p>
                                </div>
                                <div class="inline-flex items-center text-sm font-semibold text-gray-900">
                                    <?= $row['tanggal'] ?>
                                </div>
                            </div>
                        </li>
                    <?php endwhile ?>
                </ul>
            </div>
        </div>
        <div class="bg-white shadow rounded mb-4 p-4 sm:p-6 h-full">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-xl font-bold leading-none text-gray-900">Jadwal Latihan Terdekat</h3>
                <a href="<?= BASE_URL ?>app/views/jadwal_latihan/index.php" class="text-sm font-medium text-amber-900 hover:bg-gray-100 rounded-lg inline-flex items-center p-2">
                    Lihat Semua
                </a>
            </div>
            <div class="flow-root">
                <ul role="list" class="divide-y divide-gray-200">
                    <?php while ($row = $data['jadwalTerdekat']->fetch_assoc()): ?>
                        <li class="py-3 sm:py-4">
                            <div class="flex items-center space-x-4">
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate">
                                        <?= $row['tanggal'] ?> • <?= $row['waktu'] ?>
                                    </p>
                                    <p class="text-sm text-gray-500 truncate">
                                        <?= $row['nama_kegiatan'] ?>
                                    </p>
                                </div>
                                <div class="inline-flex items-center text-sm font-semibold text-gray-900">
                                    <?= $row['tempat'] ?>
                                </div>
                            </div>
                        </li>
                    <?php endwhile ?>
                </ul>
            </div>
        </div>
    </div>
</div>



<?php include __DIR__ . "/../layout/footer.php"; ?>