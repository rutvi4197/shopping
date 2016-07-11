<?php 


	$id=$_REQUEST["id"];

	require '../database.php';
	$obj=new database();
	$res=$obj->getdata("delete from cat_tbl where  cat_id='$id'");
	if($res==1)
	{
		header('Location:catdis.php');
		
	}
	else
		echo"NOt deleted";
	

	

?>