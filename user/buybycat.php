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
<title>Product</title>
<link href="../Content/bootstrap.css" rel="stylesheet"/>
<script src="../Scripts/jquery-1.9.1.js"></script>
<script src="../Scripts/bootstrap.js"></script>

<style type="text/css">

.caption{
	height: 70px;
}
</style>

<body>
<form action="buy.php" method="post">
<div class="row">

<?php 

include '../header.php';

?>
<?php 	
		$pro_id=$_REQUEST["id"];
		
		 '../database.php';	
		$obj=new database();
		$res=$obj->getpro1($pro_id);
				
		while($row=mysql_fetch_array($res,MYSQL_ASSOC))
		{
			
		$img=$row["pro_photo"];
		$name=$row["pro_name"];
		$price=$row["pro_price"];
		$color=$row["pro_color"];
		$cat_id=$row["fk_cat_id"];
		$warrenty=$row["pro_warrenty"];

		}
		                
		
?>	
</div>
<div class="row">
<div class="panel panel-defalut">
  <div class="panel-body">
  <center>
   <p style="font-size:50px; color:blue;">Product details</p></center>
  </div>
<div class="col-md-5">

  <a href="#" class="thumbnail">
      <img src="<?php echo $img; ?>" style="height:500px; width:500px;" />
    </a>
</div>
		
	<div class="col-md-6">

  
  <div class="panel-footer">
	 
  <div class="page-header">
  <center style="font-size:50px;"><?php echo $name;?><center> 
</div>
<p style="font-size:30px; "><?php echo 'Rs.'.$price; ?></p><p style="color:red;">(43% off)</p>
<p>Warrenty for product is <?php echo $warrenty; ?>
<p>EMI START AT LOW PRICE :</p>
<p style="font-size:15px;"><b>Select your product color:
 			 <select style="height:30px; width="30px;" name="txtcolor">
 			 	<option value="Black">Black</option>
 			 	<option value="Golden">Golden</option>
 			 	<option value="Pink">Pink</option>
 			 	<option value="Silver">Silver</option>
				<option value="Red">Red</option>
 			 	<option value="Purple">Purple</option>
 			 	<option value="Rose Pink">Rose Pink</option>
</select></b></p>
<p>Check delivery, payment options and charges at your location</p>
<input type="text" name="txtpin" placeholder="Enter your pin">
<input type="button" name="btnpin"style="background-color:grey;" value="Check">  
Expect delivery in 4 - 8 days
<br><br><br><br><br>
<a href="payment1.php?id=<?php echo $pro_id;?>"><input type="button" name="btnbuy" class="btn btn-primary" value="Buy Now" style="height:50px;width:130px;margin-right:20px;"> </a>
<a href="addtocart.php?id=<?php echo $id; ?>"><input type="button" name="btnaddtocart" class="btn btn-default" value="Add to cart" style="height:50px;width:130px;"> 

 </div>
</div>
</div>
</div>
<div class="row">

			
				<h3><p style="color:red;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;You may like to order this too...</h3></p>
				<?php 
				
				$obj=new database();
				$res=$obj->prodis($cat_id,$id);
				while($row=mysql_fetch_assoc($res))
				{
						echo   '<a href="buybycat.php?id='.$row["pro_id"].'">		
								<div class="col-sm-6 col-md-2">
									<div class="thumbnail">
						  <img src="'.$row["pro_photo"].'"style="height: 100px; width: 160px;">
							<h3>'.$row["pro_name"].'</h3>
							
						</div>
					  
					</div></a>';
										
					
				}
				
				
				
				
				
				?>
		
		


</div>
</form>
</body>
</html>