<?php
/**
 * Created by PhpStorm.
 * User: Ruby
 * Date: 11/26/2016
 * Time: 8:01 PM

 */
include("../lib/config.php");
include("pHeader.php");
$rs_results = mysqli_query($conn,"Select * from category");
$count=0;?>
<div style="background-image: url(../assets/images/sale1.jpg);background-size: cover; padding-bottom: 650px; border-radius: 20px;"></div>
<div id="categories">
    <div style="border-radius: 10px; color: #000000;background-image:url(../assets/images/userbackground.jpg);  background-size: cover; padding: 7px; margin:25px;"><h3 align="center"><b>| Categories in Store |</b></h3></div>
    <?php
    while ($rs_res = mysqli_fetch_assoc($rs_results))
    {
        if ($count==0){
    ?>
        <div class="row" style="margin-bottom: 150px; margin-left: 50px; margin-right: 50px;" >
            <?php } $count++;
            ?>
        <div class="col-sm-4">
            <div class="w3-container" style="height: 300px; width: 600px;">
                <h4 style="color: #000000;"><b><?php echo $rs_res['name']?></b></h4>
                <div class="w3-card-12" style="width:50%;border-radius: 30px;background-color: #ffffff;">
                    <img align="center" src="../assets/images/category/<?php echo $rs_res['image'];?>" style="border-radius:7px; height: 300px;width: 100%;">
                    <div class="w3-container w3-center" style="border-radius: 30px;">
                        <br/>
                        <p><a href="productByCategory.php?category=<?php echo $rs_res['id'];?>&name=<?php echo $rs_res['name'];?>#productsByCategory" class="btn btn-primary">View Products</a></p>
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
    } ?>
</div>

<br/><br/><br/><br/>
<?php
include("footer.html");
?>