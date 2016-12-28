<?php
/**
 * Created by PhpStorm.
 * User: Ruby
 * Date: 11/8/2016
 * Time: 12:51 PM
 */
include("../lib/config.php");
include("../includes/checksession.php");
include("../includes/header.php");
$id=$_GET['id'];
$rs_product = mysqli_query($conn,"Select * from product WHERE id=$id");
$rs_product_data = mysqli_fetch_assoc($rs_product);
?>

<html>
<head>
    <title>Product Edit Panel</title>
    <script src="../assets/js/jquery-1.10.2.min.js"></script>
    <script>
        $(document).ready(function(){
            $("input[name='pr_name']").val('<?php echo $rs_product_data['name']?>');
            $("input[name='pr_price']").val('<?php echo $rs_product_data['price']?>');
            $("input[name='pr_stock']").val('<?php echo $rs_product_data['stock']?>');
            $("input[name='pr_discount']").val('<?php echo $rs_product_data['discount']?>');
            $("#pr_description").val('<?php echo $rs_product_data['description']?>');
            $("#pr_category").val('<?php echo $rs_product_data['category_id']?>');
            $("#pr_image").removeAttr("required");
            $("#edit_pr_img").show();
            $("#edit_pr_img").attr("src", "../assets/images/products/<?php echo $rs_product_data['image']?>");
            $("#edit_pr_img").attr("height", "200");
            $("#edit_pr_img").attr("width", "200");
        });
    </script>
</head>
<body>
<h2>Update Product</h2>
<form action="addOrUpdateProduct.php?action=update&id=<?php echo $id ?>" id="updateProduct" method="post" enctype="multipart/form-data">
    <?php include("productDetails.php"); ?>
    <input type="submit" value="Update" class="btn btn-primary">
</form>
</body>
</html>