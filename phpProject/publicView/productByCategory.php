<?php
/**
 * Created by PhpStorm.
 * User: Ruby
 * Date: 11/27/2016
 * Time: 12:43 PM
 */
include("../lib/config.php");
include("pHeader.php");
$category=$_GET['category'];
$cat_name=$_GET['name'];
$rs_results = mysqli_query($conn,"Select * from product where category_id=$category");
$rs_count = mysqli_query($conn,"Select count(*) as count from product where category_id=$category");
$rs_count_data=mysqli_fetch_assoc($rs_count);
echo $rs_count_data['count'];
$count=0;?>
<style>
    .overlay {
        height: 0%;
        width: 100%;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: rgb(0,0,0);
        background-color: rgba(0,0,0, 0.9);
        overflow-y: hidden;
        transition: 0.5s;
    }
</style>
<div id="productsByCategory" style="padding-top: 80px;">
    <h3 style="border-radius: 10px; color: #000000;background-image:url(../assets/images/userbackground.jpg);  background-size: cover; padding: 7px; margin:25px;padding-left: 30px;"><b><u>Products / <?php echo $cat_name; ?></u></b></h3>
    <?php
    if ($rs_count_data['count']==0){?>
        <h3 align="center"><b>No products available!</b></h3>
        <div align="center"> <a href="userPanel.php#categories" class="btn btn-primary">Back to Categories</a></div>
        <?php
    }else{
    while ($rs_res = mysqli_fetch_assoc($rs_results))
    {

        if ($count==0){
            ?>
            <div class="row" style="margin-bottom: 150px; margin-left: 50px; margin-right: 50px;" >
        <?php } $count++;
        ?>
        <div class="col-sm-4">
            <div class="w3-container" style="color: #000000;height: 300px; width: 600px;">
                <h3><b><?php echo $rs_res['name']?></b></h3>
                <div class="w3-card-12" style="width:50%;border-radius: 30px;background-color: #ffffff; position:relative;">
                    <img align="center" src="../assets/images/products/<?php echo $rs_res['image'];?>" style="border-radius:7px;height: 300px;width: 100%;">
                    <a href="productDetails.php?id=<?php echo $rs_res['id'];?>&category=<?php echo $cat_name; ?>" style="position:absolute; top:140px; right:100px;opacity: 0.7" class="btn btn-primary">Get Details</a>
                    <div class="w3-container w3-center" style="border-radius: 30px;">
                        <br/>
                        <p align="left"><b>Price: </b> <?php echo $rs_res['price'];?></p>
                        <p align="left"><b>Stock: </b><?php echo $rs_res['stock'];?></p>
                        <p align="left"><b>Discount: </b><?php echo $rs_res['discount'];?></p>
                                <?php
                                if ($rs_res['stock']>0) {?>
                                    <form action="addToCart.php?productid=<?php echo $rs_res['id']?>" method="post">
                                    <select name="qty" class="form-control" style="float: left;width: 50%;">
                                    <?php
                                            for ($i = 1; $i <= $rs_res['stock']; $i++) {
                                    ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php
                                }
                                ?>
                                    </select>
                                     <input type="submit" class="btn btn-primary" value="Add to Cart"></form>
                            <?php
                            }else{
                            ?>
                            <div align="center"> <input type="button" disabled class="btn btn-danger" value="Item N/A"></div>
                              <?php }?>

                        <br/>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if ($count==3){
            $count=0;
            ?>
            </div>
        <?php
        }
    }} ?>
</div>


<?php
$rs_meta_info = mysqli_query($conn,"Select * from category where id=$category");
$rs_meta=mysqli_fetch_assoc($rs_meta_info);
?>

<script>
    $(document).ready(function(){
        $('head').append('<meta name="description" content="<?php echo $rs_meta['page_description']?>">');
        $('head').append('<meta name="title" content="<?php echo $rs_meta['page_title']?>">');
        $('head').append('<meta name="keywords" content="<?php echo $rs_meta['page_keywords']?>">');
    });

</script>
<br/><br/><br/><br/><br/><br/><br/><br/><br/>
<?php
include("footer.html");
?>