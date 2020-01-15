<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Register - Brand</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="../assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="../assets/css/smoothproducts.css">
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-warning clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="../index.php">KostKita<br></a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <!-- <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                <li class="nav-item" role="presentation"><a class="nav-link text-white" href="../index.php">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link text-white" href="../login/index.php">Login</a></li>
                </ul>
            </div> -->
        </div>
    </nav>
    <main class="page registration-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-warning">Registration</h2>
                    <p>Daftar akun KostKita dan pasang iklan disini.</p>
                </div>
                <form class="border-warning" action="insert.php"  method="post">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input class="form-control item" type="text" id="name" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="name">Jenis Kelamin</label><br>
                        <!-- <input class="form-control item" type="text" id="name"> -->

                        <select name="jenisKelamin" class="JK">
                            <?php
                                include "../koneksi.php";
                                $query="select * from jeniskelamin";
                                $sql=mysqli_query($koneksi, $query);
                                while($data = mysqli_fetch_array($sql)){
                                    echo $data['id_jk'];
                                echo "<option value='".$data['id_jk']."'>".$data['ket_jk']."</option>";
                                }
                            ?>
                                
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="name">Nomor Handphone</label>
                        <input class="form-control item" type="text" id="name" name="handphone">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control item" type="email" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="email">Username</label>
                        <input class="form-control item" type="username" id="username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control item" type="password" id="password" name="password">
                    </div>
                    <button class="btn btn-warning btn-block text-white" type="submit">Sign Up</button>
                </form>
                    
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
                        <li><a href="#">Downloads</a></li>
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