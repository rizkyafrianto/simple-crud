<?php

// koneksi DBMS
require 'config.php';
require 'functions.php';

// ambil data pada url
$id = $_GET["id"];

// query data mahasiswa(mengambil dari function.php)
$mhs = query("SELECT * FROM MAHASISWA WHERE id = $id")[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <title>Update</title>
</head>

<body>
    <div class="container mt-5">
        <h2>Form Update Mahasiswa</h2>
        <form action="process/process-update.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
            <input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>">
            <div class="form-group my-1">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" name="nama" id="nama" value="<?= $mhs["nama"]; ?>">
            </div>
            <div class="form-group my-1">
                <label for="nrp">Nrp:</label>
                <input type="text" class="form-control" name="nrp" id="nrp" value="<?= $mhs["nrp"]; ?>">
            </div>
            <div class="form-group my-1">
                <label for="email">E-mail:</label>
                <input type="text" class="form-control" name="email" id="email" value="<?= $mhs["email"]; ?>">
            </div>
            <div class="form-group my-1">
                <label for="jurusan">jurusan:</label>
                <input type="text" class="form-control" name="jurusan" id="jurusan" value="<?= $mhs["jurusan"]; ?>">
            </div>
            <div class="form-group my-1">
                <label for="gambar">Gambar:</label> <br>
                <img class="img rounded-circle mx-5 my-3" src="assets/images/<?= $mhs["gambar"]; ?>" width="50"> <br>
                <input type="file" class="form-control" name="gambar" id="gambar">
            </div>
            <!-- Tambahkan input lainnya sesuai data yang ingin di-update -->
            <button type="submit" name="submit" class="btn btn-primary my-4">Simpan Perubahan</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>

</html>