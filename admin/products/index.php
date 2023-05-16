<?php
include('../../path.php');
session_start();
include '../../config.php';
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
        <title>Admin Section - Manage Products </title>
</head>
<body style="background: #ebeaf1!important;">
    

<?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>


      

  <div class="admin-wrapper">




    <!-- Admin Content -->
    <div class="container">
      <div class="admin-content">
        <div class="row">
          <div class="button-group col-12">
            <a href="create.php" class="btn btn-big adding_managing">Add Product</a>
            <a href="index.php" class="btn btn-big adding_managing">Manage Products</a>
              <div class="btn-group dropend">
              <button type="button" class="btn btn-secondary dropdown-toggle dropping_left" data-bs-toggle="dropdown" aria-expanded="false">
              Filter<i class="fa fa-filter"></i>
              </button>
              <ul class="dropdown-menu">
                <?php
                    $i=0;

                    $result = $mysqli->query('SELECT * FROM categories');
                
                  if($result){
                    while($obj = $result->fetch_object()) {
                    echo '
                    <a href="singleCategory.php?id='.$obj->id.'" class="btn btn-big fs-5" style="display: inherit;">'.$obj->category_name.'</a>
                    ';
                    $i++;
                    }
                  }
                  ?>
              </ul>
            </div>
          </div>
          <div class="col-12 mt-2">
            <form method="GET" action="index.php">
              <div class="input-group justify-content-end mb-0">
                <div class="form-outline">
                  <input type="search" name="search" id="form1" class="form-control border border-end-0 rounded-start" />
                </div>
                <button type="submit" class="btn border border-start-0 text-light h-50" style="background-color: #303036;">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </form>
          </div>
        </div>


        <h2 class="page-title my-3">Manage Products</h2>







        <?php


        $i=0;
        if (isset($_GET["search"])) {
          $res = $_GET["search"];
          $result = $mysqli->query("select * from products where productName like '%". $res ."%'");
          if($result){

            echo '
            <h2 style="color:red">You Searched For...</h2>
            <table style="background: white; border-radius: 25px; margin-bottom: 7rem" class="border border-danger">
              <head>
                <th>SN</th>
                <th>Product_Code</th>
                <th>Product_Name</th>
                <th>Quantity</th>
                <th>Product_Desc</th>
                <th>Product_Img</th>
                <th colspan="3">Action</th>
              </head>
              <tbody>';
    
                  while($obj = $result->fetch_object()) {
    
                    echo '<tr>
                    <input type="hidden" name="id" value="' .$obj->id .'">
                    <td>'.$i + 1 .'</td>
                    <td>'.$obj->productCode.'</td>
                    <td>'.$obj->productName.'</td>
                    <td>'.$obj->Quantity.'</td>
                    <td>' . html_entity_decode(substr($obj->productDesc, 0, 30) . '.....').'</td>
                    <td><img src="' . BASE_URL . 'assets/img/'.$obj->productImg.'" alt="" style="width: 120px"></td>
                    <td><a href="edit.php?id='.$obj->id.'" class="edit">edit</a></td>
    
                    <td>
                    <form action="../../app/controllers/Products.php" method="post"><input type="hidden" name="id" value="' .$obj->id .'">
                    <button style="border: none;" type="submit" name="deleteProduct" class="delete">delete</button>
                    </form>
                    </td>
                    ';
                    $i++;
    
                  }
                }
                //$_SESSION['product_id'] = $product_id;
              echo '
              </tbody>
            </table>
            <hr><hr>
                ';
          }
          ?>





          <?php
        $i=0;
        $result = $mysqli->query('SELECT * FROM products ORDER BY id DESC;');
        if($result){
        echo '
        <table style="background: white; border-radius: 25px">
          <head>
            <th>SN</th>
            <th>Product_Code</th>
            <th>Product_Name</th>
            <th>Quantity</th>
            <th>Product_Desc</th>
            <th>Product_Img</th>
            <th colspan="3">Action</th>
          </head>
          <tbody>';
              while($obj = $result->fetch_object()) {

                echo '<tr>
                <input type="hidden" name="id" value="' .$obj->id .'">
                <td>'.$i + 1 .'</td>
                <td>'.$obj->productCode.'</td>
                <td>'.$obj->productName.'</td>
                <td>'.$obj->Quantity.'</td>
                <td>' . html_entity_decode(substr($obj->productDesc, 0, 30) . '.....').'</td>
                <td><img src="' . BASE_URL . 'assets/img/'.$obj->productImg.'" alt="" style="width: 120px"></td>
                <td><a href="edit.php?id='.$obj->id.'" class="edit">edit</a></td>

                <td>
                <form action="../../app/controllers/Products.php" method="post"><input type="hidden" name="id" value="' .$obj->id .'">
                <button style="border: none;" type="submit" name="deleteProduct" class="delete">delete</button>
                </form>
                </td>
                ';
                $i++;

              }
            }
            //$_SESSION['product_id'] = $product_id;
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