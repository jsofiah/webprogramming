<!DOCTYPE html>
<html lang="en">
<head>
    <title>Form Input PHP</title>
</head>
<body>
    <h2>Form Input PHP</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="input">Masukkan text:</label>
        <input type="text" name="input" id="input"><br><br>

        <input type="submit" name="submit" value="Submit"><br><br>
    </form>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $input = $_POST["input"];
            $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
            echo "Hasil input: " . $input;
        }
    ?>
</body>
</html>