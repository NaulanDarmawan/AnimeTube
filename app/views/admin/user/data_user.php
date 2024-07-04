<!-- Main Content -->
<div class="col-span-8 lg:col-span-6 bg-gray-600 p-3 flex flex-col">
    <h1 class="text-2xl text-white bold">Daftar User Aplikasi</h1>
    <!-- Grid Parents Untuk Card -->
    <div class="w-full mt-[50px] overflow-x-auto">
        <a href="#">
            <div class="w-[250px] bg-purple-500 text-xl border border-black border-2 text-white bold p-3 rounded-lg">
                Cetak Laporan
            </div>
        </a>
        <!-- Search Bar -->
        <form action="<?= BASEURL; ?>/admin/cariUser" method="post" id="filter" class="p-3 grid grid-cols-5 gap-2 mt-[30px]">
            <input type="text" name="keyword" autofocus autocomplete="off" placeholder="Cari User Berdasarkan Nama" class="h-[54px] col-span-5 lg:col-span-3 rounded text-xl px-3 py-3">
            <button type="submit" name="cari" class="bg-red-500 col-span-5 lg:col-span-2 text-xl text-white font-bold p-3 border border-black rounded-lg shadow-lg transition duration-150 ease-in-out hover:scale-105">Cari Data</button>
        </form>

        <!-- Tabel -->
        <div class="w-full overflow-y-auto">
            <table class="w-full table-auto text-center bg-white border border-black border-collapse">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="border border-black px-4 py-2">nomor</th>
                        <th class="border border-black px-4 py-2">foto</th>
                        <th class="border border-black px-4 py-2">nama</th>
                        <th class="border border-black px-4 py-2">email</th>
                        <th class="border border-black px-4 py-2">role</th>
                        <th class="border border-black px-4 py-2">aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no_urut = 1; ?>
                    <?php foreach ($data['users'] as $user) : ?>
                        <tr>
                            <td class="border border-black px-4 py-2"><?= $no_urut ?></td>
                            <td class="border border-black px-4 py-2 rounded">
                                <img src="<?= BASEURL; ?>/assets/images/<?= $user['image']; ?>" alt="Foto User" loading="lazy" class="w-12 h-12 object-cover object-center">
                            </td>
                            <td class="border border-black px-4 py-2"><?= $user['nama']; ?></td>
                            <td class="border border-black px-4 py-2"><?= $user['email']; ?></td>
                            <td class="border border-black px-4 py-2"><?= $user['role']; ?></td>
                            <td class="border border-black px-4 py-2">
                                <form action="" method="post" class="flex gap-2 justify-center">
                                    <a href="<?= BASEURL; ?>/admin/detailUser/<?= $user['slug_nama'] ?>" id="detailUser" class="bg-orange-500 text-xl text-white font-bold p-3 border border-black rounded-lg shadow-lg transition duration-150 ease-in-out hover:scale-105">Update</a>
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