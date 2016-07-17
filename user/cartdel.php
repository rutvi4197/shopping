<?php 
	
	$order_id=$_REQUEST["id"];

	require '../database.php';
	$obj=new database();
	$res=$obj->cartdel($order_id);
	
	if($res==1)
	{
		header('Location:viewcart.php');
	}
	else
	{
		echo 'not deleted';
	}		

?>
