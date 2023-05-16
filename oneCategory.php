<?php
session_start();
include('path.php');
include 'config.php';

$category_id = $_GET['id'];
$result = $mysqli->query("SELECT * FROM products WHERE category_id = ".$category_id);
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
    <!-- <link rel="stylesheet" href="assets/css/styl.css"> -->
    <title>ECOMMERCE</title>

    <style>
      <?php include "assets/css/styl.css" ?>
    </style>
</head>
<body>
    







    <?php include(ROOT_PATH . "/app/includes/header.php"); ?>


 

      

  <div class="page-wrapper">





<?php
  $i=0;
      echo'
      <section class="py-5 my-5">
        <div class="container">
          <div class="row cards">
      ';
      while($obj = $result->fetch_object())
    {
      echo'
      <div class="px-1 py-1 col-6 col-md-4 col-lg-3">
        <div class="card">';
          if($obj->Quantity < 1){
            echo'
            <p class="outOfStock">out of stock</p>';
          }
            echo'
            <a href="single.php?id='.$obj->id.'">
            <img src="' . BASE_URL . '/assets/img/'.$obj->productImg.'" class="card-img-top" alt="...">
            </a>
              <div class="card-body">
                <p class="card-text border-top pb-1">'.$obj->productName.'</p>
                <div class="d-flex justify-content-between align-items-center">';
                if($obj->Quantity > 0){
                echo'
                  <a href="update-cart.php?action=add&id='.$obj->id.'" class="btn btn-primary"><i class="fa fa-cart-shopping text-light"></i></a>';
                }
                else{
                  echo '<a href="update-cart.php?action=add&id='.$obj->id.'" class="btn btn-primary disabled"><i class="fa fa-cart-shopping text-light"></i></a>';
                }
                  echo'
                <div>'.$obj->price.'</div>
                </div>
              </div>
          </div>
      </div>
      ';
      $i++;
    }
    echo '
    </div>
    </div>
    </section>
    ';

?>






       
  </div>
      
      <!-- // Content -->



      <?php include(ROOT_PATH . "/app/includes/Footer.php"); ?>

    
</body>
</html>