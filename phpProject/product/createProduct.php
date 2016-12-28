<?php
/**
 * Created by PhpStorm.
 * User: Ruby
 * Date: 11/23/2016
 * Time: 4:32 PM
 */

include("../lib/config.php");
include("../includes/checksession.php");
include("../includes/header.php");
?>

<h2>Create New Product</h2>
<form action="addOrUpdateProduct.php?action=add&id=-1" method="post" enctype="multipart/form-data">
    <?php include("productDetails.php"); ?>
    <input type="submit" value="Create Product" class="btn btn-primary">
</form>