<?php
/**
 * Created by PhpStorm.
 * User: Ruby
 * Date: 11/21/2016
 * Time: 4:35 PM
 */
include("../lib/config.php");
include("../includes/checksession.php");
include("../includes/header.php");
?>
<h1>Add New Category</h1>
<form action="addOrUpdateCategory.php?action=add&id=-1" method="post" enctype="multipart/form-data">
    <?php include("categoryDetails.php"); ?>
    <input type="submit" value="Create Category" class="btn btn-primary">
</form>