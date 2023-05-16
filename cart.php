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
    <!-- font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/styl.css">
    <title>ECOMMERCE</title>


</head>
<body>
    
<div class="page-wrapper">


<?php include(ROOT_PATH . "/app/includes/header.php"); ?>



<?php
if(isset($_SESSION['cart'])) {
  $total = 0;

  echo '
  <div class="container" style="margin-top: 10rem; margin-bottom: 8rem">
    <div class="row">
      <div class="col-12 col-lg-8">
        <a href="update-cart.php?action=empty" class="py-1 mb-3 btn btn-default w-100 border border-dark fs-5"><i class="fa fa-trash"></i> إفراغ عربة التسوق</a>
  ';
  foreach($_SESSION['cart'] as $product_id => $Quantity) {

    $result = $mysqli->query("SELECT productCode, productName, productImg, productDesc, Quantity, Price FROM products WHERE id = ".$product_id);


    if($result){

      while($obj = $result->fetch_object()) {
        $cost = $obj->Price * $Quantity; //work out the line cost
        $total = $total + $cost; //add to the total cost

        echo '
        <div class="the_orders w-100 d-flex justify-content-between border-bottom" style="height: 10rem;">
            <div class="product_info" style="width: 70%;">
                <div class="d-flex justify-content-center float-start" style="height: 100%;">
                    <img src="' . BASE_URL . '/assets/img/'.$obj->productImg.'" alt="" style="height: 80%;" class="p-1">
                    <div class="p-2 d-flex flex-column">
                        <p class="m-1 overflow-hidden fs-5 h-auto">'.$obj->productName.'</p>
                        <p class="m-1">Price Per Unit: '.$obj->Price.'</p>
                        <div class="product-cart-remove"><a href="update-cart.php?action=remove&id='.$product_id.'" class="btn-remove text-dark text-decoration-none p-0"><i class="fa fa-trash"></i> حذف </a></div>
                    </div>
                </div>
            </div>
            <div class="p-2 position-relative w-25 d-flex justify-content-end">
                <div class="qnty">
                    <a class="mx-1" href="update-cart.php?action=add&id='.$product_id.'"><i class="fa fa-circle-plus"></i></a>
                    <span style="font-size: 20px;">'.$Quantity.'</span>
                    <a class="mx-1" href="update-cart.php?action=remove&id='.$product_id.'"><i class="fa fa-circle-minus"></i></a>
                </div>
                <div class="total position-absolute bottom-0">
                    <p><strong>Cost: </strong>'.$cost.'</p>
                </div>
            </div>
        </div>
        ';
      }
    }
  }
  echo '
  </div>
  <div class="col-12 col-lg-4">
    <div class="Order_Summary">
    <h2 style="background-color: #303036; color: white;padding: 5px;border-radius: 10px;">Order Summary</h2>
    <hr>
    <h3><strong>Total: </strong>'.$total.'</h3>
    <hr>';

    if(isset($_SESSION['id'])) {
    echo'
    <a class="COD" href="orders-update.php">
        <div style="width: 100%; background-color: #303036; border-radius: 10px; cursor: pointer;">
            COD
        </div>
    </a>';
    }
    else {
      echo '<a href="login.php"><button style="float:right; width: 50%; background-color: #303036; border-radius: 10px; cursor: pointer; color: white">Login</button></a>';
    }
    echo'
    </div>
  </div>
    </div>
      </div>
  ';


}
else{
  echo '
  <div style="height:50vh; padding: 15px; display: flex; align-items: center;">
  <h2>Your cart is empty</h2>
  </div>';
}


?>



      </div>


<?php include(ROOT_PATH . "/app/includes/Footer.php"); ?>

  </body>
</html>
