<!DOCTYPE html>

<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/css/font-awesome.min.css">
<link rel="stylesheet" href="../assets/css/bootstrap-theme.css">
<link rel="stylesheet" href="../assets/css/style.css">
<script src="../assets/js/jquery-1.10.2.min.js"></script>
<script src="../assets/js/jquery.backstretch.min.js"></script>
<script src="../assets/js/retina-1.1.0.min.js"></script>
<script src="../assets/js/scripts.js"></script>
<?php

$rs_user_role = mysqli_query($conn,"SELECT role.display FROM users LEFT JOIN role on role.id=users.role WHERE users.id=" . $_SESSION["userid"]);
$rs_user_role_data=mysqli_fetch_assoc($rs_user_role);?>

<div id="body" style="padding: 25px;">
    <nav class="nav nav-pills" style="background-color: #204d74; padding: 20px; color:#ffffff; border-radius: 10px;">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" style="color: #ffffff;" href="../dashboard/admindashboard.php"><b><?php echo strtoupper($rs_user_role_data["display"]); ?> PANEL</b></a>
            </div>
            <ul class="nav nav-pills" style="float:right;">
                   <?php
                    if (strtolower($rs_user_role_data["display"])=="super admin") {
                        ?>
                        <li>
                            <a href="../user/content.php" style="color:#ffffff;">Users</a>
                        </li>
                    <?php
                    }
                    ?>
                    <li>
                        <a href="../category/category.php" style="color:#ffffff;">Categories</a>
                    </li>

                    <li>
                        <a href="../product/products.php" style="color:#ffffff;">Products</a>
                    </li>

                    <li>
                        <a href="../logout.php" class="btn btn-danger" style="float: right;">Logout</a>
                    </li>
            </ul>
            </div></nav>

