<?php
  include("database/db.php");

  $id = $_GET['id'];

  $query = "SELECT img FROM task where id= $id";
  $result_tasks = mysqli_query($conn, $query);

  $img_data = mysqli_fetch_assoc($result_tasks);

  header("Content-type: image/jpg");

  echo $img_data['img'];
?>
