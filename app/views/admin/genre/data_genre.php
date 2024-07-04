<!-- Main Content -->
<div class="col-span-8 lg:col-span-6 bg-gray-600 p-3 flex flex-col">
    <h1 class="text-2xl text-white bold">Daftar Genre Anime</h1>
    <!-- Grid Parents Untuk Card -->
    <div class="w-full mt-[50px] overflow-x-auto">
        <!-- Card Print & Insert Data -->
        <div class="w-full flex justify-between px-3">
            <div id="printReport" class="w-[250px] bg-purple-500 text-xl border border-black border-2 text-white bold p-3 rounded-lg cursor-pointer">
                Cetak Laporan
            </div>
            <a href="#">
                <div class="w-[250px] bg-sky-500 text-xl text-center border border-black border-2 text-white bold p-3 rounded-lg transition duration-150 ease-in-out hover:scale-105">
                    Tambah genre
                </div>
            </a>
        </div>

        <!-- Search Bar -->
        <form action="<?= BASEURL; ?>/admin/cariGenre" method="post" id="filter" class="p-3 grid grid-cols-5 gap-2 mt-[30px]">
            <input type="text" name="keyword" autofocus autocomplete="off" placeholder="tulis nama genre yang ingin dicari" class="h-[54px] col-span-5 lg:col-span-3 rounded text-xl px-3 py-3">
            <button type="submit" name="cari" class="bg-red-500 col-span-5 lg:col-span-2 text-xl text-white font-bold p-3 border border-black rounded-lg shadow-lg transition duration-150 ease-in-out hover:scale-105">Cari Data</button>
        </form>

        <!-- Tabel -->
        <div class="w-full overflow-y-auto">
            <table class="w-full table-auto text-center bg-white border border-black border-collapse">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="border border-black px-4 py-2">nomor</th>
                        <th class="border border-black px-4 py-2">nama</th>
                        <th class="border border-black px-4 py-2">aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no_urut = 1; ?>
                    <?php foreach ($data['genres'] as $genre) : ?>
                        <tr>
                            <td class="border border-black px-4 py-2"><?= $no_urut ?></td>
                            <td class="border border-black px-4 py-2"><?= $genre['nama']; ?></td>
                            <td class="border border-black px-4 py-2">
                                <div class="flex justify-center gap-2">
                                    <a href="<?= BASEURL; ?>/admin/detailGenre/<?= $genre['id'] ?>" class="bg-orange-500 text-xl text-white font-bold p-3 border border-black rounded-lg shadow-lg transition duration-150 ease-in-out hover:scale-105">Update</a>
                                    <form action="<?= BASEURL; ?>/admin/hapusGenre/<?= $genre['id'] ?>" method="post" class="delete-form">
                                        <input type="hidden" name="action" value="delete">
                                        <button type="button" class="delete-button bg-red-500 text-xl text-white font-bold p-3 border border-black rounded-lg shadow-lg transition duration-150 ease-in-out hover:scale-105">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php $no_urut++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Tabel untuk Cetak PDF -->
        <div id="printTable" class="hidden">
            <table class="w-full table-auto text-center bg-white border border-black border-collapse">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="border border-black px-4 py-2">nomor</th>
                        <th class="border border-black px-4 py-2">nama</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no_urut = 1; ?>
                    <?php foreach ($data['genres'] as $genre) : ?>
                        <tr>
                            <td class="border border-black px-4 py-2"><?= $no_urut ?></td>
                            <td class="border border-black px-4 py-2"><?= $genre['nama']; ?></td>
                        </tr>
                        <?php $no_urut++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    document.getElementById('printReport').addEventListener('click', function() {
        var element = document.getElementById('printTable');
        element.classList.remove('hidden');
        var opt = {
            margin: 1,
            filename: 'Laporan_Genre.pdf',
            image: {
                type: 'jpeg',
                quality: 0.98
            },
            html2canvas: {
                scale: 2
            },
            jsPDF: {
                unit: 'in',
                format: 'letter',
                orientation: 'portrait'
            }
        };
        html2pdf().from(element).set(opt).save().then(function() {
            element.classList.add('hidden');
        });
    });

    $(document).ready(function() {
        // Handle click on delete button
        $('.delete-button').click(function() {
            var form = $(this).closest('.delete-form');
            if (confirm('Anda yakin ingin menghapus genre ini?')) {
                form.submit();
            }
        });
    });
</script>