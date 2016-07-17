<?php 
session_start();
	$email_id=$_SESSION["email"];
	$pro_id=$_REQUEST["id"];

 ?>
<!DOCTYPE html>
<html>
<head>
<title>Payment Form </title>
<link href="../Content/bootstrap.css" rel="stylesheet"/>
<script src="../Scripts/jquery-1.9.1.js"></script>
<script src="../Scripts/bootstrap.js"></script>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href='//fonts.googleapis.com/css?family=Fugaz+One' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Alegreya+Sans:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>

<div class="row">
	<div class="col-md-12">

	<?php 
	 include  '../header.php';
	
	 ?>
	 	</div>
	</div>
	<?php 
	if(isset($_POST["btnsubmit"]))
	{ 
		
		
	 '../database.php';
	$obj=new database();
	$flag='order';
	$res=$obj->payment($flag,$pro_id,$email_id);
	
		if($res==1)
		{
			
			header('Location:preorder.php');
			
		}
		else
		{
				echo 'wrong';
		}
	
	}
	
	?>
	<form action="cartpay.php?id=<?php echo $pro_id; ?>" method="post">
	<div class="main">
	
		<h1>Payment Form</h1>
		<div class="content">
			
			<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
					<script type="text/javascript">
						$(document).ready(function () {
							$('#horizontalTab').easyResponsiveTabs({
								type: 'default', //Types: default, vertical, accordion           
								width: 'auto', //auto or any width like 600px
								fit: true   // 100% fit in a container
							});
						});
						
					</script>
						<div class="sap_tabs">
							<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
								<div class="pay-tabs">
									<h2>Select Payment Method</h2>
									  <ul class="resp-tabs-list">
										  <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span><label class="pic1" style="height:80px;width:80px;"></label>Credit Card</span></li>
										   <ul class="resp-tabs-list">
										  <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span><label class="pic1" style="height:80px;width:80px;"></label>Cash on delivery</span></li>
										 
										  <li class="resp-tab-item" aria-controls="tab_item-2" role="tab"><span><label class="pic4" style="height:80px;width:80px;"></label>PayPal</span></li> 
										  <li class="resp-tab-item" aria-controls="tab_item-3" role="tab"><span><label class="pic2"style="height:80px;width:80px;"></label>Debit Card</span></li>
										  <div class="clear"></div>
									  </ul>	
								</div>
								<div class="resp-tabs-container">
									<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
										<div class="payment-info">
											<h3>Personal Information</h3>
											
												<div class="tab-for">				
													<h5>EMAIL ADDRESS</h5>
														<input type="text" placeholder="enter emial" name="ccemail" value="<?php echo $email_id; ?>">
													<h5>FIRST NAME</h5>													
														<input type="text" placeholder="enter First name" name="ccfname">
												</div>			
											
											<h3 class="pay-title">Credit Card Info</h3>
											
												<div class="tab-for">				
													<h5>NAME ON CARD</h5>
														<input type="text" name="cccardname">
													<h5>CARD NUMBER</h5>													
														<input class="pay-logo" type="text" value="0000-0000-0000-0000" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '0000-0000-0000-0000';}"  name="ccnumber">
												</div>	
												<div class="transaction">
													<div class="tab-form-left user-form">
														<h5>EXPIRATION</h5>
															<ul>
																<li>
																	<input type="number" class="text_box" type="text" value="31" min="1" />	
																</li>
																<li>
																	<input type="number" class="text_box" type="text" value="2016" min="1" style="height:40px;width:70px;" />	
																</li>
																
															</ul>
													</div>
													<div class="tab-form-right user-form-rt">
														<h5>CVV NUMBER</h5>													
														<input type="password" value="xxxx" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'xxxx';}" >
													</div>
													<div class="clear"></div>
												</div>
												<br>
												<input type="submit" value="SUBMIT" name="btnsubmit" style="background-color:blue; height:50px; width:100px; color:white;">
											
											
										</div>
									</div>
									<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
										<div class="payment-info">
										<h3>Personal Information</h3>
											
												<div class="tab-for">				
													<h5>EMAIL ADDRESS</h5>
														<input type="text" placeholder="enter emial" name="ccemail" value="<?php echo $email_id; ?>">
													<h5>FIRST NAME</h5>											
														<input type="text" placeholder="enter First name" name="ccfname">
														
												<div class="tab-for">				
													<h5>ADDRESS</h5>
														<input type="text" placeholder="enter address" name="ccaddress">
													<h5>Pincode</h5>				
														<input type="text" placeholder="enter pin number" name="ccpincode">
														<div class="clear"></div>
												</div>
													<div class="clear"></div>
												</div>
												<br>
												<input type="submit" value="SUBMIT" name="btnsubmit" style="background-color:blue; height:50px; width:100px;color:white;">
										</div>
									</div>
									
									<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-2">
										<div class="payment-info">
											<h3>PayPal</h3>
											<h4>Already Have A PayPal Account?</h4>
											<div class="login-tab">
												<div class="user-login">
													<h2>Login</h2>
													
													
														<input type="text" value="<?php echo $email_id; ?>">
														<input type="password" placeholder="Paypal password"  >
															<div class="user-grids">
																<div class="user-left">
																	
																</div>
															<br><br>
															<div class="single-bottom">
																			<ul>
																				<li>
																					<input type="checkbox"  id="brand1" value="">
																					<label for="brand1"><span></span>Remember me?</label>
																				</li>
																			</ul>
																	</div>
																<div class="user-right">
																	<input type="submit" value="LOGIN" name="btnsubmit" style="background-color:blue;">
																</div>
																
																<div class="clear"></div>
															</div>
													
												</div>
											</div>
										</div>
									</div>
									<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-3">	
										<div class="payment-info">
											<h3>Personal Information</h3>
											
												<div class="tab-for">				
													<h5>EMAIL ADDRESS</h5>
														<input type="text" placeholder="enter emial" name="ccemail" value="<?php echo $email_id; ?>">
														
													<h5>FIRST NAME</h5>													
														<input type="text" placeholder="enter First name" name="ccfname">
												</div>			
											
											<h3 class="pay-title">Debit Card Info</h3>
											
												<div class="tab-for">				
													<h5>NAME ON CARD</h5>
														<input type="text" name="cccardname">
													<h5>CARD NUMBER</h5>													
														<input class="pay-logo" type="text" value="0000-0000-0000-0000" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '0000-0000-0000-0000';}"  name="ccnumber">
												</div>	
												<div class="transaction">
													<div class="tab-form-left user-form">
														<h5>EXPIRATION</h5>
															<ul>
																<li>
																	<input type="number" class="text_box" type="text" value="6" min="1" />	
																</li>
																<li>
																	<input type="number" class="text_box" type="text" value="2016" min="1" style="height:40px;width:70px;" />	
																</li>
																
															</ul>
													</div>
													<div class="tab-form-right user-form-rt">
														<h5>CVV NUMBER</h5>													
														<input type="password" value="xxxx" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'xxxx';}" >
													</div>
													<div class="clear"></div>
												</div>
												<br>
												<input type="submit" value="SUBMIT" name="btnsubmit" style="background-color:blue; height:50px; width:100px; color:white;">
											
											
										</div>
									</div>
									</div>
								</div>	
							</div>
						</div>	

		</div>
		<p class="footer">Copyright © 2016 Flipkart. All Rights Reserved </a></p>
	</div>
	</form>
</body>
</html>