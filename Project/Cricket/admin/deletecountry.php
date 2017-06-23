<?php
	$id= $_GET['id'];
	$connection = new Mongo();
	$db = $connection->cricket;
	$id = new MongoId($id);
	var_dump($id);
	$db->country->remove(array('_id' => $id ));
	var_dump($db);
	header('location:showcountry.php');