<!-- Bagian Grid Dengan Side Content -->
<section class="w-full flex flex-col md:flex-row lg:max-w-[1100px] mx-auto my-[22px]">
    <!-- Bagian Grid Images -->
    <div class="order-1 w-full md:w-3/5 text-start">
        <iframe id="animeIframe" class="w-full aspect-video h-[360px] bg-black" src="https://www.youtube.com/embed/dQw4w9WgXcQ?si=moU4LMtKy13v6W9c" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        <div class="w-full flex flex-col">
            <h1 class="text-5xl text-black bold my-5"><?= $data['anime']['nama']; ?></h1>
            <div class="w-fit text-md border border-width-4 border-black text-black bold rounded-lg shadow-lg p-2"><?= implode(', ', $data['genre']); ?></div>
            <div class="h-[250px] overflow-y-auto text-justify my-2 px-2"><?= $data['anime']['sinopsis']; ?></div>
        </div>
    </div>

    <!-- Bagian Images Layout Card -->
    <div class="order-2 md:order-3 w-full md:w-2/5 px-[15px] text-start mt-3 md:mt-0 overflow-y-auto">
        <h1 class="mb-[22px] text-[34px] bold text-black">Semua Episode</h1>
        <div class="h-[5px] w-full bg-black"></div>
        <div class="w-full grid grid-cols-4 gap-2 mt-2">
            <?php $no_urut = 1; ?>
            <?php foreach ($data['episodes'] as $episode) : ?>
                <button class="episode-btn col-span-1 bg-yellow-500 h-[50px] flex justify-center items-center rounded-lg transition duration-150 ease-in-out hover:scale-105" data-link="<?= $episode['link']; ?>">
                    <h1 class="text-3xl text-black bold"><?= $no_urut; ?></h1>
                </button>
                <?php $no_urut++; ?>
            <?php endforeach; ?>
        </div>
        <!-- Bagian Komentar -->
        <div class="w-full text-start">
            <h1 class="mb-[22px] mt-[22px] text-[34px] bold text-black">Kolom Komentar</h1>
            <!-- Kolom Komen -->
            <div class="h-[54px] flex items-center justify-between mb-[30px]">
                <div class="w-[70px] rounded-full mr-2">
                    <img src="<?= BASEURL; ?>/assets/images/<?= $_SESSION['user']['image']; ?>" alt="Profile" class="w-full object-cover object-center">
                </div>
                <input type="text" id="komentarInput" name="komentar" class="h-[54px] w-full rounded text-xl px-3 py-3" required autocomplete="off">
                <button id="kirimKomentar" class="h-[54px] px-3 bg-green-500 rounded-lg shadow-lg flex justify-center items-center text-xl text-white transition duration-150 ease-in-out hover:scale-125 ml-2">KIRIM</button>
            </div>
            <!-- List Komentar -->
            <div id="commentsList">
                <?php foreach ($data['comments'] as $comment) : ?>
                    <div class="h-[100px] flex items-start justify-between">
                        <div class="w-[70px] rounded-full mr-2">
                            <img src="<?= BASEURL; ?>/assets/images/<?= $comment['image']; ?>" alt="Profile" class="w-full object-cover object-center">
                        </div>
                        <div class="w-full overflow-y-auto rounded text-sm px-3 flex flex-col self-stretch">
                            <h1 class="text-xl text-black bold underline"><?= $comment['nama']; ?></h1>
                            <h1 class="text-sm"><?= $comment['komentar']; ?></h1>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- Tambahkan ini di dalam tag <script> -->
<script>
    $(document).ready(function() {
        $('.episode-btn').click(function() {
            var newSrc = $(this).data('link');
            $('#animeIframe').attr('src', newSrc);
        });

        $('#kirimKomentar').click(function() {
            var komentar = $('#komentarInput').val();
            var slug = '<?= $data['anime']['slug_nama']; ?>';

            $.ajax({
                url: '<?= BASEURL; ?>/member/addKomentar/' + slug,
                type: 'POST',
                data: {
                    komentar: komentar
                },
                success: function(response) {
                    try {
                        var result = JSON.parse(response);
                        if (result.success) {
                            var comments = result.comments;
                            var commentsHtml = '';
                            for (var i = 0; i < comments.length; i++) {
                                commentsHtml += '<div class="h-[100px] flex items-start justify-between">' +
                                    '<div class="w-[70px] rounded-full mr-2">' +
                                    '<img src="<?= BASEURL; ?>/assets/images/' + comments[i].image + '" alt="Profile" class="w-full object-cover object-center">' +
                                    '</div>' +
                                    '<div class="w-full overflow-y-auto rounded text-sm px-3 flex flex-col self-stretch">' +
                                    '<h1 class="text-xl text-black bold underline">' + comments[i].nama + '</h1>' +
                                    '<h1 class="text-sm">' + comments[i].komentar + '</h1>' +
                                    '</div>' +
                                    '</div>';
                            }
                            $('#commentsList').html(commentsHtml);
                            $('#komentarInput').val(''); // Bersihkan input komentar
                        } else {
                            alert('Gagal menambahkan komentar');
                        }
                    } catch (e) {
                        console.error('Parsing error:', e, response);
                        alert('Terjadi kesalahan. Silakan coba lagi.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX error:', error);
                    alert('Terjadi kesalahan pada server. Silakan coba lagi.');
                }
            });
        });
    });
</script>