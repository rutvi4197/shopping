<?php 
	session_start();
	$id=$_SESSION["email"];
 if($id=="")
 {
	 header('Location:../main.php');
	 
 }
?>
<!DOCTYPE html>
<html>
<head>
<link href="../Content/bootstrap.css" rel="stylesheet"/>
<script src="../Scripts/jquery-1.9.1.js"></script>
<script src="../Scripts/bootstrap.js"></script>
<title>Change password</title>

</head>

<body >
<div class="row" >
	<div class="col-md-12">
		
		<?php include '../header.php'; ?>

	</div>

</div>
<form action="changepwd.php" method="post">
<?php 
if(isset($_POST["btnnew"]))
{
		
		$pwd=$_POST["txtoldpwd"];
		$email=$_SESSION["email"];
		
		
		$obj=new database();
		$res=$obj->login($email,$pwd);
		$cnt=mysql_num_rows($res);
		if($cnt==1)
		{
			
			$new=$_POST["newpwd"];
		$renew=$_POST["cnfrmpwd"];
		
		if($new==$renew)
		{
			
		$obj=new database();
		$res=$obj->changepwd($email,$new);
		if($res==1)
		{
			header('Location:view.php');
		}
		else
		{
			echo"Your password is not match plz try again";
		}

			
		}
		}
		else
		{
			echo"Your password is wrong plz try again";
		}
	
}
	if(isset($_POST["btnback"]))
		{
			
			header('Location:view.php');
		}
?>
<center>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
<div class="page-header">
  <h1>Change Your password</h1>
</div>
<div class="input-group input-group-lg">
  <span class="input-group-addon" id="sizing-addon1">Old password:</span>
  <input type="password" class="form-control" placeholder="old password" name="txtoldpwd" aria-describedby="sizing-addon1">
</div></br>
<div class="input-group input-group-lg">
  <span class="input-group-addon" id="sizing-addon1">New password:</span>
  <input type="password" class="form-control" placeholder="old password" name="newpwd" aria-describedby="sizing-addon1">
</div></br>
<div class="input-group input-group-lg">
  <span class="input-group-addon" id="sizing-addon1">Confirm password:</span>
  <input type="password" class="form-control" placeholder="confirm password" name="cnfrmpwd" aria-describedby="sizing-addon1">
</div>
</br>
<div class="btn-group">
  <button type="submit" class="btn btn-info" name="btnnew" >
    Change password
  </button>
  
</div>
<div class="btn-group">
 <button type="submit" class="btn btn-default" name="btnback" >
    Back
  </button>
  
</div>
</div>
</div>
</form>
</center>
</body>
</html>