<?php
	ini_set('display_errors',1);
	session_start();
	
	$id = $_GET['id'];
	$connection = new MongoClient();
	$db = $connection-> cricket;
	$id = new MongoId($id); //mongoid object since id is string type
	$mObj = $db->posts->findOne(array('_id' => $id));
	
	
	if(isset($_POST['btn_submit'])){
		$db-> posts ->update(
		array('_id' => $id),
		array(
			'$set' => array(
				'title' => $_POST["title"],
				'content' => $_POST["content"]
				)
		)
	);
	header('location:showblog.php');
	}
	

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>The Cricket</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="dropdown.css">
  <link rel="stylesheet" href="login.css">
  <link rel="stylesheet" href="footer.css">
  <link rel="stylesheet" href="carousal.css">
  

  <script src="js/jquery.js"></script>
 <script src="js/bootstrap.js"></script>
  
 </head>
<body style=" padding-top: 50px; ">

    
   <nav class="navbar navbar-default navbar-fixed-top">
<div class="row">


  <div class="col-lg-8">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><font size="6" face="Times New Roman">THE CRICKET</font></a>
    </div>

</div>


<div class="col-lg-3 dropbtn">
<?php
  if(isset($_SESSION['uname']))
  {
    echo ' Logged In as ' .$_SESSION['uname'];
  }
  else
  {
    echo 'Please log in.';
  }

?>

</div>




  <div class="col-lg-1">
<a href="logout.php" class="dropbtn">
  <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>   Log Out</a>
       
</div>
</div>
</nav>




<div class="rows">
<div class="col-lg-1"></div>
<div class="col-lg-10" id="post-admin">
	
	<h1>Edit the Post</h1>
	
	<form action="" method="post">
		
			 <div><label for="Title">Title</label><br>
	      		<input type="text" name="title" id="title" required="required" value="<?php echo $mObj['title'];?>"/>
	  		</div>
	  		<div>
			<label for="content">Content</label><br>
				<p><textarea name="content" cols="40" rows="20" class="col-lg-10"><?php echo $mObj['content'];?>
					</textarea></p><br>
			</div>


			<INPUT TYPE="hidden" NAME="id" VALUE="<?php echo $mObj['_id']; ?>" /> <br>

			<div class="submit"><br><input type="submit" name="btn_submit" value="Save"/></div>	
	</form>
	

</div>


</div>

 <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>


</body>
</html>

