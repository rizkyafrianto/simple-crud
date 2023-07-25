<?php

// koneksi DBMS
require '../config.php';
require '../functions.php';

// cek apakah submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

   // cek apakah data berhasil ditambahkan atau tidak
   if (tambah($_POST) > 0) {
      echo "
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = '../index.php';
            </script>
        ";
   } else {
      echo "
            <script>
                alert('data gagal ditambahkan!');
                document.location.href = '../index.php';
            </script>
            ";
   }
}
