<?php
	include("adminmenu.php");
	$connection = new Mongo();
	$db = $connection->cricket;
	$mObj = $db->matches->find();
	
?>

<html>
	<head>
	</head>

	<body>
	<div style="margin-left:20%;">
		<table align="center" cellpadding="20px" border=1>
			<tr>
				<th>Team 1</th>
				<th>Team 2</th>
				<th>Date of match</th>
				<th>Action</th>
			</tr>

	<?php
		foreach($mObj as $row){
	
	?>
		<tr>
			<td><?php echo $row['team1']?></td>
			<td><?php echo $row['team2']?></td>
			<td><?php echo $row['date_match']?></td>
			<td><a href="updatematches.php?id=<?php echo $row['_id']?>">Update Match </a> |
			<a href="stry.php?id=<?php echo $row['_id']?>">Scorecard </a> |
			<a href="viewscorecard.php?id=<?php echo $row['_id']?>">View Scorecard </a> |
			<a href="deletematch.php?id=<?php echo $row['_id']?>">
				Delete Match</a> </td>
		</tr>

	<?php  
		} 
	?>

		</table>
		</div>
	</body>

</html>

