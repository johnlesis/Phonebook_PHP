<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>Document</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body class="bg-dark text-light">
  <?php include "Header_loggedin.php" ?>
  <div class="bg-img"></div>
  <div class="position-absolute top-50 start-50 translate-middle">
    <H1>You Are Logged in!</H1>
    <h2 class="pt-5">Browse Contacts and Edit to Your Liking!</h2>
  </div>
  <?php if (isset($error_message)) { ?>
    <p style="color: red;">
      <?php echo $error_message; ?>
    </p>
  <?php } ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>