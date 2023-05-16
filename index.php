<?php
session_start();
include('path.php');
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>ECOMMERCE</title>
    <link rel="icon" href="assets/img/M_Logo.jpeg" type = "png">
    <!-- font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/styl.css">
</head>
<body>
    







    <?php include(ROOT_PATH . "/app/includes/header.php"); ?>


 

      

  <div class="page-wrapper">




  <?php
  $i=0;
  if (isset($_GET["search"])) {
    $res = $_GET["search"];
    $result = $mysqli->query("select * from products where productName like '%". $res ."%'");
    if($result){
      echo'
      <section class="py-5 my-5">
        <div class="container">
          <div class="row cards">
          <h2 style="color:red">You Searched For...</h2>
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
              <img src="' . BASE_URL . '/assets/img/'.$obj->productImg.'" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text border-top">'.$obj->productName.'</p>
                <div class="d-flex justify-content-between align-items-center">';
                if($obj->Quantity > 0){
                echo'
                  <a href="#" class="btn btn-primary"><i class="fa fa-cart-shopping text-light"></i></a>';
                }
                else{
                  echo '<a href="#" class="btn btn-primary disabled"><i class="fa fa-cart-shopping text-light"></i></a>';
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
      }
    }
    // $_SESSION['product_id'] = $product_id;



  ?>


    <!-- Banner -->
    <div>
      <img src="assets/img/Banner.jpg" class="img-fluid" alt="Responsive image">
    </div>
    <!--// Banner //-->



    <?php

      $result = $mysqli->query('SELECT * FROM `products` WHERE IsTrend = 1');

      echo '
    <div class="slide-container swiper my-4">
            <div class="slide-content">
            <center><h2>Trending Products</h2></center>
                <div class="card-wrapper swiper-wrapper">';

                while($obj = $result->fetch_object()) {
                echo '
                    <div class="card swiper-slide">
                        <div class="image-content">

                            <div class="card-image">';
                            if($obj->Quantity < 1){
                              echo'
                              <p class="outOfStock">out of stock</p>';
                            }
                            echo '
                                <a href="single.php?id='.$obj->id.'">
                                    <img src="' . BASE_URL . '/assets/img/'.$obj->productImg.'" alt="" class="card-img">
                                </a>
                            </div>
                        </div>

                        <div class="card-content">
                            <h5>'.$obj->productName.'</h5>
                            <div class="w-100 d-flex justify-content-between">';
                            if($obj->Quantity > 0){
                              echo'
                                <a href="update-cart.php?action=add&id='.$obj->id.'" class="btn btn-primary"><i class="fa fa-cart-shopping text-light"></i></a>';
                              }
                              else{
                                echo '<a href="update-cart.php?action=add&id='.$obj->id.'" class="btn btn-primary disabled"><i class="fa fa-cart-shopping text-light"></i></a>';
                              }
                            echo '
                            <h2 class="price d-flex align-items-end">'.$obj->price.'</h2>
                            </div>
                        </div>
                    </div>';
                  }
                  echo '
                </div>
            </div>

            <!-- <div class="swiper-button-next swiper-navBtn"></div>
            <div class="swiper-button-prev swiper-navBtn"></div> -->
            <div class="swiper-pagination"></div>
        </div>

        ';
                
    ?>



























        
  
  <!-- Categories Roll -->
    <?php
    $i=0;

    $result = $mysqli->query('SELECT * FROM categories');

    if($result){
      echo '  <div class="container">';
      while($obj = $result->fetch_object()) {
    echo '
        <div class="my-5 d-flex justify-content-center flex-column align-items-center w-100">
          <h3>'.$obj->category_name.'</h3>
          <a href="oneCategory.php?id='.$obj->id.'" class="w-100"><img src="' . BASE_URL . '/assets/img/'.$obj->category_img.'" class="img-fluid rounded banners w-100" alt="Responsive image"></a>
        </div>
        ';
      }
      echo '</div>';
    }
        $i++;
        ?>
  <!--/// Categories Roll ///-->
  





<?php
// $result = $mysqli->query('SELECT * FROM products');

// echo '
// <div class="main">
// <ul class="cards">
// ';
    
//     while($obj = $result->fetch_object()) {
      
//       echo '<li class="cards_item">
//       <div class="card">
//       <div class="card_image"><img style="height: 14rem; width:100%;" src="' . BASE_URL . '/assets/img/'.$obj->productImg.'" alt=""></div>
//       <div class="card_content">
//       <h2 class="card_title">'.$obj->productName.'</h2>
//       <p class="card_text"><strong>Description:</strong>' . html_entity_decode(substr($obj->productDesc, 0,60) . '.....').'</p>
//       <p class="card_text"><strong>Quantity Available: </strong>'.$obj->Quantity.'</p>
//       <p class="card_text"> <strong>Price (Per Unit): </strong>'.$obj->price.'</p>
//       <a href="single.php?id='.$obj->id.'" class="btn card_btn">Read More</a>
//       ';
//       if($obj->Quantity > 0){
//         echo '<a class="btn card_btn" href="update-cart.php?action=add&id='.$obj->id.'">Add To Cart</a>';
//         }
//         else {
//           echo '<span style="color: red; font-size: 1.3rem;">Out Of Stock!</span>';
//         }
//       echo '
//             </div>
//             </div>
//           </li>
//       ';
//     }
//     echo '
//     </ul>
//     </div>
//     ';

?>






       
  </div>
      
      <!-- // Content -->



      <?php include(ROOT_PATH . "/app/includes/Footer.php"); ?>

        <!-- Swiper JS -->
        <script src="assets/js/swiper-bundle.min.js"></script>
        <script>
          var swiper = new Swiper(".slide-content", {
          slidesPerView: 3,
          spaceBetween: 25,
          loop: true,
          centerSlide: 'true',
          fade: 'true',
          grabCursor: 'true',
          pagination: {
            el: ".swiper-pagination",
            clickable: true,
            dynamicBullets: true,
          },
          navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
          },

          breakpoints:{
              0: {
                  slidesPerView: 2,
              },
              520: {
                  slidesPerView: 2,
              },
              950: {
                  slidesPerView: 3,
              },
          },
        });
        </script>
</body>
</html>