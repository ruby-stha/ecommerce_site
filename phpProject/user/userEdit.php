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
$rs_user = mysqli_query($conn,"Select * from users WHERE id=$id");
$rs_user_data = mysqli_fetch_assoc($rs_user);
?>

<html>
    <head>
        <title>User Edit Panel</title>
        <script src="../assets/js/jquery-1.10.2.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#role").val(<?php echo $rs_user_data['role']?>);
                $("#uname").val('<?php echo $rs_user_data['username']?>');
                $("#upassword").val('<?php echo $rs_user_data['password']?>');
                $("#fullname").val('<?php echo $rs_user_data['name']?>');
                $("#status").val('<?php echo $rs_user_data['status']?>');
            });
        </script>
    </head>
    <body>
        <h3 align="center">Update User</h3>
        <form action="addOrUpdateUser.php?action=update" id="updateUser" method="post">
            <?php include("userDetails.php"); ?>
            <input type="submit" value="Update" class="btn btn-primary">
        </form>
    </body>
</html>