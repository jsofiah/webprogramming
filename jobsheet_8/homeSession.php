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
            <br><a href="sessionLogout.php">logout</a>
        <?php
            } else{
                echo "Anda belum login, silakan";
        ?>
            <a href="sessionLogout.php">Login</a>
        <?php
            }
        ?>
    </body>
</html>