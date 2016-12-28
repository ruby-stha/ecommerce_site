<?php
/**
 * Created by PhpStorm.
 * User: Ruby
 * Date: 11/30/2016
 * Time: 8:31 PM
 */
include("../lib/config.php");
include("pHeader.php");
$id=$_GET['id'];
$category=$_GET['category'];
$rs_prod_det = mysqli_query($conn,"Select * from product where id=$id");
$prod=mysqli_fetch_assoc($rs_prod_det);
$cat_products=mysqli_query($conn,"Select * from product where category_id=".$prod['category_id']);
?>

<div class="container" style="padding-top: 120px;">
    <div class="row">
        <div class="col-sm-4">
            <div style="background-color: #ffffff; color:#000000; height: 350px; overflow: scroll; width: 300px;">
                <h4><b><u>Products/<?php echo $category;?></u></b></h4>
                <?php while ($rs_res = mysqli_fetch_assoc($cat_products)){?>
                    <h5><a href="productDetails.php?id=<?php echo $rs_res['id']?>&category=<?php echo $category;?>"><?php echo strtoupper($rs_res['name']);?></a></h5>
                <?php }?>
            </div>
        </div>
        <div class="col-sm-4">
            <img src="../assets/images/products/<?php echo $prod['image']?>" name="product_img" class="product_img" width="300" height="350" style="border-radius: 10px;">
        </div>
        <div class="col-sm-4">
            <table class="table">
                <tr>
                    <td>Name</td>
                    <td><?php echo $prod['name'];?></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td><?php echo $prod['description'];?></td>
                </tr>
                <tr>
                    <td>Stock</td>
                    <td><?php echo $prod['stock'];?></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td><?php echo $prod['price'];?></td>
                </tr>
                <tr>
                    <td>Discount Per Piece</td>
                    <td><?php echo $prod['discount'];?></td>
                </tr>
            </table>
            <?php
            if ($prod['stock']>0) {?>
                <form action="addToCart.php?productid=<?php echo $prod['id']?>" method="post">
                    <select name="qty" class="form-control" style="float: left;width: 50%;">
                        <?php
                        for ($i = 1; $i <= $prod['stock']; $i++) {
                            ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    &nbsp;
                    <input type="submit" class="btn btn-primary" value="Add to Cart"></form>
            <?php
            }else{
                ?>
                <div align="center"> <input type="button" disabled class="btn btn-danger" value="Item N/A"></div>
            <?php }?>
        </div>
    </div>
</div>

<style>
    .product_img:hover {
        position:relative;
        top:-25px;
        left:-35px;
        width:500px;
        height:500px;;
        display:block;
        z-index:999;
    }
</style>