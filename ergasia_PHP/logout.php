<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['username'])) {
  // Destroy the session
  session_destroy();

  // Redirect to the login page or any other page
  header('Location: index.php');
  exit();
} else {
  // If the user is not logged in, redirect to the login page
  header('Location: login.php');
  exit();
}
?>