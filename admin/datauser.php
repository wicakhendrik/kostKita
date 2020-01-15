<!DOCTYPE html>
<html lang="en">

<?php
  $user=$_GET['user']; 
?>

<head>

  <meta charset="utf-8">
  <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- <meta name="description" content="">
  <meta name="author" content=""> -->
  <title>Admin KostKita</title>
  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <?php
      session_start();
      if ($_SESSION['status']!='login'){
        header("location:../login/index.php?pesan=belum_login");
      }
    ?>
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <!-- <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html"> -->
      <a class="sidebar-brand d-flex " href="../index.php">
        <!-- <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div> -->
        <div class="sidebar-brand-text mx-3">&nbsp; &nbsp; &nbsp; &nbsp;KostKita</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php?user=<?php echo  $user; ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="datauser.php?data=admin">
          <i class="fas fa-user"></i>
          <span>Data User</span>
        </a>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-home"></i>
          <span>Data Kost</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Kost Type:</h6>
            <a class="collapse-item" href="datakost_lk.php?jk=1&user=<?php echo  $user; ?>">Kost Laki-laki</a>
            <a class="collapse-item" href="datakost_lk.php?jk=2&user=<?php echo  $user; ?>">Kost Perempuan</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Divider -->
      <!-- <hr class="sidebar-divider d-none d-md-block"> -->

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $user ?></span>
                <!-- <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60"> -->
                <img class="img-profile rounded-circle" src="../assets/img/user.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../login/index.php" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">User KostKita</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php
                          include "../koneksi.php";
                            $query="select * from userkost";
                            $sql=mysqli_query($koneksi, $query);
                            $count=mysqli_num_rows($sql);
                            echo $count;
                            // echo "<option value='".$data['id_jk']."'>".$data['ket_jk']."</option>";
                            
                        ?>
                        <!-- 250 -->
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Kost Tersedia</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <!-- 520 -->
                        <?php
                          include "../koneksi.php";
                            $query="select * from kost";
                            $sql=mysqli_query($koneksi, $query);
                            $count=mysqli_num_rows($sql);
                            echo $count;
                        ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-home fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Kost Pria</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                            <!-- 270 -->
                            <?php
                            include "../koneksi.php";
                            $query="select jenis_kost from kost where jenis_kost='1'";
                            $sql=mysqli_query($koneksi, $query);
                            $count=mysqli_num_rows($sql);
                            echo $count;
                            ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-home fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Kost Wanita</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <!-- 250 -->
                        <?php
                          include "../koneksi.php";
                            $query="select jenis_kost from kost where jenis_kost='2'";
                            $sql=mysqli_query($koneksi, $query);
                            $count=mysqli_num_rows($sql);
                            echo $count;
                        ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-home fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-11">
              <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Content Admin</h6>
                </div>
                <div class="card-body text-center">
                <table border="1" width="100%">
                    <tr>
                        <th>ID User</th>
                        <th>nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Telephon</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Password</th>
                    </tr>
                    <?php
                    // Load file koneksi.php
                    include "../koneksi.php";
                    // $jk=$_GET['jk'];
                    // $jumlahDataPerHalaman=1;
                    // $result=mysqli_query($koneksi,"SELECT * FROM userkost");
                    // $jumlahData=mysqli_num_rows($result);
                    // $jumlahHalaman=ceil($jumlahData/$jumlahDataPerHalaman);
                    // $halamanAktif=( isset($_GET["halaman"]) ) ? $_GET["halaman"]: 1;
                    
                    // var_dump($halamanAktif);
                    
                    // //halaman satu 0-8
                    // //halaman dua 9-..
                    // $awalData  = ( $jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
                    

                    
                    
                    // $query="SELECT * FROM kost LIMIT $awalData, $jumlahDataPerHalaman";

                    $query = "SELECT * FROM userkost"; // Query untuk menampilkan semua data siswa
                    $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
                    
                    while(@$data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
                        echo "<tr>";
                        echo "<td>".$data['id_user']."</td>";
                        echo "<td>".$data['nama']."</td>";
                        echo "<td>".$data['id_jk']."</td>";
                        echo "<td>".$data['telp']."</td>";
                        echo "<td>".$data['email']."</td>";
                        echo "<td>".$data['username']."</td>";
                        echo "<td>".$data['password_user']."</td>";
                        echo "</tr>";
                    }
                    ?>
                    </table>
                </div>
                <!-- <div>
                <nav>
                                    <ul class="pagination">
                                        <?php if($halamanAktif>1):?>
                                        <li class="page-item"><a href="?data=admin&user=admin&halaman=<?= $halamanAktif-1; ?>" class="page-link" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                        <?php endif; ?>



                                        <?php for($i = 1 ; $i<= $jumlahHalaman; $i++ ):?>
                                        <?php if( $i == $halamanAktif):?>
                                        <li class="page-item"><a style="background: #F44336; color: white;" href="??data=admin&user=admin&halaman=<?=$i;?>" class="page-link"><?= $i ?></a></li>
                                        <?php else : ?>
                                        <li class="page-item"><a href="?data=admin&user=admin&halaman=<?=$i;?>" class="page-link"><?= $i ?></a></li>
                                        <?php endif; endfor; ?> 



                                        <?php if($halamanAktif<$jumlahHalaman):?>
                                        <li class="page-item"><a href="?data=admin&user=admin&halaman=<?= $halamanAktif+1; ?>"" class="page-link" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                                        <?php endif; ?>
                                    </ul>
                                </nav>
              </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>&copy; 2019 Kostkita Corp</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../login/index.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
