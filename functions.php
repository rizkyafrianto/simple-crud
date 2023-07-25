<?php
// connect to DBMS
require 'config.php';

// start function query ke file index.php 
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
// end function query


// start function create ke row
function tambah($data)
{
    global $conn;

    // ambil data dari tiap elemen dalam form
    $nama = htmlspecialchars($data["nama"]);
    $nrp = htmlspecialchars($data["nrp"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    // start logic upload image
    $gambar = upload();
    if (!$gambar) {
        return false;
    }
    // end upload image

    // query insert data
    $query = "INSERT INTO mahasiswa
                VALUES
            ('', '$nama', '$nrp', '$email', '$jurusan', '$gambar')
            ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
// end function create row

// start function upload image
function upload()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah ada gambar yang diupload
    if ($error === 4) {
        echo "<script>
                alert('Pilih gambar dahulu');
            </script>";
        return false;
    }

    // cek apakah yang diupload gambar atau bukan
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('Yang anda upload bukanlah gambar!');
            </script>";
        return false;
    }

    // cek ukuran gambar
    if ($ukuranFile > 1000000) {
        echo "<script>
                alert('Gambar Terlalu besar!');
            </script>";
        return false;
    }

    // jika gambar lolos pengecekan, siap upload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../assets/images/' . $namaFileBaru);

    return $namaFileBaru;
}
// end function upload image


// start function delete row
function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM MAHASISWA WHERE id = $id");
    return mysqli_affected_rows($conn);
}
// end function delete row


// start funtion update row
function ubah($data)
{
    global $conn;

    // ambil data dari tiap elemen dalam form
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $nrp = htmlspecialchars($data["nrp"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambarLama = ($data["gambarLama"]);

    // cek apakah user pilih gambar lama atau baru
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    // query update data
    $query = "UPDATE mahasiswa SET
                nama = '$nama', 
                nrp = '$nrp', 
                email ='$email',
                jurusan = '$jurusan',
                gambar = '$gambar'
                WHERE id = $id
                ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
// end funtion update row 



// start function searching
function cari($keyword)
{
    $query = "SELECT * FROM mahasiswa
                WHERE
                nama LIKE '%$keyword%' OR
                nrp LIKE '%$keyword%' OR
                jurusan LIKE '%$keyword%'
                ";

    return query($query);
}
// end function searching