<?php
/**
 * Created by PhpStorm.
 * User: Ruby
 * Date: 11/26/2016
 * Time: 5:03 PM
 */
include("../lib/config.php");
include("../includes/checksession.php");
include("../includes/header.php");
?>
<link rel="stylesheet" href="../assets/css/w3css.css">
<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
<div class="row">
    <?php
    if (strtolower($rs_user_role_data["display"])=="super admin") {
        ?>
        <div class="col-sm-4">
            <div class="w3-container" style="height: 300px; width: 600px;">
                <h2>Users</h2>

                <div class="w3-card-12" style="width:50%">
                    <img src="../assets/images/users.jpg" alt="Users" style="height: 300px;width: 100%">
                    <div class="w3-container w3-center">
                        <br/>
                        <p>You can add, edit or delete the users here.</p>
                        <p><a href="../user/content.php" class="btn btn-primary">Users</a></p>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>

    <div class="col-sm-4">
        <div class="w3-container" style="height: 300px; width: 600px;">
            <h2>Category</h2>

            <div class="w3-card-12" style="width:50%">
                <img align="center" src="../assets/images/categories.jpg" alt="Category" style="height: 300px;width: 100%">
                <div class="w3-container w3-center">
                    <br/>
                    <p>You can add, edit or delete the categories here.</p>
                    <p><a href="../category/category.php" class="btn btn-primary">Categories</a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="w3-container" style="height: 300px; width: 600px;">
            <h2>Products</h2>

            <div class="w3-card-12" style="width:50%">
                <img src="../assets/images/products.jpg" alt="Products" style="height: 300px;width: 100%">
                <div class="w3-container w3-center">
                    <br/>
                    <p>You can add, edit or delete the products here.</p>
                    <p><a href="../product/products.php" class="btn btn-primary">Products</a></p>
                </div>
            </div>
        </div>
    </div>

</div>


