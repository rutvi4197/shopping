<?php 
	session_start();
	$id=$_SESSION["email"];
 if($id=="")
 {
	 header('Location:../main.php');
	 
 }
?>

<html>
<head>
<link href="../Content/bootstrap.css" rel="stylesheet"/>
<script src="../Scripts/jquery-1.9.1.js"></script>
<script src="../Scripts/bootstrap.js"></script>

<title>Your profile</title>
</head>

<body>
	<div class="row">
<div class="col-md-12">
<?php 
include '../header.php';

?>
</div>
</div>

<?php 

$email=$_SESSION["email"];

			'database.php';
		$obj=new database();
		$res=$obj->getuser($email);
		while($row=mysql_fetch_array($res,MYSQL_ASSOC))
		{
			$name=$row["user_name"];
			$mobile=$row["mobile_no"];
			$city=$row["city"];
			$gender=$row["gender"];
			$type=$row["type"];
			$photo=$row["profile_photo"];
		}
		

?>


<form action="useredit1.php?photo=<?php echo $photo; ?>" method="post" enctype="multipart/form-data">
<div class="container"> 
<div class="row">
	<div class="col-md-6 col-md-offset-3">
	
			<div class="panel panel-primary">
	
			<div class="panel-heading">
			<h3 class="panel-title">Update form</h3>
			</div>
			
			<div class="panel-body">
				<input type="hidden" class="form-control" name="txtemail" readonly value="<?php echo $email; ?>" aria-describedby="sizing-addon1" required/>
				<img src="<?php echo $photo; ?>" height=220px width=220px>
				<input type="file" name="txtphoto" value="change profile photo">

				</br>
				<div class="input-group">
				<span class="input-group-addon" id="sizing-addon1">User Name</span>
				<input type="text" class="form-control" name="txtname" value="<?php echo $name; ?>" aria-describedby="sizing-addon1" required/>
				</div></br>

				<div class="input-group">
				<span class="input-group-addon" id="sizing-addon1">Mobile No</span>
				<input type="text" class="form-control" name="txtmobile" value="<?php echo $mobile; ?>" aria-describedby="sizing-addon1" required/>
				</div></br>
				
			
			
			

					<div class="input-group" style="margin-top:0px;">
			<span class="input-group-addon" id="sizing-addon1">City</span>
 			 <select style="height:30px; width:100px;" name="txtcity">
 			 	<option value="Black" <?php  if($city=="Ahmedabad") echo "selected"?>>Ahmedabad</option>
 			 	<option value="Golden" <?php  if($city=="Delhi") echo "selected"?>>Delhi</option>
 			 	<option value="Pink" <?php  if($city=="Sanand") echo "selected"?>>Sanand</option>
 			 	<option value="Silver" <?php  if($city=="Mumbai") echo "selected"?>>Mumbai</option>
			</select>			
			
			</div>
			

			<div class="input-group" style="margin-top:10px;">
 				 <input type="radio" name="txtgender" value="Male" <?php if($gender=="Male") echo 'checked'; ?>><b>Male</b>
 				 <input type="radio" name="txtgender" value="Female" <?php if($gender=="Female") echo 'checked'; ?>><b>Female</b>			 
			</div>

			
			
<center>
    <div>
		<input type="submit" name="btnupdate" value="Update" class="btn btn-success text-center">
		
	
		<input type="submit" name="btnback" value="Back" class="btn btn-default text-center">
    </div> 
</center>
			</div>
		</div>
	</div>
</div>
</div>

</form>

</body>
</html>