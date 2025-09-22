<h1>
  <?php
  if (isset($_SESSION['username'])) {
    echo "Selamat datang, " . $_SESSION['username'] . "!";
  } else {
    echo "Selamat datang di Yessa Salon!";
  }
  ?>
</h1>