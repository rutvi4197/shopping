<?php 


			$photo=$_REQUEST["photo"];
			$email=$_POST["txtemail"];
			$name=$_POST["txtname"];
			$mobile=$_POST["txtmobile"];
			$city=$_POST["txtcity"];
			$gender=$_POST["txtgender"];
				
		if($_FILES["txtphoto"]["name"]!="")
		{
			unlink($photo);
			$photo="../profilephoto/".$_FILES["txtphoto"]["name"];
			move_uploaded_file($_FILES["txtphoto"]["tmp_name"],$photo);
		}
			
		require '../database.php';
		$obj=new database();
		$res=$obj->useredit($email,$photo,$name,$mobile,$gender);
		if($res==1)
		{
			$_SESSION["email"]=$email;
			header('Location:view.php');
		}			
		else
		{
			echo"not updated your detials plz try again";
		}	
		


?>
