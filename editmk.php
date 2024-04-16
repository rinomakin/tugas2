<?php
// Menyertakan koneksi database
include './config/koneksi.php';

// Ambil data mata kuliah berdasarkan kode mata kuliah
$kode_mk = $_GET['kode_mk'];
$sql = "SELECT * FROM tb_matakuliah WHERE kode_mk = '$kode_mk'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

// Proses update data mata kuliah
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kode_mk = $_POST['kode_mk'];
    $nama_mk = $_POST['nama_mk'];
    $sks = $_POST['sks'];
    $semester = $_POST['semester'];

    $sql = "UPDATE tb_matakuliah SET nama_mk = '$nama_mk', sks = '$sks', semester = '$semester' WHERE kode_mk = '$kode_mk'";

    if ($conn->query($sql) === TRUE) {
        echo "Data mata kuliah berhasil diupdate.";
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
            <a class="navbar-brand ps-3" href="index.php">Rdm</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
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
                    <h1>Edit Mata Kuliah</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?kode_mk=" . $kode_mk);?>" method="post">
            <div class="form-group">
                <label for="kode_mk">Kode Mata Kuliah:</label>
                <input type="text" class="form-control" id="kode_mk" name="kode_mk" value="<?php echo $row['kode_mk']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="nama_mk">Nama Mata Kuliah:</label>
                <input type="text" class="form-control" id="nama_mk" name="nama_mk" value="<?php echo $row['nama_mk']; ?>" required>
            </div>
            <div class="form-group">
                <label for="sks">SKS:</label>
                <input type="number" class="form-control" id="sks" name="sks" value="<?php echo $row['sks']; ?>" required>
            </div>
            <div class="form-group">
                <label for="semester">Semester:</label>
                <input type="number" class="form-control" id="semester" name="semester" value="<?php echo $row['semester']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
                        </div>
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




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mata Kuliah</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <div class="container mt-5">
       
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>