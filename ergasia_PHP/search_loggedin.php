<?php
include "Header_loggedin.php";
require_once 'conn.php';

// Search functionality
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $searchTerm = $_POST['searchTerm'];

  $query = "SELECT * FROM contacts WHERE name LIKE '%$searchTerm%' OR phone LIKE '%$searchTerm%'";
  $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>Contact Search</title>
</head>

<body class="bg-dark text-light">
  <?php
  if ($result->num_rows > 0) {
    echo '<h3 class="d-flex justify-content-center align-items-center pb-3 pt-3">Search Results:</h3>';
    echo '<table class="table table-hover table-dark">';
    echo '<tr><th>Name</th><th>Number</th><th>E-mail</th><th>View Contact</th></tr>';

    while ($row = $result->fetch_assoc()) {
      echo '<tr>';
      echo '<td>' . $row['name'] . '</td>';
      echo '<td>' . $row['phone'] . '</td>';
      echo '<td>' . $row['email'] . '</td>';
      echo '<td><a href="show_contact.php?ID=' . $row['ID'] . '"><img src="pics/view.png" width="32"></a></td>';
      echo '</tr>';
    }

    echo '</table>';
  } else {
    echo '<p>No results found.</p>';
  }
  ?>
  <div class="container-fluid d-flex justify-content-center">
    <div class="me-4 mt-1">Add New Contact</div>
    <a href=" add_contact.php"><img src="pics/add.png" width="32"></a>
  </div>
</body>

</html>