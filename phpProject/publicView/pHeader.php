
<?php
include("../lib/config.php");
$sessionid=session_id();
$rs_cart=mysqli_query($conn, "select *, sum(quantity) as qtySum from cart left join product on product.id=cart.product_id where session_id='$sessionid' group by cart.product_id");
$cat=mysqli_query($conn, "select * from category");
$amount=0;
$totalqty=0;
while ($rs_res=mysqli_fetch_assoc($rs_cart)){
    $amount=$amount+($rs_res['qtySum']*$rs_res['price']-$rs_res['discount']*$rs_res['qtySum']);
    $totalqty=$totalqty+$rs_res['qtySum'];
}
?>

<head>
    <title>User Panel</title>
    <link rel="stylesheet" href="../assets/css/w3css.css">
    <link rel="stylesheet" href="../assets/css/fonts">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/jquery-1.10.2.min.js"></script>
    <script src="../assets/js/bootstrap.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.backstretch.min.js"></script>
    <script src="../assets/js/retina-1.1.0.min.js"></script>
    <script src="../assets/js/scripts.js"></script>
    <script>
        $(document).ready(function(){
            $('.dropdown-toggle').dropdown();
            $("#cart_info").html("Rs. <?php echo $amount; ?> (<?php echo $totalqty; ?>)");
        });
    </script>
    <style>
        #header {
            position: fixed;
            top: 0;
            width: 100%;
            color: #ffffff;
            background-color: inherit;
            opacity: 0.95;
            z-index: 1;
            padding-bottom: 5px;
        }

    </style>
</head>
<body style="background-image:url(../assets/images/userbackground.jpg);background-size: cover;">
<nav id="header" class="nav nav-pills">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" style="color: #204d74;" href="../publicView/userPanel.php"><h1 style="font-family:cursive; font-size: 30px; font-weight: 800;"><b>Y<span class="glyphicon glyphicon-ok-sign"></span>UR - DEAL</b></h1></a>
        </div>
        <br/><br/>
        <ul class="nav nav-pills" style="float:right;">
            <li><a style="color:#204d74;" href="../login.php"><span class="glyphicon glyphicon-user"></span>&nbsp;<b>Admin Login</b></a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#204d74;"><b>Categories <b class="caret"></b></b></a>
                <ul class="dropdown-menu multi-column columns-3">
                    <div class="row">
                        <div class="col-sm-25">
                            <ul class="multi-column-dropdown">
                                <?php

                                while ($rs_res = mysqli_fetch_assoc($cat))
                                {
                                    ?>
                                    <li><a class="item" href="productByCategory.php?category=<?php echo $rs_res['id'];?>&name=<?php echo $rs_res['name'];?>#productsByCategory"> <?php echo strtoupper($rs_res['name']); ?> </a></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </ul>
            </li>
            <li>
                <a href="viewCart.php#cart" style="color:#204d74;"><b><span id="cart_info">Rs. 0</span>&nbsp;&nbsp;<span class="glyphicon glyphicon-shopping-cart"></span></b></a>
            </li>

        </ul>
    </div></nav>