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
		
		<nav class="navbar navbar-default">
  <div class="container-fluid">
   
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
     <a class="navbar-brand" href="#" style="color:red;font-size:20px;">Flipkart</a>
    </div>

  
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">About us<span class="sr-only">(current)</span></a></li>
        <li><a href="#">Contact us</a></li>
          </ul>
        
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../main.php">Signout</a></li>
        <li class="dropdown">
          
            <?php
                $email=$_SESSION["email"];
            require '../database.php';
                $obj=new database();
                $res=$obj->getdata("select * from user_tbl where email_id='$email'");
              while($row=mysql_fetch_assoc($res))
              {
				echo  '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.$row["user_name"].'<span class="caret"></span></a>
					<ul class="dropdown-menu">';
                echo '<li><a href="">'.$row["email_id"].'</a></li>';
                
                echo '<li><a href="">'.$row["city"].'</a></li>';
                echo '<li role="separator" class="divider"></li>';
              }
            ?>
              <li><a href="useredit.php">Chnage your profile</a></li>
               <li><a href="changepwd.php">Chnage your password</a></li>
              

          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

	</div>

</div>
<form action="changepwd.php" method="post">
<?php 
if(isset($_POST["btnnew"]))
{
		
		$pwd=$_POST["txtoldpwd"];
		$email=$_SESSION["email"];
		
		require '../database.php';
		$obj=new database();
		$res=$obj->getdata("select * from user_tbl where email_id='$email' and password='$pwd'");
		$cnt=mysql_num_rows($res);
		if($cnt==1)
		{
			
			$new=$_POST["newpwd"];
		$renew=$_POST["cnfrmpwd"];
		
		if($new==$renew)
		{
			
		$obj=new database();
		$res=$obj->getdata("update user_tbl set password='$new'where email_id='$email' ");
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