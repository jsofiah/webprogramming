<?php
$hargaProduk = 120000;
$diskon = 0.20;
$batasBeli = 100000;
$totalBayar = 0;

if($hargaProduk > $batasBeli){
    $totalBayar = $hargaProduk - ($hargaProduk * $diskon);
} else {
    $totalBayar = $hargaProduk;
}

echo "Harga yang harus dibayar setelah diskon yaitu sebesar Rp. $totalBayar";
?>