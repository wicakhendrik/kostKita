
<!DOCTYPE html>
<html>
<?php
    @$login = $_GET['login'];
    if ($login == 'true') {
        @$user=$_GET['id']; 
    }
?> 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Catalog - Brand</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="../assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="../assets/css/smoothproducts.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-warning clean-navbar">
    <?php 
        if ($login == 'true') {
            echo '<div class="container"><a class="navbar-brand text-white logo" href="../index.php?login=true&id='.$user.'">KostKita<br></a>';}
        else {
            echo '<div class="container"><a class="navbar-brand text-white logo" href="../index.php">KostKita<br></a>';}
        ?>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div
                class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                <?php 
                    if ($login == 'true') {
                        echo '<li class="nav-item" role="presentation"><a class="nav-link text-white active" href="../index.php?login=true&id='.$user.'">Home</a></li>';
                        echo '<li class="nav-item" role="presentation"><a class="nav-link text-white " href="index.php?login=true&id='.$user.'">Kost</a></li>';
                        echo '<li class="nav-item" role="presentation"><a class="nav-link text-white" href="../about/index.php?login=true&id='.$user.'">About Us</a></li>';     
                        echo '<li class="nav-item" role="presentation"><a class="nav-link text-white" href="index.php?login=false">Logout</a></li>'; 
                    }
                        else {
                        echo '<li class="nav-item" role="presentation"><a class="nav-link text-white active" href="../index.php">Home</a></li>';
                        echo '<li class="nav-item" role="presentation"><a class="nav-link text-white " href="index.php">Kost</a></li>';
                        echo '<li class="nav-item" role="presentation"><a class="nav-link text-white" href="../about/index.php">About Us</a></li>';
                        echo '<li class="nav-item" role="presentation"><a class="nav-link text-white" href="../login/index.php">Login</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page catalog-page">
        <section class="clean-block clean-catalog dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-warning">Tempatnya sewa kost!</h2>
                    <p>Mempermudah mahasiswa mencari kost di daerah sekitar Universitas Trunojoyo.</p>
                </div>
                <div class="content">
                    <div class="row">
                        <div class="col-md-3"><img class="img-fluid d-block mx-auto" src="../assets/img/Square250.jpg" style="margin: 31px;width: 219px;"><img class="img-fluid d-block mx-auto" src="../assets/img/300x6002.png" style="margin: 31px;width: 219px;"><img class="img-fluid d-block mx-auto"
                                src="../assets/img/300x600.png" style="margin: 31px;width: 219px;">
                            <div class="d-none d-md-block"></div>
                            <div class="d-md-none"><a class="btn btn-link d-md-none filter-collapse" data-toggle="collapse" aria-expanded="false" aria-controls="filters" role="button" href="#filters">Filters<i class="icon-arrow-down filter-caret"></i></a>
                                <div class="collapse"
                                    id="filters">
                                    <div class="filters">
                                        <div class="filter-item">
                                            <h3>Fasilitas</h3>
                                            <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Kamar Mandi</label></div>
                                            <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-2"><label class="form-check-label" for="formCheck-2">Kulkas</label></div>
                                            <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-3"><label class="form-check-label" for="formCheck-3">Spring Bad</label></div>
                                            <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-4"><label class="form-check-label" for="formCheck-4">Lemari</label></div>
                                        </div>
                                        <div class="filter-item">
                                            <h3>Lokasi</h3>
                                            <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-5"><label class="form-check-label" for="formCheck-5">Telang Asri</label></div>
                                            <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-6"><label class="form-check-label" for="formCheck-6">Telang Indah</label></div>
                                            <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-7"><label class="form-check-label" for="formCheck-7">Graha Trunojoyo</label></div>
                                        </div>
                                        <div class="filter-item">
                                            <h3>OS</h3>
                                            <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-9"><label class="form-check-label" for="formCheck-9">iOS</label></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="products">
                                <div class="row no-gutters">

                                <?php
                                include "../koneksi.php";
                                $jumlahDataPerHalaman=9;
                                $result=mysqli_query($koneksi,"SELECT * FROM kost");
                                $jumlahData=mysqli_num_rows($result);
                                $jumlahHalaman=ceil($jumlahData/$jumlahDataPerHalaman);
                                $halamanAktif=( isset($_GET["halaman"]) ) ? $_GET["halaman"]: 1;
                                
                                //var_dump($halamanAktif);
                                
                                //halaman satu 0-8
                                //halaman dua 9-..
                                $awalData  = ( $jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
                                

                                
                                
                                $query="SELECT * FROM kost LIMIT $awalData, $jumlahDataPerHalaman";
                                $sql=mysqli_query($koneksi, $query);
                                while($data = mysqli_fetch_array($sql)){
                                    if ($login == true) {
                                        echo '
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="clean-product-item">
                                                <div class="image"><a href="../kost/index.php?login=true&id='.@$user.'&id_kost='.$data['id_kost'].'"><img class="img-fluid d-block mx-auto" src="../assets/img/'.$data["gambar"].'" style="width:200px;height:200px;"></a></div>
                                                <div class="product-name"><a href="#">'.$data["namakost"].'</a></div>
                                                <div class="about">
                                                    <div class="rating"><img src="../assets/img/star.svg"><img src="../assets/img/star.svg"><img src="../assets/img/star.svg"><img src="../assets/img/star-half-empty.svg"><img src="../assets/img/star-empty.svg"></div>
                                                    <div class="price">
                                                        <h3><br><strong>Rp. '.$data["harga"].'</strong><br><br></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';
                                    }
                                    else {
                                        echo '
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="clean-product-item">
                                                <div class="image"><a href="../kost/index.php?id_kost='.$data['id_kost'].'"><img class="img-fluid d-block mx-auto" src="../assets/img/'.$data["gambar"].'" style="width:200px;height:200px;"></a></div>
                                                <div class="product-name"><a href="#">'.$data["namakost"].'</a></div>
                                                <div class="about">
                                                    <div class="rating"><img src="../assets/img/star.svg"><img src="../assets/img/star.svg"><img src="../assets/img/star.svg"><img src="../assets/img/star-half-empty.svg"><img src="../assets/img/star-empty.svg"></div>
                                                    <div class="price">
                                                        <h3><br><strong>Rp. '.$data["harga"].'</strong><br><br></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';
                                    }
                                }
                                ?>
                                </div>
                                <!--
                                <?php if($halamanAktif>1):?>
                                    <a href="?halaman=<?= $halamanAktif-1; ?>">&lt;</a>
                                <?php endif; ?>

                                <?php for($i = 1 ; $i<= $jumlahHalaman; $i++ ):?>
                                    <?php if( $i == $halamanAktif):?>
                                        <a href="?halaman=<?=$i;?>" style="font-weight: bold; color: red;"><?=$i;?></a>
                                    <?php else:?>
                                        <a href="?halaman=<?=$i;?>"><?=$i;?></a>
                                    <?php endif;?>
                                <?php endfor; ?>

                                <?php if($halamanAktif<$jumlahHalaman):?>
                                    <a href="?halaman=<?= $halamanAktif+1; ?>">&gt;</a>
                                <?php endif; ?>
                                </div>-->
                                <div>
                                <nav>
                                    <ul class="pagination">
                                        <?php if($halamanAktif>1):?>
                                        <li class="page-item"><a href="datauser.php?halaman=<?= $halamanAktif-1; ?>" class="page-link" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                        <?php endif; ?>



                                        <?php for($i = 1 ; $i<= $jumlahHalaman; $i++ ):?>
                                        <?php if( $i == $halamanAktif):?>
                                        <li class="page-item"><a style="background: #ffd700; color: white;" href="datauser.php?halaman=<?=$i;?>" class="page-link"><?= $i ?></a></li>
                                        <?php else : ?>
                                        <li class="page-item"><a href="datauser.php?halaman=<?=$i;?>" class="page-link"><?= $i ?></a></li>
                                        <?php endif; endfor; ?> 



                                        <?php if($halamanAktif<$jumlahHalaman):?>
                                        <li class="page-item"><a href="datauser.php?halaman=<?= $halamanAktif+1; ?>"" class="page-link" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                                        <?php endif; ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="page-footer dark">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h5>Get started</h5>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Sign up</a></li>
                        <li><a href="#">Sig In</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>About us</h5>
                    <ul>
                        <li><a href="#">Company Information</a></li>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">Reviews</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Support</h5>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Help desk</a></li>
                        <li><a href="#">Forums</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Legal</h5>
                    <ul>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>© 2019 KostKita Corp</p>
        </div>
    </footer>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="../assets/js/smoothproducts.min.js"></script>
    <script src="../assets/js/theme.js"></script>
</body>

</html>