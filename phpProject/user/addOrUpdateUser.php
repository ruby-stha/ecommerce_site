<?php
/**
 * Created by PhpStorm.
 * User: Ruby
 * Date: 11/14/2016
 * Time: 1:21 PM
 */

include("../lib/config.php");
include("../includes/checksession.php");
$id=$_POST['id'];
$fullname=ucwords($_POST['us_fullname']);
$name=$_POST['us_name'];
$password=$_POST['us_password'];
$role=$_POST['role'];
$status=$_POST['us_status'];
$action=$_GET['action'];
echo $id;
echo $fullname;
echo $name;
echo $password;
echo $role;
echo $status;
echo $action;

if ($action=="update"){
    $rs_user = mysqli_query($conn,"update users set name='$fullname', username='$name', password='$password', role='$role', status='$status' where id=$id");
    header("Location:content.php");
}else{
    $available=mysqli_query($conn,"select * from users where username='$name' and password='$password'");
    $available_data=mysqli_fetch_assoc($available);
    if ($available_data["id"]){
        $_SESSION['available']=true;
        header("Location:createUser.php");
    }else{
        $rs_user = mysqli_query($conn,"insert into users VALUES ($id, '$fullname', '$name', '$password', $role, '$status')");
        header("Location:content.php");
    }
}


?>

