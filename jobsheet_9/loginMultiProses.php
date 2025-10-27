<?php
    include "koneksi.php";

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = "SELECT * FROM public.user WHERE username = '$username' AND password = '$password'";
    $result = pg_query($conn, $query);
    $cek = pg_num_rows($result);
    
    if ($cek > 0) {
        $row = pg_fetch_assoc($result);

        if($row['level'] == 1){
            echo "Anda berhasil login. Silakan menuju ";
            echo '<a href="homeAdmin.html">Halaman HOME</a>';
        } else if ($row['level'] == 2){
            echo "Anda berhasil login. Silakan menuju ";
            echo '<a href="homeGuest.html">Halaman HOME</a>';
        } else {
            echo "Anda gagal login. Silakan ";
            echo '<a href="loginForm.html">Login kembali</a>';
            echo pg_last_error($conn);
        }
    } else{
        echo "Anda gagal login. Silakan ";
        echo '<a href="loginForm.html">Login kembali</a>';
        echo pg_last_error($conn);
    }

?>