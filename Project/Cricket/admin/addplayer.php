<?php
include("adminmenu.php");
		$countryname = $_GET['countryname'];
	$connection = new Mongo();
	$db = $connection -> cricket;
	$array['countryname']=$countryname;
	//$id = new MongoId($id); //mongoid object since id is string type
	$mObj = $db->country->findOne($array);

	//var_dump($mObj);
//echo "<br>";


	if(isset($_POST['submit_player'])) {
	$connection = new Mongo();
	
	$db = $connection -> cricket;
	//$id = new MongoId($_POST['_id']);
	
	$player=array(/*'countryname'=> $_POST['countryname'],*/
		'_id'=> new MongoId(),
		'pname'=>  $_POST['pname'],
		'dob'=> $_POST['dob'],
		'role'=> $_POST['role'],
		'ppic'=>  new MongoBinData(file_get_contents($_POST['ppic']),MongoBinData::BYTE_ARRAY),
		'bstyle'=>  $_POST['bstyle'],
	        'batstyle'=>  $_POST['batstyle'],
	        'description'=>$_POST['description'],
	                                                     'balls' =>  0,
		                                                 'wkts' => 0,
		                                                   'overs' =>  0,
		                                                 'maidens' =>  0,
							'runs' =>  0,
							'bruns' =>  0,
								'hundreds' =>  0,
		 						'fifties' =>0,
		 						'fours' =>  0,
		 						'sixes' =>  0
		);



	$db->country->update(
		array('countryname' => $countryname),
		array(
			'$push' => array(
				 'player'=>  $player
				 )
			)
		);



	header('location:showcountry.php');
	
	}

?>

<!doctype html>
<head>
<title>Player Info</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

<center>
<div id="login-form">
<form method="post" action="">
<table align="center" width="30%" border=0 style="margin: 0px">
<tr><th>Player's Data</th></tr>
<tr><td>Player Name:<br><input type="text" name="pname" placeholder="Player's Name" required /></td></tr><br>
<tr><td><label for="ppic">Upload a player picture:</label>
    <input type="file" name="ppic" id="ppic" ></td></tr>
<!--tr><td><input type="text" name="countryname" placeholder="Country"/></td></tr--><br>

<tr><td>Date of birth:<input type="date" name="dob" placeholder="Date of birth"  required/></td></tr><br>
<tr><td>Playing Role:
<select name="role">
  	<option>Select Any One..</option>
  	<option value="Wicketkeeper">Wicketkeeper</option>
  	<option value="Batsman">Batsman</option>
  	<option value="Bowler">Bowler</option>
  	<option value="All Rounder">All Rounder</option>
</select> 

</td></tr><br>
<tr><td>Batting Style:
<select name="batstyle">
  	<option>Select Any One..</option>
  	<option value="Right-hand batsman">Right-hand batsman</option>
  		<option value="Leftt-hand batsman">Left-hand batsman</option>
</select> 


</td></tr><br>



<tr><td>Bowling Style:
<select name="bstyle">
  	<option>Select Any One..</option>
  	<option value="Right-arm medium">Right-arm medium</option>
  	<option value="Right-arm off spin">Right-arm off spin</option>
  	<option value="Left-arm medium">Left-arm medium</option>
  	<option value="Left-arm off spinRight-arm off spin">Left-arm off spin</option>
  	<option value="Wicketkeeper"</option>
</select> 

</td></tr><br>
<tr><td>About Player:<textarea name="description" cols="40" rows="30" placeholder="About Player" ></textarea> </td></tr><br>

<!--tr><td>BOWLING:<br><input type="text" name="bmat" placeholder="MAT" /></td></tr><br>
<tr><td><input type="text" name="binns" placeholder="INNS"  /></td></tr><br>
<tr><td><input type="text" name="balls" placeholder="BALLS"  /></td></tr><br>
<tr><td><input type="text" name="wkts" placeholder="Wickets taken"  /></td></tr><br>
<tr><td><input type="text" name="bave" placeholder="AVE"  /></td></tr><br>
<tr><td><input type="text" name="bbi" placeholder="BBI"  /></td></tr><br>
<tr><td><input type="text" name="econ" placeholder="ECON"  /></td></tr><br>
<tr><td><input type="text" name="bsr" placeholder="sr"  /></td></tr><br>
<tr><td><input type="text" name="4w" placeholder="4w"  /></td></tr><br>
<tr><td><input type="text" name="5w" placeholder="5w"  /></td></tr><br>
<tr><td><input type="text" name="10w" placeholder="10w"  /></td></tr><br>

<tr><td>BATTING AND FIELDING<br><input type="text" name="tmat" placeholder="MAT"/></td></tr><br>
<tr><td><input type="text" name="tinns" placeholder="INNS"  /></td></tr><br>
<tr><td><input type="text" name="no" placeholder="NO"  /></td></tr><br>
<tr><td><input type="text" name="runs" placeholder="RUNS"  /></td></tr><br>
<tr><td><input type="text" name="hs" placeholder="HS" /></td></tr><br>
<tr><td><input type="text" name="tave" placeholder="AVE" /></td></tr><br>
<tr><td><input type="text" name="bf" placeholder="BF" /></td></tr><br>
<tr><td><input type="text" name="tsr" placeholder="SR" /></td></tr><br>
<tr><td><input type="text" name="hundreds" placeholder="100s" /></td></tr><br>
<tr><td><input type="text" name="fifties" placeholder="50s" /></td></tr><br>
<tr><td><input type="text" name="fours" placeholder="fours" /></td></tr><br>
<tr><td><input type="text" name="sixes" placeholder="sixes" /></td></tr><br>
<tr><td><input type="text" name="ct" placeholder="CT"/></td></tr><br>
<tr><td><input type="text" name="st" placeholder="ST" /></td></tr><br-->
<TR>
<INPUT TYPE="hidden" NAME="id" VALUE="<?php echo $mObj['_id']?>" /> 
	<TD><INPUT TYPE="SUBMIT" VALUE="SUBMIT" name="submit_player"> 
</TR></INPUT></TD>
</TR><
</table>
</form>
</div>
</center>
</body>

</HTML>

