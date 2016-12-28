<?php
/**
 * Created by PhpStorm.
 * User: Ruby
 * Date: 11/30/2016
 * Time: 10:13 PM
 */

include("../lib/config.php");

session_regenerate_id();
header("Location:userPanel.php");
?>