<?php

include("database/db.php");

if (isset($_POST['save-task'])) {
  $title = $_POST['title'];
  $description = $_POST['description'];
  $image = getimagesize($_FILES['image']['tmp_name']);
  if ($image !== false) {
    $image = $_FILES['image']['tmp_name'];
    $img_content = addslashes(file_get_contents($image));
  } else {
    $img_content = "";
  }

  $query = "INSERT INTO task (title, description, img) VALUES ('$title','$description', '$img_content')";
  $result = mysqli_query($conn, $query);

  if (!$result) {
    die("Query failed");
  }

  $_SESSION['message'] = 'Task saved successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');
}

?>
