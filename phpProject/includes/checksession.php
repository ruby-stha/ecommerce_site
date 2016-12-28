<?php
if(!isset($_SESSION["userid"]) && empty($_SESSION["userid"]))
{
    header("Location:../login.php");
}
?>
