<?php include("pHeader.php"); ?>
<div id="cart" style="padding-top: 90px; padding-left: 30px;">
    <h3><u>Your Cart</u></h3></div>
<?php
/**
 * Created by PhpStorm.
 * User: Ruby
 * Date: 11/28/2016
 * Time: 8:44 PM
 */
include("cart_details.php");
$sessId=session_id();
$cart_count=mysqli_query($conn,"select count(*) as count from cart where session_id='$sessId'");
$cart_count_data=mysqli_fetch_assoc($cart_count);
if ($cart_count_data['count']!=0){
?>
<div style="padding-left: 30px;">
<input type="button" class="btn btn-primary" value="Order" id="order" onclick="order();"></div>
<br/><br/><br/><br/><br/>
    <?php } ?>
    <div class="modal fade" id="personal_details" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Shipping Information</h4>
                </div>
                <div class="modal-body">
                    <p><em>Thank you for ordering.<br/>
                            Please enter the following shipping information so that your cart can arrive at your door safely.</em></p>
                    <div id="shipping_info">
                        <form action="get_summary.php" method="post">
                            <table class="table table-bordered">
                                <tr>
                                    <td>Name</td>
                                    <td><input type="text" name="person_name" required="" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td><input type="text" name="person_address" required="" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Contact Number</td>
                                    <td><input type="text" name="person_contact" required="" class="form-control"></td>
                                </tr>
                            </table>
                            </br>
                            <p>Payment needs to be done when goods arrive. Shipping is free of cost! :)</p>
                            <input type="submit" class="btn btn-success" value="Checkout" name="checkout">
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


<script>
    function revert(pid, qty){
        if (confirm("Are you sure?")){
            window.location.href="revert.php?prid="+pid+"&quantity="+qty;
        }
    }
    function order(){
        $('#personal_details').modal('show');
    }
</script>
<?php
include("footer.html");
?>