<?php
if (isset($_FILES['files'])) {
    $totalFiles = count($_FILES['files']['name']);
    $allowedExtensions = array("jpg", "jpeg", "png", "gif");
    $uploadDir = "images/";

    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    for ($i = 0; $i < $totalFiles; $i++) {
        $fileName = $_FILES['files']['name'][$i];
        $fileTmp = $_FILES['files']['tmp_name'][$i];
        $fileSize = $_FILES['files']['size'][$i];
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if (!in_array($fileExt, $allowedExtensions)) {
            echo "File $fileName ditolak (bukan gambar).<br>";
            continue;
        }

        if ($fileSize > 5 * 1024 * 1024) {
            echo "File $fileName terlalu besar (maks 5MB).<br>";
            continue;
        }

        if (move_uploaded_file($fileTmp, $uploadDir . $fileName)) {
            echo "File $fileName berhasil diunggah.<br>";
        } else {
            echo "Gagal mengunggah file $fileName.<br>";
        }
    }
}
?>
