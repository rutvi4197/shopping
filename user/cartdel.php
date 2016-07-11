<?php 
	
	$order_id=$_REQUEST["id"];

	require '../database.php';
	$obj=new database();
	$res=$obj->getdata("delete  from order_tbl where order_id='$order_id'");
	
	if($res==1)
	{
		header('Location:viewcart.php');
	}
	else
	{
		echo 'not deleted';
	}		

?>
