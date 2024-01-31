<?php
require_once 'conn.php';
require_once "functions.php";
include "Header_loggedin.php";

// Initialize variables to hold form data
$id = $name = $phone = $email = $pic = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Retrieve form data 
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $pic = $_FILES['pic'];

  // Picture handling
  $img_path = "./pics/";
  $posted = 'pic';
  if ($_FILES[$posted]['name']) {
    $uploaded_file = upload($posted, $img_path);
    if ($uploaded_file) {
      // Insert new contact into the database
      $insertSql = "INSERT INTO contacts (name, phone, email, pic) VALUES ('$name', '$phone', '$email', '$uploaded_file')";

      if ($conn->query($insertSql) === TRUE) {
        $newContactId = $conn->insert_id; // Get the ID of the newly inserted contact

        echo "Contact added successfully.";
        // Redirect to the browse_contacts.php page or any other page after adding
        header("Location: browse_contacts_loggedin.php");
        exit();
      } else {
        echo "Error adding contact: " . $conn->error;
      }
    } else {
      echo "Error uploading image.";
    }
  } else {
    echo "Please select an image.";
  }
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Contact</title>
</head>

<body>
  <h2>Add Contact</h2>

  <form class="container-fluid w-25" action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">

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
        URL.revokeObjectURL(output.src)
      }
    };
  </script>

</body>

</html>
