<?php
session_start(); // Mulai sesi

include("koneksi.php");

// Periksa apakah tombol "simpan" pada form edit ditekan
if (isset($_POST['simpan'])) {
    // Ambil data dari form
    $id = $_POST['barang_id'];
    $nama = $_POST['nama'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];
    
    // Buat query untuk memperbarui data siswa
    $sql = "UPDATE barang SET
            nama='$nama',
            stok='$stok',
            harga='$harga'
            WHERE barang_id=$id";

    $query = mysqli_query($db, $sql);
    // Simpan pesan notifikasi dalam sesi berdasarkan hasil query
    if ($query) {
        $_SESSION['notifikasi'] = "Data barang berhasil diperbarui!";
    } else {
        $_SESSION['notifikasi'] = "Data barang gagal diperbarui!";
    }

    // Alihkan ke halaman index.php
    header('Location: index.php');
} else {
    // Jika akses langsung tanpa form, tampilkan pesan error
    die("Akses ditolak...");
}
?>