<?php

// koneksi dan memanggil functions
require 'config.php';
require 'functions.php';

// pagination configuration
$jumlahDataPerHalaman = 5;
$jumlahData = count(query("SELECT * FROM mahasiswa"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);

// fungsi Ternary untuk menentukan halaman
$pActive = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;

// algoritma untuk menentukan awal data pada page
$awalData = ($jumlahDataPerHalaman * $pActive) - $jumlahDataPerHalaman;

// mengurutkan data dengan pagination
$mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerHalaman");

// tombol cari ditekan
if (isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <title>Admin Page</title>
</head>

<body>
    <div class="container-fluid text-center">

        <nav class="navbar navbar-expand bg-body-tertiary">
            <div class="container-fluid">
                <div class="d-flex">
                    <a class="navbar-brand" href="/"><i class="bi bi-people"></i> Mahasiswa</i></a>

                    <!-- fitur search -->
                    <div class="search-input">
                        <form class="d-flex" action="" method="post">
                            <input class="form-control me-2" type="text" name="keyword" placeholder="Search" aria-label="Search" autocomplete="off">
                            <button class="btn btn-outline-success" type="submit" name="cari">cari</button>
                        </form>
                    </div>
                </div>

                <div class="navbar-collapse justify-content-end">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="add-mahasiswa.php"><i class="bi bi-person-plus"></i>
                                Add</i></a>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link active" aria-current="page" id="btnCetak" onclick="cetak()"><i class="bi bi-printer"></i> Print</button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="row mt-5">
            <div class="col-sm-12 offset-lg-2 col-lg-8 mt-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Foto</th>
                            <th scope="col">NRP</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">setting</th>
                        </tr>
                    </thead>
                    <!-- start nomor row -->
                    <?php $i = 1; ?>

                    <?php foreach ($mahasiswa as $mhs) : ?>
                        <tbody>
                            <tr>
                                <th scope="row"><?= $i ?></th>
                                <td><img class="img rounded-circle" src="assets/images/<?= $mhs["gambar"]; ?>" width="50px"></td>
                                <td><?= $mhs["nrp"]; ?></td>
                                <td><?= $mhs["nama"]; ?></td>
                                <td><?= $mhs["email"]; ?></td>
                                <td><?= $mhs["jurusan"]; ?></td>
                                <td>
                                    <!-- start ubah row -->
                                    <a href="update-mahasiswa.php?id=<?= $mhs["id"]; ?>"><i class="bi bi-pencil-square"></i></a> |
                                    <!-- end ubah row -->

                                    <!-- start hapus row -->
                                    <a href="process/process-delete.php?id=<?= $mhs["id"]; ?>" onclick="return confirm('yakin?');"><i class="text-danger bi bi-x-circle-fill"></i></a>
                                    <!-- end hapus row -->
                                </td>
                            </tr>
                            <?php $i++; ?>
                            <!-- end nomor row -->

                        <?php endforeach; ?>
                        <!-- end fetch data -->
                        </tbody>
                </table>

                <nav aria-label="Page navigation example">
                    <ul class="pagination">

                        <?php if ($pActive > 1) : ?>
                            <li class="page-item">
                                <!-- membuat btn prev pagination -->
                                <a class="page-link" href="?halaman=<?= $pActive - 1; ?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>
                            </li>
                        <?php endif; ?>

                        <!-- menentukan jumlah halaman -->
                        <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                            <li class="page-item">
                                <!-- untuk menentukan halaman active + css -->
                                <?php if ($i == $pActive) : ?>
                                    <a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a>
                                <?php else : ?>
                                    <a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a>
                                <?php endif; ?>
                            </li>
                        <?php endfor; ?>

                        <?php if ($pActive < $jumlahHalaman) : ?>
                            <li class="page-item">
                                <!-- membuat btn next pagination -->
                                <a class="page-link" href="?halaman=<?= $pActive + 1; ?>" aria-label="Next"> <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>

            </div>
        </div>
    </div>

    <script>
        function cetak() {
            window.print();
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>