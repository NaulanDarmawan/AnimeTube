<div class="h-full mt-0 w-full flex justify-center items-center">
    <div class="bg-gray-300 w-[450px] h-[550px] p-[32px] rounded-xl shadow-xl">
        <div class="h-[48px] text-center">
            <h1 class="text-xl text-black">AnimeTube</h1>
        </div>
        <div class="h-[48px] text-center">
            <h1 class="text-3xl text-black bold">Log In</h1>
        </div>
        <!-- Form Login -->
            <div class="h-[300px]">
                <form action="<?= BASEURL; ?>/user/validateUser" method="post">
                    <div class="flex flex-col mt-2">
                        <label for="email" class="mb-3">Email</label>
                        <input type="email" id="email" name="email" class="h-[54px] w-full rounded text-xl px-3 py-3" required autocomplete="off">
                    </div>
                    <div class="flex flex-col mt-2">
                        <label for="password" class="mb-3">Password</label>
                        <input type="password" id="password" name="password" class="h-[54px] w-full rounded text-xl px-3 py-3" required autocomplete="off">
                    </div>
                    <button type="submit" class="w-full mt-[50px] bg-sky-500 p-3 rounded-lg shadow-lg flex justify-center items-center text-xl text-white transition duration-150 ease-in-out hover:scale-105">Login Akun</button>
                </form>
                <h1 class="text-sm text-center mt-3">Belum Punya Akun ? <a href="<?= BASEURL; ?>/user/register" class="text-orange-500">Daftar Sekarang</a></h1>
        </div>
    </div>
</div>