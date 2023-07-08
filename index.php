<?php
  include("database/db.php");
?>

<?php
include("includes/header.php");
?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- Messages -->
      <?php 
      if(isset($_SESSION['message'])) {
        
      ?>
      <div class="alert alert-<?=$_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php session_unset();} ?>
      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="save-task.php" method="POST" enctype="multipart/form-data">
          <div class="form-group mb-3">
            <input type="text" name="title" class="form-control" placeholder="Task Title" autofocus>
          </div>
          <div class="form-group mb-3">
            <textarea name="description" rows="2" class="form-control" placeholder="Task Description"></textarea>
          </div>
          <div class="form-group mb-3">
            <input type="file" name="image" class="form-control">
          </div>
          <input type="submit" name="save-task" class="btn btn-success btn-block w-100" value="Save Task">
        </form>
      </div>
    </div>

    <div class="col-md-8">

    </div>
  </div>
</main>

<?php
include("includes/footer.php");
?>