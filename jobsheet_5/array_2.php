<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array 2</title>
    <link rel="stylesheet" type="text/css" href="style/style_array2.css">
</head>
<body>
    <?php
    $Dosen = [
        'nama' => 'Elok Nur Hamdana',
        'domisili' => 'Malang',
        'jenis_kelamin' => 'Perempuan'
    ];
    ?>

    <h2>Array Assosiatif</h2>
    <table>
        <tr>
            <th>Atribut</th>
            <th>Nilai</th>
        </tr>

        <?php foreach ($Dosen as $key => $value) : ?>

        <tr>
            <td><?php echo $key; ?></td>
            <td><?php echo $value; ?></td>
        </tr>
        
        <?php endforeach; ?>
    </table>
</body>
</html>