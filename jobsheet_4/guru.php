<?php
$nilaiSiswa = [85, 92, 78, 64, 90, 75, 88, 79, 70, 96];
$terbesar1 = 0;
$terbesar2 = 0;
$terkecil1 = 100;
$terkecil2 = 100;
$totalNilai = 0;

foreach ($nilaiSiswa as $nilai) {
    if ($nilai > $terbesar1) {
        $terbesar2 = $terbesar1;
        $terbesar1 = $nilai;
    } elseif ($nilai > $terbesar2) {
        $terbesar2 = $nilai;
    }

    if ($nilai < $terkecil1) {
        $terkecil2 = $terkecil1;
        $terkecil1 = $nilai;
    } elseif ($nilai < $terkecil2) {
        $terkecil2 = $nilai;
    }
}

foreach ($nilaiSiswa as $nilai) {
    if ($nilai == $terbesar1 || $nilai == $terbesar2 || $nilai == $terkecil1 || $nilai == $terkecil2) {
        continue;
    }
    $totalNilai += $nilai;
}

$rataRata = $totalNilai / 6;

echo "Total nilai tanpa 2 tertinggi & 2 terendah adalah: $totalNilai <br>";
echo "Rata-rata nilai adalah: $rataRata";
?>