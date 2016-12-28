<?php
/**
 * Created by PhpStorm.
 * User: Ruby
 * Date: 11/29/2016
 * Time: 12:32 AM
 */
include("../lib/config.php");
$sessionid=session_id();
$productid=$_GET['prid'];
$qty=$_GET['quantity'];

$delete_cart_item= mysqli_query($conn,"delete from cart where session_id='$sessionid' and product_id=$productid");
$update_product_stock = mysqli_query($conn,"update product set stock=stock+$qty where id=$productid");

header("Location:viewCart.php#cart");
?>