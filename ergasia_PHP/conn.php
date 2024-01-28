<?php
// Database connection
$host = "localhost";
$user = "root";
$pass = "";
$db = "members_catalog";

$conn = mysqli_connect($host, $user, $pass, $db) or die(mysqli_connect_error());


// if (isset($conn)) {
// echo 'connected';
// } 