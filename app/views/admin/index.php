<div class="w-full h-screen">
    <div class="h-[80px] lg:h-[100px] p-3 bg-yellow-300 flex justify-center items-center">
        <h1 class="text-xl lg:text-5xl font-bold text-black"><?= $data['judul']; ?></h1>
    </div>

    <!-- Button Container -->
    <div class="w-full gap-3 flex my-5 lg:p-3 justify-between">
        <button class="btn bg-sky-500 text-white text-lg lg:text-xl">Tambah User</button>
        <button class="btn bg-sky-500 text-white text-lg lg:text-xl">Print Laporan</button>
    </div>

    <!-- Tabel Kita -->
    <div class="w-full p-3">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nomor
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Foto
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            1
                        </td>
                        <td class="px-6 py-4">
                            <img src="<?= BASEURL; ?>/assets/images/anime.jpg" alt="" width="150px">
                        </td>
                        <td class="px-6 py-4">
                            Naulan Darmawan
                        </td>
                        <td class="px-6 py-4">
                            naulan@gmail.com
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex justify-center items-center h-full gap-3">
                                <a href="#" class="btn bg-sky-500 font-medium text-white bold hover:underline">Aksi</a>
                                <a href="#" class="btn bg-orange-500 font-medium text-white bold hover:underline">Edit</a>
                                <a href="#" class="btn bg-red-500 font-medium text-white bold hover:underline">Hapus</a>
                            </div>
                        </td>
                    </tr>
                    <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            1
                        </td>
                        <td class="px-6 py-4">
                            <img src="<?= BASEURL; ?>/assets/images/anime.jpg" alt="" width="150px">
                        </td>
                        <td class="px-6 py-4">
                            Naulan Darmawan
                        </td>
                        <td class="px-6 py-4">
                            naulan@gmail.com
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex justify-center items-center h-full gap-3">
                                <a href="#" class="btn bg-sky-500 font-medium text-white bold hover:underline">Aksi</a>
                                <a href="#" class="btn bg-orange-500 font-medium text-white bold hover:underline">Edit</a>
                                <a href="#" class="btn bg-red-500 font-medium text-white bold hover:underline">Hapus</a>
                            </div>
                        </td>
                    </tr>
                    <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            1
                        </td>
                        <td class="px-6 py-4">
                            <img src="<?= BASEURL; ?>/assets/images/anime.jpg" alt="" width="150px">
                        </td>
                        <td class="px-6 py-4">
                            Naulan Darmawan
                        </td>
                        <td class="px-6 py-4">
                            naulan@gmail.com
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex justify-center items-center h-full gap-3">
                                <a href="#" class="btn bg-sky-500 font-medium text-white bold hover:underline">Aksi</a>
                                <a href="#" class="btn bg-orange-500 font-medium text-white bold hover:underline">Edit</a>
                                <a href="#" class="btn bg-red-500 font-medium text-white bold hover:underline">Hapus</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
