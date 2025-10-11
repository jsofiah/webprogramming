<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input dengan Validasi</title>
</head>
<body>
    <h1>Form Input dengan Validasi</h1>
    <form action="proses_validasi.php" method="post">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama">
        <br>

        <label for="email">Email:</label>
        <input type="text" name="email" id="email">
        <br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>