<html>
<head>
  <title>Aplikasi CRUD dengan PHP</title>
</head>
<body>
  <h1>Ubah Data Siswa</h1>
  
  <?php
  // Load file koneksi.php
  include "../koneksi.php";
  
  // Ambil data NIS yang dikirim oleh read_kost.php melalui URL
  $id_kost = $_GET['id_kost'];
  
  // Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
  $query = "SELECT * FROM kost WHERE id_kost='".$id_kost."'";
  $sql = mysqli_query($koneksi, $query);  // Eksekusi/Jalankan query dari variabel $query
  $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql
  ?>
  
  <form method="post" action="edit_kost.php?id_kost=<?php echo  $id_kost; ?>" enctype="multipart/form-data">
  <table cellpadding="8">
  <tr>
    <td>Nama kost</td>
    <td><input type="text" name="nama" value="<?php echo $data['namakost']; ?>"></td>
  </tr>
  <tr>
    <td>Foto</td>
    <td>
      <input type="checkbox" name="foto" value="true"> Ceklis jika ingin mengubah foto<br>
      <input type="file" name="foto">
    </td>
  </tr>
  <tr>
    <td>Alamat</td>
    <td><input type="text" name="alamat" value="<?php echo $data['alamat']; ?>"></td>
  </tr>
  <tr>
    <td>Detail</td>
    <td><input type="text" name="detail" value="<?php echo $data['detail']; ?>"></td>
  </tr>
  <tr>
    <td>Kulkas</td>
    <td><input type="text" name="kulkas" value="<?php echo $data['kulkas']; ?>"></td>
  </tr>
  <tr>
    <td>TV</td>
    <td><input type="text" name="tv" value="<?php echo $data['tv']; ?>"></td>
  </tr>
  <tr>
    <td>Almari</td>
    <td><input type="text" name="almari" value="<?php echo $data['almari']; ?>"></td>
  </tr>
  <tr>
    <td>Kasur</td>
    <td><input type="text" name="kasur" value="<?php echo $data['kasur']; ?>"></td>
  </tr>
  <tr>
    <td>Kamar Mandi</td>
    <td><input type="text" name="kamarmandi" value="<?php echo $data['kamarmandi']; ?>"></td>
  </tr>
  <tr>
    <td>Parkir</td>
    <td><input type="text" name="parkir" value="<?php echo $data['parkir']; ?>"></td>
  </tr>
  <tr>
    <td>CCTV</td>
    <td><input type="text" name="cctv" value="<?php echo $data['cctv']; ?>"></td>
  </tr>
  </table>
  
  <hr>
  <input type="submit" value="Ubah">
  <a href="read_kost.php"><input type="button" value="Batal"></a>
  </form>
</body>
</html>