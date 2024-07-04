<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.14/jspdf.plugin.autotable.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
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
            <div class="w-[50px] h-[50px] bg-sky-500 rounded-full">
                <img src="<?= BASEURL; ?>/assets/images/profile.png" alt="Profile" class="w-full object-cover object-center">
            </div>
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
                <div class="w-[50px] h-[50px] bg-sky-500 rounded-full">
                <img src="<?= BASEURL; ?>/assets/images/<?= $_SESSION['user']['image']; ?>" alt="Profile" class="w-full object-cover object-center">
                </div>
            </a>
            <h1 class="text-xl text-white bold ml-2"><?= $_SESSION['user']['nama']; ?></h1>
        </div>

        <!-- Tombol Aksi -->
        <a href="<?= BASEURL; ?>/admin/index">
            <div class="h-[40px] bg-sky-500 rounded-lg mt-9 flex justify-center items-center">
                <h1 class="text-[16px] text-white bold">DASHBOARD</h1>
            </div>
        </a>
        <a href="<?= BASEURL; ?>/admin/user">
            <div class="h-[40px] bg-orange-500 rounded-lg mt-3 flex justify-center items-center">
                <h1 class="text-[16px] text-white bold">DATA USER</h1>
            </div>
        </a>
        <a href="<?= BASEURL; ?>/admin/genre">
            <div class="h-[40px] bg-purple-500 rounded-lg mt-3 flex justify-center items-center">
                <h1 class="text-[16px] text-white bold">DATA GENRE</h1>
            </div>
        </a>
        <a href="<?= BASEURL; ?>/admin/anime">
            <div class="h-[40px] bg-indigo-500 rounded-lg mt-3 flex justify-center items-center">
                <h1 class="text-[16px] text-white bold">DATA ANIME</h1>
            </div>
        </a>
        <a href="<?= BASEURL; ?>/admin/berita">
            <div class="h-[40px] bg-emerald-500 rounded-lg mt-3 flex justify-center items-center">
                <h1 class="text-[16px] text-white bold">DATA BERITA</h1>
            </div>
        </a>
        <a href="<?= BASEURL; ?>/user/logout">
            <div class="h-[40px] bg-red-500 rounded-lg mt-3 flex justify-center items-center place-self-end">
                <h1 class="text-[16px] text-white bold">LOG OUT</h1>
            </div>
        </a>
    </div>

    <!-- Modal Dropdown Untuk Mobile -->
    <div id="modal" class="fixed transition ease-in-out duration-1000 hidden z-0 lg:hidden h-full w-full flex justify-center items-center">
        <div class="bg-gray-300 w-[300px] h-fit p-[32px] rounded-xl shadow-xl">
            <!-- Tombol Aksi -->
            <a href="<?= BASEURL; ?>/admin/index">
                <div class="h-[40px] bg-sky-500 rounded-lg mt-9 flex justify-center items-center">
                    <h1 class="text-[16px] text-white bold">DASHBOARD</h1>
                </div>
            </a>
            <a href="<?= BASEURL; ?>/admin/user">
                <div class="h-[40px] bg-orange-500 rounded-lg mt-3 flex justify-center items-center">
                    <h1 class="text-[16px] text-white bold">DATA USER</h1>
                </div>
            </a>
            <a href="<?= BASEURL; ?>/admin/genre">
                <div class="h-[40px] bg-purple-500 rounded-lg mt-3 flex justify-center items-center">
                    <h1 class="text-[16px] text-white bold">DATA GENRE</h1>
                </div>
            </a>
            <a href="<?= BASEURL; ?>/admin/anime">
                <div class="h-[40px] bg-indigo-500 rounded-lg mt-3 flex justify-center items-center">
                    <h1 class="text-[16px] text-white bold">DATA ANIME</h1>
                </div>
            </a>
            <a href="<?= BASEURL; ?>/admin/berita">
                <div class="h-[40px] bg-emerald-500 rounded-lg mt-3 flex justify-center items-center">
                    <h1 class="text-[16px] text-white bold">DATA BERITA</h1>
                </div>
            </a>
            <a href="<?= BASEURL; ?>/user/logout">
                <div class="h-[40px] bg-red-500 rounded-lg mt-3 flex justify-center items-center place-self-end">
                    <h1 class="text-[16px] text-white bold">LOG OUT</h1>
                </div>
            </a>
        </div>
    </div>