<!-- Bagian Grid Dengan Side Content -->
<section class="w-full flex flex-col md:flex-row lg:max-w-[1100px] mx-auto my-[22px]">
    <!-- Bagian Grid Images -->
    <div class="order-1 w-full md:w-3/5 text-start">
        <iframe class="w-full aspect-video h-[360px] bg-black" src="https://www.youtube.com/embed/dQw4w9WgXcQ?si=moU4LMtKy13v6W9c" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        <div class="w-full flex flex-col">
            <h1 class="text-5xl text-black bold my-5">Acumalaka Pride</h1>
            <div class="w-fit text-md border border-width-4 border-black text-black bold rounded-lg shadow-lg p-2">KOMEDI</div>
            <div class="h-[250px] overflow-y-auto text-justify my-2 px-2">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magni veritatis tenetur consequuntur porro dolorem suscipit ut sunt autem delectus molestias eius aperiam culpa qui unde eum blanditiis cum tempora, reprehenderit eligendi. Blanditiis, tempora? Delectus hic id et sint voluptate eius culpa ducimus dignissimos molestiae explicabo tempora fuga iure natus dolores laborum, error ipsum debitis, vitae maiores totam commodi consectetur? Molestiae, suscipit officiis exercitationem ab officia nihil ratione reprehenderit rerum quos quae maxime. Dolorum aspernatur labore impedit natus velit? Enim odit magnam, facere id culpa, animi similique amet quam debitis porro rerum. Aliquam blanditiis facere delectus quam distinctio deserunt mollitia perferendis!</div>
        </div>
    </div>

    <!-- Bagian Images Layout Card -->
    <div class="order-2 md:order-3 w-full md:w-2/5 px-[15px] text-start mt-3 md:mt-0 overflow-y-auto">
        <h1 class="mb-[22px] text-[34px] bold text-black">Semua Episode</h1>
        <div class="h-[5px] w-full bg-black"></div>
        <div class="w-full grid grid-cols-4 gap-2 mt-2">
            <a href="#" class="col-span-1 bg-yellow-500 h-[50px] flex justify-center items-center rounded-lg  transition duration-150 ease-in-out hover:scale-105 ">
                <h1 class="text-3xl text-black bold">1</h1>
            </a>
            <a href="#" class="col-span-1 bg-yellow-500 h-[50px] flex justify-center items-center rounded-lg  transition duration-150 ease-in-out hover:scale-105 ">
                <h1 class="text-3xl text-black bold">1</h1>
            </a>
            <a href="#" class="col-span-1 bg-yellow-500 h-[50px] flex justify-center items-center rounded-lg  transition duration-150 ease-in-out hover:scale-105 ">
                <h1 class="text-3xl text-black bold">1</h1>
            </a>
            <a href="#" class="col-span-1 bg-yellow-500 h-[50px] flex justify-center items-center rounded-lg  transition duration-150 ease-in-out hover:scale-105 ">
                <h1 class="text-3xl text-black bold">1</h1>
            </a>
            <a href="#" class="col-span-1 bg-yellow-500 h-[50px] flex justify-center items-center rounded-lg  transition duration-150 ease-in-out hover:scale-105 ">
                <h1 class="text-3xl text-black bold">1</h1>
            </a>
            <a href="#" class="col-span-1 bg-yellow-500 h-[50px] flex justify-center items-center rounded-lg  transition duration-150 ease-in-out hover:scale-105 ">
                <h1 class="text-3xl text-black bold">1</h1>
            </a>
        </div>
        <!-- Bagian Komentar -->
        <div class="w-full text-start">
            <h1 class="mb-[22px] mt-[22px] text-[34px] bold text-black">Kolom Komentar</h1>
            <!-- Kolom Komen -->
            <div class="h-[54px] flex items-center justify-between mb-[30px]">
                <div class="w-[70px] rounded-full mr-2">
                <img src="<?= BASEURL; ?>/assets/images/profile.png" alt="Profile" class="w-full object-cover object-center">
                </div>
                <input type="text" class="h-[54px] w-full rounded text-xl px-3 py-3" required autocomplete="off">
                <button class="h-[54px] px-3 bg-green-500 rounded-lg shadow-lg flex justify-center items-center text-xl text-white transition duration-150 ease-in-out hover:scale-125 ml-2">KIRIM</button>
            </div>
            <!-- List Komentar -->
            <div class="h-[200px] flex items-start justify-between mb-2">
                <div class="w-[70px]    rounded-full mr-2">
                <img src="<?= BASEURL; ?>/assets/images/profile.png" alt="Profile" class="w-full object-cover object-center">
                </div>
                <div class="w-full overflow-y-auto rounded text-sm px-3 flex flex-col self-stretch">
                    <h1 class="text-xl text-black bold underline">Naulan Darmawan</h1>
                    <h1 class="text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat eligendi hic quas. Molestias sit adipisci aliquam quo autem officia pariatur porro eligendi, perferendis, ducimus similique.</h1>
                </div>
            </div>
        </div>
    </div>
</section>