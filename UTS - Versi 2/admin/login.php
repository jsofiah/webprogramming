<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="style/styleLogin.css">
  <link rel="icon" href="../img/logo-pendek.png">
  <title>Login - LYVESTA</title>
</head>
<body>
  <div class="card">
    <div class="login-card">
    <h2>LOGIN</h2>
    <?php if (!empty($_GET['error'])): ?>
      <div class="error"><?= htmlspecialchars($_GET['error']) ?></div>
    <?php endif; ?>
    <form action="authenticate.php" method="post" autocomplete="off">
      <label for="username">Username</label>
      <input id="username" name="username" type="text" required autofocus>

      <label for="password">Password</label>
      <input id="password" name="password" type="password" required>

      <button type="submit">Masuk</button>
    </form>
    <a class="register-link" href="register_login.php">Daftar Akun Baru</a>
  </div>
</body>
</html>