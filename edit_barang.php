<?php
// Termasuk file konfigurasi
include("koneksi.php");

// Mengambil ID siswa dari parameter URL
$id = $_GET['id'];

// Mengambil data siswa dari database berdasarkan ID
$query = $db->query("SELECT * FROM barang WHERE barang_id = '$id'");
$siswa = $query->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Barang</title>
</head>
<body>
    <h3>Edit Data Barang</h3>
    <form action="proses_edit.php" method="POST">
        <!-- Menyimpan ID untuk proses selanjutnya -->
        <input type="hidden" name="barang_id" value="<?php echo $siswa['barang_id']; ?>">
        <table border="0">
            <tr>
                <td>Nama Barang</td>
                <td>
                    <input type="text" name="nama" value="<?php echo $siswa['nama']; ?>" required>
                </td>
            </tr>
            <tr>
                <td>Stok</td>
                <td>
                    <input type="text" name="stok" value="<?php echo $siswa['stok']; ?>" required>
                </td>
            </tr>
            
            <tr>
                <td>Harga</td>
                <td>
                    <input type="text" name="harga" value="<?php echo $siswa['harga']; ?>">
                </td>
            </tr>
            
        </table>
        <button type="submit" name="simpan">Simpan</button>
    </form>
</body>
</html>