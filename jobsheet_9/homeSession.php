<html>
    <head>
        <title>Halaman Home</title>
    </head>
    <body>
        <?php
            session_start();
            if($_SESSION['status'] == 'login'){
                echo "Selamat datang " . $_SESSION['username'];
            
        ?>
            <br><a href="sessionLogout.php">Log Out</a>
        <?php
            } else{
                echo "Anda belum login, silakan";
        ?>
            <a href="sessionLoginForm.php">Log In</a>
        <?php
            }
        ?>
    </body>
</html>