<!DOCTYPE html>
<html>
<head>
<link href="../Content/bootstrap.css" rel="stylesheet"/>
<script src="../Scripts/jquery-1.9.1.js"></script>
<script src="../Scripts/bootstrap.js"></script>


<title>Insert</title>
</head>
<body>
<?php 
	include 'adminheader.php';

?>	
<?php 

	if(isset($_POST["btninsert"]))
	{
		$name=$_POST["txtname"];
		require '../database.php';
		$obj=new database();
		$res=$obj->catins($name);
		if($res==1)
		{
			header('Location:catdis1.php');
		}
		else
			echo"not inserted";
		
	}

?>
<div class="container"> 
<div class="row">
<center>


 <form action="catinsert.php" method="post">

	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-primary">
	
			<div class="panel-heading">
			<h3 class="panel-title">Category Insert form</h3>
			</div>
			
			<div class="panel-body">
   				
				<div class="input-group">
				<span class="input-group-addon" id="sizing-addon1">Category Name</span>
				<input type="text" class="form-control" placeholder="Category Name" name="txtname" aria-describedby="sizing-addon1" required/>
				</div></br>

<center>
    <div>
		<input type="submit" name="btninsert" value="Insert" class="btn btn-success text-center">
    </div> 
</center>
			</div>
		</div>
	</div>
</div>
</div>

</form>
</center>
</body>
</html>