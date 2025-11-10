<?php include 'config.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/styleArtist.css">
    <link rel="stylesheet" href="style/styleFooter.css">
    <link rel="icon" href="img/logo-pendek.png">
    <title>LYVESTA</title>
</head>
<body>
    <div class="logo">
        <img src="img/logo-panjang.png" alt="LYVESTA" class="logo-img">
    </div>
    <nav>
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="artist.php">Artist</a></li>
            <li><a href="gallery.html">Gallery</a></li>
            <li><a href="register.php">Register</a></li>
        </ul>
    </nav>
    <a href="admin/login.php" target="_blank" class="cta-button">
        <span class="cta-text">Admin</span>
        <span class="cta-arrow">→</span>
    </a>

    <div class="container">
        <div class="banner">
            <h1>ARTIST LINEUP</h1>
            <p class="banner-description">From Dawn to Dusk — The Day Music Never Sleeps</p>
            <hr>
        </div>

        <div class="dawn">
            <h2>LYVESTA DAWN</h2>
            <p class="description-section">The Rise of the Vibe</p>
            <section class="artist-section">
                <div class="artist-grid">
                    <?php
                    $query = "SELECT * FROM artist WHERE stage='DAWN'";
                    $result = pg_query($conn, $query);
                    while ($row = pg_fetch_assoc($result)) {
                        echo "
                        <div class='profile-card'>
                            <div class='image-container'>
                                <img src='{$row['image']}' alt='{$row['name']}' class='profile-image'>
                            </div>
                            <div class='profile-info'>
                                <h1 class='name'>{$row['name']}</h1>
                                <p class='description'>{$row['genre']}</p>
                                <a class='spotify-btn' href='{$row['spotify_link']}' target='_blank'>
                                    <span>Play on Spotify</span>
                                    <span class='plus-icon'>+</span>
                                </a>
                            </div>
                        </div>";
                    }
                    ?>
                </div>
            </section>
            <hr>
        </div>

        <div class="dusk">
            <h2>LYVESTA DUSK</h2>
            <p class="description-section">When the Night Comes Alive</p>
            <section class="artist-section">
                <div class="artist-grid">
                    <?php
                    $query = "SELECT * FROM artist WHERE stage='DUSK'";
                    $result = pg_query($conn, $query);
                    while ($row = pg_fetch_assoc($result)) {
                        echo "
                        <div class='profile-card'>
                            <div class='image-container'>
                                <img src='{$row['image']}' alt='{$row['name']}' class='profile-image'>
                            </div>
                            <div class='profile-info'>
                                <h1 class='name'>{$row['name']}</h1>
                                <p class='description'>{$row['genre']}</p>
                                <a class='spotify-btn' href='{$row['spotify_link']}' target='_blank'>
                                    <span>Play on Spotify</span>
                                    <span class='plus-icon'>+</span>
                                </a>
                            </div>
                        </div>";
                    }
                    ?>
                </div>
            </section>
        </div>
        <div id="footer-container"></div>
        <script src="js/footer.js"></script>
    </div>
</body>
</html>