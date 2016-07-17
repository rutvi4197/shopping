
<html>
<head>
</head>
<body>
 <form action="" method="post">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
   
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
     <a class="navbar-brand" href="view.php" style="color:red;font-size:50px; margin-top:10px;margin-right:20px;">Flipkart</a>
    </div>

  
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">

<button type="button" class="btn btn-primary" style="margin-top:20px; margin-right:20px;" data-toggle="modal" data-target=".bs-example-modal-lg">About Us</button>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
		
		<h3>
		Hello<br> 
		This Website is For Online Shopping.<br>
		You will get Vareity Of Items and Food Products Here.<br>
		</h3>
    </div>
  </div>
</div>


	<button type="button" style="margin-top:20px; margin-right:20px;" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Contact Us
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Contact Us</h4>
      </div>
      <div class="modal-body">
      
		<table class="table">
			<tr>
			<td>
				<img src="../images/Swara.png" style="height:200px">
				<img src="../images/Priyansh.jpg" style="height:170px">
				<img src="../images/Rutvi.jpg" style="height:200px">
			</td>
			</tr>
	
		</table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
        </div>
    </div>
  </div>
</div>

	  </ul>
        <?php
       $email=$_SESSION["email"];
            require '../database.php';
                $obj=new database();
                $res=$obj->getuser($email);
			?>
      <ul class="nav navbar-nav navbar-right">
	 
        <li ><a href="viewwish.php"><button type="button" class="btn btn-primary btn-lg">
  <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
  </button>
</a></li>

<li ><a href="viewcart.php"><button type="button" class="btn btn-primary btn-lg">
  <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
  </button>
</a></li>

        


<li><a href="logout.php"><input type="submit" class="btn btn-primary" name="btnlogout" style="margin-left:15px;" value="Logout"></a></li>
<?php 
	if(isset($_POST["btnlogout"]))
	{
		
		$_SESSION["email"]="";
		header('Location:../main.php');
		
	}

?>
</form> 

		<li><a href="#"><img src="<?php 
			while($row=mysql_fetch_assoc($res))
			{
				echo $row["profile_photo"];
			}
		
		?> "height=40px width=40px   class="img-circle" style="margin-top:5px;"/></a></li>
        <li class="dropdown" style="margin-top:10px; height:20px;">
          
            <?php
                $email=$_SESSION["email"];
          
                $obj=new database();
                $res=$obj->getuser($email);
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
			   <li><a href="preorder.php">Show your previous orders</a></li>
               

          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
</body>
</html>