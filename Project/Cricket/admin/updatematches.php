 <?php
 	include("adminmenu.php");
	 ini_set('display_errors',1);
	$id = $_GET['id'];
	$connection = new MongoClient();
	$db = $connection -> cricket;
	$id = new MongoId($id); //mongoid object since id is string type
	$mObj = $db->matches->findOne(array('_id' => $id));
	$team1=$mObj['team1'];
	$team2=$mObj['team2'];
	$date_match=$mObj['date_match'];
	$stadium=$mObj['stadium'];


	 if (isset($_POST['submit_result'])) {
	 $connection = new MongoClient();
	 $db = $connection->cricket;

	 $id = $_GET['id'];
	
	 $db->matches->update(
	 		array('_id' => new MongoId($id) ),
	 		array(
	 		'$set' => array(
	 				'toss'=>$_POST['toss'],
	 				'batting_first'=>$_POST['batting_first'],
	 				'field_first'=>$_POST['field_first'],
	 				'team1scores'=>0,
					'team2scores'=>0,
					'comment'=>$_POST['comment']
	
	 			 			)
	 			)
	 	);
if(((int)$_POST['team2scores'])>((int)$_POST['team1scores']))
{
	$db->matches->update(
	array('_id' => new MongoId($id)),
	array('$set'=> array('winner'=>$mObj['team2']))
	);
	$db->country->update(
	array('countryname'=>$mObj['team2']),
	array('$inc'=> array("no_of_wins"=>1))
	);
	$db->country->update(
	array('countryname'=>$mObj['team1']),
	array('$inc'=> array("no_of_losses"=>1))
	);
}
else if (((int)$_POST['team1scores'])>((int)$_POST['team2scores'])) 
{
$db->matches->update(
	array('_id' => new MongoId($id)),
	array('$set'=> array('winner'=>$mObj['team1']))
	);
	$db->country->update(
	array('countryname'=>$mObj['team1']),
	array('$inc'=> array("no_of_wins"=>1))
	);
	$db->country->update(
	array('countryname'=>$mObj['team2']),
	array('$inc'=> array("no_of_losses"=>1))
	);

}
else
{
$db->matches->update(
	array('_id' => new MongoId($id)),
	array('$set'=> array('winner'=>"TIE"))
	);	
	$db->country->update(
	array('countryname'=>$mObj['team2']),
	array('$inc'=> array("no_of_ties"=>1))
	);
	$db->country->update(
	array('countryname'=>$mObj['team1']),
	array('$inc'=> array("no_of_ties"=>1))
	);


}

	header('location:showcountry.php');
	}


//	}

?> <!doctype html>
<head>
<title>Country Info</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<center>
<div id="login-form" style="margin-left:20%;">
<form action="" method="POST">
	<table>

		<tr>
			<th> Team Details </th>
			<td>
			<table>
				<tr>
					<th>Team 1</th>
					<th> Team 2 </th>
					<th> Date </th>
					<th>Stadium </th>
				</tr>
				<tr>
					<td><?php echo $team1; ?></td>
					<td><?php echo $team2; ?></td>
					<td><?php echo $date_match; ?></td>
					<td><?php echo $stadium; ?></td>
				</tr>
			</table>
			</td>


		</tr>
		

		<tr><th>Toss Winner:</th>
		<td>
			 <select name="toss">
  			<option value="">Select One...</option>
  			<option value="toss"><?php echo $team1; ?></option>
			<option value="toss"><?php echo $team2; ?></option>
 			</select>

		</td></tr><br>

		<tr><th>Batting first:</th>
		<td><select name="batting_first" value="">
  			<option value="">Select One...</option>
  			<option value="batting_first"><?php echo $team1; ?></option>
			<option value="batting_first"><?php echo $team2; ?></option>
 			</select>
		</td></tr><br>

		<tr><th>Fielding first:</th><td>
			<select name="field_first" >
  			<option value="">Select One...</option>
  			<option value="field_first"><?php echo $team1; ?></option>
			<option value="field_first"><?php echo $team2; ?></option>
 			</select>

		</td></tr><br>
		

		<tr><th><?php echo $team1; ?> Scores:</th>
		<td><input type="text" name="team1scores" value="<?php echo $mObj['team1scores']; ?>"/></td></tr><br>

		<tr><th><?php echo $team2; ?> Scores:</th>
		<td><input type="text" name="team2scores"/></td></tr><br>



		<tr><th>Comment</th>
		<td><input type="text" name="comment" placeholder="Comment"/></td></tr><br>

		<tr><td><input type="submit" name="submit_result" value="SUBMIT"></td></tr>


	</table>
</form>
</div>
</center>
</body>
</html>