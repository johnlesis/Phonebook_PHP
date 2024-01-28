<?php
require_once 'conn.php';
include "Header_loggedin.php";

// Check if contact ID is provided in the URL
if (isset($_GET['Id'])) {
  $contactId = $_GET['Id'];

  // Delete the contact from the database
  $deleteSql = "DELETE FROM contacts WHERE ID = $contactId";

  if ($conn->query($deleteSql) === TRUE) {
    echo "Contact deleted successfully.";
    exit();
  } else {
    echo "Error deleting contact: " . $conn->error;
  }
} else {
  echo "Contact ID not provided.";
  exit();
}

$conn->close();
