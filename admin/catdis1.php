<!DOCTYPE html>
<html>
<head>
<title>Category</title>
	
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
<div class="container-fluid"
<div class="row" >


<table class="table" id="dataTable">

<thead>

<tr>
	<th>Category id
	<th>Category Name
	<th>Action
</tr>
</thead>
<tbody>
<?php 
	
		require '../database.php';
		$obj=new database();
		$res=$obj->catdis();
		while($row=mysql_fetch_array($res,MYSQL_ASSOC))
		{
			echo "<tr><center>";
			echo "<td>".$row["cat_id"];
			echo "<td>".$row["cat_name"];	
			
			echo '<td><a href="catedit.php?id='.$row["cat_id"].'"><span class="glyphicon glyphicon-edit
" aria-hidden="true"></span></a></br></center>';
					?>	
				<a href="catdel.php?id=<?php echo $row["cat_id"] ?>" onclick="return checkDelete()"><span class="glyphicon glyphicon-trash
" aria-hidden="true"></span></a>		
			
						<?php
						
			echo "</tr>";
		}

		?>
		</tbody>

</table>
</div>
</div>
</body>
</html>