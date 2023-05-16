<?php
include('../../path.php');
session_start();
include ('../../config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <style>
      <?php include "../../assets/css/styl.css" ?>
      <?php include "../../assets/css/admin.css" ?>
    </style>
    <title>Admin Section - Add Posts </title>
</head>
<body style="background: #ebeaf1!important;">
    


    <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>
      <!-- End Nav -->


      

<div class="admin-wrapper my-5">

      <!-- Admin Content -->
      <div class="container">
        <div class="admin-content">
          <div class="button-group mb-4">
            <a href="create.php" class="btn btn-big adding_managing">Add Category</a>
            <a href="index.php" class="btn btn-big adding_managing">Manage Categories</a>
          </div>

          <?php  
            if( ! empty($_SESSION['Code_error_msg']))
            {
                //display the message however you want
                echo '<h1 style="color: red;">Category Name Already exists.</h1>';
                unset($_SESSION['Code_error_msg']);
            }
          ?>

          <div class="content border">
          <h4 style="background-color: #222; color: white; margin: unset; border-radius: 20px 20px 0px 0px; padding: 10px">All Details</h4>
            <form class="p-3" action="../../app/controllers/categories.php" method="post" enctype="multipart/form-data" style="background: white; border-radius: 0px 0px 20px 20px;">
              <div class="mb-3">
                <label class="form-label">Category Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="CategoryName" class="text-input" required>
              </div>

              <label for="images" class="drop-container">
                <span class="drop-title">Drop files here</span>
                or
                <input type="file" id="images" name="image" class="text-input" accept="image/*" required>
              </label>

              <button type="submit" name="createCategory" class="btn btn-big bg-primary my-2 text-light">Add Category</button>
            </form>
          </div>
        </div>
      </div>
      <!-- // Admin Content -->
</div> 








<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
      <!-- JS -->
      <script src="../../assets/js/main.js"></script>
</body>
</html>