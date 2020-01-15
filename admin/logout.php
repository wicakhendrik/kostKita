<?php
    session_start();

    //menghapus semua session
    session_destroy();

        //mengalihkan ke halaman sambil mengirim pesan logout
        header("location:../login/index.php?pesan=logout");
?>