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
<link href="../Content/bootstrap.css" rel="stylesheet"/>
<script src="../Scripts/jquery-1.9.1.js"></script>
<script src="../Scripts/bootstrap.js"></script>

<style type="text/css">
.img{
	
	height:200px;
	width:200px;
}
.caption{
	height: 177px;
}
</style>
<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure to add into cart?');
}
</script>
	<title>view</title>
</head>
<body>
<div class="row">
<div class="col-md-12">
<?php 
include '../header.php';

?>
</div>
</div>

<div class="row" style="background-color:lightblue;">
		<div class="col-md-1 col-xs-0 container" >
    <div class="jumbotron">
      <img src="../images/f1.jpg"  height="100px" width="100px"></img>
    </div>
    </div>
    <div class="col-md-5 col-xs-4 col-md-offset-1">
          <marquee><h1 style="color:red; margin-top:75px;font-size:50px;"><b><i>Welcome to Flipkart</i></b></h1></marquee>

    </div>
     <div class="col-md-4 " style="margin-top:85px;">

      <div class="input-group">
      <input type="text" class="form-control glyphicon glyphicon-search" placeholder="what your wish for today?">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Search</button>
        </span>
    </div>
      </div>

    </div>
</div>

<div class="row">
	<div class="col-md-3">
	<div class="list-group">
  <a href="#" class="list-group-item active">Category </a>
  <?php 
  $obj1=new database();
  $res1=$obj1->getdata("select * from pro_tbl");
$count=mysql_num_rows($res1);
  ?>
   <a href="view.php" class="list-group-item ">All Product   <span class="badge" style="background-color:red;" ><?php echo $count; ?></span> </a>
<?php 

$obj=new database();
$res=$obj->getdata('select count(p.pro_id)"cnt",c.cat_name,p.fk_cat_id,c.cat_id from cat_tbl as c,pro_tbl as p  where c.cat_id=p.fk_cat_id group by(c.cat_name)');
while($row=mysql_fetch_assoc($res))
{
	echo '<a href="probycat.php?id='.$row["cat_id"].'"  class="list-group-item">'.$row["cat_name"].'<span class="badge" style="background-color:red;" >'.$row["cnt"].'</span></a>';

}
?>  
  
</div>

  
  <marquee direction="up">
  <a class="thumbnail">
      <img src="../images/dis.jpg">
	  
    </a>
  </marquee>
   <marquee direction="down">
  <a class="thumbnail">
      <img src="../images/dis1.jpg">
	  
    </a>
  </marquee>
</div>
		
	<div class="col-md-9">
	<div class="panel panel-default">
  <div class="panel-body">
  </div>
  <div class="row ">
  
  
<?php 


while($row=mysql_fetch_assoc($res1))
{
echo '<div class="col-sm-3 col-md-4">';
   echo ' <div class="thumbnail" >';
    echo ' <img  src="'.$row["pro_photo"].'" style="height:200px;width:200px;"/>';
     echo ' <div class="caption">';
      echo '  <h3>'.$row["pro_name"].'</h3>';
       echo ' <p>'.$row["pro_detail"].'</p>';
       echo ' <p style="color:red;"> Rs.'.$row["pro_price"].' </p>';
     echo '   <p><a href="buy.php?id='.$row["pro_id"].'" class="btn btn-primary" role="button">Buy</a> 
	 <a href="addtocart.php?id='.$row["pro_id"].'" class="btn btn-default" role="button">Add To Cart</a>
	 <a href="addtowish.php?id='.$row["pro_id"].'"><button type="button" style="color:red;"><center><span class="glyphicon glyphicon-heart"></span></center></button></a></p>
	 
      </div>
    </div>
  </div>';

}
?>  



  </div>
  </div>
</div>
	</div>
	
	
	</body>
</html>