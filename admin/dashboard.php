<?php
include('../path.php');
session_start();
include '../config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <title>Admin Section </title>
    <style>
      <?php include "../assets/css/styl.css" ?>
      <?php include "../assets/css/admin.css" ?>
    </style>
</head>
<body style="height: 100vh; display: flex; align-items: center; justify-content: center;">
    


<header class="header">
      <nav class="nav">
          <div class="nav-bar">

          <span class="logo navLogo"><a href="<?php echo BASE_URL . 'index.php' ?>"><img src="../assets/img/M-.png" alt="" style="width: 100px; height: 100px;"></a></span>

              <div>
                  <div class="logo-toggle">
                      <!-- <span class="logo"><a href="<?php echo BASE_URL . 'index.php' ?>"><img src="../assets/img/M-.png" alt="" style="width: 100px; height: 100px;"></a></span> -->
                      <!-- <i class="fa fa-xmark siderbarClose"></i> -->
                  </div>


                  <?php if (isset($_SESSION['id'])): ?>
                  <ul class="nav-links">
                        <div class="btn-group dropstart">
                          <button type="button" class="btn dropdown-toggle text-light fixDrop" data-bs-toggle="dropdown" aria-expanded="false">
                          <?php echo $_SESSION['username']; ?>
                          </button>
                          <ul class="dropdown-menu" style="background-color: #303036;">
                          <?php if($_SESSION['admin'] == 1): ?>
                            <li><a class="dropdown-item text-light headlinks" href="<?php echo BASE_URL . 'index.php' ?>">Store</a></li>
                            <li><a class="dropdown-item text-light headlinks" href="<?php echo admin_URL . 'dashboard.php' ?>">dashboard</a></li>
                            <?php endif; ?>
                            <li><a class="dropdown-item text-danger" href="<?php echo BASE_URL . 'logout.php' ?>">Logout</a></li>
                          </ul>
                        </div>
                      </li>
                  </ul>
                  <?php endif; ?>

                  </div>

                  <ul class="nav-links">
                        <div class="btn-group dropstart">
                          <button type="button" class="btn dropdown-toggle text-light fixDrop" data-bs-toggle="dropdown" aria-expanded="false">
                          Sections
                          </button>
                          <ul class="dropdown-menu" style="background-color: #303036;">
                            <li><a class="dropdown-item text-light headlinks" href="<?php echo BASE_URL . 'admin/products/index.php' ?>">Manage Products</a></li>
                            <li><a class="dropdown-item text-light headlinks" href="<?php echo BASE_URL . 'admin/categories/index.php' ?>">Manage Categories</a></li>
                            <li><a class="dropdown-item text-light headlinks" href="<?php echo BASE_URL . 'admin/users/index.php' ?>">Manage Users</a></li>
                          </ul>
                        </div>
                      </li>
                  </ul>
              
              <!-- <i class="fa fa-bars sidebarOpen"></i> -->
          </div>
      </nav>
    </header>






<div class="container">

    <center>
    <a href="<?php echo BASE_URL . 'admin/products/index.php' ?>" class="button-27 my-1" role="button">Products</a>
    <a href="<?php echo BASE_URL . 'admin/categories/index.php' ?>" class="button-27 my-1" role="button">Categories</a>
    <a href="<?php echo BASE_URL . 'admin/users/index.php' ?>" class="button-27 my-1" role="button">Users</a>
    </center>

</div>









<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<!-- JS -->
<script src="../assets/js/main.js"></script>
</body>
</html>