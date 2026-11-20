<?php
// Konfigurasi koneksi database.
// Nilai default = konfigurasi asli (XAMPP/Laragon: localhost, root, tanpa password).
// Di Docker / VPS, nilainya diisi lewat environment variable (lihat docker-compose.yml).
$db_host = getenv('DB_HOST') ?: 'localhost';
$db_user = getenv('DB_USER') ?: 'root';
$db_pass = getenv('DB_PASS') !== false ? getenv('DB_PASS') : '';
$db_name = getenv('DB_NAME') ?: 'koskita3';

// PHP 8.1+ melempar exception untuk error mysqli; aplikasi ini ditulis untuk PHP 5/7
// yang hanya mengembalikan false, jadi kembalikan ke perilaku lama.
mysqli_report(MYSQLI_REPORT_OFF);

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
// echo "berhasil";

//check konection
if (mysqli_connect_errno()){
    echo "Koneksi database gagal : ".mysqli_connect_error();
} else {
    // Aplikasi meng-INSERT '' ke kolom auto-increment (id_kost, id_pemesan).
    // MySQL 5.7+/8 secara default strict dan menolaknya; matikan strict mode untuk sesi ini.
    mysqli_query($koneksi, "SET SESSION sql_mode=''");
    mysqli_set_charset($koneksi, 'utf8mb4');
}
?>
