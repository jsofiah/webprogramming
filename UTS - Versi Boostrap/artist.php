<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LYVESTA</title>
    <link rel="icon" href="img/logo-pendek.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg shadow-sm" style="background-color: rgb(251, 192, 3);" data-bs-theme="light">
        <div class="container-fluid justify-content-between px-4">
            <a class="navbar-brand" href="#">
            <img src="img/logo-panjang.png" alt="LYVESTA" style="height: 60px;">
            </a>

            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav gap-3 align-items-lg-center">
                <li class="nav-item"><a class="nav-link fw-semibold text-white" href="index.html">Home</a></li>
                <li class="nav-item"><a class="nav-link fw-semibold text-white" href="about.html">About</a></li>
                <li class="nav-item"><a class="nav-link fw-semibold text-white" href="artist.php">Artist</a></li>
                <li class="nav-item"><a class="nav-link fw-semibold text-white" href="gallery.html">Gallery</a></li>
                <li class="nav-item"><a class="nav-link fw-semibold text-white" href="register.php">Register</a></li>

                <li class="nav-item d-lg-none">
                <a href="admin/login.php" class="nav-link text-white fw-semibold">Admin</a>
                </li>
            </ul>
            </div>

            <a href="admin/login.php" target="_blank" class="btn btn-light rounded-pill fw-semibold d-none d-lg-inline-flex align-items-center px-3 py-2">
                Admin
            </a>
        </div>
    </nav>

    <div class="container text-center mt-5">
        <h1 class="display-4 fw-bold text-warning">ARTIST LINEUP</h1>
        <p class="lead mx-auto" style="max-width: 700px;">From Dawn to Dusk — The Day Music Never Sleeps</p>
        <hr>
    </div>


    <div class="container mt-5">
        <h2 class="fw-bold text-center">LYVESTA DAWN</h2>
        <p class="text-muted text-center">The Rise of the Vibe</p>
        <div class="row">
        <?php
            $query = "SELECT * FROM artist WHERE stage='DAWN'";
            $result = pg_query($conn, $query);
            while ($row = pg_fetch_assoc($result)) {
            echo "
            <div class='col-md-4 mb-4'>
                <div class='card shadow-sm border-0'>
                <img src='{$row['image']}' alt='{$row['name']}' class='card-img-top'style='height:250px; object-fit:cover;'>
                <div class='card-body text-center'>
                    <h5 class='card-title'>{$row['name']}</h5>
                    <p class='text-muted mb-2'>{$row['genre']}</p>
                    <a href='{$row['spotify_link']}' target='_blank' class='btn btn-warning btn-sm'>Play on Spotify</a>
                </div>
                </div>
            </div>";
            }
        ?>
        </div>
        <hr>
    </div>

    <div class="container mt-5 mb-5">
        <h2 class="fw-bold text-center">LYVESTA DUSK</h2>
        <p class="text-muted text-center">When the Night Comes Alive</p>
        <div class="row">
        <?php
            $query = "SELECT * FROM artist WHERE stage='DUSK'";
            $result = pg_query($conn, $query);
            while ($row = pg_fetch_assoc($result)) {
            echo "
            <div class='col-md-4 mb-4'>
                <div class='card shadow-sm border-0'>
                <img src='{$row['image']}' alt='{$row['name']}' class='card-img-top' style='height:250px; object-fit:cover;'>
                <div class='card-body text-center'>
                    <h5 class='card-title'>{$row['name']}</h5>
                    <p class='text-muted mb-2'>{$row['genre']}</p>
                    <a href='{$row['spotify_link']}' target='_blank' class='btn btn-warning btn-sm'>Play on Spotify</a>
                </div>
                </div>
            </div>";
            }
        ?>
        </div>
    </div>
    
    <div id="footer-container"></div>
    <script src="js/footer.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
