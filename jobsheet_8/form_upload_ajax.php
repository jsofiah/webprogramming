<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="upload.css">
    <title>Unggah File Dokumen</title>
</head>
<body>
    <div class="upload-form-container">
        <h2>Unggah File Dokumen</h2>
        <form id="upload-form" action="upload_ajax.php" method="post" enctype="multipart/form-data">
            <div class="file-input-container">
                <input type="file" name="file" id="file" class="file-input" accept=".pdf,.doc,.docx,.txt">
                <label for="file" class="file-label">Pilih File</label>
            </div>
            <button type="submit" class="upload-button" id="upload-button" disabled>Unggah</button>
        </form>
        <div id="status" class="upload-status"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="upload.js"></script>
</body>
</html>