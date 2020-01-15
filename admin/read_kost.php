<html>
<head>
  <title>Aplikasi CRUD Plus Upload Gambar dengan PHP</title>
</head>
<body>
  <h1>Data Kost</h1>
  <a href="add_kost.php">Tambah Data</a><br><br>
  <table border="1" width="100%">
  <tr>
    <th>nama kost</th>
    <th>foto</th>
    <th>Jenis Kost</th>
    <th>alamat</th>
    <th>detail</th>
    <th>Fasilitas kulkas</th>
    <th>Fasilitas TV</th>
    <th>Fasilitas almari</th>
    <th>Fasilitas kasur</th>
    <th>Fasilitas kamarmandi</th>
    <th>Fasilitas parkir</th>
    <th>Fasilitas cctv</th>
    <th colspan="2">Aksi</th>
  </tr>
  <?php
  // Load file koneksi.php
  include "../koneksi.php";
  
  $query = "SELECT * FROM kost"; // Query untuk menampilkan semua data siswa
  $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
  
  while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
    echo "<tr>";
    echo "<td>".$data['namakost']."</td>";
    echo "<td><img src='../assets/img/".$data['gambar']."' width='100' height='100'></td>";
    echo "<td>".$data['jenis_kost']."</td>";
    echo "<td>".$data['alamat']."</td>";
    echo "<td>".$data['detail']."</td>";
    echo "<td>".$data['kulkas']."</td>";
    echo "<td>".$data['tv']."</td>";
    echo "<td>".$data['almari']."</td>";
    echo "<td>".$data['kasur']."</td>";
    echo "<td>".$data['kamarmandi']."</td>";
    echo "<td>".$data['parkir']."</td>";
    echo "<td>".$data['cctv']."</td>";
    echo "<td><a href='form_editKost.php?id_kost=".$data['id_kost']."'>Ubah</a></td>";
    echo "<td><a href='delete_kost.php?id_kost=".$data['id_kost']."'>Hapus</a></td>";
    echo "</tr>";
  }
  ?>
  </table>
</body>
</html>