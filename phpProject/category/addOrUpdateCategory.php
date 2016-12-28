<?php
/**
 * Created by PhpStorm.
 * User: Ruby
 * Date: 11/21/2016
 * Time: 6:05 PM
 */

include("../lib/config.php");
include("../includes/checksession.php");
$id=$_GET['id'];
$target = "../assets/images/category/".basename($_FILES['category_pic']['name']);
$_SESSION["message"]="";
$name=ucwords($_POST["name"]);
$category_img=$_FILES['category_pic']['name'];
$description=$_POST["description"];
$pageTitle=$_POST["page_title"];
$pageKey=$_POST["page_keywords"];
$pageDescription=$_POST["page_description"];
$action=$_GET['action'];


if ($action=="update"){
    $prior_img=mysqli_query($conn, "select image from category where id=$id");
    $prior_img_data=mysqli_fetch_assoc($prior_img);
    if (!empty($category_img)){
        unlink("../assets/images/category/".$prior_img_data['image']);
    }
    if (empty($category_img)){
        $category_img=$prior_img_data['image'];
    }

    $rs_user = mysqli_query($conn,"update category set name='$name', description='$description', image='$category_img', page_title='$pageTitle', page_keywords='$pageKey', page_description='$pageDescription' where id=$id");
}else{
    $rs_user = mysqli_query($conn,"insert into category (name, description, image, page_title, page_keywords, page_description) VALUES ('$name', '$description', '$category_img', '$pageTitle', '$pageKey', '$pageDescription')");
}

if (!empty($_FILES['category_pic']['name'])){
    if (move_uploaded_file($_FILES['category_pic']['tmp_name'], $target)) {
        header("Location:category.php");
    } else {
        $_SESSION["message"] = "There is an error with image. Try again!";
        header("Location:category.php");
    }
}
header("Location:category.php");
?>