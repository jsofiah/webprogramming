<?php
$a = 10;
$b = 5;

$hasilTambah = $a + $b;
$hasilKurang = $a - $b;
$hasilKali = $a * $b;
$hasilBagi = $a / $b;
$sisaBagi = $a % $b;
$pangkat = $a ** $b;

$hasilSama = $a == $b;
$hasilTidakSama = $a != $b;
$hasilLebihKecil = $a > $b;
$hasilLebihBesar = $a < $b;
$hasilLebihKecilSama = $a <= $b;
$hasilLebihBesarSama = $a >= $b;

$hasilAnd = $a && $b;
$hasilOr = $a || $b;
$hasilNotA = !$a;
$hasilNotB = !$b;


echo "Hasil dari penjumlahan $a dan $b adalah $hasilTambah <br><br>";
echo "Hasil dari pengurangan $a dan $b adalah $hasilKurang <br><br>";
echo "Hasil dari perkalian $a dan $b adalah $hasilKali <br><br>";
echo "Hasil dari pembagian $a dan $b adalah $hasilBagi <br><br>";
echo "Hasil dari sisa bagi $a dan $b adalah $sisaBagi <br><br>";
echo "Hasil dari $a pangkat $b adalah $pangkat <br><br>";
echo "Apakah $a sama dengan $b ? $hasilSama <br><br>";
echo "Apakah $a tidak sama dengan $b ? $hasilTidakSama <br><br>";
echo "Apakah $a lebih kecil dari $b ? $hasilLebihKecil <br><br>";
echo "Apakah $a lebih besar dari $b ? $hasilLebihBesar <br><br>";
echo "Apakah $a lebih kecil sama dengan $b ? $hasilLebihKecilSama <br><br>";
echo "Apakah $a lebih besar sama dengan $b ? $hasilLebihBesarSama <br><br>";
echo "Hasil dari $a and $b adalah $hasilAnd <br><br>";
echo "Hasil dari $a or $b adalah $hasilOr <br><br>";
echo "Hasil not $a adalah $hasilNotA <br><br>";
echo "Hasil not $b adalah $hasilNotB <br><br>";

$hasilAtambahB = $a += $b;
$hasilAkurangB = $a -= $b;
$hasilAkaliB = $a *= $b;
$hasilAbagiB = $a /= $b;
$hasilAsisabagiB = $a %= $b;
$a = 10;
$b = 5;
echo "Hasil dari $a += $b adalah $hasilAtambahB <br><br>";
echo "Hasil dari $a -= $b adalah $hasilAkurangB <br><br>";
echo "Hasil dari $a *= $b adalah $hasilAkaliB <br><br>";
echo "Hasil dari $a /= $b adalah $hasilAbagiB <br><br>";
echo "Hasil dari $a %= $b adalah $hasilAsisabagiB <br><br>";
?>