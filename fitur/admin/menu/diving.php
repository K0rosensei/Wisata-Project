<?php
// include '../../config/session.php';
// if (!empty($username)) {
//     include '../../config/readaccount.php';
//     include '../../config/userCRUD.php';
include '../../../config/divingCRUD.php';
// include '../../config/wisataCRUD.php';
// list($dataUser, $totalUser) = readAllUser();
// } else {
//     header("Location: ../../index.php");
//     exit();
// }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Diving - BahoiTourism</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="../admin.php">Admin BahoiTourism</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
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
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="../admin.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Management
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="home.php" id="homestay">Home Stay</a>
                                <a class="nav-link" href="diving.php">Diving</a>
                                <a class="nav-link" href="wisata.php">Wisata</a>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    ADMIN
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main id="main">
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Diving</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Diving</li>
                    </ol>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            User Data
                        </div>
                        <div class="d-grid d-md-flex justify-content-md-end mt-2">
                            <button type="button" class="btn btn-outline-primary me-md-4 px-5" id="tambah"
                                data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false"
                                aria-controls="collapseExample">Tambah</button>
                        </div>
                        <div class="card-body">
                            <!-- modal button -->
                            <div class="collapse mb-4" id="collapseExample">
                                <div class="card card-body">
                                    <form id="form">
                                        <div class="row g-3">
                                            <div class="col">
                                                <label for="nameHomestay" class="form-label">Nama Homestay</label>
                                                <input name="nama" type="text" class="form-control" id="nameHomestay"
                                                    placeholder="garuda">
                                            </div>
                                            <div class="col">
                                                <label for="hargaHomestay" class="form-label">Harga</label>
                                                <input name="harga" type="number" class="form-control"
                                                    id="hargaHomestay" placeholder="20000">
                                            </div>
                                        </div>
                                        <div class="row g-3 mt-2">
                                            <div class="col">
                                                <label for="foto1" class="form-label">Foto 1</label>
                                                <input type="file" name="foto" accept="image/" class="form-control"
                                                    id="foto1">
                                            </div>
                                            <div class="col">
                                                <label for="foto2" class="form-label">Foto 2</label>
                                                <input type="file" name="foto2" accept="image/" class="form-control"
                                                    id="foto2">
                                            </div>
                                            <div class="col">
                                                <label for="foto3" class="form-label">Foto 3</label>
                                                <input type="file" name="foto3" accept="image/" class="form-control"
                                                    id="foto3">
                                            </div>
                                        </div>
                                        <div class="row g-3 mt-2">
                                            <div class="col">
                                                <label for="pentik" class="form-label">Pentik</label>
                                                <textarea class="form-control" name="pentik" id="pentik"
                                                    rows="2"></textarea>
                                            </div>
                                            <div class="col">
                                                <label for="snk" class="form-label">SnK</label>
                                                <textarea class="form-control" name="snk" id="snk" rows="2"></textarea>
                                            </div>
                                        </div>
                                        <div class="row g-3 mt-2">
                                            <div class="col">
                                                <label for="inpo" class="form-label">Info Tambahan</label>
                                                <textarea class="form-control" name="info_tambahan" id="inpo"
                                                    rows="2"></textarea>
                                            </div>
                                            <div class="col">
                                                <label for="fasilitas" class="form-label">Fasilitas</label>
                                                <textarea class="form-control" name="faslitias" id="fasilitas"
                                                    rows="2"></textarea>
                                            </div>
                                        </div>
                                        <div class="d-grid mt-2 col-6 mx-auto">
                                            <button class="btn btn-primary" type="submit" id="submitBtn">Tambah
                                                Homestay</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- end modal button -->

                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Alat</th>
                                        <th>Harga</th>
                                        <th>Foto</th>
                                        <th>Stok</th>
                                        <th>Keterangan</th>
                                        <th>
                                            <div class="text-center">Opsi</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Alat</th>
                                        <th>Harga</th>
                                        <th>Foto</th>
                                        <th>Stok</th>
                                        <th>Keterangan</th>
                                        <th>
                                            <div class="text-center">Opsi</div>
                                        </th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    while ($divingData = mysqli_fetch_assoc($queryDiving)) {
                                    ?>
                                    <tr>
                                        <td><?= $divingData['Alat'] ?></td>
                                        <td><?= $divingData['Harga'] ?></td>
                                        <td><?= $divingData['Image'] ?></td>
                                        <td><?= $divingData['Jumlah'] ?></td>
                                        <td><?= $divingData['Keterangan'] ?></td>
                                        <td>
                                            <div class="text-center">
                                                <button type="button" class="btn btn-outline-success" id="edit"
                                                    edit-id="<?= $divingData['Id'] ?>" onclick="editHs()">Edit</button>
                                                <button type="button" class="btn btn-outline-danger" id="delete"
                                                    delete-id="<?= $divingData['Id'] ?>"
                                                    onclick="deleteHs()">Hapus</button>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="../js/scripts.js"></script>
    <script src="../js/opsiHs.js"></script>
    <script src="../js/add-homestay.js"></script>
    <script src="js/button.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="../js/datatables-simple-demo.js"></script>
</body>

</html>