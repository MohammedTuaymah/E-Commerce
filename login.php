<?php 
include('path.php');
session_start();
include 'config.php';

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

    <title>Login</title>
</head>
<body>
    

<?php include(ROOT_PATH . "/app/includes/header.php"); ?>



    <!-- <div class="auth-content">
        <form action="app/controllers/users.php" method="post">
        <h2 class="form-title">Login</h2>


        <div>
            <label>User Name</label>
            <input type="text" name="username" class="text-input">
        </div>
        <div>
            <label>Password</label>
            
        </div>
        <div>
            <button type="submit" value="Login" name="login-btn" class="btn btn-big">Login</button>
        </div><input type="password" name="password" class="text-input">
        <p>Or <a href="<?php echo BASE_URL . '/register.php' ?>">Sign Up</a></p>
        
        </form>
    </div> -->





    <section class="vh-100" style="margin-top: 4rem;">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5 my-5">
                <img src="assets/img/M_Logo.jpeg" class="img-fluid rounded-5" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form action="app/controllers/users.php" method="post">
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="text" name="username" class="form-control form-control-lg" placeholder="Enter a valid email address">
                    <label class="form-label" for="form3Example3">User Name</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-3">
                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Enter password">
                    <label class="form-label" for="form3Example4">Password</label>
                </div>

                <!-- <div class="d-flex justify-content-between align-items-center">
                    <div class="form-check mb-0">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                    <label class="form-check-label" for="form2Example3">
                        Remember me
                    </label>
                    </div>
                    <a href="#!" class="text-body">Forgot password?</a>
                </div> -->

                <div class="text-center text-lg-start mt-4 pt-2">
                    <button type="submit" class="btn btn-lg text-light" value="Login" name="login-btn"
                    style="padding-left: 2.5rem; padding-right: 2.5rem; background-color: #303036;">Login</button>
                    <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="<?php echo BASE_URL . '/register.php' ?>"
                        class="link-danger">Register</a></p>
                </div>

                </form>
            </div>
            </div>
        </div>
        <div
            class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5" style="background-color: #303036; margin-top: 16rem">
            <!-- Copyright -->
            <div class="text-white mb-3 mb-md-0">
            Copyright © 2020. All rights reserved.
            </div>
            <!-- Copyright -->

            <!-- Right -->
            <div>
            <a href="#!" class="text-white me-4">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#!" class="text-white me-4">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="#!" class="text-white me-4">
                <i class="fab fa-google"></i>
            </a>
            <a href="#!" class="text-white">
                <i class="fab fa-linkedin-in"></i>
            </a>
            </div>
            <!-- Right -->
        </div>
    </section>






    






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <!-- JS -->
  <script src="assets/js/main.js"></script>
</body>
</html>