<?php
ini_set('display_errors', 1);

if(isset($_POST['btn-login']))
{
	
	
	$uname = $_POST['uname'];
	$upass = $_POST['pass'];
	
	
	// connect to mongodb
   $con = new MongoClient();

   if($con){
		//	Select Database
			$db = $con-> cricket;
			
		//	Select Collection
			$collection = $db->users;
			

		
	$qry = array("uname" => $uname,"pass" => $upass);
			$result = $collection->findOne($qry);
	
	
		if($result['pass']==$upass)
	{
		session_start();
		$_SESSION['uname'] = $result['uname'];
		echo $_SESSION['uname'];
		
		//echo "Login Sucessfull...!!";
		header("Location: showblog.php");
	}
	else
	{
		?>
        <script>alert('Wrong Details');</script>
        <?php
	}
	
}}
?>
