<?php 

		$photo=$_REQUEST["photo"];
		$id=$_POST["txtid"];
		$name=$_POST["txtname"];
		$price=$_POST["txtprice"];
		$soh=$_POST["txtsoh"];
		$mfg=$_POST["txtmfg"];
		$warrenty=$_POST["txtwarrenty"];
		$detail=$_POST["txtdetail"];
		$color=$_POST["txtcolor"];
		$catid=$_POST["txtcatname"];
			
		if($_FILES["txtphoto"]["name"]!="")
		{
			unlink($photo);
			$photo="../images/".$_FILES["txtphoto"]["name"];
			move_uploaded_file($_FILES["txtphoto"]["tmp_name"],$photo);
		}

	require '../database.php';
	$obj=new database();
	$res=$obj->proedit1($photo,$name,$price,$soh,$mfg,$warrenty,$detail,$color,$catid,$id);
	if($res==1)
	{
		header('Location:prodis.php');
		
	}
	else
		echo"NOt updated";
	

	
?>