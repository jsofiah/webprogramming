<?php
    if(isset($_POST["submit"])){
        $targetdir = "uploads/";
        $targetfile = $targetdir . basename($_FILES["myFile"]["name"]);

        if(move_uploaded_file($_FILES["myFile"]["tmp_name"], $targetfile)){
            echo "File berhasil diunggah.";
        } else {
            echo "Gagal mengunggal file.";
        }
    }
?>