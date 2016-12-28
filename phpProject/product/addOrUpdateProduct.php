<?php
/**
 * Created by PhpStorm.
 * User: Ruby
 * Date: 11/23/2016
 * Time: 4:42 PM
 */
include("../lib/config.php");
include("../includes/checksession.php");
$_SESSION["message"]="";
$target = "../assets/images/products/".basename($_FILES['pr_image']['name']);
$id=$_GET['id'];
$name=ucwords(addslashes ($_POST["pr_name"]));
$category=$_POST["pr_category"];
$product_img=$_FILES['pr_image']['name'];
$description=addslashes ($_POST["pr_description"]);
$price=$_POST["pr_price"];
$stock=$_POST["pr_stock"];
$discount=$_POST["pr_discount"];
$action=$_GET['action'];

if ($action=="add"){
    $rs_user = mysqli_query($conn,"insert into product (name, category_id, description, price, stock, image, discount) VALUES ('$name', $category, '$description', $price,$stock, '$product_img', $discount)");
}else
{
    $prior_img=mysqli_query($conn, "select image from product where id=$id");
    $prior_img_data=mysqli_fetch_assoc($prior_img);
    if (!empty($product_img)){
        unlink("../assets/images/products/".$prior_img_data['image']);
    }
    if (empty($product_img)){
        $product_img=$prior_img_data['image'];
    }

    $rs_user = mysqli_query($conn,'update product set name="$name", description="$description", image="$product_img", category_id=$category, stock=$stock, discount=$discount, price=$price where id=$id');
}

if (!empty($_FILES['pr_image']['name'])){
    if (move_uploaded_file($_FILES['pr_image']['tmp_name'], $target)) {
        header("Location:products.php");
    } else {
        $_SESSION["message"] = "There is an error with image. Try again!";
        header("Location:products.php");
    }
}
header("Location:products.php");

?>