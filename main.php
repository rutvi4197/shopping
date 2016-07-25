<?php 
	session_start();
	require_once 'login-system-google/./config.php';

?>
<!DOCTYPE html>
<html>
<head>
<link href="Content/bootstrap.css" rel="stylesheet"/>
<script src="Script/jquery-1.9.1.js"></script>
<script src="Script/bootstrap.js"></script>
	<title>
		Main Page
	</title>
</head>
<body>
<?php 
		require_once './config.php';
		if(isset($_POST["btnlogin"]))
		{
		$email=$_POST["txtemail1"];
		$pwd=$_POST["txtpwd1"];
		require 'database.php';
		$obj=new database();
		$res=$obj->login($email,$pwd);

		$cnt=mysql_num_rows($res);
		if($cnt==1)
		{
			while($row=mysql_fetch_array($res,MYSQL_ASSOC))
				{
					$type=$row["type"];
				}
			$_SESSION["email"]=$email;
			if($type=="User")
			header('Location:user/view.php');
			else if($type=="Admin")
				header('Location:admin/prodis.php');
		}
		else
			echo"something went wrong";
		
		}
	else if(isset($_POST["btnsignup"]))
	{
	$email=$_POST["txtemail"];
	$name=$_POST["txtname"];
	$pwd=$_POST["txtpwd"];
	$repwd=$_POST["txtrepwd"];
	$mobile=$_POST["txtmobile"];
	$city=$_POST["txtcity"];
	$gender=$_POST["txtgender"];
	$type="User";
	if($pwd==$repwd)
	{
		
		require 'database.php';
		$obj=new database();
		$res=$obj->signup($email,$pwd,$name,$mobile,$gender,$type);
		if($res==1)
		{
			$_SESSION["email"]=$email;
			header('Location:user/view.php');
		}
		else
			echo"something went wrong";
	}
	else{
		
		echo"your password is wrong";
	}
	
	
	}
	
?>
	


<form action="main.php" method="post">
<div class="container-fluid">
	<div class="row" style="background-color:lightblue;" >
		<div class="col-md-2">
			<div class="jumbotron">
				<img src="images/shoppingcart1.jpg" width="150px" height="150px"></img>
			</div>
		</div>
		<div class="col-md-5">
			<div class="jumbotron">
				<h1><i style="color:red; font-size:60px;">Flipkart</i></h1>
				<p>A fresh approch to shopping</p>
			</div>
		</div>
		<div class="col-md-5 ">
			<table style="margin-top:50px; color:black;">
				<tr>
					<td>Email-Id or Phone Number</td>
					<td>Password</td>
					<td> </td>
				</tr>
				<tr style="height: 50px;">
					<td><input type="text" name="txtemail1" class="form-control" placeholder="Email-Id"></td>
					<td><input type="password" name="txtpwd1" class="form-control" placeholder="Password"></td>
					<td><input type="submit"  name="btnlogin" class="btn btn-success from-control" value="Log in"></td>
				</tr>
				<tr>

					<td>
					<a class="btn btn-block btn-social btn-facebook" href="<?php echo $loginURL; ?>">
					<i class="fa fa-facebook"></i> Login with Facebook
							</a>
							    <a class="btn btn-block btn-social btn-google-plus" href="login-system-google/google_login.php">
            <i class="fa fa-google-plus"></i> Login with Google
          </a>
					</td>
					<td></td>
					
					<td ><a href="">Forgot password?</a></td>
					
					</tr>
			</table>
		</div>
	</div>

	<div class="row" >
		<div class="col-md-6">
		<div class="jumbotron">
			<img src="images/shoppingbag1.jpg" height="350" width="450"/>
			</div>
		</div>

		<div class="col-md-5">
				<div class="jumbotron">
				  <h2><b>Create your Account</b></h2>
				  <p>It's free and always will be.</p>
						
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
						<div class="input-group" style="margin-top:10px; margin-left:25px;">
 						 <input type="radio"  aria-describedby="sizing-addon2" name="txtgender" value="Male" checked><i style="font-size:20px";>Male
 						 <input type="radio"  aria-describedby="sizing-addon2" name="txtgender" value="Female">Female
 						 </i>
						</div>

						<center style="margin:10px;">
								<div class="btn-group">
								<h6>By clicking Create an account, you agree to our Terms and that you have read our Data Policy, including our Cookie Use.</h6>
 							 <input type="submit" class="btn btn-success form-control " name="btnsignup" value="Create Your Flipkart account" />
								</div>
								</center>

			</div>
		</div>


	</div>
</div>
</form>
</body>
</html>