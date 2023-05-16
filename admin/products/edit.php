<?php
include('../../path.php');
session_start();
include ('../../config.php');

$product_id = $_GET['id'];

$result = $mysqli->query("SELECT * FROM products WHERE id = ".$product_id);

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
    <title>Admin Section - Add Posts </title>
</head>
<body style="background: #ebeaf1!important;">
    


  <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>
      <!-- End Nav -->


      

  <div class="container admin-wrapper">

    <!-- Admin Content -->
    <div class="admin-content">
      <div class="button-group">
        <a href="create.php" class="btn btn-big adding_managing">Add Product</a>
        <a href="index.php" class="btn btn-big adding_managing">Manage Products</a>
      </div>

      <div class="content">

        <h2 class="my-3">Edit Product</h2>


        <?php

        if( ! empty($_SESSION['Code_error_msg']))
        {
            //display the message however you want
            echo '<h1 class="text-bg-danger text light w-75 rounded-4 d-flex justify-content-center">Product Code Or Name Already exists.</h1>';
            unset($_SESSION['Code_error_msg']);
        }

        // $product_id = array();
        //$result = $mysqli->query('SELECT * FROM products WHERE id='. $product_id);
        if($result) {
        $obj = $result->fetch_object();
        echo '<form action="../../app/controllers/products.php" method="post" class="text-bg-light p-3 rounded-4">
            <div>
                <input class="editingForm" type="hidden" name="id" value="' .$obj->id .'">
                <label>Product Code</label><br>
                <input class="editingForm" type="text" name="productCode" value="'. $obj->productCode. '" class="text-input"><br>
                <label>Product Name</label><br>
                <input class="editingForm" type="text" name="productName" value="'. $obj->productName. '" class="text-input"><br>
                <label>Quantity</label><br>
                <input class="editingForm" type="text" name="Quantity" value="'. $obj->Quantity. '" class="text-input"><br>
                <label>Price</label><br>
                <input class="editingForm" type="text" name="price" value="'. $obj->price. '" class="text-input"><br>
            </div>

            <div>
                <label>Product Description</label><br>
                <textarea name="body" id="editor" class="editingForm">'. $obj->productDesc .'</textarea>
                <script>
                  ClassicEditor.create(document.querySelector("#editor")).catch(
                    (error) => {
                      console.error(error);
                    }
                  );
                </script>
            </div>';
            echo '<div class="my-3">';
            if($obj->IsTrend == 1){
              echo' <a class="text-bg-danger p-2 rounded-3" href="status.php?action=remove&id='.$product_id.'">Disable Trending</a><br>';
            }
            else{
              echo '<a class="text-bg-success p-2 rounded-3" href="status.php?action=add&id='.$product_id.'">enable Trending</a><br>';
            }
            echo '</div>
            <button type="submit" name="updateProduct" class="btn btn-big text-bg-primary">Update Product</button>
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