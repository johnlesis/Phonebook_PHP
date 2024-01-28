<?php
require_once 'conn.php';
include "header.php";
// Login functionality
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
  $result = $conn->query($sql);

  if ($result->num_rows == 1) {
    // Authentication successful
    session_start();
    $_SESSION['username'] = $username;
    header("Location: index_loggedin.php"); // Redirect to welcome page or any other secure page
    exit();
  } else {
    // Authentication failed
    $error_message = "Invalid username or password";
  }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body class="bg-dark text-light">

  <form method="post" action="login.php">
    <section class="vh-100" style="background-color: #343a40;">
      <div class="container py-5 h-100 bg-dark">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <h3 class="text-light pb-5">Please Enter Your Username and Password Below To Log In !
            </h3>
            <div class="card shadow-2-strong" style="border-radius: 1rem;">
              <div class="card-body p-5 text-center">

                <h3 class="mb-5">Sign in</h3>

                <div class="form-outline mb-4">
                  <input type="username" name="username" class="form-control form-control-lg" />
                  <label class="form-label">Username</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" name="password" class="form-control form-control-lg" />
                  <label class="form-label">Password</label>
                </div>

                <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </form>

</body>

</html>