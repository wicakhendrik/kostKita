<?php
echo "aploud";
include "../koneksi.php";

$nama = $_POST['nama'];
$jenisKelamin = $_POST['jenisKelamin'];
$handphone = $_POST['handphone'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$query="INSERT INTO userkost(nama,id_jk,telp,email,username,password_user) VALUES('$nama','$jenisKelamin','$handphone','$email','$username','$password')";
$sql = mysqli_query($koneksi, $query);
header('location:../login/index.php');
?>