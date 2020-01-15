<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - Brand</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="../assets/css/smoothproducts.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
    crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-warning clean-navbar">
        <div class="container"><a class="navbar-brand text-white logo" href="../index.php">KostKita<br></a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        </div>
    </nav>
    <main class="page login-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-warning">Log In</h2>
                    <p>Login untuk menambah dan mempromosikan kost anda disini.</p>
                </div>
                <form class="border-warning" action="cek_login.php"  method="post">
                    <?php
                        if (isset($_GET['pesan'])){
                            if ($_GET['pesan'] == 'gagal'){
                                //echo "<p class='login_gagal'>Login gagal, username dan password salah</p>";
                                echo "<div class='form-group'><pre>       Login gagal, username dan password salah</pre></div>";
                                // echo "<br>";
                            }else if ($_GET['pesan'] == 'logout'){
                                echo "<div class='form-group'><pre>       Logout Berhasil</pre></div>";
                                
                            }else if ($_GET['pesan'] == 'belum_login'){
                                echo "<p class='log_adm_gagal'>anda harus login untuk masuk halaman admin</p>";
                                // echo "<br>";
                            }
                        }
                        ?>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <!-- <input class="form-control item" type="text" id="username"> -->
                        <div class="input-group form-group">
                            <div class=input-group-prepend>
                                <span class="input-group-text">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" placeholder="username" name="username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <!-- <input class="form-control" type="password" id="password"> -->
                        <div class="input-group from-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-key" aria-hidden="true"></i>
                                </span>
                            </div>
                            <input type="password" class="form-control" placeholder="password" name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="checkbox">
                            <label class="form-check-label" for="checkbox">Remember me</label>
                        </div>
                    </div>
                    <button class="btn btn-warning btn-block text-white" type="submit">Log In</button><br>
                    <div class="form-group">
                        <pre>Belum punya akun ?  <a href="../registration/index.php">daftar</a></pre>
                    </div>
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
    <script src="./assets/js/jquery.min.js"></script>
    <script src="./assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="../assets/js/smoothproducts.min.js"></script>
    <script src="../assets/js/theme.js"></script>
</body>

</html>