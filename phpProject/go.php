<?php
include("lib/config.php");
if(isset($_POST['submit'])){
    $username = addslashes($_POST['username']);
    $password = addslashes($_POST['password']);
    // Check connection

    $query = "SELECT users.id, display FROM users left join role on users.role=role.id WHERE username='$username' and password='$password'";
    $result = mysqli_query($conn,$query);
    $result1 = mysqli_fetch_assoc($result);
    if($result){
        $_SESSION["userid"] = $result1["id"];
        echo $_SESSION["userid"];
        $_SESSION["message"]="";
        header("Location:dashboard/admindashboard.php");
    }
    else{
        echo "Some error";
    }
}
?>