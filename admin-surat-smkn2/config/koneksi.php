<?php
// Koneksi Database MySQL
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_surat";

$conn = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

$base_url = "http://localhost/admin-surat-smkn2/admin-surat-smkn2-adib_aldric_michel/admin-surat-smkn2/";
?>
