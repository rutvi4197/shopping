<?php 

	session_start();
	$pro_id=$_REQUEST["id"];
	$email_id=$_SESSION["email"];
	require '../database.php';
	
	
	$obj1=new database();
	$res1=$obj1->addtocart($pro_id,$email_id);
	$cnt=mysql_num_rows($res1);
	if($cnt==1)
	{	
		echo "<script> 
		alert('Already exits');
		window.location.href='view.php';
		</script>";
	}
	else
	{
		$obj=new database();
		$res=$obj->getpro1($pro_id);
	
	while($row=mysql_fetch_assoc($res))
	{
		$price=$row["pro_price"];
	}
		$qty=1;
		$amnt=1*$price;
		$flag="cart";
		$date=Date("d/m/y");
		$obj=new database();
		$res=$obj->addcart($amnt,$date,$pro_id,$email_id,$qty,$flag);
		if($res==1)
		{
			header('Location:view.php');
		}
		else
		{
				echo 'wrong';
		}
	}

?>