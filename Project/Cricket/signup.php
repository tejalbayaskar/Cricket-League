<?php
 ini_set('display_errors',1);
	if(isset($_POST['btn-sign']))
	{	
	$fname = $_POST['fname'];
	$uname = $_POST['uname'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$cpass = $_POST['cpass'];	


	
	// connect to mongodb
	$connection = new MongoClient();
  	if($connection)
	{
 
		//connecting to database
		$db = $connection -> cricket;
		//connect to specific collection
		$collection=$db-> users;
		echo "Collection user Selected succsessfully";
 
		$query=array('email'=>$email);
		//checking for existing user
		$count=$collection->findOne($query);
 

 	// 	if($pass != $cpass)
 	// 		{
 	// 			echo "Password should be same";
 	// 		}
		 if(!count($count))
		{
			//Save the New user
			$user_data=array('fname'=>$fname,'uname'=>$uname,'email'=>$email, 'pass'=>$pass, 'cpass'=>$cpass,);
			//$collection->save($user_data);
			$db-> users -> insert($user_data);
			//echo "You are successfully registered.";




			?>
        <script>alert('successfully registered ');</script>
        <?php
		}
		else
		{
			echo "Email is already existed.Please register with another Email id!.";
			?>
        <script>alert('error while registering you...');</script>
        <?php
		}
 
	}else
	{
 
		die("Database are not connected");
	}

//========
	

}

	header('location:index.php');
?>

