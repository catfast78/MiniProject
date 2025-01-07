<?php
session_start();
if(!isset($_SESSION["aid"]))
{
    header("location:../index.php");

}
?>