<?php
// Load file koneksi.php
include "../koneksi.php";
$id_kost = $_GET['id_kost'];
$jk = $_GET['jk'];
$user= $_GET['user'];
// Ambil Data yang Dikirim dari Form
$namakost = $_POST['nama'];
$alamat = $_POST['alamat'];
$detail = $_POST['detail'];
$kulkas = $_POST['kulkas'];
$tv = $_POST['tv'];
$almari = $_POST['almari'];
$kasur = $_POST['kasur'];
$kamarmandi = $_POST['kamarmandi'];
$parkir = $_POST['parkir'];
$cctv = $_POST['cctv'];
$wifi = $_POST['wifi'];
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];

// Cek apakah user ingin mengubah fotonya atau tidak
if(isset($_POST['ubah_foto'])){ // Jika user menceklis checkbox yang ada di form ubah, lakukan :
  // Ambil data foto yang dipilih dari form
  $foto = $_FILES['foto']['name'];
  $tmp = $_FILES['foto']['tmp_name'];
  
  // Rename nama fotonya dengan menambahkan tanggal dan jam upload
  $fotobaru = date('dmYHis').$foto;
  
  // Set path folder tempat menyimpan fotonya
  $path = "../assets/img/".$fotobaru;
  // Proses upload
  if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
    // Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
    $query = "SELECT * FROM kost WHERE id_kost='".$id_kost."'";
    $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
    $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql
    // Cek apakah file foto sebelumnya ada di folder images
    if(is_file("../assets/img/".$data['foto'])) // Jika foto ada
      unlink("../assets/img/".$data['foto']); // Hapus file foto sebelumnya yang ada di folder images
    
    // Proses ubah data ke Database
    $query = "UPDATE kost SET namakost='".$namakost."', gambar='".$fotobaru."', alamat='".$alamat."', detail='".$detail."', kulkas='".$kulkas."', tv='".$tv."', almari='".$almari."', kasur='".$kasur."', kamarmandi='".$kamarmandi."', parkir='".$parkir."', cctv='".$cctv."', wifi='".$wifi."' WHERE id_kost='".$id_kost."'";
    $sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query
    if($sql){ // Cek jika proses simpan ke database sukses atau tidak
      // Jika Sukses, Lakukan :
      if ($user !='admin'){
        // header("location: datakost_user.php?jk='.$jk.'&user=".$user);
        header("location: datakost_user.php?jk='.$jk.'&user=".$user);
      }else{
        header("location: datakost_lk.php?jk=".$jk); // Redirect ke halaman index.php
      }
      
    }else{
      // Jika Gagal, Lakukan :
      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
      echo "<br><a href='form_editKost.php'>Kembali Ke Form</a>";
    }
  }else{
    // Jika gambar gagal diupload, Lakukan :
    echo "Maaf, Gambar gagal untuk diupload.";
    echo "<br><a href='form_editKost.php'>Kembali Ke Form</a>";
  }
}else{ // Jika user tidak menceklis checkbox yang ada di form ubah, lakukan :
  // Proses ubah data ke Database
  $query = "UPDATE kost SET namakost='".$namakost."', alamat='".$alamat."', detail='".$detail."', kulkas='".$kulkas."', tv='".$tv."', almari='".$almari."', kasur='".$kasur."', kamarmandi='".$kamarmandi."', parkir='".$parkir."', cctv='".$cctv."', wifi='".$wifi."' WHERE id_kost='".$id_kost."'";
  $sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query
  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    if ($user !='admin'){
      header("location: datakost_user.php?user=$user&jk=".$jk);
      // header("location: datakost_user.php?jk='.$jk.'&user=".$user);
    }else{
      header("location: datakost_lk.php?user=$user&jk=".$jk); // Redirect ke halaman index.php
    }
    // header("location: datakost_lk.php?jk=".$jk); // Redirect ke halaman index.php
  }else{
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='form_editKost.php'>Kembali Ke Form</a>";
  }
}
?>