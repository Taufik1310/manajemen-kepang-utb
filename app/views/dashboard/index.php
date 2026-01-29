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

    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <?php
        $cards = [
            ['Anggota', $data['anggota']],
            ['Divisi', $data['divisi']],
            ['Kegiatan', $data['kegiatan']],
            ['Inventaris', $data['inventaris']],
        ];
        foreach ($cards as $card):
        ?>
            <div class="bg-white p-4 rounded-lg shadow">
                <p class="text-gray-500 text-sm">Total <?= $card[0] ?></p>
                <p class="text-2xl font-bold"><?= $card[1] ?></p>
            </div>
        <?php endforeach ?>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="bg-white p-5 rounded-lg shadow">
            <h2 class="font-semibold mb-6">Kegiatan Terbaru</h2>
            <ul class="space-y-3">
                <?php while ($row = $data['kegiatanTerbaru']->fetch_assoc()): ?>
                    <li class="border-b pb-2">
                        <p class="font-medium"><?= $row['nama_kegiatan'] ?></p>
                        <p class="text-sm text-gray-500">
                            <?= $row['penanggung_jawab'] ?> • <?= $row['tanggal'] ?>
                        </p>
                    </li>
                <?php endwhile ?>
            </ul>
        </div>
        <div class="bg-white p-5 rounded-lg shadow">
            <h2 class="font-semibold mb-6">Jadwal Latihan Terdekat</h2>
            <ul class="space-y-3">
                <?php while ($row = $data['jadwalTerdekat']->fetch_assoc()): ?>
                    <li class="border-b pb-2">
                        <p class="font-medium">
                            <?= $row['tanggal'] ?> • <?= $row['waktu'] ?> • <?= $row['tempat'] ?>
                        </p>
                        <p class="text-sm text-gray-500"><?= $row['nama_kegiatan'] ?></p>
                    </li>
                <?php endwhile ?>
            </ul>
        </div>

    </div>
</div>



<?php include __DIR__ . "/../layout/footer.php"; ?>