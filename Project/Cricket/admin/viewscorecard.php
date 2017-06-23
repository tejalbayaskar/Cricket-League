<?php
	include("adminmenu.php");
	
	ini_set('display_errors',1); 
	$id = $_GET['id'];
	$connection = new MongoClient();
	$db = $connection -> cricket;
	$id = new MongoId($id); //mongoid object since id is string type
	$mObj = $db->matches->findOne(array('_id' => $id));
	$team1 = $mObj['team1'];
	$team2 = $mObj['team2'];

	$team1players = $mObj['team1players'];
	$team2players = $mObj['team2players'];
	
	

?>

<div style="margin-left:30%">
	<h2>FIRST INNINGS</h2>

	<div id="demo" class="collapse">
	<h4> <?php echo $team1?> Innings</h4>
		<table class="table table-striped" align="center" cellpadding="20px" border=1>
			<tr>
				<th>Batsman</th>
				<th>Runs</th>
				<th>Balls</th>
				<th>4s</th>
				<th>6s</th>
			</tr>

	<?php
		foreach($team1players as $row){
	
	?>
		<tr>
			<td><?php echo $row['pname']?></td>
			<td><?php echo $row['runs']?></td>
			<td><?php echo $row['balls']?></td>
			<td><?php echo $row['fours']?></td>
			<td><?php echo $row['sixes']?></td>
		</tr>

	<?php  
		} 
	?>

		</table>


				<h4> <?php echo $team2?> Innings</h4>
		<table class="table table-condensed" align="center" cellpadding="20px" border=1>
			<tr>
				<th>Bowler</th>
				<th>Overs</th>
				<th>Maidens</th>
				<th>Runs</th>
				<th>Wickets</th>
			</tr>

	<?php
		foreach($team2players as $row){
	
	?>
		<tr>
			<td><?php echo $row['pname']?></td>
			<td><?php echo $row['overs']?></td>
			<td><?php echo $row['maidens']?></td>
			<td><?php echo $row['bruns']?></td>
			<td><?php echo $row['wkts']?></td>

		</tr>

	<?php  
		} 
	?>

		</table>
		</div>


<hr>
	

			<h2>SECOND INNINGS</h2>


			<h4> <?php echo $team2?> Innings</h4>
		<table class="table table-condensed" align="center" cellpadding="20px" border=1>
			<tr>
				<th>Batsman</th>
				<th>Runs</th>
				<th>Balls</th>
				<th>4s</th>
				<th>6s</th>
			</tr>

	<?php
		foreach($team2players as $row){
	
	?>
		<tr>
			<td><?php echo $row['pname']?></td>
			<td><?php echo $row['runs']?></td>
			<td><?php echo $row['balls']?></td>
			<td><?php echo $row['fours']?></td>
			<td><?php echo $row['sixes']?></td>
		</tr>

	<?php  
		} 
	?>

		</table>
	
		<h4> <?php echo $team1?> Innings</h4>
		<table class="table table-condensed" align="center" cellpadding="20px" border=1>
			<tr>
				<th>Bowler</th>
				<th>Overs</th>
				<th>Maidens</th>
				<th>Runs</th>
				<th>Wickets</th>
			</tr>

	<?php
		foreach($team1players as $row){
	
	?>
		<tr>
			<td><?php echo $row['pname']?></td>
			<td><?php echo $row['overs']?></td>
			<td><?php echo $row['maidens']?></td>
			<td><?php echo $row['bruns']?></td>
			<td><?php echo $row['wkts']?></td>

		</tr>

	<?php  
		} 
	?>

		</table>

</div>
	</body>

</html>
