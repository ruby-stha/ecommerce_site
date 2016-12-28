<?php
/**
 * Created by PhpStorm.
 * User: Ruby
 * Date: 11/21/2016
 * Time: 5:10 PM
 */
include("../lib/config.php");
include("../includes/checksession.php");
?>

<table cellpadding="10" cellspacing="10" class="table">
    <tr>
        <td>Name</td>
        <td><input type="text" class="form-control" required="required" name="name" id="category_name"></td>
    </tr>
    <tr>
        <td>Description</td>
        <td><textarea required="required" class="form-control" name="description" id="category_description"></textarea></td>
    </tr>
    <tr>
        <td>Image</td>
        <td><img src="" id="edit_category_img" hidden="hidden" style="border-radius: 10px;"><br/><br/><input required="required" class="form-control" type="file" name="category_pic" id="category_pic"></td>
    </tr>
    <tr>
        <td>Page Title</td>
        <td><input required="required" type="text" class="form-control" name="page_title" id="category_page_title"></td>
    </tr>
    <tr>
        <td>Page Keywords</td>
        <td><input required="required" type="text" class="form-control" name="page_keywords" id="category_page_keywords"></td>
    </tr>
    <tr>
        <td>Page Description</td>
        <td><textarea required="required" class="form-control" name="page_description" id="category_page_description"></textarea></td>
    </tr>
</table>