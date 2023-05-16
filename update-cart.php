<?php
session_start();

include 'config.php';

$product_id = $_GET['id'];
$action = $_GET['action'];


if($action === 'empty'){
  unset($_SESSION['cart']);
  header("location:index.php");
}

$result = $mysqli->query("SELECT Quantity FROM products WHERE id = ".$product_id);


if($result){

  if($obj = $result->fetch_object()) {

    switch($action) {

      case "add":
      if($_SESSION['cart'][$product_id]+1 <= $obj->Quantity)
        $_SESSION['cart'][$product_id]++;
      break;

      case "remove":
      $_SESSION['cart'][$product_id]--;
      if($_SESSION['cart'][$product_id] == 0)
        unset($_SESSION['cart'][$product_id]);
        break;



    }
  }
}



header("location:cart.php");

?>
