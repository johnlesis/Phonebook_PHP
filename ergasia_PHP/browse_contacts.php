<?php
session_start();
require_once 'conn.php';
include "Header.php";
// Retrieve all contacts
$query = "SELECT * FROM contacts";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

// Check if there are contacts
$contacts = mysqli_fetch_all($result, MYSQLI_ASSOC) ?: [];

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Browse Contacts</title>
</head>

<body class="bg-dark text-light">

  <h2 class="d-flex justify-content-center align-items-center pb-3 pt-3">Browse Contacts</h2>
  <?php if (!empty($contacts)) { ?>
    <table class="table table-hover table-dark">
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Phone</th>
        <th>e-mail</th>
      </tr>
      <?php foreach ($contacts as $contact) { ?>
        <tr>
          <td>
            <?php echo $contact['ID']; ?>
          </td>
          <td>
            <?php echo $contact['name']; ?>
          </td>
          <td>
            <?php echo $contact['phone']; ?>
          </td>
          <td>
            <?php echo $contact['email']; ?>
          </td>

        </tr>
      <?php } ?>
    </table>
  <?php } else { ?>
    <p>No contacts found.</p>
  <?php } ?>
</body>

</html>