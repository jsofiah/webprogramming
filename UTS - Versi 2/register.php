<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];

    if (trim($no_hp) === '') {
        $no_hp = null;
    }

    $query = "INSERT INTO data_pengunjung (nama, email, no_hp) VALUES ($1, $2, $3)";
    $result = pg_query_params($conn, $query, [$nama, $email, $no_hp]);

    if ($result) {
        echo "<script>alert('Data berhasil disimpan!'); window.location='index.php';</script>";
    } else {
        die("Query gagal: " . pg_last_error($conn));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style/styleRegister.css">
    <link rel="stylesheet" href="style/styleFooter.css">
    <link rel="icon" href="img/logo-pendek.png">
    <title>LYVESTA</title>
</head>
<body>
    <div class="logo">
        <img src="img/logo-panjang.png" alt="LYVESTA" class="logo-img">
    </div>
    
    <nav class="custom-nav">
        <ul id="nav-list">
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
            <h1>JOIN THE EXPERIENCE</h1>
            <p class="banner-description">Register now to stay updated with the latest news, tickets, and exclusive offers for LYVESTA.</p>
            <hr>
        </div>

        <div class="register-wrapper">
            <form class="register-form" method="POST" action="">
                <input type="text" name="nama" placeholder="Full Name" required>
                <input type="email" name="email" placeholder="Email Address" required>
                <input type="tel" name="no_hp" placeholder="Phone Number">
                <button type="submit">Register Now</button>
            </form>

            <div class="register-image">
                <img src="img/register.jpg" alt="Register Image">
            </div>
        </div>

        <div class="accordion-container">
            <h2>PERKS OF JOINING</h2>

            <details>
                <summary>1. Early Ticket Access</summary>
                <p>Be the first to know when ticket sales open and enjoy early access before the general public. Don’t miss your chance to secure the best spots.</p>
            </details>

            <details>
                <summary>2. Exclusive Merch Discounts</summary>
                <p>Get special discounts on official LYVESTA merchandise, including limited-edition apparel and accessories only available to registered fans.</p>
            </details>

            <details>
                <summary>3. Event Updates & Sneak Peeks</summary>
                <p>Receive exclusive updates about lineup reveals, behind-the-scenes stories, and special event announcements directly in your inbox.</p>
            </details>

            <details>
                <summary>4. VIP Giveaway Opportunities</summary>
                <p>Join raffles for VIP passes, meet & greet sessions, and backstage experiences available only to registered members.</p>
            </details>

            <details>
                <summary>5. Priority Access to Future Events</summary>
                <p>Stay ahead of the crowd — registered fans receive priority notifications and early entry to future LYVESTA events and collaborations.</p>
            </details>
        </div>
    </div>
    <div id="footer-container"></div>
    <script src="js/footer.js"></script>
</body>
</html>