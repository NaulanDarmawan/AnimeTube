<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title><?= $data['judul']; ?></title>
</head>

<!-- Grid Untuk Membagi Sidebar Dan Navbar -->

<body class="w-full h-full grid grid-cols-8 pb-3">

    <!-- Header Untuk Mobile -->
    <div class="h-[100px] col-span-8 lg:hidden bg-gray-500 flex items-center p-3 justify-around">
        <div id="sidebarButton" class="w-[80px] h-[50px] bg-sky-500 rounded-xl flex items-center justify-center">
            <h1 class="text-2xl text-white z-10">|||</h1>
        </div>
        <h1 class="text-2xl text-white bold">AnimeTube</h1>
        <a href="<?= BASEURL; ?>/user/detail">
            <div class="w-[50px] h-[50px] bg-sky-500 rounded-full"></div>
        </a>
    </div>

    <!-- Sidebar Untuk PC -->
    <div class="hidden h-screen lg:block lg:col-span-2 bg-gray-500 flex flex-col px-[8px]">
        <!-- Navbar Header -->
        <div class="h-[60px] text-center mt-5">
            <h1 class="text-2xl text-white bold">AnimeTube</h1>
            <div class="h-[3px] bg-black mt-3"></div>
        </div>

        <!-- Navbar Profile Account -->
        <div class="h-[60px] mt-5 flex items-center">
            <a href="<?= BASEURL; ?>/user/detail">
                <div class="w-[50px] h-[50px] bg-sky-500 rounded-full"></div>
            </a>
            <h1 class="text-xl text-white bold ml-2">Naulan Darmawan</h1>
        </div>

        <!-- Tombol Aksi -->
        <a href="#">
            <div class="h-[40px] bg-sky-500 rounded-lg mt-9 flex justify-center items-center">
                <h1 class="text-[16px] text-white bold">DASHBOARD</h1>
            </div>
        </a>
        <a href="#">
            <div class="h-[40px] bg-orange-500 rounded-lg mt-3 flex justify-center items-center">
                <h1 class="text-[16px] text-white bold">DATA USER</h1>
            </div>
        </a>
        <a href="#">
            <div class="h-[40px] bg-purple-500 rounded-lg mt-3 flex justify-center items-center">
                <h1 class="text-[16px] text-white bold">DATA GENRE</h1>
            </div>
        </a>
        <a href="#">
            <div class="h-[40px] bg-indigo-500 rounded-lg mt-3 flex justify-center items-center">
                <h1 class="text-[16px] text-white bold">DATA ANIME</h1>
            </div>
        </a>
        <a href="#">
            <div class="h-[40px] bg-emerald-500 rounded-lg mt-3 flex justify-center items-center">
                <h1 class="text-[16px] text-white bold">DATA BERITA</h1>
            </div>
        </a>
        <a href="#">
            <div class="h-[40px] bg-red-500 rounded-lg mt-3 flex justify-center items-center place-self-end">
                <h1 class="text-[16px] text-white bold">LOG OUT</h1>
            </div>
        </a>
    </div>

    <!-- Main Content -->
    <div class="col-span-8 lg:col-span-6 bg-gray-600 p-3 flex flex-col">
        <h1 class="text-2xl text-white bold">Informasi Akun Anda</h1>
        <!-- Grid Parents Untuk Card -->
        <div class="w-full grid grid-cols-2 lg:grid-cols-4 gap-2 mt-3">
            <!-- Card -->
            <div class="col-span-1 bg-cyan-600 h-[110px] flex flex-col items-center justify-between rounded-lg shadow-lg overflow-hidden">
                <div class="flex flex-col items-center">
                    <h1 class="text-[35px] text-white bold">100</h1>
                    <h1 class="text-[12px] text-white bold">User Aplikasi</h1>
                </div>
                <div class="w-full bg-sky-500 text-center py-1">
                    <a href="#" class="text-black hover:text-white">Info Lebih Lengkap</a>
                </div>
            </div>
            <div class="col-span-1 bg-teal-600 h-[110px] flex flex-col items-center justify-between rounded-lg shadow-lg overflow-hidden">
                <div class="flex flex-col items-center">
                    <h1 class="text-[35px] text-white bold">7</h1>
                    <h1 class="text-[12px] text-white bold">Genre Anime</h1>
                </div>
                <div class="w-full bg-sky-500 text-center py-1">
                    <a href="#" class="text-black hover:text-white">Info Lebih Lengkap</a>
                </div>
            </div>
            <div class="col-span-1 bg-cyan-600 h-[110px] flex flex-col items-center justify-between rounded-lg shadow-lg overflow-hidden">
                <div class="flex flex-col items-center">
                    <h1 class="text-[35px] text-white bold">50</h1>
                    <h1 class="text-[12px] text-white bold">Anime Dirilis</h1>
                </div>
                <div class="w-full bg-sky-500 text-center py-1">
                    <a href="#" class="text-black hover:text-white">Info Lebih Lengkap</a>
                </div>
            </div>
            <div class="col-span-1 bg-teal-600 h-[110px] flex flex-col items-center justify-between rounded-lg shadow-lg overflow-hidden">
                <div class="flex flex-col items-center">
                    <h1 class="text-[35px] text-white bold">44</h1>
                    <h1 class="text-[12px] text-white bold">Berita Diunggah</h1>
                </div>
                <div class="w-full bg-sky-500 text-center py-1">
                    <a href="#" class="text-black hover:text-white">Info Lebih Lengkap</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Dropdown Untuk Mobile -->
    <div id="modal" class="fixed hidden z-0 lg:hidden h-full w-full flex justify-center items-center transition duration-150 ease-in-out">
        <div class="bg-gray-300 w-[300px] h-fit p-[32px] rounded-xl shadow-xl">
            <!-- Tombol Aksi -->
            <a href="#">
                <div class="h-[40px] bg-sky-500 rounded-lg mt-9 flex justify-center items-center">
                    <h1 class="text-[16px] text-white bold">DASHBOARD</h1>
                </div>
            </a>
            <a href="#">
                <div class="h-[40px] bg-orange-500 rounded-lg mt-3 flex justify-center items-center">
                    <h1 class="text-[16px] text-white bold">DATA USER</h1>
                </div>
            </a>
            <a href="#">
                <div class="h-[40px] bg-purple-500 rounded-lg mt-3 flex justify-center items-center">
                    <h1 class="text-[16px] text-white bold">DATA GENRE</h1>
                </div>
            </a>
            <a href="#">
                <div class="h-[40px] bg-indigo-500 rounded-lg mt-3 flex justify-center items-center">
                    <h1 class="text-[16px] text-white bold">DATA ANIME</h1>
                </div>
            </a>
            <a href="#">
                <div class="h-[40px] bg-emerald-500 rounded-lg mt-3 flex justify-center items-center">
                    <h1 class="text-[16px] text-white bold">DATA BERITA</h1>
                </div>
            </a>
            <a href="#">
                <div class="h-[40px] bg-red-500 rounded-lg mt-3 flex justify-center items-center place-self-end">
                    <h1 class="text-[16px] text-white bold">LOG OUT</h1>
                </div>
            </a>
        </div>
    </div>