<?php
session_start();
require_once 'conn.php';
if (!isset($_SESSION['username'])) {
  header("Location: login.php"); // Redirect to the login page if not logged in
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>Document</title>
</head>

<body class="bg-dark text-light">
  <nav class="navbar bg-dark border-bottom border-body " data-bs-theme="dark">
    <div class="container-fluid d-flex justify-content-evenly">
      <img class="navbar-brand img" src="pics/book_icon.jpg" alt="logo" width="40px" height="50px">
      <a class="navbar-brand" href="index_loggedin.php">Home</a>
      <a class="navbar-brand" href="browse_contacts_loggedin.php">Browse</a>
      <a class="navbar-brand" href="logout.php">LogOut</a>
      <form class="d-flex" role="search" action="search_loggedin.php" method="post">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="searchTerm">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </nav>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

</body>

</html>