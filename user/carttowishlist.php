<?php 

	session_start();
	$order_id=$_REQUEST["id"];
		
	include '../database.php';	
	$obj=new database();
	$res=$obj->getdata("select *from order_tbl where order_id='$order_id'");
			
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
		$res=$obj->getdata("update order_tbl set flag='cart' where order_id='$order_id'");
		header('location:viewcart.php');
	}
		
?>