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
        echo "<script>alert('Data berhasil disimpan!'); window.location='register.php';</script>";
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
    <title>LYVESTA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" href="img/logo-pendek.png">
</head>
<body>
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
        <h1 class="display-4 fw-bold text-warning">JOIN THE EXPERIENCE</h1>
        <p class="lead mx-auto" style="max-width: 700px;">Register now to stay updated with the latest news, tickets, and exclusive offers for LYVESTA.</p>
        <hr>
    </div>

    <div class="container my-5">
        <div class="row align-items-center">
            <div class="col-md-6">
                <form method="POST" action="" class="p-4 border rounded shadow-sm">
                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email Address</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" name="no_hp">
                    </div>
                    <button type="submit" class="btn btn-warning w-100">Register Now</button>
                </form>
            </div>

            <div class="col-md-6 text-center mt-4 mt-md-0">
                <img src="img/register.jpg" alt="Register Image" class="img-fluid rounded" style="max-height: 350px; object-fit: cover; height: 400px;">
            </div>
        </div>
    </div>

    <div class="container my-5">
        <h2 class="text-center mb-4 fw-bold">PERKS OF JOINING</h2>

        <div class="accordion" id="perksAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading1">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1">
                    1. Early Ticket Access
                    </button>
                </h2>
                <div id="collapse1" class="accordion-collapse collapse" data-bs-parent="#perksAccordion">
                    <div class="accordion-body">
                    Be the first to know when ticket sales open and enjoy early access before the general public.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading2">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2">
                    2. Exclusive Merch Discounts
                    </button>
                </h2>
                <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#perksAccordion">
                    <div class="accordion-body">
                    Get special discounts on official LYVESTA merchandise including limited-edition apparel and accessories.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading3">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3">
                    3. Event Updates & Sneak Peeks
                    </button>
                </h2>
                <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#perksAccordion">
                    <div class="accordion-body">
                    Receive exclusive updates about lineup reveals, behind-the-scenes stories, and event announcements.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading4">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4">
                    4. VIP Giveaway Opportunities
                    </button>
                </h2>
                <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#perksAccordion">
                    <div class="accordion-body">
                    Join raffles for VIP passes, meet & greet sessions, and backstage experiences for registered members.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading5">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5">
                    5. Priority Access to Future Events
                    </button>
                </h2>
                <div id="collapse5" class="accordion-collapse collapse" data-bs-parent="#perksAccordion">
                    <div class="accordion-body">
                    Stay ahead — registered fans receive early entry and priority notifications for future LYVESTA events.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="footer-container"></div>
    <script src="js/footer.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
