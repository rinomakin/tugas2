
<?php
// Menyertakan koneksi database
include './config/koneksi.php';

// Ambil data mahasiswa berdasarkan ID
$id = $_GET['id'];
$sql = "SELECT foto FROM tb_mhs WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

// Hapus data mahasiswa
$sql = "DELETE FROM tb_mhs WHERE id = $id";
if ($conn->query($sql) === TRUE) {
    // Hapus foto jika ada
    if (!empty($row['foto'])) {
        unlink("./uploads/" . $row['foto']);
    }
    echo "Data mahasiswa berhasil dihapus.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Redirect ke halaman daftar mahasiswa
header("Location: mhs.php");
exit;
?>