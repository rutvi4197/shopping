<!DOCTYPE html>
<html>
<head>
<title>Update</title>

<link href="../Content/bootstrap.css" rel="stylesheet"/>
<script src="../Scripts/jquery-1.9.1.js"></script>
<script src="../Scripts/bootstrap.js"></script>


</head>
<body bgcolor="lightgreen">
<?php 
	include 'adminheader.php';

?>
<?php
	$id=$_REQUEST["id"];
	require '../database.php';
	$obj=new database();
	$res=$obj->getdata("select * from cat_tbl where cat_id='$id'");
	while($row=mysql_fetch_array($res,MYSQL_ASSOC))
	{
		$id=$row["cat_id"];
		$name=$row["cat_name"];		
	}
	
 ?>
 
 <form action="catedit1.php" method="post">
<div class="container"> 
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<center><h1>Update Category</h1></center>
		<div class="panel panel-primary" style="margin-top:50px;">
	
			<div class="panel-heading">
			<h3 class="panel-title">Category Update form</h3>
			</div>
			
			<div class="panel-body" >
   
				
				<input type="hidden" class="form-control" placeholder="Category Id" name="txtid" value="<?php echo $id; ?>" readonly aria-describedby="sizing-addon1" required/>
				
				
				<div class="input-group">
				<span class="input-group-addon" id="sizing-addon1">Category Name</span>
				<input type="text" class="form-control" placeholder="Product Name" name="txtname" value="<?php echo $name; ?>" aria-describedby="sizing-addon1" required/>
				</div></br>

			
<center>
    <div>
		<input type="submit" name="btnupdate" value="Update" class="btn btn-success text-center">
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
