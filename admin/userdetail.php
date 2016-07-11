<!DOCTYPE html>
<html>
<head>
<title>User Detail</title>

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

<tbody>

<?php 
	include 'adminheader.php';

?>
<div class="container">
<div class="row">
<center>

<form action="userdetail.php" method="post">
<table class="table" id="dataTable">
<caption<p style="font-size:50px;color:red;">User details</p></caption>

<thead>
<tr>
	<th>Email_id
	<th>User Name
	<th>Mobile No
	<th>City
	<th>Gender	
	<th>Action
</tr>
</thead>
<?php 
	
		require '../database.php';
		$obj=new database();
		$res=$obj->getdata("select * from user_tbl where type='User'");
		while($row=mysql_fetch_array($res,MYSQL_ASSOC))
		{
			echo "<tr><center>";
			echo "<td>".$row["email_id"];
			echo "<td>".$row["user_name"];
			echo "<td>".$row["mobile_no"];
			echo "<td>".$row["city"];
			echo "<td>".$row["gender"]."</center>";
?>	


				<td><a href="prodel.php?id=<?php echo $row["email_id"] ?>" onclick="return checkDelete()"><span class="glyphicon glyphicon-trash
" aria-hidden="true"></span></a></td>
			
		<?php
						
			echo "</tr></center>";
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