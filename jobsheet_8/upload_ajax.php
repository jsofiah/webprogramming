<?php
if(isset($_FILES["file"])){
    $targetdir = "uploads/";

    if(!file_exists($targetdir)){
        mkdir($targetdir, 0777, true);
    }

    $targetfile = $targetdir . basename($_FILES["file"]["name"]);
    $fileType = strtolower(pathinfo($targetfile, PATHINFO_EXTENSION));

    $allowedExtensions = array("txt", "pdf", "doc", "docx");
    $maxsize = 3 * 1024 * 1024;

    if(in_array($fileType, $allowedExtensions) && $_FILES["file"]["size"] <= $maxsize){
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetfile)){
            echo "File berhasil diunggah ke folder uploads.";
        } else {
            echo "Gagal mengunggah file.";
        }
    } else {
        echo "File tidak valid atau melebihi ukuran maksimum (3MB).";
    }
}
?>