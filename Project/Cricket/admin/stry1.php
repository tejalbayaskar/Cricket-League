<?php
include("adminmenu.php");
 ini_set('display_errors',1); 

	$id= $_GET['id'];
	 $connection = new Mongo();
	 $db = $connection->cricket;
	$id = new MongoId($id);
	 echo "<br>";
	 
	 $mObj = $db->matches->findOne(array('_id' => $id ));
	$array['countryname']=$mObj['team1'];
	 $cou = $db->country->findOne($array);
$player=$cou['player'];

	

$doc=$mObj['team1players'];


?>
<html>
	<head>
	</head>

	<body>

	<a href="addmatch.php">Add a data</a> 
	<form method="POST" action="scorecard.php">
		<table align="center" cellpadding="20px" border=1>
			<tr>
				<th>Player Name</th>
				<th>Updation</th>
			</tr>

	<?php
		foreach($player as $row){
	
	?>
		<tr>
			<td><?php echo $row['pname']?></td>
			<?php 

//	echo $a[1];
			  // $db->matches->update(array('team1players._id' => $a)

			  // 	,
					// 				array('$set'=>array('team1players.$.pname'=>$row['pname'];)
			  // 	);
				
			  
			?>
			<td><a href="scorecard.php?id=<?php echo $id ?>&pname=<?php echo $row['pname']?>">Update Player </a> </td>

		</tr>

	<?php  
		} 
	?>

		</table>
		</form>
	</body>

</html>

