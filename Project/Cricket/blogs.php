<?php
include("header.php");
  $connection = new Mongo();
	$db = $connection -> cricket; 
	$cursor = $db-> posts ->find();

	
?>


<div class="col-lg-1"></div>
<div class="col-lg-10" id="post-admin">
	
	<h1><center>Blogs</center></h1>

     <?php while ($cursor->hasNext()):
    $article = $cursor->getNext(); ?>

    <h2><?php echo $article['title']; ?></h2>
    <span class="date"><?php echo date('M d/Y H:i',$article['saved_at']->sec); ?> 

        post By <?php  echo $article['uname'];  ?></span>

    <p><?php echo substr($article['content'], 0, 200);?></p>
    <a href="oneblog.php?id=<?php echo $article['_id']; ?>">Read more</a>


 <?php endwhile; ?>

<br><br><br><br>
</div>

<?php
  include("footer.php");

?> 