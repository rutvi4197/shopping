<?php 
$id=$_REQUEST["id"];
include 'database.php';
$obj=new database();
$res=$obj->veri($id);


?>