<?php
/**
 * Created by PhpStorm.
 * User: Ruby
 * Date: 11/21/2016
 * Time: 7:14 PM
 */

include("../lib/config.php");
include("../includes/checksession.php");
$id=$_GET['id'];

$rs_image=mysqli_query($conn, "select image from product where id=$id");
$rs_image_data=mysqli_fetch_assoc($rs_image);
$rs_p = mysqli_query($conn,"delete from product where id=$id");

unlink("../assets/images/products/".$rs_image_data['image']);
header("Location:products.php");

?>