<?php
include('../../path.php');
session_start();
include ('../../config.php');


if(isset($_POST['createProduct'])){

    $productCode = $_POST["productCode"];
    $productName = $_POST["productName"];
    $Quantity = $_POST["Quantity"];
    $price = $_POST["price"];
    $productDesc = $_POST["body"];
    $image = time() . '-' . $_FILES['image']['name'];
    $categoryId = $_POST['category_id'];
    
    $target_dir="../../assets/img/";
    $target_file=$target_dir . basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target_file);

    if ( isset($_POST['check']) ) {
        $check = 1;
    } else { 
        $check = 0;
    }

    $check_Code = $mysqli->query("SELECT productCode FROM products where productCode = '$productCode' or productName = '$productName' ");
    if(mysqli_num_rows($check_Code) > 0){
        $_SESSION['Code_error_msg'] = "Sorry, that Code Already exists.";
        header ("location:../../admin/products/create.php");
        exit();
        //echo('Code Already exists');
    }
    else{
        $mysqli->query("INSERT INTO products (productCode, productName, productDesc, productImg, Quantity, price, category_id, IsTrend) VALUES('$productCode', '$productName', '$productDesc', '$image', $Quantity, '$price', '$categoryId', '$check')");
    }
      
    
    header ("location:../../admin/products/index.php");
}



if(isset($_POST['deleteProduct'])){
    
    $product_id = $_POST['id'];
    $result = $mysqli->query('DELETE FROM products WHERE id ='.$product_id);
    
    header ("location:../../admin/products/index.php");
}


if(isset($_POST['updateProduct'])){
    $productCode = preg_replace('/\s+/', '', $_POST['productCode']);
    $productName = preg_replace('/\s+/', '', $_POST['productName']);
    $Quantity = $_POST["Quantity"];
    $price = $_POST["price"];
    $productDesc = $_POST["body"];
    $id = $_POST["id"];



    if($Quantity!="" & $price!="" & $productDesc!=""){

        $result = $mysqli->query('UPDATE products
        SET Quantity = "'. $Quantity .'", Price ="'. $price .'", productDesc ="'. $productDesc .'"
        WHERE id = '.$id);
    }



    try{
        if($productCode!="" & $productName!=""){

            $result = $mysqli->query('UPDATE products
            SET productCode = "'. $productCode .'", productName = "'. $productName .'"
            WHERE id = '.$id);
        }
    }
    catch(mysqli_sql_exception $e){
        // Show generic error message for other errors
        //echo "Error inserting record: " . $e->getMessage();
        header("location:../../admin/products/edit.php?id=".$id);
        $_SESSION['Code_error_msg'] = "Code Or Name Already exists.";
        exit;
    }
        


      
     header ("location:../../admin/products/index.php");
      
}

