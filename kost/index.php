<!DOCTYPE html>
<html>
<?php
    @$login = $_GET['login'];
    if ($login == 'true') {
        @$user=$_GET['id']; 
    }
    $id_kos = $_GET['id_kost']
?>

<?php
    include "../koneksi.php";
    $query="select * from kost where id_kost = $id_kos";
    $sql=mysqli_query($koneksi, $query);
    @$data = mysqli_fetch_array($sql);
    $query2="select * from userkost u, kost k where u.username = k.pemilik and k.id_kost = $id_kos";
    $sql2=mysqli_query($koneksi, $query2);
    @$data2 = mysqli_fetch_array($sql2);
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Product - Brand</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="../assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="../assets/css/smoothproducts.css">
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-warning clean-navbar">
    <?php 
        if ($login == 'true') {
            echo '<div class="container"><a class="navbar-brand text-white logo" href="../index.php?login=true&id='.$user.'">KostKita<br></a>';}
        else {
            echo '<div class="container"><a class="navbar-brand text-white logo" href="../index.php">KostKita<br></a>';}
        ?>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                <?php 
                    if ($login == 'true') {
                        echo '<li class="nav-item" role="presentation"><a class="nav-link text-white active" href="../index.php?login=true&id='.$user.'">Home</a></li>';
                        echo '<li class="nav-item" role="presentation"><a class="nav-link text-white " href="../catalog/index.php?login=true&id='.$user.'">Kost</a></li>';
                        echo '<li class="nav-item" role="presentation"><a class="nav-link text-white" href="../about/index.php?login=true&id='.$user.'">About Us</a></li>';     
                        echo '<li class="nav-item" role="presentation"><a class="nav-link text-white" href="index.php?login=false&id_kost='.$data['id_kost'].'">Logout</a></li>'; 
                    }
                        else {
                        echo '<li class="nav-item" role="presentation"><a class="nav-link text-white active" href="../index.php">Home</a></li>';
                        echo '<li class="nav-item" role="presentation"><a class="nav-link text-white " href="../catalog/index.php">Kost</a></li>';
                        echo '<li class="nav-item" role="presentation"><a class="nav-link text-white" href="../about/index.php">About Us</a></li>';
                        echo '<li class="nav-item" role="presentation"><a class="nav-link text-white" href="../login/index.php">Login</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page product-page">
        <section class="clean-block clean-product dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Informasi tentang kos</h2>
                    <p>Berisi tentang informasi faislitas, harga, dan lain sebagainnya.</p>
                </div>
                <div class="block-content">
                    <div class="product-info">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="gallery">
                                    <div class="sp-wrap"><a href="../assets/img/<?php echo $data["gambar"] ?>"><img class="img-fluid d-block mx-auto" src="../assets/img/<?php echo $data["gambar"] ?>"></a><a href="../assets/img/<?php echo $data["gambar"] ?>"><img class="img-fluid d-block mx-auto" src="../assets/img/<?php echo $data["gambar"] ?>"></a><a href="../assets/img/<?php echo $data["gambar"] ?>"><img class="img-fluid d-block mx-auto" src="../assets/img/<?php echo $data["gambar"] ?>"></a></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info">
                                    <h3 class="text-center"><a href="https://bootstrapstudio.io/releases/app/4.3.7/#"><?php echo $data["namakost"] ?>&nbsp;</a><br></h3>
                                    <div class="text-center price">
                                        <h3>Harga</h3>
                                        <h3><strong>Rp. <?php echo $data["harga"] ?></strong><br></h3>
                                    </div>
                                    <div class="summary"></div>
                                </div>
                                <div class="product-info" style="height: 74px;">
                                    <div>
                                        <ul class="nav nav-tabs" id="myTab">
                                            <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#description" id="description-tab">Description</a></li>
                                            <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#specifications" id="specifications-tabs">Faslitas</a></li>
                                            <li class="nav-item"><a class="nav-link active" role="tab" data-toggle="tab" href="#reviews" id="reviews-tab">Kontak</a></li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show description" role="tabpanel" id="description" style="padding: 18px;">
                                                <p style="height: 16px;"><?php echo $data["detail"] ?></p>
                                            </div>
                                            <div class="tab-pane fade show specifications" role="tabpanel" id="specifications">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <td class="stat">Kulkas</td>
                                                                <td><?php echo $data["kulkas"] ?></td>
                                                                <td class="stat">Tempat Parkir<br></td>
                                                                <td><?php echo $data["parkir"] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="stat">Lemari</td>
                                                                <td><?php echo $data["almari"] ?></td>
                                                                <td class="stat">Kamar Mandi<br></td>
                                                                <td><?php echo $data["kamarmandi"] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="stat">Televisi</td>
                                                                <td><?php echo $data["tv"] ?></td>
                                                                <td class="stat">CCTV<br></td>
                                                                <td><?php echo $data["parkir"] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="stat">Spring Bad<br></td>
                                                                <td><?php echo $data["kasur"] ?></td>
                                                                <td class="stat">WiFi<br></td>
                                                                <td><?php echo $data["wifi"] ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane active fade show" role="tabpanel" id="reviews">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <td class="stat">No HP.</td>
                                                                <td><?php echo $data2["telp"] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="stat">Email</td>
                                                                <td><?php echo $data2["email"] ?></td>
                                                            </tr>
                                                            <tr></tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    <h1 class="text-center" style="font-size: 31px;">Pesan Kost</h1>
                    <?php 
                    if ($login == 'true') {
                        echo '<form  method="post" action="insert_pemesan_kost.php?id_kos='.$id_kos.'&login='.$login.'&id='.$user.'">';
                    }
                    else {
                        echo '<form  method="post" action="insert_pemesan_kost.php?id_kos='.$id_kos.'">';
                    }
                    ?>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input class="form-control item" type="text" id="name" name="nama">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input class="form-control item" type="text" id="alamat" name="alamat">
                        </div>
                        <div class="form-group">
                            <label for="telephone">Telephone</label>
                            <input class="form-control item" type="text" id="telephone" name="telephon">
                        </div>
                        <div class="form-group">
                            <label for="catatan">Catatan</label>
                            <textarea class="form-control item" name="catatan" id="catatan" style="height:100%"></textarea>
                        </div>
                        <input class="btn btn-warning btn-block text-white" type="submit" value="Pesan">
                        <!-- <button class="btn btn-warning btn-block text-white" type="submit" >Pesan</button> -->
                    </form>    
                    <p class="text-center">*Hubungi pemilik untuk informasi selengkapnya pada kolom kontak.</p>
                </div>
            </div>
        </section>
        
    </main>
    <footer class="page-footer dark">
        <div class="footer-copyright">
            <p>© 2018 Copyright Text</p>
        </div>
    </footer>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="../assets/js/smoothproducts.min.js"></script>
    <script src="../assets/js/theme.js"></script>
</body>

</html>