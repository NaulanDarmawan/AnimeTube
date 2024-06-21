<section class="flex flex-col gap-3 w-full lg:max-w-[1200px] mx-auto">
    <h1 class="w-fit lg:w-full lg:text-center mx-auto text-3xl p-3 text-black bold bg-pink-500 border border-4 border-black rounded-lg shadow-lg">INFORMASI AKUN</h1>
    <div class="w-full grid grid-cols-5">
        <!-- Profil Picture -->
        <div class="col-span-5 h-[250px] md:col-span-2 flex flex-col p-3 items-center">
            <div class="h-[112px] w-[112px] bg-red-500 rounded-full">
            <img src="<?= BASEURL; ?>/assets/images/profile.png" alt="Profile" class="w-full object-cover object-center">
            </div>
            <h1 class="text-3xl">Foto Profil</h1>
            <h1 class="text-sm">JPG / PNG Maks 5mb</h1>
            <div class="flex gap-2 mt-3">
                <a href="#" class="flex-1 bg-sky-500 p-3 rounded-lg shadow-lg flex justify-center items-center text-xl text-white transition duration-150 ease-in-out hover:scale-125">Upload</a>
                <a href="#" class="flex-1 bg-red-500 p-3 rounded-lg shadow-lg flex justify-center items-center text-xl text-white transition duration-150 ease-in-out hover:scale-125">Delete</a>
            </div>
        </div>
        <!-- Form -->
        <div class="col-span-5 md:col-span-3 bg-purple-200 p-3">
            <h1 class="text-3xl text-black bold">Informasi Personal</h1>
            <div class="grid grid-cols-2 gap-3">
                <div class="col-span-2 md:col-span-1 flex flex-col mt-2">
                    <label for="id" class="mb-3">User - ID</label>
                    <input type="text" id="id" name="id" class="h-[54px] w-full bg-gray-300 rounded text-xl px-3 py-3 cursor-not-allowed" readonly>
                </div>
                <div class="col-span-2 md:col-span-1 flex flex-col mt-2">
                    <label for="username" class="mb-3">Username</label>
                    <input type="text" id="username" name="name" class="h-[54px] w-full rounded text-xl px-3 py-3" required autocomplete="off">
                </div>
                <div class="col-span-2 md:col-span-1 flex flex-col mt-2">
                    <label for="email" class="mb-3">Email</label>
                    <input type="email" id="email" name="email" class="h-[54px] w-full rounded text-xl px-3 py-3" required autocomplete="off">
                </div>
                <div class="col-span-2 md:col-span-1 flex flex-col mt-2">
                    <label for="password" class="mb-3">Password</label>
                    <input type="password" id="password" name="password" class="h-[54px] w-full rounded text-xl px-3 py-3" required autocomplete="off">
                </div>
                <button type="submit" class="col-span-1 md:col-span-2 mt-3 md:mt-0 bg-sky-500 p-3 rounded-lg shadow-lg flex justify-center items-center text-xl text-white transition duration-150 ease-in-out hover:scale-105">Simpan Data</button>
            </div>
        </div>
    </div>
</section>