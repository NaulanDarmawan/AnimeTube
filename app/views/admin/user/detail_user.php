<!-- Main Content -->
<div class="col-span-8 lg:col-span-6 bg-gray-600 p-3 flex flex-col">
    <h1 class="text-2xl text-white font-bold">Detail User</h1>
    <div class="w-full mt-8">
        <!-- Form -->
        <form action="<?= BASEURL; ?>/admin/updateUser" method="post">
            <div class="mb-4">
                <label for="nama" class="block text-white text-lg">Nama User</label>
                <input type="text" id="nama" name="nama" class="h-12 w-full bg-gray-300 rounded-lg text-xl px-3 py-2 cursor-not-allowed" value="<?= $data['user']['nama']; ?>" readonly>
            </div>

            <div class="mb-4">
                <label for="role" class="block text-white text-lg">Role</label>
                        <select name="role" id="role" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            <option value="">Pilih Role</option>
                            <option value="Admin" <?php if ($data['user']['role'] == "Admin") echo "selected"; ?>>Admin</option>
                            <option value="Creator" <?php if ($data['user']['role'] == "Creator") echo "selected"; ?>>Creator</option>
                            <option value="User" <?php if ($data['user']['role'] == "User") echo "selected"; ?>>User</option>
                        </select>
            </div>

            <div class="flex justify-end gap-3">
                <a href="<?= BASEURL; ?>/admin/user/" class="bg-sky-500 p-3 rounded-lg shadow-lg flex justify-center items-center text-xl text-white transition duration-150 ease-in-out hover:scale-105">Batal</a>
                <button type="submit" class="bg-orange-500 p-3 rounded-lg shadow-lg flex justify-center items-center text-xl text-white transition duration-150 ease-in-out hover:scale-105">Edit Data</button>
            </div>
        </form>
    </div>
</div>
