<!-- Iklan Gacor -->
<section class="flex flex-col gap-3 w-full lg:max-w-[800px] mx-auto">
    <div class="w-full h-[130px] lg:h-[206px] bg-red-500"></div>
    <div class="w-full h-[130px] lg:h-[206px] bg-red-500"></div>
</section>

<!-- Judul Sedang Hangat -->
<section class="w-full lg:max-w-[800px] mx-auto my-[22px] text-center">
    <h1 class="text-[34px] bold text-black">REKOMENDASI ANIME</h1>
</section>

<!-- Bagian Grid Anime Terbaru -->
<section class="w-full lg:max-w-[1400px] mx-auto my-[22px]">
    <div class="w-full grid gap-3 grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
        <div class="col-span-1 h-[360px] bg-red-500 rounded-lg">
        </div>
        <div class="col-span-1 h-[360px] bg-red-500 rounded-lg">
        </div>
        <div class="col-span-1 h-[360px] bg-red-500 rounded-lg">
        </div>
        <div class="col-span-1 h-[360px] bg-red-500 rounded-lg">
        </div>
        <div class="col-span-1 h-[360px] bg-red-500 rounded-lg">
        </div>
        <div class="col-span-1 h-[360px] bg-red-500 rounded-lg">
        </div>
    </div>
</section>

<!-- Bagian Grid Dengan Side Content -->
<section class="w-full flex flex-col md:flex-row lg:max-w-[1400px] mx-auto my-[22px]">
    <!-- Bagian Grid Images -->
    <div class="w-full md:w-3/5 py-5 text-center">
        <h1 class="mb-[22px] text-[34px] bold text-black">Anime Terbaru</h1>
        <div class="w-full grid gap-3 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            <div class="col-span-1 h-[360px] bg-red-500 rounded-lg">
            </div>
            <div class="col-span-1 h-[360px] bg-red-500 rounded-lg">
            </div>
            <div class="col-span-1 h-[360px] bg-red-500 rounded-lg">
            </div>
            <div class="col-span-1 h-[360px] bg-red-500 rounded-lg">
            </div>
        </div>
    </div>

    <!-- Bagian Images Layout Card -->
    <div class="w-full md:w-2/5 h-[130px] px-[15px] py-5 text-center h-full">
        <h1 class="mb-[22px] text-[34px] bold text-black">Trending</h1>
        <!-- Div Tombol -->
        <div class="h-[50px] flex gap-2 justify-space-between">
            <a href="#" class="flex-1 bg-sky-500 rounded-lg shadow-lg flex justify-center items-center text-xl text-white transition duration-150 ease-in-out hover:scale-125">Harian</a>
            <a href="#" class="flex-1 bg-orange-500 rounded-lg shadow-lg flex justify-center items-center text-xl text-white transition duration-150 ease-in-out hover:scale-125">Mingguan</a>
            <a href="#" class="flex-1 bg-pink-500 rounded-lg shadow-lg flex justify-center items-center text-xl text-white transition duration-150 ease-in-out hover:scale-125">Semua</a>
        </div>

        <!-- Div Card Column -->
         <a href="<?= BASEURL; ?>/member/berita">
             <div class="flex flex-col gap-2 my-[12px] border border-4 border-black rounded-lg shadow-lg transition duration-150 ease-in-out hover:scale-105">
                 <div class="w-full h-[100px] bg-sky-500 py-[12px] px-[15px] flex items-center gap-3">
                     <div class="w-[25px] flex items-center justify-center border border-4 border-orange-500 p-3">
                         <h1 class="text-3xl">1</h1>
                     </div>
                     <div class="h-full w-[90px] bg-pink-500 rounded"></div>
                     <div class="h-full w-full text-start overflow-auto">
                         <h1 class="text-3xl text-black bold">Acumalaka Pride</h1>
                         <h1 class="text-lg text-black">Posted By: Naulan Darmawan</h1>
                     </div>
                 </div>
             </div>
         </a>
    </div>
</section>