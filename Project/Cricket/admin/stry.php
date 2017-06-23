<?php
	include("adminmenu.php");

 ini_set('display_errors',1); 

	$id= $_GET['id'];
	 $connection = new Mongo();
	 $db = $connection->cricket;
	$id = new MongoId($id);
	 echo "<br>";
	 
	 $mObj = $db->matches->findOne(array('_id' => $id ));
	$arrayy['countryname']=$mObj['team2'];
	$array['countryname']=$mObj['team1'];
	 $couu = $db->country->findOne($arrayy);
	 $cou = $db->country->findOne($array);
$player=$cou['player'];
$playerr=$couu['player'];

	

$doc=$mObj['team1players'];

$docc=$mObj['team2players'];

?>

<div style="margin-left:30%;">
<?php echo $mObj['team1'] ?>
	<table>
	<tr>
	<td>

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
			?>
			<td><a href="scorecard.php?id=<?php echo $id ?>&pname=<?php echo $row['pname']?>">Update Player </a> </td>
		</tr>

	<?php  
		} 
	?>

</form>
</table>
</td>

<td>
<?php echo $mObj['team2'] ?>
	<form method="POST" action="scorecard.php">
		
		<table align="center" cellpadding="20px" border=1>
			<tr>
				<th>Player Name</th>
				<th>Updation</th>
			</tr>
	<?php
		foreach($playerr as $roww){
	?>
		<tr>
			<td><?php echo $roww['pname']?></td>
			<?php 	  
			?>
			<td><a href="scorecard2.php?id=<?php echo $id ?>&pname=<?php echo $roww['pname']?>">Update Player </a> </td>
		</tr>

	<?php  
		} 
	?>

</form>
</table>


</td>
</tr>
</table>
</div>
</body>

</html>

