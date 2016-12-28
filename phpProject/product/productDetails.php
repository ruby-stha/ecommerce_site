<?php
/**
 * Created by PhpStorm.
 * User: Ruby
 * Date: 11/23/2016
 * Time: 4:33 PM
 */
include("../lib/config.php");
include("../includes/checksession.php");
$rs_results = mysqli_query($conn,"Select * from category");
?>

<table cellspacing="10" cellpadding="10" class="table">
    <tr>
        <td>Name</td>
        <td><input type="text" required="required" name="pr_name" class="form-control"></td>
    </tr>
    <tr>
        <td>Category</td>
        <td>
            <select id="pr_category" name="pr_category" class="form-control">
                <option value="">Select Category</option>
                <?php
                while ($rs_res = mysqli_fetch_assoc($rs_results))
                {
                    ?>
                    <option value="<?php echo $rs_res['id']?>"><?php echo $rs_res['name']?></option>
                <?php } ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>Description</td>
        <td><textarea id="pr_description" name="pr_description" required="required" class="form-control"></textarea></td>
    </tr>
    <tr>
        <td>Price</td>
        <td><input type="text" required="required" name="pr_price" class="form-control"></td>
    </tr>
    <tr>
        <td>Stock</td>
        <td><input type="text" required="required" name="pr_stock" class="form-control"></td>
    </tr>
    <tr>
        <td>Discount</td>
        <td><input type="text" required="required" name="pr_discount" class="form-control"></td>
    </tr>
    <tr>
        <td>Image</td>
        <td><img src="" id="edit_pr_img" style="border-radius: 10px;" hidden="hidden"><br/><br/><input type="file" required="required" class="form-control" name="pr_image" id="pr_image"></td>
    </tr>
</table>