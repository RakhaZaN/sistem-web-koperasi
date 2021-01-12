<?php

$host = "localhost";
$username = "root";
$password = "";
$db = "pw_koperasi";

$conn = mysqli_connect($host, $username, $password, $db);   // Menghubungkan ke database pw_mahasiswa

if (!$conn) {
    echo "<h1 class='text-danger'>Koneksi Gagal !!</h1>";
}
