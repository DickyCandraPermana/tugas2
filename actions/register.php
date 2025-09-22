<?php
require '../db.php';

session_start(); // jangan lupa start session

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {
  $username = trim($_POST['username']);
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];

  if ($password === $confirm_password) {
    // cek apakah username sudah ada
    $check = $db->prepare("SELECT id FROM user WHERE username = :username");
    $check->bindParam(':username', $username);
    $check->execute();

    if ($check->rowCount() > 0) {
      echo "Username sudah dipakai.";
    } else {
      // hash password
      $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

      $query = "INSERT INTO user (username, password) VALUES (:username, :password)";
      $stmt = $db->prepare($query);
      $stmt->bindParam(':username', $username);
      $stmt->bindParam(':password', $hashedPassword);

      if ($stmt->execute()) {
        $_SESSION['username'] = $username;
        header("Location: http://localhost:8000/index.php?page=home");
        exit();
      } else {
        echo "Register gagal. Coba lagi.";
      }
    }
  } else {
    echo "Password dan konfirmasi password tidak sama.";
  }
}
