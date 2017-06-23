<?php
 ini_set('display_errors',1);

	$connection = new Mongo();
	$db = $connection->cricket;
if($_POST)
{
$name=$_POST['name'];
$regex=array('player.pname'=> new MongoRegex("/$name/i"));
$mObj = $db->country->findOne($regex);
	$doc=$mObj['player'];

		 foreach ($doc as $row) {
	if ($row['pname'] == $name) {
				$a=$row;

				
var_dump($a);

				
		}
	}

}
?>      