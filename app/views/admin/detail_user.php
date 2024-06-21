<!-- Main Content -->
<div class="col-span-8 lg:col-span-6 bg-gray-600 p-3 flex flex-col">
    <h1 class="text-2xl text-white font-bold">Detail User</h1>
    <div class="w-full mt-8">
        <!-- Form -->
        <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post">
            <input type="hidden" name="id" id="id">
            <div class="mb-4">
                <label for="nama" class="block text-white text-lg">Nama User</label>
                <input type="text" id="id" name="id" class="h-12 w-full bg-gray-300 rounded-lg text-xl px-3 py-2 cursor-not-allowed" value="<?= $data['user']['nama']; ?>" readonly>
            </div>

            <div class="mb-4">
                <label for="role" class="block text-white text-lg">Pilih Role</label>
                <select class="form-select h-12 w-full bg-white text-gray-900 rounded-lg text-xl px-3 py-2" id="role" name="role">
                    <option value="admin">Admin</option>
                    <option value="creator">Creator</option>
                    <option value="member">Member</option>
                </select>
            </div>

            <div class="flex justify-end gap-3">
                <a href="<?= BASEURL; ?>/admin/user/" class="bg-sky-500 p-3 rounded-lg shadow-lg flex justify-center items-center text-xl text-white transition duration-150 ease-in-out hover:scale-105">Batal</a>
                <button type="submit" class="bg-orange-500 p-3 rounded-lg shadow-lg flex justify-center items-center text-xl text-white transition duration-150 ease-in-out hover:scale-105">Edit Data</button>
            </div>
        </form>
    </div>
</div>
