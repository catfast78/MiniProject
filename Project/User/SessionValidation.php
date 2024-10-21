<?php
include("../Assets/Connection/Connection.php");
session_start();

if(!$_SESSION["aid"])
{
    header("location:../index.php");

}
?>