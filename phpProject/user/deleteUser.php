<?php
/**
 * Created by PhpStorm.
 * User: Ruby
 * Date: 11/16/2016
 * Time: 1:49 PM
 */

include("../lib/config.php");
include("../includes/checksession.php");
$id=$_GET['id'];
echo $id;
$rs_user = mysqli_query($conn,"delete from users where id=$id");
header("Location:content.php");
?>