<!-- Main Content -->
<div class="col-span-8 lg:col-span-6 bg-gray-600 p-3 flex flex-col">
    <h1 class="text-2xl text-white font-bold">Daftar Berita Anda</h1>
    <!-- Grid Parents Untuk Card -->
    <div class="w-full mt-8 overflow-x-auto">
        <!-- Tombol Aksi -->
        <div class="flex justify-between items-center mb-4">
            <a href="<?= BASEURL; ?>/admin/halamanTambahBerita">
                <div class="w-[250px] bg-sky-500 text-xl text-center border border-black border-2 text-white font-bold p-3 rounded-lg transition duration-150 ease-in-out hover:scale-105">
                    Tambah Berita
                </div>
            </a>
            <a href="#">
                <div class="w-[250px] bg-purple-500 text-xl text-center border border-black border-2 text-white font-bold p-3 rounded-lg transition duration-150 ease-in-out hover:scale-105">
                    Berita Kreator
                </div>
            </a>
        </div>

        <!-- Search Bar -->
        <form action="<?= BASEURL; ?>/admin/cariBerita" method="post" id="filter" class="p-3 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-2 mt-4">
            <input type="text" name="keyword" autofocus autocomplete="off" placeholder="Cari Berdasarkan Judul Atau Deskripsi" class="h-[54px] col-span-5 lg:col-span-3 rounded text-xl px-3 py-3">
            <button type="submit" name="cari" class="bg-red-500 col-span-5 lg:col-span-2 text-xl text-white font-bold p-3 border border-black rounded-lg shadow-lg transition duration-150 ease-in-out hover:scale-105">Cari Data</button>
        </form>

        <!-- Tabel -->
        <div class="w-full overflow-x-auto">
            <table class="w-full table-auto text-center bg-white border border-black border-collapse">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="border border-black px-4 py-2">Nomor</th>
                        <th class="border border-black px-4 py-2">Berita</th>
                        <th class="border border-black px-4 py-2">Judul</th>
                        <th class="border border-black px-4 py-2">Deskripsi</th>
                        <th class="border border-black px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no_urut = 1; ?>
                    <?php foreach ($data['news'] as $berita) : ?>
                        <tr>
                            <td class="border border-black px-4 py-2"><?= $no_urut ?></td>
                            <td class="border border-black px-4 py-2">
                                <div class="w-[100px] h-[60px] overflow-hidden rounded-lg">
                                    <img src="<?= BASEURL; ?>/assets/images/<?= $berita['foto']; ?>" alt="Foto User" class="object-cover object-center h-full w-full">
                                </div>
                            </td>
                            <td class="border border-black px-4 py-2"><?= $berita['judul']; ?></td>
                            <td class="border border-black px-4 py-2"><?= $berita['deskripsi']; ?></td>
                            <td class="border border-black px-4 py-2">
                                <div class="flex justify-center gap-2">
                                    <a href="<?= BASEURL; ?>/admin/detailBerita/<?= $berita['slug_judul'] ?>" class="bg-sky-500 hover:scale-105 text-white font-bold p-3 rounded-lg transition duration-150 ease-in-out">Detail</a>
                                    <form action="<?= BASEURL; ?>/admin/hapusBerita/<?= $berita['slug_judul'] ?>" method="post" class="delete-form">
                                        <input type="hidden" name="action" value="delete">
                                        <button type="button" class="delete-button bg-red-500 hover:scale-105 text-white font-bold p-3 rounded-lg transition duration-150 ease-in-out">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php $no_urut++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Handle click on delete button
        $('.delete-button').click(function() {
            var form = $(this).closest('.delete-form');
            if (confirm('Anda yakin ingin menghapus berita ini?')) {
                form.submit();
            }
        });
    });
</script>