<?php
$koneksi=mysqli_connect("localhost","root","","koskita3");
// echo "berhasil";

//check konection
if (mysqli_connect_errno()){
    echo "Koneksi database gagal : ".mysqli_connect_error();
}
?>