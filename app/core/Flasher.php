<?php

class Flasher extends Controller
{

    public static function setFlash($pesan, $aksi, $tipe)
    {
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe, // tipe bisa berisi 'success' atau 'error'
        ];
    }

    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            $tipe = htmlspecialchars($_SESSION['flash']['tipe'], ENT_QUOTES, 'UTF-8');
            $pesan = htmlspecialchars($_SESSION['flash']['pesan'], ENT_QUOTES, 'UTF-8');
            $aksi = htmlspecialchars($_SESSION['flash']['aksi'], ENT_QUOTES, 'UTF-8');

            // Hapus session flash setelah ditampilkan
            unset($_SESSION['flash']);

            // Tampilkan notifikasi menggunakan jQuery dengan gaya-gaya Tailwind langsung
            echo "
            <script>
                $(document).ready(function() {
                    // Buat elemen notifikasi
                    var alertDiv = $('<div>').addClass('fixed top-4 right-4 z-50 px-4 py-2 rounded');

                    // Tambahkan kelas sesuai dengan tipe notifikasi
                    if ('$tipe' === 'success') {
                        alertDiv.addClass('bg-green-500 text-white');
                    } else if ('$tipe' === 'error') {
                        alertDiv.addClass('bg-red-500 text-white');
                    }

                    // Tambahkan konten notifikasi
                    alertDiv.text('$tipe, Data $pesan Berhasil $aksi');

                    // Tambahkan elemen notifikasi ke dalam body
                    $('body').append(alertDiv);

                    // Hilangkan notifikasi setelah beberapa detik
                    setTimeout(function() {
                        alertDiv.remove();
                    }, 3000); // Hilangkan notifikasi setelah 3 detik
                });
            </script>
            ";
        }
    }
}
