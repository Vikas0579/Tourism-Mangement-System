<?php
  // Connect to the database
  $db = mysqli_connect('localhost', 'username', 'password', 'database');

  // Check connection
  if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Get the image data from the request
  $imageDataUrl = $_POST['image_data'];

  // Store the image data in the database
  $query = "INSERT INTO images (image_data) VALUES ('$imageDataUrl')";
  mysqli_query($db, $query);

  // Close the database connection
  mysqli_close($db);
?>