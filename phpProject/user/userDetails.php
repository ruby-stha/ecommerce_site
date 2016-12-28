<!DOCTYPE html>

<?php
$rs_role=mysqli_query($conn, "Select * from role");
?>
<input type="text" hidden="hidden" name="id" id="uid" value="<?php echo $rs_user_data['id']?>">
<table cellpadding="10" cellspacing="10" class="table">
    <tr>
        <td>ID</td>
        <td><input type="text" class="form-control" required="required" disabled="disabled" name="us_id" id="uid" value="<?php echo $rs_user_data['id']?>"></td>
    </tr>
    <tr>
        <td>Full Name</td>
        <td><input type="text" class="form-control" required="required" name="us_fullname" id="fullname" value=""></td>
    </tr>
    <tr>
        <td>Username</td>
        <td><input type="text" class="form-control" required="required" name="us_name" id="uname" value=""></td>
    </tr>
    <tr>
        <td>Password</td>
        <td><input type="text" class="form-control" required="required" name="us_password" id="upassword" value=""></td>
    </tr>
    <tr>
        <td>Role</td>
        <td><select id="role" class="form-control" name="role" required="required">
                <option value="">Select Role</option>
                <?php
                while ($rs_res = mysqli_fetch_assoc($rs_role))
                {
                    ?>
                    <option value="<?php echo $rs_res['id']?>"><?php echo $rs_res['display']?></option>
                <?php } ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>Status</td>
        <td><select class="form-control" required="required" id="status" name="us_status">
                <option value="">Select Status</option>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
            </select>
        </td>
    </tr>
</table>
