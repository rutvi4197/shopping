<?php 
	session_start();
?>

<html>
<head>
<link href="../Content/bootstrap.css" rel="stylesheet"/>
<script src="../Scripts/jquery-1.9.1.js"></script>
<script src="../Scripts/bootstrap.js"></script>

<title>Product insert</title>
</head>

<body>

<?php 
	include 'adminheader.php';

?>
<?php 

	if(isset($_POST["btninsert"]))
	{
		
		$name=$_POST["txtname"];
		$price=$_POST["txtprice"];
		$soh=$_POST["txtsoh"];
		$mfg=$_POST["txtmfg"];
		$warrenty=$_POST["txtwarrenty"];
		$detail=$_POST["txtdetail"];
		$color=$_POST["txtcolor"];
		$catid=$_POST["txtcatname"];
		$str="../images/".$_FILES["txtphoto"]["name"];
		$ext=pathinfo($str,PATHINFO_EXTENSION);
		if($ext=="jpg" || $ext=="jpeg" || $ext=="png")
		{
			if(move_uploaded_file($_FILES["txtphoto"]["tmp_name"],$str))
			{
				require '../database.php';
				$obj=new database();
				$res=$obj->getdata($str,$name,$price,$soh,$mfg,$warrenty,$color,$detail,$catid);
				if($res==1)
				{
					header('Location:prodis.php');
				}
				else
				{
					echo"not inserted";
				}
			}
		}
		else
				echo 'invalid exetention choose correct';
	}
?>

<form action="" method="post" enctype="multipart/form-data">
<div class="container"> 
<div class="row">

	<div class="col-md-6 col-md-offset-3">
<center><h1>Insert Product</h1></center>
		<div class="panel panel-primary">
	
			<div class="panel-heading">
			<h3 class="panel-title">Insert form</h3>
			</div>
			
			<div class="panel-body">
   
				
				<div class="input-group">
				<span class="input-group-addon" id="sizing-addon1">Name</span>
				<input type="text" class="form-control" placeholder="Product Name" name="txtname" aria-describedby="sizing-addon1" required/>
				</div></br>
				
				<div class="input-group">
				<span class="input-group-addon" id="sizing-addon1">Image</span>
				<input type="file" name="txtphoto"/>
				</div></br>

				<div class="input-group">
				<span class="input-group-addon" id="sizing-addon1">Price</span>
				<input type="text" class="form-control" placeholder="Price" name="txtprice" aria-describedby="sizing-addon1" required/>
				</div></br>
				
				<div class="input-group">
				<span class="input-group-addon" id="sizing-addon1">SOH</span>
				<input type="text" class="form-control" placeholder="Stock On Hand" name="txtsoh" aria-describedby="sizing-addon1" />
				</div></br>

				<div class="input-group">
				<span class="input-group-addon" id="sizing-addon1">Mfg</span>
				<input type="text" class="form-control" placeholder="Manufacturing" name="txtmfg" aria-describedby="sizing-addon1" />
				</div></br>

				<div class="input-group">
				<span class="input-group-addon" id="sizing-addon1">Warrenty</span>
				<input type="text" class="form-control" placeholder="Warrenty" name="txtwarrenty" aria-describedby="sizing-addon1" />
				</div></br>

				<div class="input-group">
				<span class="input-group-addon" id="sizing-addon1">Detail</span>
				<input type="text" class="form-control" placeholder="Product Detail" name="txtdetail" aria-describedby="sizing-addon1" />
				</div></br>

					<div class="input-group" style="margin-top:10px;">
			<span class="input-group-addon" id="sizing-addon1">Color</span>
 			 <select style="height:30px; width="30px;" name="txtcolor">
 			 	<option value="Black">Black</option>
 			 	<option value="Golden">Golden</option>
 			 	<option value="Pink">Pink</option>
 			 	<option value="Silver">Silver</option>
				<option value="Red">Red</option>
 			 	<option value="Purple">Purple</option>
 			 	<option value="Rose Pink">Rose Pink</option>
 			 </select>			
			</div>
			

						<div class="input-group" style="margin-top:10px;">
			<span class="input-group-addon" id="sizing-addon1">Category</span>
 			 <select style="height:30px"; width="30px;" name="txtcatname">
			<?php 
					require '../database.php';
					$obj=new database();
					$res=$obj->catdis();
					while($row=mysql_fetch_assoc($res))
					{
						echo '<option value="'.$row["cat_id"].'">'.$row["cat_name"].'</option>';
						
					}
				
			?>

		</select>			
			
			</div>

			
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
</body>
</html>