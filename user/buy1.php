<?php 
session_start();

?>
<!DOCTYPE html>
<html>
<head>
<link href="../Content/bootstrap.css" rel="stylesheet"/>
<script src="../Scripts/jquery-1.9.1.js"></script>
<script src="../Scripts/bootstrap.js"></script>

<body>
<div class="row">
<?php 

	include '../header.php';
?>
</div>
<center>
	<h1><center><p style="font-size:50px;color:red;">Enter Your details</p></center></h1>
	
<div class="input-group">
<center>
<h2 style="font-size:50px;color:red;">Address</h2>

<textarea rows="8" cols="35" style="font-size:20px;" >
<?php 
			
		$id=$_SESSION["email"];
		
		'../database.php';
		$obj=new database();
		$res=$obj->getdata("select * from user_tbl where email_id='$id'");
				
		while($row=mysql_fetch_array($res,MYSQL_ASSOC))
		{
				echo $row["user_name"];
		}		
?>

</textarea>
<br>

<div class="btn-group">
  <input type="submit" class="btn btn-info" name="btncash" value="Cash On Delievery">

  <?php 
	if(isset($_POST["btncash"]))
  ?>

  </div>

<div class="btn-group">
  <input type="submit" class="btn btn-danger" name="btncre" value="Credit/Debit Card">
 </div>
  
</center>	
</div>
</center>
</body>
</html>



