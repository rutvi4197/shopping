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
	$res=$obj->getdata("update pro_tbl set pro_photo='$photo',pro_name='$name',pro_price='$price',pro_soh='$soh',pro_mfg='$mfg',pro_warrenty='$warrenty',pro_detail='$detail',pro_color='$color',fk_cat_id='$catid' where pro_id='$id'");
	if($res==1)
	{
		header('Location:prodis.php');
		
	}
	else
		echo"NOt updated";
	

	
?>