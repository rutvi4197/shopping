<?php 
	session_start();
?>

<html>
<head>
<link href="../Content/bootstrap.css" rel="stylesheet"/>
<script src="../Scripts/jquery-1.9.1.js"></script>
<script src="../Scripts/bootstrap.js"></script>

<title>Product Update</title>
</head>

<body>
<?php 
	include 'adminheader.php';

?>
<?php
	$id=$_REQUEST["id"];
	require '../database.php';
	$obj=new database();
	$res=$obj->getpro1($id);
	while($row=mysql_fetch_array($res,MYSQL_ASSOC))
	{
		$name=$row["pro_name"];
		$price=$row["pro_price"];
		$soh=$row["pro_soh"];
		$mfg=$row["pro_mfg"];
		$war=$row["pro_warrenty"];
		$color=$row["pro_color"];
		$detail=$row["pro_detail"];
		$catid=$row["fk_cat_id"];
		$photo=$row["pro_photo"];
	}
	
 ?>


<form action="proedit1.php?photo=<?php echo $photo; ?>" method="post" enctype="multipart/form-data">
<div class="container"> 
<div class="row">
	<div class="col-md-6 col-md-offset-3">
	<center><h1>Update Category</h1></center>
		<div class="panel panel-primary">
	
			<div class="panel-heading">
			<h3 class="panel-title">Update form</h3>
			</div>
			
			<div class="panel-body">
   
				
				<input type="hidden" class="form-control" placeholder="Product Id" name="txtid" value="<?php echo $id; ?>" readonly aria-describedby="sizing-addon1" required/>
				
				
				<div class="input-group">
				<span class="input-group-addon" id="sizing-addon1">Image</span>
				<img src="<?php echo $photo; ?>" height=70px width=70px>
				<input type="file" name="txtphoto">
				</div></br>
				
				<div class="input-group">
				<span class="input-group-addon" id="sizing-addon1">Name</span>
				<input type="text" class="form-control" placeholder="Product Name" name="txtname" value="<?php echo $name; ?>" aria-describedby="sizing-addon1" required/>
				</div></br>

				<div class="input-group">
				<span class="input-group-addon" id="sizing-addon1">Price</span>
				<input type="text" class="form-control" placeholder="Price" name="txtprice" value="<?php echo $price; ?>" aria-describedby="sizing-addon1" required/>
				</div></br>
				
				<div class="input-group">
				<span class="input-group-addon" id="sizing-addon1">SOH</span>
				<input type="text" class="form-control" placeholder="Stock On Hand" name="txtsoh" value="<?php echo $soh; ?>"aria-describedby="sizing-addon1" required/>
				</div></br>

				<div class="input-group">
				<span class="input-group-addon" id="sizing-addon1">Mfg</span>
				<input type="text" class="form-control" placeholder="Manufacturing" name="txtmfg" value="<?php echo $mfg; ?>" aria-describedby="sizing-addon1" required/>
				</div></br>

				<div class="input-group">
				<span class="input-group-addon" id="sizing-addon1">Warrenty</span>
				<input type="text" class="form-control" placeholder="Warrenty" name="txtwarrenty" value="<?php echo $war; ?>" aria-describedby="sizing-addon1" required/>
				</div></br>

				<div class="input-group">
				<span class="input-group-addon" id="sizing-addon1">Detail</span>
				<input type="text" class="form-control" placeholder="Product Detail" name="txtdetail" value="<?php echo $detail; ?>"aria-describedby="sizing-addon1" required/>
				</div></br>

					<div class="input-group" style="margin-top:10px;">
			<span class="input-group-addon" id="sizing-addon1">Color</span>
 			 <select style="height:30px; width="30px;" name="txtcolor">
 			 	<option value="Black" <?php  if($color=="Black") echo "selected"?>>Black</option>
 			 	<option value="Golden" <?php  if($color=="Golden") echo "selected"?>>Golden</option>
 			 	<option value="Pink" <?php  if($color=="Pink") echo "selected"?>>Pink</option>
 			 	<option value="Silver" <?php  if($color=="Silver") echo "selected"?>>Silver</option>
				<option value="Red" <?php  if($color=="Red") echo "selected"?>>Red</option>
 			 	<option value="Purple" <?php  if($color=="Purple") echo "selected"?>>Purple</option>
 			 	<option value="Rose Pink" <?php  if($color=="Rose Pink") echo "selected"?>>Rose Pink</option>
 			 </select>			
			
			</div>
			

			<div class="input-group" style="margin-top:10px;">
			<span class="input-group-addon" id="sizing-addon1">Category</span>
 			 <select style="height:30px; width="30px;" name="txtcatname">
			<?php 
					$obj=new database();
					$res=$obj->catdis();
					while($row=mysql_fetch_assoc($res))
					{
						$selected="";
						if($catid==$row["cat_id"])
						{
							$selected="selected";
						}
						
					echo '<option '.$selected.'  value="'.$row["cat_id"].'">'.$row["cat_name"].'</option>';
					}	
			?>
		</select>			
			
			</div>

			
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