<?php
	include("header.php");
	
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
<html>
	<head>
	<title>Scorecard</title>
	</head>

	<body>

	<div class="container">
	<div class="row">
	<h3><button data-toggle="collapse" data-target="#first" class="btn btn-primary">
			<!--span class="glyphicon glyphicon-plus" aria-hidden="true"></span-->First Innings</button></h3>

	<div id="first" class="collapse">
	<h4> <?php echo $team1?>- Batting</h4>
		<table class="table table-striped table-responsive" align="center">
			<tr class="info">
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


				<h4> <?php echo $team2?> - Bowling</h4>
		<table class="table table-striped table-responsive" align="center">
			<tr class="info">
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
		</div> <!--End of collapse division -->

		</div> <!-- End of ROW class -->
	</div> <!-- End of container class -->


<hr>
	
<div class="container">
	<div class="row">
	
<h2><button data-toggle="collapse" data-target="#second" class="btn btn-primary">Second Innings</button></h2>

	<div id="second" class="collapse">
	
			<h4> <?php echo $team2?> - Batting</h4>
			<table class="table table-striped table-responsive" align="center">
			<tr class="info">
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
	
		<h4> <?php echo $team1?> - Bowling</h4>
		<table class="table table-striped table-responsive" align="center">
			<tr class="info">
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
	</div> <!--End of collapse division -->

		</div> <!-- End of ROW class -->
	</div> <!-- End of container class -->

<?php
	include("footer.php");
?>