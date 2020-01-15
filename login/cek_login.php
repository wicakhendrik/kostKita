
<?php
//mengaktifkan session php
    session_start();

    //menghubungkan dengan koneksi
    include "../koneksi.php";

    //menaangkap data yang diatangkap dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    //menyeleksi data admin dengan usernam dan password
    $data =  mysqli_query($koneksi,"select * from userkost where username='$username' and password_user='$password'");

    //meghitung jumlah adata yang ditemukan
    $cek = mysqli_num_rows($data);
    echo $cek;


    if ($cek > 0 and $username=='admin'){
        $_SESSION['username']=$username;
        $_SESSION['status'] = "login";
        header('location:../admin/index.php?user='.$username);
    }else if($cek> 0 and $username != 'admin'){
        $_SESSION['username']=$username;
        $_SESSION['status'] = "login";
        header('location:../admin/user.php?user='.$username);
    }
    else{
        header("location:index.php?pesan=gagal");
    }
?>