<?php 


	$id=$_POST["txtid"];
	$name=$_POST["txtname"];
	require '../database.php';
	$obj=new database();
	$res=$obj->catedit($name,$id);
	if($res==1)
	{
		header('Location:catdis1.php');
		
	}
	else
		echo"NOt updated";
	

	

?>