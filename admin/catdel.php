<?php 


	$id=$_REQUEST["id"];

	require '../database.php';
	$obj=new database();
	$res=$obj->catdel($id);
	if($res==1)
	{
		header('Location:catdis.php');
		
	}
	else
		echo"NOt deleted";
	

	

?>