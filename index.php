<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simple CRUD</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <link rel="stylesheet" href="src/output.css">
</head>

<body>
  <?php include 'navbar.php'; ?>
  <?php
  if (isset($_GET['page'])) {
    include $_GET['page'] . '.php';
  }
  ?>

  <?php include 'footer.php'; ?>
</body>

</html>