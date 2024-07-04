<div class="h-full mt-0 w-full flex justify-center items-center">
    <div class="bg-gray-300 w-[450px] h-[550px] p-[32px] rounded-xl shadow-xl">
        <div class="h-[48px] text-center">
            <h1 class="text-xl text-black">AnimeTube</h1>
        </div>
        <div class="h-[48px] text-center">
            <h1 class="text-3xl text-black bold">Daftar Akun</h1>
        </div>
        <!-- Form Login -->
            <div class="h-[300px]">
                <form action="<?= BASEURL; ?>/user/createUser" method="post">
                    <div class="flex flex-col mt-2">
                        <label for="username" class="mb-3">Username</label>
                        <input type="text" id="username" name="username" class="h-[54px] w-full rounded text-xl px-3 py-3" required autocomplete="off">
                    </div>
                    <div class="flex flex-col mt-2">
                        <label for="email" class="mb-3">Email</label>
                        <input type="email" id="email" name="email" class="h-[54px] w-full rounded text-xl px-3 py-3" required autocomplete="off">
                    </div>
                    <div class="flex flex-col mt-2">
                        <label for="password" class="mb-3">Password</label>
                        <input type="password" id="password" name="password" class="h-[54px] w-full rounded text-xl px-3 py-3" required autocomplete="off">
                    </div>
                    <button type="submit" class="w-full mt-3 bg-sky-500 p-3 rounded-lg shadow-lg flex justify-center items-center text-xl text-white transition duration-150 ease-in-out hover:scale-105">Daftar Sekarang</button>
                </form>
                <h1 class="text-sm text-center mt-3">Sudah Punya Akun ? <a href="<?= BASEURL; ?>/user/index" class="text-orange-500">Login Sekarang</a></h1>
        </div>
    </div>
</div>