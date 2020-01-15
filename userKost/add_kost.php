<html>
<head>
  <title>crud</title>
</head>
<body>
  <h1>Tambah Data kost</h1>
  <form method="post" action="insert_kost.php" enctype="multipart/form-data">
  <table cellpadding="8">
  <tr>
    <td>Nama kost</td>
    <td><input type="text" name="namakost"></td>
  </tr>
  <tr>
  <td>Foto</td>
    <td><input type="file" name="foto" id="foto"></td>
  </tr>
  <tr>
      <td>Jenis Kost</td>
      <td>
        <select name="jenisKost" class="JK">
            <?php
                include "../koneksi.php";
                $query="select * from jeniskost";
                $sql=mysqli_query($koneksi, $query);
                while($data = mysqli_fetch_array($sql)){
                echo $data['id_jenis'];
                echo "<option value='".$data['id_jenis']."'>".$data['ket_jenis']."</option>";
                }
            ?>
                                
        </select>
      </td>
  </tr>
  <tr>
    <td>alamat</td>
    <td><input type="text" name="alamat"></td>
  </tr>
  <tr>
    <td>detail</td>
    <td><input type="text" name="detail"></td>
  </tr>
  <tr>
      <td>FASILITAS :</td>
  </tr>
  <tr>
      <td>kulkas</td>
      <td><input type="text" name="kulkas" placeholder="masukkan keterangan"></td></td>
  </tr>
  <tr>
      <td>TV</td>
      <td><input type="text" name="tv" placeholder="masukkan keterangan"></td></td>
  </tr>
  <tr>
      <td>almari</td>
      <td><input type="text" name="almari" placeholder="masukkan keterangan"></td></td>
  </tr>
  <tr>
      <td>kasur</td>
      <td><input type="text" name="kasur" placeholder="masukkan keterangan"></td></td>
  </tr>
  <tr>
      <td>kamar mandi</td>
      <td><input type="text" name="kamarmandi" placeholder="masukkan keterangan"></td></td>
  </tr>
  <tr>
      <td>parkir</td>
      <td><input type="text" name="parkir" placeholder="masukkan keterangan"></td></td>
  </tr>
  <tr>
      <td>CCTV</td>
      <td><input type="text" name="cctv" placeholder="masukkan keterangan"></td></td>
  </tr>
  </table>
  
  <hr>
  <input type="submit" value="Simpan">
  <a href="read_kost.php"><input type="button" value="Batal"></a>
  </form>
</body>
</html>