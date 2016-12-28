<?php
/**
 * Created by PhpStorm.
 * User: Ruby
 * Date: 11/30/2016
 * Time: 9:16 PM
 */
include("../lib/config.php");
$name=$_POST['person_name'];
$address=$_POST['person_address'];
$contact=$_POST['person_contact'];

include("pHeader.php");
?>
<hr>
<div id="cart" style="padding-left: 50px;padding-right: 40px;padding-top: 90px;">
    <h4><b>Howdy <?php echo strtoupper($name);?>!</h4></b><br/>
    <h5>The following cart will be delivered to your location <b><?php echo strtoupper($address);?></b>. In case of any problem, we will contact you in
        you contact number <b><?php echo $contact;?></b>. <br/><br/>
        Thank you for shopping with us.</h5><br/>
    <h4>Best, <br/><b>Y<span class="glyphicon glyphicon-ok-sign"></span>UR - DEAL</b></h4>
</div>
<hr>
<div id="cart" style="padding: 30px;">
    <h3 align="center"><u>Shopping Summary</u>&nbsp;<span class="glyphicon glyphicon-shopping-cart"></span></h3>
<?php include ("cart_details.php");?>
</div>
<div style="padding-left: 50px;">
    <input type="button" class="btn btn-primary" value="Shop Fresh" id="order" onclick="shopFresh();"><br/><br/><br/><br/><br/><br/>
</div>

<?php
include("footer.html");
?>

<script>
    $(document).ready(function(){
        $("#cart th:last-child, #cart td:last-child").remove();
    });

    function shopFresh(){
        alert("You are always welcome to shop!");
        window.location.href="clear_cart.php";
    }
</script>
