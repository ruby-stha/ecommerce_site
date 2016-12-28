<?php
include("../lib/config.php");
include("../includes/checksession.php");
include("../includes/header.php");
$rs_results = mysqli_query($conn,"Select product.id as pid, product.name, product.description, product.price, product.stock,product.image, product.discount,category.name as cname
 from product left join category on category.id=product.category_id");
?>
<html>
<head>
    <title>Product Management</title>
    <script>
        function addNewProduct(){
            window.location.href="createProduct.php";
        }
        function deleteProduct(id){
            console.log(id);
            if (confirm("Are you sure you want to delete?")){
                window.location.href="deleteProduct.php?id="+id;
            }
        }
        function editProduct(id){
            window.location.href="editProduct.php?id="+id;
        }
    </script>
</head>

<body>
<h3 align="center"><u>Product List</u><input type="button" value="Add New Product" onclick="addNewProduct()" style="float: right;" class="btn btn-primary"></h3>
<br/>
<em><?php echo $_SESSION["message"]?:''; ?></em>
<table cellspacing="10" cellpadding="10" class="table table-bordered">
    <thead>
    <th>Name</th>
    <th>Category</th>
    <th>Description</th>
    <th>Price</th>
    <th>Stock</th>
    <th>Image</th>
    <th>Discount</th>
    <th colspan="2">Action</th>
    </thead>
    <tbody>
    <?php
    while ($rs_res = mysqli_fetch_assoc($rs_results))
    {
        ?>
        <tr>
            <td><?php echo $rs_res["name"]?></td>
            <td><?php echo $rs_res["cname"]?></td>
            <td><?php echo $rs_res["description"]?></td>
            <td><?php echo $rs_res["price"]?></td>
            <td><?php echo $rs_res["stock"]?></td>
            <td align="center"><img src="../assets/images/products/<?php echo $rs_res['image']?>" name="product_img" width="200" height="200" style="border-radius: 10px;"></td>
            <td><?php echo $rs_res["discount"]?></td>
            <td><input type="button" name="edit_btn" onclick="editProduct(<?php echo $rs_res['pid'];?>);" value="Edit" class="btn btn-primary"></td>
            <td><input type="button" name="delete_btn" onclick="deleteProduct(<?php echo $rs_res['pid'];?>);" value="Delete" class="btn btn-danger"></td>
        </tr>
    <?php }?>
    </tbody>
</table>
</body>
</html>
