<!-- Main Content -->
<div class="col-span-8 lg:col-span-6 bg-gray-600 p-3 flex flex-col">
    <h1 class="text-2xl text-white bold">Daftar Berita Anda</h1>
    <!-- Grid Parents Untuk Card -->
    <div class="w-full mt-[50px] overflow-x-auto">
        <!-- Card Print & Insert Data -->
        <div class="w-full flex justify-between px-3">
            <a href="#">
                <div class="w-[250px] bg-sky-500 text-xl text-center border border-black border-2 text-white bold p-3 rounded-lg transition duration-150 ease-in-out hover:scale-105">
                    Tambah Berita
                </div>
            </a>
            <a href="#">
                <div class="w-[250px] bg-purple-500 text-xl text-center border border-black border-2 text-white bold p-3 rounded-lg transition duration-150 ease-in-out hover:scale-105">
                    Berita Kreator
                </div>
            </a>
        </div>

        <!-- Search Bar -->
        <form action="<?= BASEURL; ?>/admin/cariBerita" method="post" id="filter" class="p-3 grid grid-cols-5 gap-2 mt-[30px]">
            <input type="text" name="keyword" autofocus autocomplete="off" placeholder="Cari Berdasarkan Judul Atau Deskripsi" class="h-[54px] col-span-5 lg:col-span-3 rounded text-xl px-3 py-3">
            <button type="submit" name="cari" class="bg-red-500 col-span-5 lg:col-span-2 text-xl text-white font-bold p-3 border border-black rounded-lg shadow-lg transition duration-150 ease-in-out hover:scale-105">Cari Data</button>
        </form>

        <!-- Tabel -->
        <div class="w-full h-full">
            <table class="w-full table-auto text-center bg-white border border-black border-collapse">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="border border-black px-4 py-2">nomor</th>
                        <th class="border border-black px-4 py-2">berita</th>
                        <th class="border border-black px-4 py-2">judul</th>
                        <th class="border border-black px-4 py-2">deskripsi</th>
                        <th class="border border-black px-4 py-2">aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no_urut = 1; ?>
                    <?php foreach ($data['news'] as $berita) : ?>
                        <tr>
                            <td class="border border-black px-4 py-2"><?= $no_urut ?></td>
                            <td class="border border-black px-4 py-2">
                                <div class="w-[200px] h-[100px] aspect-video">
                                <img src="<?= BASEURL; ?>/assets/images/<?= $berita['foto']; ?>" alt="Foto User" loading="lazy" class="object-cover object-center">
                                </div>
                            </td>
                            <td class="border border-black px-4 py-2"><?= $berita['judul']; ?></td>
                            <td class="border border-black px-4 py-2"><?= $berita['deskripsi']; ?></td>
                            <td class="border border-black px-4 py-2">
                                <form action="" method="post" class="flex gap-2 justify-center">
                                    <a href="<?= BASEURL; ?>/admin/detailBerita/<?= $berita['slug_judul'] ?>" id="detailUser" class="bg-sky-500 text-xl text-white font-bold p-3 border border-black rounded-lg shadow-lg transition duration-150 ease-in-out hover:scale-105">Detail</a>
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="id" value="#">
                                    <input type="hidden" name="img" value="#">
                                    <button type="submit" id="delete" class="bg-red-500 text-xl text-white font-bold p-3 border border-black rounded-lg shadow-lg transition duration-150 ease-in-out hover:scale-105">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        <?php $no_urut++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>