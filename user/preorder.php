<?php 
	session_start();
	$id=$_SESSION["email"];
 if($id=="")
 {
	 header('Location:../main.php');
	 
 }
	$email_id=$_SESSION["email"];
?>
<html>
<head>
<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure to delete from  cart?');
}
</script>

<title>orders</title>
<link href="../Content/bootstrap.css" rel="stylesheet"/>
<script src="../Scripts/jquery-1.9.1.js"></script>
<script src="../Scripts/bootstrap.js"></script>
</head>
<body>
<?php 
	
	include '../header.php';
?>
<table class="table">
<caption style="color:red; font-size:50px;"><center>YOUR ORDERS</center></caption>
<tr>
<th>Prodouct_image
<th>Product Name
<th>Product Price
<th>Product Qty
<th>Product Date
</tr>
<?php
	
	'../database.php';
	$obj=new database();
	$res=$obj->getdata("select o.*,p.* from order_tbl as o,pro_tbl as p where o.fk_pro_id=p.pro_id and fk_email_id='$email_id' and flag='order'");
	while($row=mysql_fetch_assoc($res))
	{
		echo '<tr>';
		echo '<td><img src="'.$row["pro_photo"].'" height=150px width=150px />';
		echo '<td><p style="color:purple;">'.$row["pro_name"].'</p>	';
		echo '<td>Rs.'.$row["order_amount"].'';
		echo '<td><lable>'.$row["order_qty"].'</lable>';
		echo '<td>'.$row["order_date"].'';
			echo '</tr>';

		}
	
	
?>
</table>
</body>
</html>