<?php
	include("adminmenu.php");

	$countryname = $_GET['countryname'];
	$connection = new Mongo();
	$db = $connection -> cricket;
	$array['countryname']=$countryname;
	//$id = new MongoId($id); //mongoid object since id is string type
	$mObj = $db->country->findOne($array);
	$players=$mObj['player'];
	//echo "<pre>";
	//print
echo $countryname;

?>
<html>
	<head>
	</head>

	<body>
	<table align="center" cellpadding="20px" border=1>
			<tr>
				<th>Player Name</th>
				<th>Updation</th>
			</tr>

	<?php
		foreach($players as $row){
	
	?>
		<tr>
			<td><?php echo $row['pname']?></td>
			<!--td><a href="viewplayer.php?id=<php echo $row['_id']?>">View Player </a> </td-->
			<td><a href="updateplayer.php?id=<?php echo $row['_id']?>">Update Player </a> </td>

		</tr>

	<?php  
		} 
	?>

		</table>
	</body>

</html>

