<?php 

	session_start();
	$order_id=$_REQUEST["id"];
		
	include '../database.php';	
	$obj=new database();
	$res=$obj->wishdis($order_id);
			
	while($row=mysql_fetch_array($res,MYSQL_ASSOC))
	{
		$flag=$row["flag"];
	}
	
	if($flag=='cart')
	{
		echo "Already Exists";
	}
	else
	{
		$obj=new database();
		$res=$obj->updatewish($order_id);
		header('location:viewcart.php');
	}
		
?>