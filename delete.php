<?php

session_start();
require_once "config.php";

if(isset($_GET['deleteAdmID']))
{
    $id=$_GET['deleteAdmID'];
    $sql = "delete from admins where id = $id";
    $result = mysqli_query($conn, $sql);
    header("location: admin_admin_data.php");
}

if(isset($_GET['deleteArtID']))
{
    $id=$_GET['deleteArtID'];
    $sql = "delete from artist where id = $id";
    $result = mysqli_query($conn, $sql);
    header("location: adm_artist_data.php");
}

if(isset($_GET['deleteUserID']))
{
    $id=$_GET['deleteUserID'];
    $sql = "delete from user where id = $id";
    $result = mysqli_query($conn, $sql);
    header("location: admin_welcome.php");
}

if(isset($_GET['deleteImgID']))
{
    $id=$_GET['deleteImgID'];
    $sql = "delete from images where id = $id";
    $result = mysqli_query($conn, $sql);
    header("location: adm_Imgage_data.php");
}

?>