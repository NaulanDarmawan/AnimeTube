<!-- Main Content -->
<div class="col-span-8 lg:col-span-6 bg-gray-600 p-3 flex flex-col">
    <h1 class="text-2xl text-white bold">Daftar User Aplikasi</h1>
    <!-- Grid Parents Untuk Card -->
    <div class="w-full mt-[50px] overflow-x-auto">
        <!-- Tabel -->
        <a href="#" class="bg-purple-500 text-xl border border-black border-2 text-white bold p-3 rounded-lg">Print Laporan</a>
        <form action="<?= BASEURL; ?>/admin/cariUser" method="post" id="filter" class="mt-[50px]">
            <input type="text" name="keyword" size="40" autofocus autocomplete="off" placeholder="tulis nama yang ingin dicari">
            <button type="submit" name="cari" class="not-printed">Cari Data</button>
        </form>
        <br>

        <table class="table-auto bg-white border border-black border-collapse">
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
                        <td class="border border-black px-4 py-2">
                            <img src="<?= BASEURL; ?>/assets/images/<?= $user['image']; ?>" alt="Foto User" loading="lazy" class="w-12 h-12 object-cover object-center">
                        </td>
                        <td class="border border-black px-4 py-2"><?= $user['nama']; ?></td>
                        <td class="border border-black px-4 py-2"><?= $user['email']; ?></td>
                        <td class="border border-black px-4 py-2"><?= $user['role']; ?></td>
                        <td class="border border-black px-4 py-2">
                            <form action="" method="post" class="flex gap-2">
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