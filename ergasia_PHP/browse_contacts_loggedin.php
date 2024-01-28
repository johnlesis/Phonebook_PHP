<?php
include "Header_loggedin.php";
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
        <th>Photo</th>
        <th>edit</th>
        <th>delete</th>
        <th>View contact</th>
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
          <td>
            <?php if (!empty($contact['pic'])): ?>
              <img src="<?php echo $contact['pic']; ?>" alt="Contact Photo" width="50" height="50">
            <?php else: ?>
              No Photo
            <?php endif; ?>
          </td>
          <td>
            <a href="edit_contact.php?Id=<?php echo $contact['ID']; ?>"><img src="pics/edit.png" width="32"></a>
          </td>


          <td>
            <a href="remove_contact.php?Id=<?php echo $contact['ID']; ?>"
              onclick="return confirm('Are you sure you want to delete this contact?')"><img src="pics/delete.png"
                width="32"></a>
          </td>
          <td>
            <a href="show_contact.php?ID=<?php echo $contact['ID']; ?>"><img src="pics/view.png" width="32"></a>
          </td>
        </tr>

      <?php } ?>
    </table>
    <div class="container-fluid d-flex justify-content-center">
      <div class="me-4 mt-1">Add New Contact</div>
      <a href=" add_contact.php"><img src="pics/add.png" width="32"></a>
    </div>

  <?php } else { ?>
    <p>No contacts found.</p>
  <?php } ?>
</body>

</html>