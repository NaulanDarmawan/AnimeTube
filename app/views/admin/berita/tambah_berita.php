<!-- Main Content -->
<div class="h-screen overflow-y-auto col-span-8 lg:col-span-6 bg-gray-600 p-3 flex flex-col">
    <h1 class="text-2xl text-white font-bold">Tambah Berita</h1>
    <div class="w-full mt-8">
        <form id="beritaForm" action="<?= BASEURL; ?>/admin/tambahBerita" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" id="id">
            <div class="w-[300px] h-[300px] aspect-video my-[15px] mx-auto mb-[70px] rounded-xl">
                <img id="fotoPreview" src="<?= BASEURL; ?>/assets/images/anime.jpg" alt="Foto User" loading="lazy" class="w-full h-full object-cover object-center rounded-xl">
                <div class="flex gap-2 mt-3">
                    <button type="button" id="uploadBtn" class="flex-1 bg-sky-500 p-3 rounded-lg shadow-lg flex justify-center items-center text-xl text-white transition duration-150 ease-in-out hover:scale-125">Upload</button>
                    <button type="button" id="deleteBtn" class="flex-1 bg-red-500 p-3 rounded-lg shadow-lg flex justify-center items-center text-xl text-white transition duration-150 ease-in-out hover:scale-125">Delete</button>
                </div>
                <input type="file" id="fileInput" name="foto" style="display: none;">
            </div>
            <div class="mb-4">
                <label for="judul" class="block text-white text-lg">Judul</label>
                <input type="text" id="judul" name="judul" class="h-12 w-full bg-white rounded-lg text-xl px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label for="deskripsi" class="block text-white text-lg">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" rows="5" cols="5" class="w-full bg-white rounded-lg text-xl px-3 py-2" required></textarea>
            </div>
            <div class="flex justify-end gap-3">
                <a href="<?= BASEURL; ?>/admin/berita/" class="bg-sky-500 p-3 rounded-lg shadow-lg flex justify-center items-center text-xl text-white transition duration-150 ease-in-out hover:scale-105">Batal</a>
                <button type="submit" class="bg-orange-500 p-3 rounded-lg shadow-lg flex justify-center items-center text-xl text-white transition duration-150 ease-in-out hover:scale-105">Tambah Data</button>
            </div>
        </form>
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
        }
    });

    $('#deleteBtn').on('click', function() {
        $('#fotoPreview').attr('src', '<?= BASEURL; ?>/assets/images/anime.jpg');
        $('#fileInput').val(''); // Clear file input
    });
});
</script>