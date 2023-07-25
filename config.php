<?php
// connect to DBMS
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

if (!$conn) {
   echo "DB tidak terkoneksi";
}
