<?php
/**
 * Created by PhpStorm.
 * User: Ruby
 * Date: 11/20/2016
 * Time: 9:39 AM
 */

include("../lib/config.php");
include("../includes/checksession.php");
include("../includes/header.php");
$rs_user = mysqli_query($conn,"select max(id)+1 as id from users");
$rs_user_data=mysqli_fetch_assoc($rs_user);
?>
<?php if ($_SESSION["available"]==true){?>
    <h4>User already available</h4>
    <?php $_SESSION['available']=false; ?>
<?php }?>

<h1>Create New User</h1>
<form action="addOrUpdateUser.php?action=add" id="addUser" method="post">
    <?php include("userDetails.php"); ?>
    <input type="submit" value="Register" class="btn btn-primary">
</form>