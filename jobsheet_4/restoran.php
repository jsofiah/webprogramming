<?php
$totalKursi = 45;
$kursiTerisi = 28;

$kursiKosong = $totalKursi - $kursiTerisi;
$persentaseKosong = ($kursiKosong / $totalKursi) * 100;

echo "Jumlah kursi total: $totalKursi <br>";
echo "Jumlah kursi terisi: $kursiTerisi <br>";
echo "Jumlah kursi kosong: $kursiKosong <br>";
echo "Persentase kursi kosong: " . $persentaseKosong . "%";
?>
