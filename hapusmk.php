
<?php
// Menyertakan koneksi database
include './config/koneksi.php';

// Ambil data mata kuliah berdasarkan kode mata kuliah
$kode_mk = $_GET['kode_mk'];

// Hapus data mata kuliah
$sql = "DELETE FROM tb_matakuliah WHERE kode_mk = '$kode_mk'";
if ($conn->query($sql) === TRUE) {
    echo "Data mata kuliah berhasil dihapus.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Redirect ke halaman daftar mata kuliah
header("Location: mk.php");
exit;
?>