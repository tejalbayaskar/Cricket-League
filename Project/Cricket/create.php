<?php
 ini_set('display_errors',1);
session_start();
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


<div class="col-lg-3">
<?php
  if(isset($_SESSION['uname']))
  {
    echo ' Logged in as ' .$_SESSION['uname'];
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




<div class="col-lg-1"></div>
<div class="col-lg-10" id="post-admin">
	<?php
		if (isset($data['status'])) {
			echo '	<div class="alert alert-success">';
			echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
			echo($data['status']);
			echo '<a href="../admin" class="alert-link pull-right"> &larr; Go back</a>';
			echo '	</div>';
		}
	?>
	<h1>Create A New Post</h1>
	
	<form action="addblog.php" method="post">
		
			 <div><label for="Title">Title</label><br>
	      		<input type="text" name="title" id="title" required="required" />
	  		</div>
			<label for="content">Content</label><br>
				<p><textarea name="content" id="content" cols="40" rows="20" class="col-lg-10"></textarea></p><br>
			<div class="submit">
      <br><input type="submit" name="btn_submit" value="Save"/></div>	
	</form>
	

</div>

 <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>


</body>
</html>

