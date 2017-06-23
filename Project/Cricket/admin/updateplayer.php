<?php
	include("adminmenu.php");
	$id= $_GET['id'];
	
	$connection = new Mongo();
	$db = $connection->cricket;
	 $id = new MongoId($id);
	 echo "<br>";
	 
	 $mObj = $db->country->findOne(array('player._id' => $id ));
	$doc=$mObj['player'];
	echo "<br>";
	 foreach ($doc as $row) {
	if ($row['_id'] == $id) {
				$a=$row;
		}

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
<form action="updateplayerdata.php" method = "POST">
<table align="center" width="30%" border=0 style="margin: 0px" ">
<tr><th>Player's Data</th></tr>
<tr><td>Player Name:<br><input type="text" name="pname" placeholder="Player's Name" value="<?php echo $a['pname'];?>" /></td></tr><br>


<!--tr><td><input type="text" name="countryname" placeholder="Country"/></td></tr--><br>

<tr><td>Birth Date:<br><input type="date" name="dob" placeholder="Date of birth" value="<?php echo $a['dob'];?>" /></td></tr><br>
<tr><td>Playing Role:<br><input type="text" name="role" placeholder="playing Role" value="<?php echo $a['role'];?>" /></td></tr><br>
<tr><td>Batting Style:<br><input type="text" name="batstyle" placeholder="Batting Style" value="<?php echo $a['batstyle'];?>" /></td></tr><br>
<tr><td>Bowling Style:<br><input type="text" name="bstyle" placeholder="Bowling Style" value="<?php echo $a['bstyle'];?>" /></td></tr><br>
<tr><td>Description:<br><textarea name="description" cols="30" rows="20" placeholder="About Player" ><?php echo $a['description'];?></textarea> </td></tr><br>



<TR>
<INPUT TYPE="hidden" NAME="id" VALUE="<?php echo $a['_id']?>" /> 
	<TD><INPUT TYPE="SUBMIT" VALUE="SUBMIT" name="submit_player"> </INPUT></TD>
</TR>
</INPUT></TD></table>
</form>
</div></center>
</BODY>
</HTML>
