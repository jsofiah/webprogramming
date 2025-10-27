<?php
    include 'koneksi.php';

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = "SELECT * FROM public.user WHERE username = '$username' AND password = '$password'";
    $result = pg_query($conn, $query);
    $cek = pg_num_rows($result);

    if ($cek > 0) {
        session_start();
        $_SESSION["username"] = $username;
        $_SESSION["status"] = 'login';
        echo "Anda berhasil login. Silakan menuju <a href='homeSession.php'>Halaman Home</a>";
    } else {
        echo "Gagal login. Silakan login lagi <a href='sessionLoginForm.html'>Halaman Login</a>";
        echo pg_last_error($conn);
    }
?>