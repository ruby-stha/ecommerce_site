<?php
/**
 * Created by PhpStorm.
 * User: Ruby
 * Date: 11/30/2016
 * Time: 9:26 PM
*/
include("../lib/config.php");
$sessionid=session_id();
$rs_cart=mysqli_query($conn, "select *, sum(quantity) as qtySum from cart left join product on product.id=cart.product_id where session_id='$sessionid' group by cart.product_id");
$item=0;
?>
<br/><br/>
<div id="cart" style="padding-left: 30px;padding-right: 30px;">
    <table id="cart" class="table table-bordered">
        <thead>
        <th>Image</th>
        <th>Product</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Discount (per piece)</th>
        <th>Total</th>
        <th>Action</th>
        </thead>
        <?php
        while ($rs_cart_info=mysqli_fetch_assoc($rs_cart)){
            $item++;
            ?>
            <tr>
                <td align="center"><img src="../assets/images/products/<?php echo $rs_cart_info['image']?>" name="product_img" width="200" height="200" style="border-radius: 10px;"></td>
                <td><?php echo $rs_cart_info['name'];?></td>
                <td>Rs. <?php echo $rs_cart_info['price'];?></td>
                <td><?php echo $rs_cart_info['qtySum'];?></td>
                <td>Rs. <?php echo $rs_cart_info['discount'];?></td>
                <?php $amount=$rs_cart_info['qtySum']*$rs_cart_info['price']-$rs_cart_info['qtySum']*$rs_cart_info['discount'] ?>
                <td>Rs. <?php echo $amount;?></td>
                <td><input type="button" class="rev btn btn-danger" onclick="revert(<?php echo $rs_cart_info['product_id']?>,<?php echo $rs_cart_info['qtySum']; ?>)" value="Revert"></td>
            </tr>
        <?php
        }
        if ($item==0){
        ?>
        <tr><td colspan="7" align="center">No item available!</td></tr>
    </table>
    <?php
    }else{?>
            </table>
        <?php
    }
    ?>
    </table>
</div>
