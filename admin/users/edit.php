<?php
include('../../path.php');
session_start();
include ('../../config.php');

//include(ROOT_PATH . '/app/controllers/users.php');

$user_id = $_GET['id'];

$result = $mysqli->query("SELECT * FROM users WHERE id = ".$user_id);

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
    <title>Admin Section - Edit User </title>
</head>
<body style="background: #ebeaf1!important;">
    


<?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>
      <!-- End Nav -->


      

  <div class="container admin-wrapper">

    <!-- Admin Content -->
    <div class="admin-content">
      <div class="button-group">
        <a href="create.php" class="btn btn-big adding_managing">Add User</a>
        <a href="index.php" class="btn btn-big adding_managing">Manage Users</a>
      </div>

      <div class="content">

        <h2 class="my-3">Edit User</h2>


        <?php

        // $product_id = array();
        //$result = $mysqli->query('SELECT * FROM products WHERE id='. $product_id);
        if($result) {
        $obj = $result->fetch_object();

        if( ! empty($_SESSION['Code_error_msg']))
        {
            //display the message however you want
            echo '<h1 class="text-bg-danger text light w-50 rounded-4 d-flex justify-content-center">Email Already exists.</h1>';
            unset($_SESSION['Code_error_msg']);
        }
        
        echo '<form action="../../app/controllers/users.php" method="post" class="text-bg-light p-3 rounded-4">
            <div>
                <input class="editingForm" type="hidden" name="id" value="' .$obj->id .'">
                <label>User Name</label>
                <input class="editingForm" type="text" name="username" value="'. $obj->username. '" class="text-input">
                <label>Email</label>
                <input class="editingForm" type="text" name="email" value="'. $obj->email. '" class="text-input">
                <label>password</label>
                <input class="editingForm" type="password" name="password" value="" class="text-input">
                <label>passwordConf</label>
                <input class="editingForm" type="password" name="passwordConf" value="" class="text-input">
            </div>

            <button type="submit" name="updateUser" class="btn btn-big text-bg-primary">Update User</button>
        </form>';

        }

        ?>

      </div>
  


    </div>
    <!-- // Admin Content -->


      
  </div> 
      <!-- // Content -->








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!-- JS -->
    <script src="../../assets/js/main.js"></script>
</body>
</html>