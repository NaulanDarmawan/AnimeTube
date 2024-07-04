<section class="flex flex-col gap-3 w-full lg:max-w-[1200px] mx-auto">
    <h1 class="w-fit lg:w-full lg:text-center mx-auto text-3xl p-3 text-black font-bold bg-pink-500 border-4 border-black rounded-lg shadow-lg">INFORMASI AKUN</h1>
    <div class="w-full grid grid-cols-5 gap-3">
        <!-- Profil Picture -->
        <form id="userInfoForm" action="<?= BASEURL; ?>/user/updateData" method="post" enctype="multipart/form-data" class="col-span-5 md:col-span-2 flex flex-col p-3 items-center">
            <div class="h-[112px] w-[112px] bg-red-500 rounded-full relative">
                <input type="hidden" name="current_foto" value="<?= $_SESSION['user']['image']; ?>">
                <input type="hidden" name="delete_foto" id="deleteFoto" value="false">
                <img id="fotoPreview" src="<?= BASEURL; ?>/assets/images/<?= $_SESSION['user']['image']; ?>" alt="Profile" class="w-full h-full object-cover object-center rounded-full">
                <input type="file" id="fileInput" name="image" style="display: none;">
            </div>
            <h1 class="text-3xl">Foto Profil</h1>
            <h1 class="text-sm">JPG / PNG Maks 5mb</h1>
            <div class="flex gap-2 mt-3">
                <button type="button" id="uploadBtn" class="flex-1 bg-sky-500 p-3 rounded-lg shadow-lg flex justify-center items-center text-xl text-white transition duration-150 ease-in-out hover:scale-125">Upload</button>
                <button type="button" id="deleteBtn" class="flex-1 bg-red-500 p-3 rounded-lg shadow-lg flex justify-center items-center text-xl text-white transition duration-150 ease-in-out hover:scale-125">Delete</button>
            </div>
            <!-- Form -->
            <div class="col-span-5 md:col-span-3 bg-purple-200 p-3">
                <h1 class="text-3xl text-black font-bold">Informasi Personal</h1>
                <div class="grid grid-cols-2 gap-3">
                    <div class="col-span-2 md:col-span-1 flex flex-col mt-2">
                        <label for="id" class="mb-3">User - ID</label>
                        <input type="text" id="id" name="id" class="h-[54px] w-full bg-gray-300 rounded text-xl px-3 py-3 cursor-not-allowed" readonly value="<?= $_SESSION['user']['slug_nama']; ?>">
                    </div>
                    <div class="col-span-2 md:col-span-1 flex flex-col mt-2">
                        <label for="status" class="mb-3">Status</label>
                        <input type="text" id="status" name="status" class="h-[54px] w-full bg-gray-300 rounded text-xl px-3 py-3 cursor-not-allowed" readonly autocomplete="off" value="<?= $_SESSION['user']['role']; ?>">
                    </div>
                    <div class="col-span-2 md:col-span-1 flex flex-col mt-2">
                        <label for="username" class="mb-3">Username</label>
                        <input type="text" id="username" name="username" class="h-[54px] w-full rounded text-xl px-3 py-3" required autocomplete="off" value="<?= $_SESSION['user']['nama']; ?>">
                    </div>
                    <div class="col-span-2 md:col-span-1 flex flex-col mt-2">
                        <label for="email" class="mb-3">Email</label>
                        <input type="email" id="email" name="email" class="h-[54px] w-full rounded text-xl px-3 py-3" required autocomplete="off" value="<?= $_SESSION['user']['email']; ?>">
                    </div>
                    <button type="submit" class="col-span-2 bg-sky-500 p-3 rounded-lg shadow-lg flex justify-center items-center text-xl text-white transition duration-150 ease-in-out hover:scale-105">Simpan Data</button>
                </div>
            </div>
    </div>
</section>

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

                const formData = new FormData();
                formData.append('image', file);
                formData.append('update_image', true);

                $.ajax({
                    type: 'POST',
                    url: '<?= BASEURL; ?>/user/updateData',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response); // Periksa respons di konsol
                        if (response.success) {
                            alert('Foto profil berhasil diperbarui');
                        } else {
                            alert('Gagal mengunggah foto profil');
                        }
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat mengunggah foto profil');
                    }
                });

            }
        });

        $('#deleteBtn').on('click', function() {
            $('#fotoPreview').attr('src', '<?= BASEURL; ?>/assets/images/profile.png');
            $('#fileInput').val(''); // Clear file input

            $.ajax({
                type: 'POST',
                url: '<?= BASEURL; ?>/user/updateData',
                data: {
                    delete_foto: true
                },
                success: function(response) {
                    const res = JSON.parse(response);
                    if (res.success) {
                        alert('Foto profil berhasil dihapus');
                    } else {
                        alert('Gagal menghapus foto profil');
                    }
                },
                error: function() {
                    alert('Terjadi kesalahan saat menghapus foto profil');
                }
            });
        });

        $('#userInfoForm').on('submit', function(event) {
            event.preventDefault();

            const formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    const res = JSON.parse(response);
                    if (res.success) {
                        alert('Data berhasil diperbarui');
                        window.location.href = '<?= BASEURL; ?>/user/detail';
                    } else {
                        alert('Gagal menyimpan data');
                    }
                },
                error: function() {
                    alert('Terjadi kesalahan saat menyimpan data');
                }
            });
        });
    });
</script>