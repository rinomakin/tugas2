
<?php
// Menyertakan koneksi database
include './config/koneksi.php';

// Ambil data dosen berdasarkan ID
$id = $_GET['id'];
$sql = "SELECT foto FROM tb_dosen WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

// Hapus data dosen
$sql = "DELETE FROM tb_dosen WHERE id = $id";
if ($conn->query($sql) === TRUE) {
    // Hapus foto jika ada
    if (!empty($row['foto'])) {
        unlink("./uploads/" . $row['foto']);
    }
    echo "Data dosen berhasil dihapus.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Redirect ke halaman daftar dosen
header("Location: dosen.php");
exit;
?>