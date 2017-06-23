<?php
include("adminmenu.php");

if (isset($_POST['submit'])) {
	$connection = new MongoClient();
	$db = $connection->cricket;
	$rec['countryname']= $_POST['countryname'];
	$rec['captain']=$_POST['captain'];
	$rec['coach']=$_POST['coach'];
	$rec['image']=array('fpic' =>  new MongoBinData(file_get_contents($_POST['fpic']),MongoBinData::BYTE_ARRAY),
		'lpic' =>  new MongoBinData(file_get_contents($_POST['lpic']),MongoBinData::BYTE_ARRAY));
	$rec['country_rank']= 0;
	$rec['no_of_matches']= 0;
	$rec['no_of_wins']= 0;
	$rec['no_of_losses']= 0;
	$rec['no_of_ties']= 0;
	//$rec->ensureIndex(array('countryname'=>1,'pname'=>1,'date_match'=>1,'stadium'=>1),array('unique'=>TRUE,'background'=>TRUE));
//$gridFS->storeFile("someFile.jpg", array("_id" => $id));


	$rec['player']=array();
	

	$db->country->insert($rec);
	# code...
	header('location:showcountry.php');

}


?>

<!doctype html>
<head>
<title>Country Info</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<center>
<div id="login-form">
<form method="post" action="">
<table align="center" width="30%" border=0 style="margin-top:0px;">
<br><br><br><br><br>
<tr><td>Country Name:<br><input type="text" name="countryname" placeholder="countryname"/></td></tr><br>
<tr><td>Country Captain:<br><input type="text" name="captain" placeholder="captain"/></td></tr><br>
<tr><td><label for="fpic">Upload a flag of country:</label>
    <input type="file" name="fpic" id="fpic" ></td></tr>
<tr><td><label for="lpic">Upload a logo picture of country:</label>
    <input type="file" name="lpic" id="lpic" ></td></tr>
<tr><td>Country Coach:<br><input type="text" name="coach" placeholder="coach"/></td></tr><br>

<tr><td><input type="submit" name="submit" value="Submit"/></td></tr>
</table>

</form>

</div>
</center>
</body>
</html>
