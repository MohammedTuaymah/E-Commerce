<?php
include('../../path.php');
session_start();
include ('../../config.php');
//include 'config.php';

$product_id = $_GET['id'];
$action = $_GET['action'];


$result = $mysqli->query("SELECT * FROM products WHERE id = ".$product_id);



if($result){

    if($obj = $result->fetch_object()) {
  
      switch($action) {
  
        case "add":
            $result = $mysqli->query("UPDATE products SET IsTrend = 1 WHERE id = ".$product_id);
        break;
  
        case "remove":
            $result = $mysqli->query("UPDATE products SET IsTrend = 0 WHERE id = ".$product_id);
          break;
  
  
  
      }
    }
  }


  header("location:edit.php?id=".$product_id);