<?php 
	session_start();
	 if(isset($_POST["btnsignup"]))
	{
	$email=$_POST["txtemail"];
	$name=$_POST["txtname"];
	$pwd=$_POST["txtpwd"];
	$repwd=$_POST["txtrepwd"];
	$mobile=$_POST["txtmobile"];
	$city=$_POST["txtcity"];
	$gender=$_POST["txtgender"];
	$type="Admin";
	if($pwd==$repwd)
	{
		
		require '../database.php';
		$obj=new database();
		$res=$obj->getdata("insert into user_tbl values('$email','$name','$pwd','$mobile','$city','$gender','$type')");
		if($res==1)
		{
			$_SESSION["email"]=$email;
			header('Location:prodis.php');
		}
		else
			echo"something went wrong";
	}
	else{
		
		echo"your password is wrong";
	}
	
	
	}

?>
<!DOCTYPE html>
<html>
<head>
<link href="../Content/bootstrap.css" rel="stylesheet"/>
<script src="../Scripts/jquery-1.9.1.js"></script>
<script src="../Scripts/bootstrap.js"></script>
	<title>
		Add new admin
	</title>
</head>
<body>

<?php 
	include 'adminheader.php';

?>
<form action="addadmin.php" method="post">
<div class="container " style="margin-left:500px;">
<div class="row" >
		

		<div class="col-md-5">
				<div class="jumbotron">
				  <h2><b>Create New Admin</b></h2>
				 
						</div>
			<div class="input-group">
 			 <span class="input-group-addon" id="sizing-addon2">@</span>
 			 <input type="text" class="form-control" placeholder="Email id" name="txtemail" aria-describedby="sizing-addon2">
			</div>

			<div class="input-group" style="margin-top:10px;">
 			 <span class="input-group-addon" id="sizing-addon2">@</span>
 			 <input type="text" class="form-control" placeholder="User Name" name="txtname" aria-describedby="sizing-addon2">
			</div>

			<div class="input-group" style="margin-top:10px;">
 			 <span class="input-group-addon" id="sizing-addon2">*</span>
 			 <input type="password" class="form-control" placeholder="Password" name="txtpwd" aria-describedby="sizing-addon2">
			</div>

			<div class="input-group" style="margin-top:10px;">
 			 <span class="input-group-addon" id="sizing-addon2">*</span>
 			 <input type="password" class="form-control" placeholder="Confirm Password" name="txtrepwd" aria-describedby="sizing-addon2">
			</div>

			<div class="input-group" style="margin-top:10px;">
 			 <span class="input-group-addon" id="sizing-addon2">*</span>
 			 <input type="text" class="form-control" placeholder="Mobile Number" name="txtmobile" aria-describedby="sizing-addon2">
			</div>

			<div class="input-group" style="margin-top:10px;">
			<lable style="margin-right:20px;"><b>City:</b></lable>
 			 <select style="height:30px; width="30px;" name="txtcity">
 			 	<option value="Ahmedabad">Ahmedabad</option>
 			 	<option value="Baroda">Baroda</option>
 			 	<option value="Mumbai">Mumbai</option>
 			 	<option value="Delhi">Delhi</option>
 			 </select>
			</div>
						<div class="input-group" style="margin-top:10px; ">
						<lable style="margin-right:20px;"><b>Gender:</b></lable>
 						 <input type="radio"  aria-describedby="sizing-addon2" name="txtgender" checked value="Male"><i style="font-size:20px";>Male
 						 <input type="radio"  aria-describedby="sizing-addon2" name="txtgender" value="Female">Female
 						 </i>
						</div>

						<center style="margin:10px;">
								<div class="btn-group">
								<h6>By clicking Create an account, you agree to our Terms and that you have read our Data Policy, including our Cookie Use.</h6>
 							 <input type="submit" class="btn btn-success form-control " name="btnsignup" value="Create an account" />
								</div>
								</center>

			
		</div>


	</div>
</div>
</div>

</form>
</body>
</html>