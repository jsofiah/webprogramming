<?php
    $targetDirectory = "images/";

    if(!file_exists($targetDirectory)){
        mkdir($targetDirectory, 0777, true);
    }

    if(isset($_FILES['images']['name'][0])){
        $totalFiles = count($_FILES['images']['name']);

        $allowedExtensions = array("jpg", "jpeg", "png", "gif");

        for($i = 0; $i < $totalFiles; $i++){
            $fileName = $_FILES['images']['name'][$i];
            $targetFile = $targetDirectory . basename($fileName);
            $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            if(move_uploaded_file($_FILES['images']['tmp_name'][$i], $targetFile)){
                echo "File $fileName berhasil diunggah.<br>";

                echo "<img src='$targetFile' width='200' style='height:auto; margin:10px; border:1px solid #ccc; border-radius:8px;'><br>";
            } else {
                echo "Gagal mengunggah file $fileName.<br>";
            }
        }
    } else {
        echo "Tidak ada file yang diunggah.";
    }
?>