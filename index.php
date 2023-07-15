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
        <table class="table table-borderer">
          <thead>
            <tr>
              <th>Title</th>
              <th>Description</th>
              <th>Created At</th>
              <th>Image</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $query = "SELECT * FROM task";
          $result_tasks = mysqli_query($conn, $query);

          while($row = mysqli_fetch_assoc($result_tasks)) {
          ?>
          <tr>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td class="resize-image">
              <img src="image.php?id=<?php echo $row['id'] ?>" alt="image" class="w-100">
            </td>
            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary rounded-circle">
                <ion-icon name="create"></ion-icon>
              </a>
              <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger rounded-circle">
                <ion-icon name="trash"></ion-icon>
              </a>
            </td>
          </tr>
          <?php } ?>
          </tbody>
        </table>
    </div>
  </div>
</main>

<?php
include("includes/footer.php");
?>