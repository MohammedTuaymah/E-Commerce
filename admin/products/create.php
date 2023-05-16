<?php
include('../../path.php');
session_start();
include ('../../config.php');
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


      

  <div class="admin-wrapper my-5">

    <!-- Admin Content -->
    <div class="container">
      <div class="admin-content">
        
        <div class="button-group mb-4">
          <a href="create.php" class="btn btn-big adding_managing">Add Product</a>
          <a href="index.php" class="btn btn-big adding_managing">Manage Products</a>
        </div>

      <div class="content border">
      
      <?php  
      if( ! empty($_SESSION['Code_error_msg']))
      {
          //display the message however you want
          echo '<h1 style="color: red;">Product Code Or Name Already exists</h1>';
          unset($_SESSION['Code_error_msg']);
      }
      ?>


      <h4 style="background-color: #222; color: white; margin: unset; border-radius: 20px 20px 0px 0px; padding: 10px">All Details</h4>
        <form class="p-3 text-bg-light" action="../../app/controllers/Products.php" method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label class="form-label">Product Code</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="productCode" class="text-input" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Product Name</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="productName" class="text-input" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Quantity</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="Quantity" class="text-input" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="price" class="text-input" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Product Description</label><br>
            <textarea style="width:100%; padding: 14px" name="body" id="editor"></textarea>
          </div>

          <label for="images" class="drop-container">
            <span class="drop-title">Drop files here</span>
            or
            <input type="file" id="images" name="image" class="text-input" accept="image/*">
          </label>


          <div class="my-3">
            <label>Category</label>

            <?php
            $result = $mysqli->query('SELECT * FROM categories');
            if($result){
              echo '<select class="form-control" name="category_id" id="categoryForm" placeholder="Category">';

                while($obj = $result->fetch_object()){
              echo '
                <option value="'.$obj->id.'">'.$obj->category_name.'</option>
                ';
              }
            }
            echo '</select>
            </div>
          ';
            ?>

            <div class="d-flex">
              <span>Trend Product</span>
              <label class="switch">
                <input type="checkbox" name="check" value="checked">
                <span class="slider round"></span>
              </label>
            </div>
          <!-- <div>
          <label for="exampleInputPassword1" class="form-label">Product Description</label>
            <textarea name="body" id="editor"></textarea>
            <script>
              ClassicEditor.create(document.querySelector("#editor")).catch(
                (error) => {
                  console.error(error);
                }
              );
            </script>
            </div> -->
          <button type="submit" name="createProduct" class="btn btn-big bg-primary text-light">Add Product</button>
          </div>
        </form>
      </div>
    </div>
    <!-- // Admin Content -->


    </div>
  </div> 
      <!-- // Content -->









      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
      <!-- JS -->
      <script src="../../assets/js/main.js"></script>
</body>
</html>