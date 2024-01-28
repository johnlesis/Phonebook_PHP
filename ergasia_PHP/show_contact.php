<?php
require_once 'conn.php';
include "Header_loggedin.php";

// Check if contact ID is provided
if (isset($_GET['ID'])) {
  $contactId = $_GET['ID'];

  // get contact information
  $query = "SELECT * FROM contacts WHERE ID = $contactId";
  $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

  if ($result->num_rows == 1) {
    $row = mysqli_fetch_assoc($result);
    $contactId = $row['ID'];
    $name = $row['name'];
    $phone = $row['phone'];
    $email = $row['email'];
    $pic = $row['pic'];
    $pic_tag = $pic ? "<img src='$pic' class='card-img-top' alt='Contact Image' style='max-width: 300px;'>" : '';
  } else {
    echo "Contact not found.";
    exit();
  }
} else {
  echo "Contact ID not provided.";
  exit();
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
  <title>Show Contact</title>
</head>

<body class="bg-dark text-light">

  <div class="container mt-5 d-flex justify-content-evenly">
    <div class="card">
      <?php echo $pic_tag; ?>
      <div class="card-body">
        <h5 class="card-title">
          <?php echo $name; ?>
        </h5>
        <p class="card-text">Phone:
          <?php echo $phone; ?>
        </p>
        <p class="card-text">Email:
          <?php echo $email; ?>
        </p>
        <a href="edit_contact.php?Id=<?php echo $contactId; ?>" class="btn btn-primary">Edit Contact</a>
        <a href="remove_contact.php?Id=<?php echo $contactId; ?>" class="btn btn-danger">Delete Contact</a>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-eXshuAgMQmb7VHlzx5u5cVMbimq1u7zA+YXQJxCIKlxUDDU/cgRgqakEM0QpwwsG"
    crossorigin="anonymous"></script>
</body>

</html>