<?php
include("../Assets/Connection/Connection.php");
session_start();

if($_SESSION["adminid"]=="")
{
    header("location:../index.php");

}
?>