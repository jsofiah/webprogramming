<?php
    if(isset($_POST["submit"])){
        $targetdir = "uploads/";
        $targetfile = $targetdir . basename($_FILES["myFile"]["name"]);
        $fileType = strtolower(pathinfo($targetfile, PATHINFO_EXTENSION));

        $allowedExtensions = array("jpg", "jpeg", "png", "gif");
        $maxsize = 5*1024*1024;

        if(in_array($fileType, $allowedExtensions) && $_FILES["myFile"]["size"]<=$maxsize){
            if(move_uploaded_file($_FILES["myFile"]["tmp_name"], $targetfile)){
                echo "File berhasil diunggah.";
            } else {
                echo "Gagal mengunggal file.";
            }
        } else {
            echo "File tidak valid atau melebihi ukuran maksimum yang diizinkan";
        }

    }
?>