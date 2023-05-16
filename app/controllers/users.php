<?php
include('../../path.php');
session_start();
include ('../../config.php');


if(isset($_POST['login-btn'])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    function redirect() {
      echo '<h1>Invalid Login! Redirecting...</h1>';
      header("Refresh: 1; url=../../login.php");
    }


    
    $result = $mysqli->query('SELECT * from users order by id asc');
    if($result){
      while($obj = $result->fetch_object()){
        if($obj->username === $username && password_verify($password, $obj->password)) {
    
          $_SESSION['id'] = $obj->id;
          $_SESSION['username'] = $obj->username;
          $_SESSION['email'] = $obj->email;
          $_SESSION['admin'] = $obj->admin;
          //$_SESSION['username'] = $username;
    
          header("location:../../index.php");
        } 
        else {
          redirect();
          
        }
      }
    }
    }


if(isset($_POST['add_user']) || isset($_POST['register-btn'])){

  function wrongre() {
    echo '<h1>Invalid Redistring! Redirecting...</h1>';
    header("Refresh: 1; url=../../register.php");
  }

    //$errors = array();

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordConf = $_POST["passwordConf"];
    
    //$admin = 0;

    if ( isset($_POST['check']) ) {
        $admin = 1;
    } else { 
        $admin = 0;
    }

    $check = $mysqli->query("SELECT username FROM users where username = '$username' or email = '$email'");
    if(mysqli_num_rows($check) > 0){
        $_SESSION['Code_error_msg'] = "UserName Or Email Already exists.";
        header("Location: ".$_SERVER['HTTP_REFERER']);
        exit();
    }
    else{

    if ($_POST["password"] === $_POST["passwordConf"]) {
        $password = password_hash($password, PASSWORD_DEFAULT);

        $mysqli->query("INSERT INTO users (admin, username, email, password) VALUES('$admin','$username', '$email', '$password')");

        if($_SESSION['admin'] == 1){
          header("location:../../admin/users/index.php");
          exit();
        }
        else{
          header("location:../../login.php");
          exit();
        }

    }
    else
    {
      wrongre();
    }
  }

}


if(isset($_POST['updateUser'])){

  $username = $_POST["username"];
  $email = preg_replace('/\s+/', '', $_POST['email']);
  $password = $_POST["password"];
  $passwordConf = $_POST["passwordConf"];
  $id = $_POST["id"];

  function wrongupdate() {
    global $id;
    echo '<h1>Password do not match...</h1>';
    header("Refresh: 1;");
  }
  
  if($username!=""){
      $result = $mysqli->query('UPDATE users SET username ="'. $username .'" WHERE id ='.$id);
      if($result){
      }
  }
    
  try{
    if($email!=""){
      $result = $mysqli->query('UPDATE users SET email ="'. $email .'" WHERE id ='.$id);
      if($result){
      }
    }
  }catch(mysqli_sql_exception $e){
    header("location:../../admin/users/edit.php?id=".$id);
    $_SESSION['Code_error_msg'] = "Email Already exists.";
    exit;
  }
    
    if($password!=""){
      if ($_POST["password"] === $_POST["passwordConf"]) {
      $password = password_hash($password, PASSWORD_DEFAULT);

      $result = $mysqli->query('UPDATE users SET password ="'. $password .'" WHERE id ='.$id);
      if($result){
      }
      header ("location:../../admin/users/index.php");
  }
  else
  {
    wrongupdate();
  }
  }
  header ("location:../../admin/users/index.php");
}




if(isset($_POST['deleteUser'])){
    
    $product_id = $_POST['id'];
    $result = $mysqli->query('DELETE FROM users WHERE id ='.$product_id);
    
    header ("location:../../admin/users/index.php");
}