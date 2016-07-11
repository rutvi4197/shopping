<?php 

	session_start();
	$email_id=$_SESSION["email"];
	require '../database.php';
	$pro_id=$_REQUEST["id"];
	
	$obj1=new database();
	$res1=$obj1->getdata("select * from order_tbl where fk_pro_id='$pro_id' and fk_email_id='$email_id' ");
	$cnt=mysql_num_rows($res1);
	if($cnt==1)
	{	
		echo "<script> 
		alert('Already exits in cart');
		window.location.href='view.php';
		</script>";
	}
	else
	{
		$obj=new database();
		$res=$obj->getdata("select * from pro_tbl where pro_id='$pro_id'");
	
	while($row=mysql_fetch_assoc($res))
	{
		$price=$row["pro_price"];
	}
		$qty=1;
		$amnt=1*$price;
		$flag="wish";
		$date="24/06/2016";
		$obj=new database();
		$res=$obj->getdata("insert into order_tbl values(Null,'$amnt','$date','$pro_id','$email_id','$qty','$flag')");
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