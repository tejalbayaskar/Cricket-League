<?php
  session_start();
  //echo $_SESSION["uname"]."<br>";

  	$id = $_GET['id'];
	$connection = new Mongo();
	$db = $connection -> cricket;

	$id = new MongoId($id); //mongoid object since id is string type
	$db-> posts ->remove(array('_id' => $id));


	header('location:showblog.php');
?>


