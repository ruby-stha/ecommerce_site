<?php

include("../lib/config.php");
include("../includes/checksession.php");
include("../includes/header.php");
$rs_results = mysqli_query($conn,"Select * from category");
?>
<html>
<head>
    <title>Category Management</title>
    <script>
        function addNewCategory(){
            window.location.href="createCategory.php";
        }
        function deleteCategory(id){
            if (confirm("Are you sure you want to delete?")){
                window.location.href="deleteCategory.php?id="+id;
            }
        }
        function editCategory(id){
            window.location.href="editCategory.php?id="+id;
        }
    </script>
</head>

<body>
<h3 align="center"><u>Category List</u><input type="button" value="Add New Category" onclick="addNewCategory()" style="float: right;" class="btn btn-primary"></h3>
<br/>
<em><?php echo $_SESSION["message"]?:''; ?></em>
<table cellspacing="10" cellpadding="10" class="table table-bordered">
    <thead>
        <th>Name</th>
        <th>Description</th>
        <th>Image</th>
        <th>Page Title</th>
        <th>Page Keyword</th>
        <th>Page Description</th>
        <th colspan="2">Actions</th>
    </thead>
    <tbody>
    <?php
    while ($rs_res = mysqli_fetch_assoc($rs_results))
    {
    ?>
    <tr>
        <td><?php echo $rs_res["name"]?></td>
        <td><?php echo $rs_res["description"]?></td>
        <td><div align="center"><img src="../assets/images/category/<?php echo $rs_res['image']?>" name="category_img" width="200" height="200" style="border-radius: 10px;"></div></td>
        <td><?php echo $rs_res["page_title"]?></td>
        <td><?php echo $rs_res["page_keywords"]?></td>
        <td><?php echo $rs_res["page_description"]?></td>
        <td><input type="button" name="edit_btn" onclick="editCategory(<?php echo $rs_res['id'];?>);" value="Edit" class="btn btn-primary"></td>
        <td><input type="button" name="delete_btn" onclick="deleteCategory(<?php echo $rs_res['id'];?>);" value="Delete" class="btn btn-danger"></td>
    </tr>
    <?php }?>
    </tbody>
</table>
</body>
</html>
