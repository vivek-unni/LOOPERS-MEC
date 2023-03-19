<?php

// Replace these variables with your own MySQL database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "innvento";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Read form data
$name = $_POST['name'];
$email = $_POST['email'];
$place = $_POST['place'];
$product_idea_name = $_POST['product-idea-name'];
$product_idea = $_POST['product-idea'];
$description = $_POST['description'];

// Store image in a BLOB column in the database
$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

// Prepare and execute SQL statement to insert data into the database
$sql = "INSERT INTO main (uname, email, place, name, type, dcript, image)
VALUES ('$name', '$email', '$place', '$product_idea_name', '$product_idea', '$description', '$image')";

if ($conn->query($sql) === TRUE) {
  Header('Location:../index.php');
  exit;
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();

?>
