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

    <?php include(ROOT_PATH . "/app/includes/header.php"); ?>




    
    <div class="page-wrapper" style="margin-top: 7rem; margin-bottom:7rem">
        <h3>My COD Orders</h3>
        <hr>



        <?php
        if(isset($_SESSION["username"])){
          $result = $mysqli->query("SELECT * from orders where username='".$_SESSION["username"]."' ORDER BY id DESC");
          if($result) {
            echo '
            <div class="container mt-5 mb-5">
            <div style="width: 62rem;">
                <table class="table align-middle mb-0 bg-white">
                    <thead class="bg-light">
                    <tr>
                        <th>Order ID</th>
                        <th>Name</th>
                        <th>Date of Purchase</th>
                        <th>Status</th>
                        <th>Price Per Unit</th>
                        <th>Units Bought</th>
                        <th>Total Cost</th>
                    </tr>
                    </thead>
                    <tbody>
            ';
            while($obj = $result->fetch_object()) {
              echo '
              <tr>
                  <td>
                  '.$obj->id.'
                  </td>
                  <td>
                      <p class="mb-0"><strong>Product Name: </strong>'.$obj->productName.'</p>
                      <p class="mb-0"><strong>Product Code: </strong>'.$obj->productCode.'</p>
                  </td>
                  <td>
                      <p class="fw-normal mb-1"> '.$obj->date.'</p>
                  </td>
                  <td>
                  <span style="background: #eef5fb; color: #108aed; font-size: 20px;" class="badge rounded-pill d-inline">complete</span>
                  </td>
                  <td>'.$obj->Price.'</td>
                  <td>
                      <p>'.$obj->units.'</p>
                  </td>
                  <td>'.$obj->total.'</td>
              </tr>
              ';
            }
          }
        }
        ?>
                </tbody>
            </table>
        </div>
    </div>


    </div>

    









    

    <?php include(ROOT_PATH . "/app/includes/Footer.php"); ?>
</body>
</html>