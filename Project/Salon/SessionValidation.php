<?php
include("../Assets/Connection/Connection.php");
session_start();

if($_SESSION["sid"]=="")
{
    header("location:../index.php");

}
?>