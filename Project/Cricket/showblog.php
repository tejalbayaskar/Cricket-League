<?php
  session_start();

  include("header.php");
  //echo $_SESSION["uname"]."<br>";
	$connection = new Mongo();
	$db = $connection -> cricket; 
  $rangeQuery = array( 'uname' => $_SESSION["uname"]);
  $cursor = $db-> posts ->find($rangeQuery);
?>

<div class="col-lg-1"></div>
<div class="col-lg-10" id="post-admin">
	
<h6><a href="create.php">Create a new Blog</h6></a>


	<h1>Your Blogs</h1>

     <?php while ($cursor->hasNext()):
    $article = $cursor->getNext(); ?>

    <h2><?php echo $article['title']; ?></h2>
    <span class="date"><?php echo date('M d/Y H:i',$article['saved_at']->sec); ?> 

        post By <?php  echo $_SESSION['uname'];  ?></span>

    <p><?php echo substr($article['content'], 0, 200);?></p>
    <a href="singleblog.php?id=<?php echo $article['_id']; ?>">Read more</a>


  
<!-- <?php
// Call session_start to initialize the session.
//session_start();

// Session variables are stored in the global variable $_SESSION
//foreach($_SESSION as $key => $value) 
{ 
  //  echo $key . " = " . $value . "<br>"; 
}

?>
 -->

    <p><a href="editblog.php?id=<?php echo $article['_id'] ?>">Edit</a></p>

	 <p><a onclick="confirmDelete('<?php echo $article['_id']; ?>')">
            Delete</a></p>

  <?php endwhile; ?>


 <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript" charset="utf-8">
        function confirmDelete(articleId) {
            var deleteArticle = confirm('Are you sure you want to delete this article?');
            if(deleteArticle){
                window.location.href = 'removeblog.php?id='+articleId;
            }
            return;
        }
    </script>


<?php
  include("footer.php");
?>