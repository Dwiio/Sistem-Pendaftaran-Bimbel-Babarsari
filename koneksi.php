<?php
$koneksi = new mysqli("localhost", "root", "", "bimbel_db");

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>
