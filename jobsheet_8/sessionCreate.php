<?php
    session_start();
?>

<!DOCTYPE html>
    <html lang="en">
        <head>
        </head>
        <body>
            <?php
                $_SESSION["favcolor"] = "green";
                $_SESSION["favanimal"] = "cat";
                echo "Session variables are set."
            ?>
        </body>
</html>