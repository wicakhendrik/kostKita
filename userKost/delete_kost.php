<?php
// Load file koneksi.php
include "../koneksi.php";
$id_read_lk=$_GET['read_lk'];
$id_read_pr=$_GET['read_pr'];
// Ambil data NIS yang dikirim oleh read_kost.php melalui URL
$id_kost = $_GET['id_kost'];
// Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
$query = "SELECT * FROM kost WHERE id_kost='".$id_kost."'";
$sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
$data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql
// Cek apakah file fotonya ada di folder images
if(is_file("../assets/img/".$data['gambar'])) // Jika foto ada
  unlink("../assets/img/".$data['gambar']); // Hapus foto yang telah diupload dari folder images
// Query untuk menghapus data siswa berdasarkan NIS yang dikirim
$query2 = "DELETE FROM kost WHERE id_kost='".$id_kost."'";
$sql2 = mysqli_query($koneksi, $query2); // Eksekusi/Jalankan query dari variabel $query
if($sql2){ // Cek jika proses simpan ke database sukses atau tidak
  // Jika Sukses, Lakukan :
  // header("location: read_kost.php"); // Redirect ke halaman index.php
  if ($id_read_lk==1){
    header("location: datakost_lk.php");
  }
  elseif($id_read_pr==2){
    header("location: datakost_pr.php");
  }
}else{
  // Jika Gagal, Lakukan :
  echo "Data gagal dihapus. <a href='read_kost.php'>Kembali</a>";
}
?>