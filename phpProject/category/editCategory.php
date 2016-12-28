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
$rs_category = mysqli_query($conn,"Select * from category WHERE id=$id");
$rs_category_data = mysqli_fetch_assoc($rs_category);
?>

<html>
<head>
    <title>Category Edit Panel</title>
    <script src="../assets/js/jquery-1.10.2.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#category_name").val('<?php echo $rs_category_data['name']?>');
            $("#category_description").val('<?php echo $rs_category_data['description']?>');
            $("#category_page_title").val('<?php echo $rs_category_data['page_title']?>');
            $("#category_page_keywords").val('<?php echo $rs_category_data['page_keywords']?>');
            $("#category_page_description").val('<?php echo $rs_category_data['page_description']?>');
            $("#category_pic").removeAttr("required");
            $("#edit_category_img").show();
            $("#edit_category_img").attr("src", "../assets/images/category/<?php echo $rs_category_data['image']?>");
            $("#edit_category_img").attr("height", "200");
            $("#edit_category_img").attr("width", "200");
        });
    </script>
</head>
<body>
<h3>Update Category</h3>
<form action="addOrUpdateCategory.php?action=update&id=<?php echo $id ?>" id="updateCategory" method="post" enctype="multipart/form-data">
    <?php include("categoryDetails.php"); ?>
    <input type="submit" value="Update" class="btn btn-primary">
</form>
</body>
</html>