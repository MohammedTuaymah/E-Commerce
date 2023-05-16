<?php
session_start();
include('path.php');
include 'config.php';
if(!isset($_SESSION["username"])){
    header("location:index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>ECOMMERCE</title>
    <!-- font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/styl.css">

    <style>
      /* .footer{
        position: absolute;
        bottom: 0px;
        left: 0px;
      }
      header {
        position: inherit;
      } */
    </style>
</head>
<body>

    <?php include(ROOT_PATH . "/app/includes/header.php"); ?>


    <div class="page-wrapper" style="height: 50vh;">

    </div>









        

<?php include(ROOT_PATH . "/app/includes/Footer.php"); ?>

</body>
</html>