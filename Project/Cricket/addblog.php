<?php
 ini_set('display_errors',1);
 session_start();
				
	if(isset($_POST['btn_submit']))
	{	

	$connection = new Mongo();
	$db = $connection -> cricket;
	$article['title'] = $_POST['title'];
	$article['content'] = $_POST['content'];
	$article['uname'] = $_SESSION['uname'];
	$article['saved_at'] = new MongoDate();
	$article['comments']=array();
	//array('name' => $_POST['fName'], 
 //               				'email' => $_POST['fEmail'],
 //               				'comment' => $_POST['fComment'],
 //               				'posted_at' => new MongoDate(),
	// 						);



	
	if (empty($article['title']) || empty($article['content'])) {
	        $data['status'] = 'Please fill out both inputs.';
		    } else {

		    	//echo $_SESSION['uname'];


		// then create a new row in the collection posts
        		$db-> posts -> insert($article);//$db->create('posts', $article);
        		$data['status'] = 'Row has successfully been inserted.';
    	}
		

	}
header('location:showblog.php');
	
	
?>
