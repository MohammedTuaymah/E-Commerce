<?php
include('../../path.php');

session_start();
include ('../../config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <style>
      <?php include "../../assets/css/styl.css" ?>
      <?php include "../../assets/css/admin.css" ?>
    </style>
    <title>Admin Section - Add User </title>
</head>
<body style="background: #ebeaf1!important;">
    


<?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>
      <!-- End Nav -->


      


  <div class="admin-wrapper my-5">

      <!-- Admin Content -->
      <div class="container">
        <div class="admin-content">
          <div class="button-group mb-4">
            <a href="create.php" class="btn btn-big adding_managing">Add User</a>
            <a href="index.php" class="btn btn-big adding_managing">Manage Users</a>
          </div>

          <?php include(ROOT_PATH . '/app/helpers/formErrors.php'); ?>

          <?php  
            if( ! empty($_SESSION['Code_error_msg']))
            {
                //display the message however you want
                echo '<h1 style="color: red;">User Name Or Email Already exists.</h1>';
                unset($_SESSION['Code_error_msg']);
            }
          ?>
          <div class="content border">
          <h4 style="background-color: #222; color: white; margin: unset; border-radius: 20px 20px 0px 0px; padding: 10px">All Details</h4>
            <form class="p-3" action="../../app/controllers/users.php" method="post" enctype="multipart/form-data" style="background-color: white;">
              <div class="mb-3">
                <label class="form-label">User Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username" class="text-input" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" class="text-input" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="password" class="text-input" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Password Confirmation</label>
                <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="passwordConf" class="text-input" required>
              </div>



              <div class="d-flex">
                <span>Admin User!!!</span>
                <label class="switch">
                  <input type="checkbox" name="check" value="checked">
                  <span class="slider round"></span>
                </label>
              </div>

              <button type="submit" name="add_user" class="btn btn-big bg-primary my-2 text-light">Add User</button>
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