<?php
require_once 'conn.php';
include "Header_loggedin.php";
include "functions.php";

// Check if contact ID is provided
if (isset($_GET['Id'])) {
  $contactId = $_GET['Id'];

  // Get contact information
  $query = "SELECT * FROM contacts WHERE ID = $contactId";
  $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

  $row = mysqli_fetch_assoc($result);
  $name = $row['name'];
  $phone = $row['phone'];
  $email = $row['email'];
  $pic = $row['pic'];
  $pic_tag = '';
  if ($pic) {
    $pic_tag = "<img src='$pic' class='pic'>";
  }
}

// Update contact
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $newName = $_POST['name'];
  $newPhone = $_POST['phone'];
  $newEmail = $_POST['email'];
  $newPhoto = $_FILES['pic']['name']; // Note: You're using the file name, consider using move_uploaded_file()

  // Handle image upload
  $img_path = "./pics/";
  $posted = 'pic';
  if ($_FILES[$posted]['name']) {
    $uploaded_file = upload($posted, $img_path);
    if ($uploaded_file) {
      $newPhoto = $uploaded_file;
    } else {
      echo "Error uploading image.";
      // Handle the error or redirect as appropriate
      exit();
    }
  }

  // Update the contact in the database
  $updateSql = "UPDATE contacts SET name = '$newName', phone = '$newPhone', email = '$newEmail', pic = '$newPhoto' WHERE ID = $contactId";

  if ($conn->query($updateSql) === TRUE) {
    echo "Contact updated successfully.";
    // Redirect to the browse_contacts.php page or any other page after updating
    header("Location: browse_contacts_loggedin.php");
    exit();
  } else {
    echo "Error updating contact: " . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Contact</title>
</head>

<body>
  <h2 class="container-fluid d-flex justify-content-center">Edit Contact for
    <?php echo $name; ?>
  </h2>

  <form class="container-fluid w-25" action="edit_contact.php?Id=<?php echo $contactId; ?>" method="post"
    enctype="multipart/form-data">

    <div class="form-outline">
      <input type="text" id="typeText" class="form-control" name="name" value="<?php echo $name; ?>" required>
      <label class="form-label" for="typeText">Name</label>
    </div>

    <div class="form-outline">
      <input type="text" id="typeText" class="form-control" name="phone" value="<?php echo $phone; ?>" required>
      <label class="form-label" for="typeText">Phone</label>
    </div>

    <div class="form-outline">
      <input type="email" id="typeEmail" class="form-control" name="email" value="<?php echo $email; ?>" required>
      <label class="form-label" for="typeEmail">Email</label>
    </div>

    <div class="pic">
      <?php echo "<img src='$pic' class='pic' style='max-width: 200px; max-height: 200px;'>"; ?>
    </div>
    <br><br>
    <label class="form-label" for="customFile">Upload Image</label>
    <input name="pic" id="pic" type="file" class="form-control" onchange="loadFile(event)" />
    <div id="preview"></div>

    <input class="btn btn-primary" type="submit" value="Submit">
  </form>

  <script>
    var loadFile = function (event) {
      document.getElementById('preview').innerHTML = "Photo preview";
      var output = document.getElementById('preview');
      output.src = URL.createObjectURL(event.target.files[0]);
      output.onload = function () {
        URL.revokeObjectURL(output.src) // free memory
      }
    };
  </script>
</body>

</html>