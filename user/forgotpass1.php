<?php

	session_start();
	$email=$_SESSION["email"];
	
 ?>
<!DOCTYPE html>
<html>
<head>
<link href="../Content/bootstrap.css" rel="stylesheet"/>
<script src="../Scripts/jquery-1.9.1.js"></script>
<script src="../Scripts/bootstrap.js"></script>
</head>
<body>
<div class="row">
<div class="col-md-12">
<?php 

	//include '../header.php';
	if(isset($_POST["btnpass"]))
	{
		$veri=$_POST["txtveri"];
		$pass=$_POST["txtpass"];
		$con=mysql_connect('rutvi.db.9462939.hostedresource.com','rutvi','Demo9@1212');
		mysql_select_db('rutvi',$con);
	$res=mysql_query("select * from user_tbl where code='$veri' and pk_email_id='$email' ",$con);
	$cnt=mysql_num_rows($res);
	if($cnt==1)
	{
			$con=mysql_connect('rutvi.db.9462939.hostedresource.com','rutvi','Demo9@1212');
		mysql_select_db('rutvi',$con);
	$res=mysql_query("update user_tbl set user_password='$pass' where pk_email_id='$email' ",$con);
	if($res==1)
	{
		header('Location:view.php');
	}
	else{
		echo "error in update";
	}		
	}
	else
	{
    $msg = "Mail send unsuccessfully";
	echo $msg;
	}
	}
?>
</div></div>
<center>
<form action="forgotpass1.php" method="post">

		<div class="input-group">
 			 <span class="input-group-addon" id="sizing-addon2">@</span>
 			 <input type="email" class="form-control" placeholder="Email id" name="txtemail" value="<?php echo $email; ?>" aria-describedby="sizing-addon2">
			</div>
			<div class="input-group">
 			 <span class="input-group-addon" id="sizing-addon2"> verification code</span>
 			 <input type="text" class="form-control" placeholder="Enter verification code" name="txtveri" aria-describedby="sizing-addon2">
			</div>
			<div class="input-group">
 			 <span class="input-group-addon" id="sizing-addon2">pass</span>
 			 <input type="text" class="form-control" placeholder="enter new password" name="txtpass" aria-describedby="sizing-addon2">
			</div>
			<div class="btn-group">
			<input type="submit" class="btn btn-success form-control " name="btnpass" value="Submit" />
			</div>

</form>
</center>
</body>
</body>
</html>