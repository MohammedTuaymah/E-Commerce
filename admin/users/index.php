<?php
include('../../path.php');
session_start();
include '../../config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <style>
      <?php include "../../assets/css/styl.css" ?>
      <?php include "../../assets/css/admin.css" ?>
    </style>
    <title>Admin Section - Manage Users </title>
</head>
<body style="background: #ebeaf1!important;">
    


<?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>


      

  <div class="admin-wrapper">


  <div class="container">
    <!-- Admin Content -->
    <div class="admin-content">
      <div class="button-group">
        <a href="create.php" class="btn btn-big adding_managing">Add User</a>
        <a href="index.php" class="btn btn-big adding_managing">Manage Users</a>
      </div>

      <div class="content">

        <h2 class="page-title">Manage Users</h2>

        <table style="background: white; border-radius: 25px">
          <head>
            <th>SN</th>
            <th>Username</th>
            <th>Email</th>
            <th colspan="2">Action</th>
          </head>
          <tbody>

          <?php
          $i=0;
          $result = $mysqli->query('SELECT * FROM users ORDER BY id DESC;');
          if($result){

          while($obj = $result->fetch_object()) {

            echo '<tr>
            <td>'.$i + 1 .'</td>
            <td>'.$obj->username.'</td>
            <td>'.$obj->email.'</td>
            <td><a href="edit.php?id='.$obj->id.'" class="edit">edit</a></td>
            <td>
            <form action="../../app/controllers/users.php" method="post"><input type="hidden" name="id" value="' .$obj->id .'">
            <button style="border: none;" type="submit" name="deleteUser" class="delete">delete</button>
            </form>
            </td>
            ';
            $i++;

          }
          }

          ?>


          </tbody>
        </table>

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