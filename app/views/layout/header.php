<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../../config/config.php';

$username = $_SESSION['username'] ?? 'User';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen KEPANG UTB</title>
    <link href="<?= BASE_URL ?>assets/css/style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-100 h-screen w-screen overflow-hidden">

    <div class="w-screen h-screen overflow-hidden flex justify-center">
        <?php include __DIR__ . '/sidebar.php'; ?>
        <div class="w-full md:w-10/12">
            <nav class="h-20 relative w-full px-6 md:px-16 lg:px-24 xl:px-32 flex items-center justify-between z-20 bg-white text-gray-800 shadow-[0px_4px_25px_0px_#0000000D] transition-all">
                <button id="sidebarToggle" type="button" class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                    </svg>
                </button>
                <div class="flex items-center gap-8 ms-auto">
                    <div class="flex items-center gap-2">
                        <div class="w-9 h-9 rounded-full bg-gray-400 text-white flex items-center justify-center font-bold uppercase">
                            <?= strtoupper(substr($username, 0, 1)) ?>
                        </div>
                        <span class="hidden sm:block font-medium">
                            <?= htmlspecialchars($username) ?>
                        </span>
                    </div>
                    <a href="<?= BASE_URL ?>app/controllers/AuthController.php?logout=true"
                        class="flex border-2 border-amber-900 bg-transparent text-amber-900 px-4 py-2 rounded-full text-sm font-medium hover:bg-amber-900 hover:text-white transition">
                        Logout
                    </a>
                </div>
            </nav>
            <div class="p-6 pb-40 md:p-12 md:pb-40 w-full overflow-y-scroll h-full overflow-x-hidden">