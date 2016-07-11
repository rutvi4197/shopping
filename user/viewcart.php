<?php 
	session_start();
	
	$email_id=$_SESSION["email"];
?>
<html>
<head>
<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure to delete from  cart?');
}
</script>

<title>View cart</title>
<link href="../Content/bootstrap.css" rel="stylesheet"/>
<script src="../Scripts/jquery-1.9.1.js"></script>
<script src="../Scripts/bootstrap.js"></script>
</head>
<body>
<?php 
	
	include '../header.php';
?>
<table class="table">
<caption style="color:red; font-size:50px;"><center>YOUR CART</center></caption>
<?php
	
	'../database.php';
	$obj=new database();
	$res=$obj->getdata("select o.*,p.* from order_tbl as o,pro_tbl as p where o.fk_pro_id=p.pro_id and fk_email_id='$email_id' and o.flag='cart'");
	while($row=mysql_fetch_assoc($res))
	{
		echo '<tr>';
		echo '<td><img src="'.$row["pro_photo"].'" height=200px width=200px />';
		echo '<td><p style="color:purple;">'.$row["pro_name"].'</p>	';
		echo '<td>Rs.'.$row["order_amount"].'';
		echo '<td><input type="number" value="'.$row["order_qty"].'" name="orderqty" style="width:40px;"/>';
		echo '<td><a href="cartpay.php?id='.$row["pro_id"].'"><input type="button" value="Buy now" class="btn btn-danger"></a>';
		echo '<td><a href="cartdel.php?id='.$row["order_id"].'" onclick="return checkDelete()"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>';
			echo '</tr>';

		}
	
	
?>
</table>
</body>
</html>