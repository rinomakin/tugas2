<?php
// Menyertakan koneksi database
include './config/koneksi.php';

// Proses penyimpanan data mata kuliah
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kode_mk = $_POST['kode_mk'];
    $nama_mk = $_POST['nama_mk'];
    $sks = $_POST['sks'];
    $semester = $_POST['semester'];

    $sql = "INSERT INTO tb_matakuliah (kode_mk, nama_mk, sks, semester)
            VALUES ('$kode_mk', '$nama_mk', '$sks', '$semester')";

    if ($conn->query($sql) === TRUE) {
        echo "Data mata kuliah berhasil disimpan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    header("Location: mk.php");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tugas2</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.phps">Rdm</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
           
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#dosen" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Data Dosen
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="dosen" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="tambahdosen.php">Tambah Data</a>
                                    <a class="nav-link" href="dosen.php">Lihat Data</a>
                                </nav>
                            </div>


                            <!-- mahasiswa -->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#mahasiswa" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Data Mahasiswa
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="mahasiswa" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="tambahmhs.php">Tambah Data</a>
                                    <a class="nav-link" href="mhs.php">Lihat Data</a>
                                </nav>
                            </div>

                            <!-- matakuliah -->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#mk" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Data Matakuliah
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="mk" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="tambahmk.php">Tambah Data</a>
                                    <a class="nav-link" href="mk.php">Lihat Data</a>
                                </nav>
                            </div>
        


                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        Rino Makin
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
        <h1>Tambah Mata Kuliah</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <div class="form-group">
                <label for="kode_mk">Kode Mata Kuliah:</label>
                <input type="text" class="form-control" id="kode_mk" name="kode_mk" required>
            </div>
            <div class="form-group">
                <label for="nama_mk">Nama Mata Kuliah:</label>
                <input type="text" class="form-control" id="nama_mk" name="nama_mk" required>
            </div>
            <div class="form-group">
                <label for="sks">SKS:</label>
                <input type="number" class="form-control" id="sks" name="sks" required>
            </div>
            <div class="form-group">
                <label for="semester">Semester:</label>
                <input type="number" class="form-control" id="semester" name="semester" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        </form>
                    </div>
                </main>

            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>




