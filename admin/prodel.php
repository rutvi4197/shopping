<?php 
	
		
		
		$id=$_REQUEST["id"];

	require '../database.php';
	$obj=new database();
		
	$res=$obj->getpro1($id);
	while($row=mysql_fetch_assoc($res))
	{
		$photo=$row["pro_photo"];
		
	}
	$res=$obj->prodel($id);
	if($res==1)
	{
		unlink($photo);
		header('Location:viewcart.php');
	}
	else
	{
		echo 'not deleted';
	}		

?>
