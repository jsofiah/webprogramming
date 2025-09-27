<?php
    function perkenalan($nama, $salam){
        echo $salam . ", ";
        echo "Perkenalkan, nama saya " . $nama ."<br/>";
        echo "Senang berkenalan dengan Anda<br/>";
    }

    perkenalan("Sofiah", "Hallo");

    echo "<hr>";

    $saya = "Sofi";
    $ucapanSalam = "Selamat pagi";

    perkenalan($saya, $ucapanSalam);
?>