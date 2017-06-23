<?php
	include("adminmenu.php");
	ini_set('display_errors', 1);

	$connection = new Mongo();
	$db = $connection ->cricket; 
	$cou = $db->country->find();
	$mObj = $db->matches;
	if(isset($_POST['submit_matches']))
	{
	
	$rec['team1']=$_POST['team1'];
	$rec['team2']=$_POST['team2'];
	$rec['date_match']=$_POST['date_match'];
	$rec['stadium']=$_POST['stadium'] ;
	$rec['match_type']=$_POST['match_type'];
	$rec['toss']=Null;
	$rec['batting_first']=Null;
	$rec['field_first']=Null;
	$rec['team1scores']=NULL;
	$rec['team2scores']=Null;
	$rec['winner']=NULL;
	$rec['team1players']=array();
	$rec['team2players']=array();
	$db->matches->insert($rec);
$db->country->update(
	array('countryname'=>$_POST['team1']),
	array('$inc'=> array("no_of_matches"=>1))
	);
$db->country->update(
	array('countryname'=>$_POST['team2']),
	array('$inc'=> array("no_of_matches"=>1))
	);
	header('location:showmatces.php');
			
	}
		
?>

<!doctype html>
<head>
<title>Match Info</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body>

<center>
<form action="" method = "POST">
<table align="center" width="30%" border=0 >

<tr><th>Match Data</th></tr>


<tr><td> Team 1:

 
  <select name="team1" value="TEAM 1" id="team1" required>
  			<option>Select Any One..</option>

   <?php 
foreach ($cou as $row) 
{
?>
  			<option value="<?php echo $row['countryname'] ?>"><?php echo $row['countryname'] ?></option>
		<?php 
	}
	?>
</select> 
	
	
</td></tr><br>

<tr><td> Team 2:
  <select name="team2" value="TEAM 2" required>
  <option>Select Any One..</option>
   <?php 
foreach ($cou as $row) 
{
?>
  			<option value="<?php echo $row['countryname'] ?>"><?php echo $row['countryname'] ?></option>
		<?php 
	}
	?>
		</select> 
</td></tr><br>

<tr><td>Stadium:
<select name="stadium" required>
  	<option>Select Any One..</option>
  	<option value="M. Chinnaswamy Stadium,Banglore">M. Chinnaswamy Stadium,Banglore</option>
  	<option value="HPCA Stadium,Dharamsala">HPCA Stadium,Dharamsala</option>
  	<option value="PCA IS Bindra Stadium,Mohali">PCA IS Bindra Stadium,Mohali</option>
  	<option value="Eden Gardens,Kolkata">Eden Gardens,Kolkata</option>
  	<option value="Wankhede Stadium,Mumbai">Wankhede Stadium,Mumbai</option>
  	<option value="VCA Stadium,Nagpur">VCA Stadium,Nagpur</option>
  	<option value="Feroz Shah Kotla,New Delhi">Feroz Shah Kotla,New Delhi</option>
</select> 

</td></tr><br>
<tr><td>Date of Match:<input type="date" name="date_match" placeholder="date of match" required /></td></tr><br>


<tr><td> Match Type:
  <select name="match_type" value="match_type" required>
  			<option>Select Any One..</option>
  			<option value="Day">Day</option>
			<option value="Night">Night</option>
  </select> 
</td></tr><br>



<tr><TD><INPUT TYPE="SUBMIT" VALUE="Submit" name="submit_matches"></TR></INPUT></TD>

</tr>
</table>
</form>
</center>

</BODY>
</HTML>