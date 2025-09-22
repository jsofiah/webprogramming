<?php
$daftarNilai = [
    ['Alice', 85],
    ['Bob', 92],
    ['Charlie', 78],
    ['David', 64],
    ['Eva', 90]
];
$rataRata = 0;
$total = 0;

foreach ($daftarNilai as $nilai) {
    $total += $nilai[1];
}
$rataRata = $total / count($daftarNilai);

$siswaDiatasRata = [];
foreach ($daftarNilai as $nilai) {
    if ($nilai[1] > $rataRata) {
        $siswaDiatasRata[] = $nilai;
    }
}

echo "Daftar nama yang mendapat nilai di atas rata-rata ($rataRata): <br><br>";
foreach($siswaDiatasRata as $atasRata){
    echo "Nama: {$atasRata[0]}, Nilai: {$atasRata[1]} <br>";
}
?>