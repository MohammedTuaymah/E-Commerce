<?php

session_start();
include('path.php');
include 'config.php';

$product_id = $_GET['id'];

$result = $mysqli->query("SELECT * FROM products WHERE id = ".$product_id);

?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>ECOMMERCE</title>
    <!-- font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/styl.css">
    <title>ECOMMERCE</title>
  <style>
    .container {
      display: flex;
      justify-content: center;
      margin-top: 6rem;
      font-family: 'Open Sans', sans-serif;
      padding: 10px;
    }


    /* .box {
      width: 80%;
      border-radius: 10px;
      box-shadow: 0 0 30px 0 #999; 
    } */

    .product-img {
      float: left;
    }

    .product-img img{
      width: 100%;
      border-radius: 10px;
    }

    .product-info {
      float: right;
    }

    h1 {
      margin-bottom: 50px;
      font-weight: bold;
      font-size: 2.5em;
      color: #333;
      font-family: 'Archivo Black', sans-serif;
    }

    .price {
      margin-top: -20px;
      font-size: 35px;
      font-weight: bolder;
      color: coral;
    }

    .description {
      margin-top: -20px;
      margin-right: 10px;
      font-weight: bold;
      color: #555;
    }
    .color {
      margin-top: 25px;
      outline: none;
      border: 2px solid #999;
      padding: 5px;
      border-radius: 5px;
    }

    .qty {
      outline: none;
      border: 2px solid #999;
      padding: 5px;
      border-radius: 5px;
    }
    .card_btn {
      background: #333;
      font-size: 18px;
      letter-spacing: .1em;
      color: #fff;
      border: 0;
      border-radius: 10px;
      transition: all 0.3s linear;
      padding: 10px;
    }



    @media only screen and (max-width: 480px) {
      .box {
        margin: 20px;
        width: 100%;
        margin: 0;
      }
      .product-info {
        margin: 20px;
      }
    }
  </style>
</head>
<body>
    


<?php include(ROOT_PATH . "/app/includes/header.php"); ?>







<?php

while($obj = $result->fetch_object()) {


  echo '
  <div class="container mb-5 pt-5 text-bg-light rounded-5">
    <div class="row">
      <div class="product-img col-12 col-md-6">
        <img src="' . BASE_URL . '/assets/img/'.$obj->productImg.'" alt="" />
      </div>
      <div class="product-info col-12 col-md-6">
        <h1>'.$obj->productName.'</h1>
        <p class="description">' . $obj->productDesc .'</p>
        <p class="price">'.$obj->price.' SR</p>
        <p class="Quantity fs-3"><strong>Quantity: </strong>'.$obj->Quantity.'</p>';

        if($obj->Quantity > 0){
        echo '
        <a class="card_btn" href="update-cart.php?action=add&id='.$obj->id.'">Add To Cart</a>';
      } else{
        echo '<span style="color: red; font-size: 1.3rem;">Out Of Stock!</span>';
      }
      echo'
      </div>
    </div>
  </div>
  ';


    // echo '<div style="height: auto; width: auto; margin: 30px 30px;" class="post">';

    // echo '<img style="margin-left: 6rem; height: 20rem; width: 20rem;" src="' . BASE_URL . '/assets/img/'.$obj->productImg.'" alt="" ">';
    // echo '<h4 style="text-align: left;"><strong>Product Name: </strong>'.$obj->productName.'</h4>';
    // echo '<h5 style="width: 50%; background: white; border: 1px solid black;"><strong>Description: </strong>' . $obj->productDesc .'</h5>';
    // echo '<h4><strong>Quantity: </strong>'.$obj->Quantity.'</h4>';
    // echo '<h4><strong>Price: </strong>'.$obj->price.' SR</h4>';
        
    // if($obj->Quantity > 0){
    // echo '<a class="btn card_btn" href="update-cart.php?action=add&id='.$obj->id.'">Add To Cart</a>';
    // }
    // else {
    //   echo '<span style="color: red; font-size: 1.3rem;">Out Of Stock!</span>';
    // }

    // echo '</div>';

}
?>


<?php include(ROOT_PATH . "/app/includes/Footer.php"); ?>
</body>
</html>