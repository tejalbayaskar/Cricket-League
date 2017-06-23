 <?php
 	include("adminmenu.php");
	 ini_set('display_errors',1);
	$countryname = $_GET['countryname'];
	echo $countryname;
	$connection = new MongoClient();
	$db = $connection -> cricket;
	$array['countryname']=$countryname;
	//$id = new MongoId($id); //mongoid object since id is string type
	$mObj = $db->country->findOne($array);
//	$doc=$mObj['player'];
	//var_dump($mObj);
//var_dump($doc);

	// 


	 if (isset($_POST['submit'])) {
	 $connection = new MongoClient();
	 $db = $connection->cricket;

	 $countryname = $_GET['countryname'];
	 //echo $countryname;
	 $db->country->update(
	 		array('countryname' => $countryname ),
	 		array(
	 		'$set' => array(
	 				'countryname'=> $_POST['countryname'],
	 				'captain'=>$_POST['captain'],
	 				'coach'=>$_POST['coach'],
	 			//	'image'=>array('fpic' =>  new MongoBinData(file_get_contents($_POST['fpic']),MongoBinData::BYTE_ARRAY),
	 			//	'lpic' =>  new MongoBinData(file_get_contents($_POST['lpic']),MongoBinData::BYTE_ARRAY)),
	 				'country_rank'=>$_POST['country_rank'],
	 				'no_of_matches'=>$_POST['no_matches'],
	 				'no_of_wins'=>$_POST['no_of_wins'],
	 				'no_of_losses'=>$_POST['no_of_losses'],
	 				'no_of_ties'=>$_POST['no_of_ties']

	 			 			)
	 			)
	 	);
	
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
<div id="login-form">
<form method="post" action="">
<table align="center" width="30%" border=0 style="margin-top:40px;">
<br><br><br><br><br>
<tr><td>Country Name:<br><input type="text" name="countryname" placeholder="countryname" value="<?php echo $mObj['countryname']?>"/></td></tr><br>
<tr><td>Country Captian:<br><input type="text" name="captain" placeholder="captain" value="<?php echo $mObj['captain']?>"/></td></tr><br>
<tr><td><label for="fpic">Please upload a flag of country:</label>
    <input type="file" name="fpic" id="fpic" ></td></tr>
<tr><td><label for="lpic">Please upload a logo picture of country:</label>
    <input type="file" name="lpic" id="lpic" ></td></tr>
<tr><td><input type="text" name="coach" placeholder="coach" value="<?php echo $mObj['coach']?>"/></td></tr><br>
<tr><td><input type="submit" name="submit" value="submit"/></td></tr>
</table>

</form>

</div>
</center>
</body>
</html>