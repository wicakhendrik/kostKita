<?php
// Load file koneksi.php
include "../koneksi.php";
// Ambil Data yang Dikirim dari Form
$namakost = $_POST['namakost'];
$jenisKost = $_POST['jenisKost'];
$alamat = $_POST['alamat'];
$detail = $_POST['detail'];
$kulkas = $_POST['kulkas'];
$tv = $_POST['tv'];
$almari = $_POST['almari'];
$kasur = $_POST['kasur'];
$kamarmandi = $_POST['kamarmandi'];
$parkir = $_POST['parkir'];
$cctv = $_POST['cctv'];
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];
  
// Rename nama fotonya dengan menambahkan tanggal dan jam upload
$fotobaru = date('dmYHis').$foto;
// Set path folder tempat menyimpan fotonya
$path = "../assets/img/".$fotobaru;
// Proses upload

if(move_uploaded_file($tmp, $path)){
  $query = "INSERT INTO kost VALUES('','".$namakost."', '".$fotobaru."', '".$jenisKost."', '".$alamat."', '".$detail."', '".$kulkas."', '".$tv."', '".$almari."', '".$kasur."', '".$kamarmandi."', '".$parkir."', '".$cctv."')";
  $sql = mysqli_query($koneksi, $query);
  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    header("location: read_kost.php"); // Redirect ke halaman index.php
  }else{
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='add_kost.php'>Kembali Ke Form</a>";
  }
}else{
  // Jika gambar gagal diupload, Lakukan :
  echo "Maaf, Gambar gagal untuk diupload.";
  echo "<br><a href='add_kost.php'>Kembali Ke Form</a>";
}
?>