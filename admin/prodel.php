
<?php 
	
		
		
		$id=$_REQUEST["id"];

	require '../database.php';
	$obj=new database();
		
	$res=$obj->getdata("select * from pro_tbl where pro_id='$id'");
	while($row=mysql_fetch_assoc($res))
	{
		$photo=$row["pro_photo"];
		
	}
	$res=$obj->getdata("delete from pro_tbl where  pro_id='$id'");
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
