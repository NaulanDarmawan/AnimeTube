<!-- Main Content -->
<div class="h-screen overflow-y-auto col-span-8 lg:col-span-6 bg-gray-600 p-3 flex flex-col">
    <h1 class="text-2xl text-white font-bold">Update Anime Anda</h1>
    <div class="w-full mt-8">
        <!-- Form -->
        <form id="beritaForm" action="<?= BASEURL; ?>/admin/updateAnime" method="post" enctype="multipart/form-data">
            <input type="hidden" name="current_foto" value="<?= $data['news']['gambar']; ?>">
            <input type="hidden" name="delete_foto" id="deleteFoto" value="false">
            <div class="w-[300px] h-[300px] aspect-video my-[15px] mx-auto mb-[70px] rounded-xl">
                <img id="fotoPreview" src="<?= BASEURL; ?>/assets/images/<?= $data['news']['gambar']; ?>" alt="Foto User" loading="lazy" class="w-full h-full object-cover object-center rounded-xl">
                <div class="flex gap-2 mt-3">
                    <button type="button" id="uploadBtn" class="flex-1 bg-sky-500 p-3 rounded-lg shadow-lg flex justify-center items-center text-xl text-white transition duration-150 ease-in-out hover:scale-125">Upload</button>
                    <button type="button" id="deleteBtn" class="flex-1 bg-red-500 p-3 rounded-lg shadow-lg flex justify-center items-center text-xl text-white transition duration-150 ease-in-out hover:scale-125">Delete</button>
                </div>
                <input type="file" id="fileInput" name="foto" style="display: none;">
            </div>

            <div class="mb-4">
                <label for="nama" class="block text-white text-lg">ID Anime</label>
                <input type="text" id="id" name="id" class="h-12 w-full bg-gray-300 rounded-lg text-xl px-3 py-2 cursor-not-allowed" value="<?= $data['news']['slug_nama']; ?>" readonly>
            </div>

            <div class="mb-4">
                <label for="judul" class="block text-white text-lg">Judul</label>
                <input type="text" id="judul" name="judul" class="h-12 w-full bg-white rounded-lg text-xl px-3 py-2" value="<?= $data['news']['nama']; ?>" required>
            </div>

            <div class="mb-4">
                <label for="deskripsi" class="block text-white text-lg">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" rows="5" cols="5" class="w-full bg-white rounded-lg text-xl px-3 py-2" required><?= $data['news']['sinopsis']; ?></textarea>
            </div>

            <div class="flex justify-end gap-3">
                <a href="<?= BASEURL; ?>/admin/anime/" class="bg-sky-500 p-3 rounded-lg shadow-lg flex justify-center items-center text-xl text-white transition duration-150 ease-in-out hover:scale-105">Batal</a>
                <button type="submit" class="bg-orange-500 p-3 rounded-lg shadow-lg flex justify-center items-center text-xl text-white transition duration-150 ease-in-out hover:scale-105">Edit Data</button>
            </div>
        </form>
    </div>

    <!-- Bagian Daftar Episode -->
    <div>
        <div class="h-[3px] bg-black my-5"></div>
        <h1 class="text-2xl text-white font-bold">Daftar Episode</h1>

        <!-- Form Tambah Episode -->
        <div class="my-5">
            <form id="formTambahEpisode">
                <input type="hidden" name="slug" value="<?= $data['news']['slug_nama']; ?>">
                <div class="mb-4">
                    <label for="link" class="block text-white text-lg">Link Episode</label>
                    <input type="text" id="link" name="link" class="h-12 w-full bg-white rounded-lg text-xl px-3 py-2" required>
                </div>
                <button type="submit" class="bg-sky-500 p-3 rounded-lg shadow-lg flex justify-center items-center text-xl text-white transition duration-150 ease-in-out hover:scale-105">Tambah Episode</button>
            </form>
        </div>

        <!-- Tabel -->
        <div class="w-full overflow-y-auto">
            <table class="w-full table-auto text-center bg-white border border-black border-collapse">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="border border-black px-4 py-2">Nomor</th>
                        <th class="border border-black px-4 py-2">Link</th>
                        <th class="border border-black px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody id="episodeList">
                    <?php $no_urut = 1; ?>
                    <?php foreach ($data['episodes'] as $episode) : ?>
                        <tr>
                            <td class="border border-black px-4 py-2"><?= $no_urut ?></td>
                            <td class="border border-black px-4 py-2"><?= $episode['link']; ?></td>
                            <td class="border border-black px-4 py-2">
                                <div class="flex justify-center gap-2">
                                    <form action="<?= BASEURL; ?>/admin/hapusEpisode/<?= $episode['link'] ?>" method="post" class="delete-form">
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="slug" value="<?= $data['news']['slug_nama']; ?>">
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
    <!-- Bagian Komentar -->
    <div>
        <div class="h-[3px] bg-black my-5"></div>
        <h1 class="text-2xl text-white font-bold">Daftar Komentar</h1>

        <!-- Tabel -->
        <div class="w-full overflow-y-auto">
            <table class="w-full table-auto text-center bg-white border border-black border-collapse">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="border border-black px-4 py-2">Nomor</th>
                        <th class="border border-black px-4 py-2">Nama</th>
                        <th class="border border-black px-4 py-2">Komentar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no_urut = 1; ?>
                    <?php foreach ($data['comments'] as $comment) : ?>
                        <tr>
                            <td class="border border-black px-4 py-2"><?= $no_urut ?></td>
                            <td class="border border-black px-4 py-2"><?= $comment['nama']; ?></td>
                            <td class="border border-black px-4 py-2"><?= $comment['komentar']; ?></td>
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
        $('#uploadBtn').on('click', function() {
            $('#fileInput').click();
        });

        $('#fileInput').on('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#fotoPreview').attr('src', e.target.result);
                }
                reader.readAsDataURL(file);
                $('#deleteFoto').val('false'); // Set delete_foto ke false saat upload gambar baru
            }
        });

        $('#deleteBtn').on('click', function() {
            $('#fotoPreview').attr('src', '<?= BASEURL; ?>/assets/images/anime.jpg');
            $('#fileInput').val(''); // Clear file input
            $('#deleteFoto').val('true'); // Set delete_foto ke true saat menghapus gambar
        });

        $('#formTambahEpisode').on('submit', function(e) {
            e.preventDefault();

            const formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: '<?= BASEURL; ?>/admin/tambahEpisode',
                data: formData,
                success: function(response) {
                    try {
                        const data = JSON.parse(response);
                        if (data.success) {
                            const newEpisode = `<tr>
                        <td class="border border-black px-4 py-2">${data.no_urut}</td>
                        <td class="border border-black px-4 py-2">${data.link}</td>
                        <td class="border border-black px-4 py-2">
                            <div class="flex justify-center gap-2">
                                <form action="<?= BASEURL; ?>/admin/hapusEpisode/${data.link}" method="post" class="delete-form">
                                    <input type="hidden" name="slug" value="<?= $data['news']['slug_nama']; ?>">
                                    <button type="button" class="delete-button bg-red-500 hover:scale-105 text-white font-bold p-3 rounded-lg transition duration-150 ease-in-out">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>`;
                            $('#episodeList').append(newEpisode);
                            $('#formTambahEpisode')[0].reset();
                        } else {
                            alert('Gagal menambahkan episode');
                        }
                    } catch (error) {
                        console.error('Invalid JSON response from server:', response);
                        alert('Terjadi kesalahan saat memproses data. Silakan coba lagi.');
                    }
                }
            });
        });

        $(document).on('click', '.delete-button', function(e) {
            e.preventDefault();

            if (confirm('Apakah Anda yakin ingin menghapus episode ini?')) {
                const form = $(this).closest('form');
                const formData = form.serialize();
                const actionUrl = form.attr('action');

                $.ajax({
                    type: 'POST',
                    url: actionUrl,
                    data: formData,
                    success: function(response) {
                        try {
                            const data = JSON.parse(response);
                            if (data.success) {
                                // Hapus baris episode dari tabel
                                form.closest('tr').remove();
                            } else {
                                alert('Gagal menghapus episode');
                            }
                        } catch (error) {
                            console.error('Invalid JSON response from server:', response);
                            alert('Terjadi kesalahan saat memproses data. Silakan coba lagi.');
                        }
                    }
                });
            }
        });
    });
</script>