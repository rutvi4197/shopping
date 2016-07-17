<!DOCTYPE html>
<html>
<head>
<title>Product</title>


    <link href="../Content/bootstrap.min.css" rel="stylesheet">
    <link href="../css/jquery.dataTables_themeroller.css" rel="stylesheet">
    <link href="../css/endless.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet"> 
    <script src="../js/jquery-1.10.2.min.js"></script>
	<script src="../Scripts/bootstrap.min.js"></script>
	<script src='../js/jquery.dataTables.min.js'></script>

    <script>
        $(function () {
            $('#dataTable').dataTable({
                "bJQueryUI": true,
                "sPaginationType": "full_numbers"
            });

            $('#chk-all').click(function () {
                if ($(this).is(':checked')) {
                    $('#responsiveTable').find('.chk-row').each(function () {
                        $(this).prop('checked', true);
                        $(this).parent().parent().parent().addClass('selected');
                    });
                }
                else {
                    $('#responsiveTable').find('.chk-row').each(function () {
                        $(this).prop('checked', false);
                        $(this).parent().parent().parent().removeClass('selected');
                    });
                }
            });
        });
    </script>
<style type="text/css">
th
{
	color:red;
}
</style>
<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure?');
}
</script>
</head>
<body>
<?php 
	include 'adminheader.php';

?>
<div class="container">
<div class="row">
<center>
<center><p style="font-size:50px;color:red;">Product details</p></center>
<form action="prodis.php" method="post">
<table class="table table-striped" id="dataTable" >
<thead>


<tr>
	<th>Product id
	<th>Product Image
	<th>Product Name
	<th>Product price
	<th>Product soh
	<th>Product Mfg
	<th>Product Warrenty
	<th>Product color
	<th>Product details
	<th>Category Name
	<th>Action
</tr>
</thead>
<tbody>
<?php 
	
		require '../database.php';
		$obj=new database();
		$res=$obj->getpro();
		while($row=mysql_fetch_array($res,MYSQL_ASSOC))
		{
			echo "<tr>";
			echo "<td><center>".$row["pro_id"];
			echo '<td><center><img src="'.$row["pro_photo"].'" style="height:50px;width:50px">';
			echo "<td><center>".$row["pro_name"];
			echo "<td><center>".$row["pro_price"];
			echo "<td><center>".$row["pro_soh"];
			echo "<td><center>".$row["pro_mfg"];
			echo "<td><center>".$row["pro_warrenty"];
			echo "<td><center>".$row["pro_color"];
			echo "<td><center>".$row["pro_detail"];
			echo "<td><center>".$row["cat_name"];
			echo '<td><center><a href="proedit.php?id='.$row["pro_id"].'"><span class="glyphicon glyphicon-edit
" aria-hidden="true"></span></a></br>';
					?>	
				<a href="prodel.php?id=<?php echo $row["pro_id"] ?>" onclick="return checkDelete()"><span class="glyphicon glyphicon-trash
" aria-hidden="true"></span></a>		
			
						<?php
						
			echo "</tr>";
		}
		?>
 </tbody>

		

</div>
</div>
</table>
</form>
</center>
</body>
</html>