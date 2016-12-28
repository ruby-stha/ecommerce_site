<?php

include("../lib/config.php");
include("../includes/checksession.php");
include("../includes/header.php");
$_SESSION['available']=false;
$rs_results = mysqli_query($conn,"Select users.id, name, username, password, role.display, status from users LEFT JOIN role on users.role=role.id");
?>
<html>
<head>
<title>User Management</title>
    <script>
        function editUser(id){
            window.location.href="userEdit.php?id="+id;
        }
        function deleteUser(id){
            if (confirm("Are you sure you want to delete?")){
                window.location.href="deleteUser.php?id="+id;
            }
        }
        function registerNewUser(){
            window.location.href="createUser.php";
        }
    </script>
</head>

<body>
<h3 align="center"><u>User List</u><input type="button" value="Register User" onclick="registerNewUser()" class="btn btn-primary" style="float: right;"></h3>
<br/>
<table class="table table-bordered">
    <thead>
        <th>Full Name</th>
        <th>Username</th>
        <th>Password</th>
        <th>Role</th>
        <th>Status</th>
        <th colspan="2">Actions</th>
    </thead>

    <tbody>
    <?php
    while ($rs_res = mysqli_fetch_assoc($rs_results))
    {
    ?>
    <tr>
        <td><?php echo $rs_res["name"]?></td>
        <td><?php
            echo stripslashes($rs_res["username"]);
            ?></td>

        <td><?php echo $rs_res["password"]?></td>
        <td><?php echo $rs_res["display"]?></td>
        <td><?php echo $rs_res["status"]?></td>
        <td><input type="button" name="edit_btn" onclick="editUser(<?php echo $rs_res['id']?>);" value="Edit" class="btn btn-primary"></td>
        <td><input type="button" name="delete_btn" onclick="deleteUser(<?php echo $rs_res['id']?>);" value="Delete" class="btn btn-danger"></td>
    </tr>
    <?php }?>
    </tbody>
</table>
</body>
</html>
