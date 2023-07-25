<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <title>ADD Mahasiswa</title>
</head>

<body>

    <div class="container mt-5">
        <h2>Tambah Mahasiswa</h2>
        <form action="process/process-add.php" method="post" enctype="multipart/form-data">
            <div class="form-group my-1">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" name="nama" id="nama" required>
            </div>
            <div class="form-group my-1">
                <label for="nrp">Nrp:</label>
                <input type="text" class="form-control" name="nrp" id="nrp" required>
            </div>
            <div class="form-group my-1">
                <label for="email">E-mail:</label>
                <input type="text" class="form-control" name="email" id="email" required>
            </div>
            <div class="form-group my-1">
                <label for="jurusan">jurusan:</label>
                <input type="text" class="form-control" name="jurusan" id="jurusan" required>
            </div>
            <div class="form-group my-1">
                <label for="gambar">Gambar:</label>
                <input type="file" class="form-control" name="gambar" id="gambar">
            </div>
            <!-- Tambahkan input lainnya sesuai data yang ingin di-update -->
            <button type="submit" name="submit" class="btn btn-primary my-4">Tambah Data</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>


</body>

</html>