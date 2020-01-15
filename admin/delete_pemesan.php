<?php
// include "../koneksi.php";
// $jk=$_GET['jk'];
// $user=$_GET['user'];

// $id_kost = $_GET['id_kost'];
// $query = "SELECT * FROM kost WHERE id_kost='".$id_kost."'";
// $sql = mysqli_query($koneksi, $query);
// $data = mysqli_fetch_array($sql);

// if(is_file("../assets/img/".$data['gambar']))
//   unlink("../assets/img/".$data['gambar']);

// $query2 = "DELETE FROM kost WHERE id_kost='".$id_kost."'";
// $sql2 = mysqli_query($koneksi, $query2);
// if($sql2){
  
//   if ($user != 'admin'){
//     header("location: datakost_user.php?jk=$jk&user=".$user);
//   }else{
//     header("location: datakost_lk.php?user-$user&jk=".$jk);
//   }
// }else{
//   echo '<script type="text/javascript">
//   alert("data tidak dapat dihapus, kost masih dalam pemesanan pelanggan");
//   history.go(-1);
//   </script>';
//   echo "Data gagal dihapus. <a href='read_kost.php'>Kembali</a>";
// }

include "../koneksi.php";
// $jk=$_GET['jk'];
$user=$_GET['user'];
$id_kost = $_GET['id_kost'];

$query = "DELETE FROM pemesan WHERE id_kost='".$id_kost."'";
$sql = mysqli_query($koneksi,$query);

if ($sql){
  header("location: datapemesan.php?user=$user");
}

?>