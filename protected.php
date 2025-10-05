<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('HTTP/1.1 403 Forbidden');
    echo 'Access denied. <a href="login.html">Login</a>';
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>Dashboard</title><link rel="stylesheet" href="css/style.css"></head>
<body>
  <header>
    <h1>Dashboard</h1>
    <nav>
      <a href="index.html">Home</a>
      <a href="protected.php">Dashboard</a>
      <a href="logout.php">Logout</a>
    </nav>
  </header>

  <main>
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['user']); ?></h2>
    <p>This is a protected page for logged-in users only.</p>
  </main>

  <footer>
    <p>© 2025 MySite</p>
  </footer>
</body>
</html>
