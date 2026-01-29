<?php
$currentPath = $_SERVER['REQUEST_URI'];

function isActive($keyword)
{
    global $currentPath;
    return strpos($currentPath, $keyword) !== false
        ? 'font-semibold text-amber-900'
        : 'font-normal text-gray-600 hover:text-amber-900';
}

$menus = [
    [
        'label' => 'Dashboard',
        'path'  => 'dashboard',
        'url'   => BASE_URL . 'app/views/dashboard/index.php',
        'icon'  => '<path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                    <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>'
    ],
    [
        'label' => 'Anggota',
        'path'  => 'anggota',
        'url'   => BASE_URL . 'app/views/anggota/index.php',
        'icon'  => '<path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z" clip-rule="evenodd" />'
    ],
    [
        'label' => 'Divisi',
        'path'  => 'divisi',
        'url'   => BASE_URL . 'app/views/divisi/index.php',
        'icon'  => '<path d="M4 3h12v4H4zM4 9h12v4H4zM4 15h12v2H4z"/>'
    ],
    [
        'label' => 'Inventaris',
        'path'  => 'inventaris',
        'url'   => BASE_URL . 'app/views/inventaris/index.php',
        'icon'  => '<path d="M3 3h14v14H3z"/>'
    ],
    [
        'label' => 'Kegiatan',
        'path'  => 'kegiatan',
        'url'   => BASE_URL . 'app/views/kegiatan/index.php',
        'icon'  => '<path d="M6 2h8v2H6zM4 6h12v10H4z"/>'
    ],
    [
        'label' => 'Jadwal Latihan',
        'path'  => 'jadwal',
        'url'   => BASE_URL . 'app/views/jadwal_latihan/index.php',
        'icon'  => '<path d="M6 2h8v2H6zM3 6h14v11H3z"/>'
    ],
];
?>

<aside id="default-sidebar"
    class="fixed md:relative top-0 left-0 h-screen w-8/12 md:w-2/12 z-40 -translate-x-full md:translate-x-0 transition-transform duration-300 bg-white border-r border-gray-100">
    <div class="overflow-y-auto py-5 px-6 w-full h-full bg-white">
        <a href="<?= BASE_URL ?>app/views/dashboard/index.php" class="mx-auto mb-8 block">
            <img src="<?= BASE_URL ?>assets/images/logo.png" alt="Kepang Logo" class="w-20 mx-auto">
        </a>
        <ul class="space-y-2">
            <ul class="space-y-2">
                <?php foreach ($menus as $menu): ?>
                    <li>
                        <a href="<?= $menu['url'] ?>"
                            class="<?= isActive($menu['path']) ?> flex items-center p-2 text-base rounded-lg transition hover:bg-gray-100 group">
                            <svg class="w-6 h-6"
                                fill="currentColor" viewBox="0 0 20 20">
                                <?= $menu['icon'] ?>
                            </svg>
                            <span class="ml-4"><?= $menu['label'] ?></span>
                        </a>
                    </li>
                <?php endforeach ?>
            </ul>
        </ul>
    </div>
</aside>
<div id="sidebarOverlay" class="fixed inset-0 bg-black/40 z-30 hidden md:hidden"></div>