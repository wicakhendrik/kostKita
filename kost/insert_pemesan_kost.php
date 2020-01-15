<?php
include "../koneksi.php";
$id_kost=$_GET['id_kos'];
@$login=$_GET['login'];
@$id= $_GET['id'];

echo $login;
echo $id;

$nama_pemesan= $_POST['nama'];
$alamat= $_POST['alamat'];
$telephon= $_POST['telephon'];
$catatan= $_POST['catatan'];
$query="INSERT INTO pemesan(id_pemesan,id_kost,nama_pemesan,alamat,telephon,catatan) VALUES('','$id_kost','$nama_pemesan','$alamat','$telephon','$catatan')";
$sql=mysqli_query($koneksi,$query);

if ($login == true) {
    echo '<script type="text/javascript">
        alert("Proses pemesanan berhasil");
        window.location="../kost/index.php?id_kost='.$id_kost.'&login='.$login.'&id='.$id.'"
    </script>';
}
else {
    echo '<script type="text/javascript">
        alert("Proses pemesanan berhasil");
        window.location="../kost/index.php?id_kost='.$id_kost.'"
    </script>';
}

?>