<?php
/**
 * Created by PhpStorm.
 * User: Ruby
 * Date: 11/27/2016
 * Time: 2:52 PM
 */
include("../lib/config.php");
include("pHeader.php");
$pid=$_GET['productid'];
$sessionId=session_id();
$qty=$_POST['qty'];

$product_info= mysqli_query($conn,"Select * from product where id=$pid");
$product_info_det=mysqli_fetch_assoc($product_info);
$category_id=$product_info_det['category_id'];
$category_info=mysqli_query($conn,"Select * from category where id=$category_id");
$category_name=mysqli_fetch_assoc($category_info)['name'];
$new_stock=$product_info_det['stock']-$qty;

$insert_to_cart=mysqli_query($conn,"insert into cart (session_id, product_id, quantity) values('$sessionId', $pid, $qty)");
$update_stock=mysqli_query($conn,"update product set stock=$new_stock where id=$pid;");

header("Location:viewCart.php");
?>
