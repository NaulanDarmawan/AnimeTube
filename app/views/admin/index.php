<!-- Main Content -->
<div class="col-span-8 lg:col-span-6 bg-gray-600 p-3 flex flex-col">
        <h1 class="text-2xl text-white bold">Informasi Akun Anda</h1>
        <!-- Grid Parents Untuk Card -->
        <div class="w-full grid grid-cols-2 lg:grid-cols-4 gap-2 mt-3">
            <!-- Card -->
            <div class="col-span-1 bg-cyan-600 h-[110px] flex flex-col items-center justify-between rounded-lg shadow-lg overflow-hidden">
                <div class="flex flex-col items-center">
                    <h1 class="text-[35px] text-white bold"><?= $data['total']['total_user']; ?></h1>
                    <h1 class="text-[12px] text-white bold">User Aplikasi</h1>
                </div>
                <div class="w-full bg-sky-500 text-center py-1">
                    <a href="<?= BASEURL; ?>/admin/user" class="text-black hover:text-white">Info Lebih Lengkap</a>
                </div>
            </div>
            <div class="col-span-1 bg-teal-600 h-[110px] flex flex-col items-center justify-between rounded-lg shadow-lg overflow-hidden">
                <div class="flex flex-col items-center">
                    <h1 class="text-[35px] text-white bold"><?= $data['total']['total_genre']; ?></h1>
                    <h1 class="text-[12px] text-white bold">Genre Anime</h1>
                </div>
                <div class="w-full bg-sky-500 text-center py-1">
                    <a href="<?= BASEURL; ?>/admin/genre" class="text-black hover:text-white">Info Lebih Lengkap</a>
                </div>
            </div>
            <div class="col-span-1 bg-cyan-600 h-[110px] flex flex-col items-center justify-between rounded-lg shadow-lg overflow-hidden">
                <div class="flex flex-col items-center">
                    <h1 class="text-[35px] text-white bold"><?= $data['total']['total_anime']; ?></h1>
                    <h1 class="text-[12px] text-white bold">Anime Dirilis</h1>
                </div>
                <div class="w-full bg-sky-500 text-center py-1">
                    <a href="<?= BASEURL; ?>/admin/anime" class="text-black hover:text-white">Info Lebih Lengkap</a>
                </div>
            </div>
            <div class="col-span-1 bg-teal-600 h-[110px] flex flex-col items-center justify-between rounded-lg shadow-lg overflow-hidden">
                <div class="flex flex-col items-center">
                    <h1 class="text-[35px] text-white bold"><?= $data['total']['total_berita']; ?></h1>
                    <h1 class="text-[12px] text-white bold">Berita Diunggah</h1>
                </div>
                <div class="w-full bg-sky-500 text-center py-1">
                    <a href="<?= BASEURL; ?>/admin/berita" class="text-black hover:text-white">Info Lebih Lengkap</a>
                </div>
            </div>
        </div>
    </div>