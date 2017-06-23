<?php
ini_set("display_errors", 1);


if (isset($_POST['comment_submit'])) {

	$id = $_GET['id'];
	$connection = new Mongo();
	$db = $connection -> cricket;
	$id = new MongoId($id); //mongoid object since id is string type
	$mObj = $db->posts->findOne(array('_id' => $id));

	$comment = array(
              	'name' => $_POST['fName'], 
                'email' => $_POST['fEmail'],
                'comment' => $_POST['fComment'],
                'posted_at' => new MongoDate(),
	);
		
		$db-> posts ->update(
		array('_id' => $id),
		array(
			'$push' => array(
				 'comments'=>  $comment
				 )
			)
		);
		header('Location: oneblog.php?id='.$id);
		

}
?>
