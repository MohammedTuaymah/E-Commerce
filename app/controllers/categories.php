<?php
include('../../path.php');
session_start();
include ('../../config.php');


if(isset($_POST['createCategory'])){

    $category_name = $_POST["CategoryName"];
    $image = time() . '-' . $_FILES['image']['name'];

    
    $target_dir="../../assets/img/";
    $target_file=$target_dir . basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target_file);

    $check_Category = $mysqli->query("SELECT category_name FROM categories where category_name = '$category_name'");
    if(mysqli_num_rows($check_Category) > 0){
        $_SESSION['Code_error_msg'] = "Category Name Already exists.";
        header ("location:../../admin/categories/create.php");
        exit();
    }
    else{
    $mysqli->query("INSERT INTO categories (category_name, category_img) VALUES('$category_name', '$image')");
    }
    
    header ("location:../../admin/categories/index.php");
}



if(isset($_POST['deleteCategory'])){
    
    $category_id = $_POST['id'];
    $result = $mysqli->query('DELETE FROM categories WHERE id ='.$category_id);
    
    header ("location:../../admin/categories/index.php");
}


if(isset($_POST['updateCategory'])){
    $category_name = preg_replace('/\s+/', '', $_POST['category_name']);
    $id = $_POST["id"];
    
    $check_Category = $mysqli->query("SELECT category_name FROM categories where category_name = '$category_name'");
    if(mysqli_num_rows($check_Category) > 0){
        $_SESSION['Code_error_msg'] = "Category Name Already exists.";
        header("location:../../admin/categories/edit.php?id=".$id);
        exit();
    }
    else{
    if($category_name!=""){
        $result = $mysqli->query('UPDATE categories SET category_name ="'. $category_name .'" WHERE id ='.$id);
        }
    }
      
      header ("location:../../admin/categories/index.php");
      
}

