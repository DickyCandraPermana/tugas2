<?php
require '../db.php';

session_start(); // jangan lupa

if (isset($_POST['username']) && isset($_POST['password'])) {
  $username = trim($_POST['username']);
  $password = $_POST['password'];

  // Ambil user berdasarkan username
  $query = "SELECT * FROM user WHERE username = :username LIMIT 1";
  $stmt = $db->prepare($query);
  $stmt->bindParam(':username', $username);
  $stmt->execute();

  if ($stmt->rowCount() > 0) {
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Cek password
    if (password_verify($password, $user['password'])) {
      $_SESSION['username'] = $username;
      header("Location: http://localhost:8000/index.php?page=home");
      exit();
    } else {
      echo "Password salah.";
    }
  } else {
    echo "Username tidak ditemukan.";
  }
}
