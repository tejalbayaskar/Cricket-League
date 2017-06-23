<?php
  include("header.php");
  $connection = new Mongo();
  $db = $connection -> cricket; 
  $cursor = $db-> posts ->find();
	$id = $_GET['id'];
	$id = new MongoId($id); //mongoid object since id is string type
	$article = $db-> posts ->findOne(array('_id' => $id));
?>




<div class="row">
<div class="col-lg-2"></div>
  <div class="col-lg-8">
      <div class="content">
       <h1 class="text-center" ><?php echo $article['title']; ?></h1></br>
       <span class="date"><?php echo date('M d/Y H:i',$article['saved_at']->sec); ?> 
       Post By <?php  echo $article['uname'];  ?></span>


       <hr>
        <p><?php echo $article['content']; ?> </p>
      </div>
  </div><!-- col-lg-8-->
<div class="col-lg-2"></div>
</div>


<div class="row">
<div class="col-lg-2"></div>
<!-- comment -->
      <div class="col-lg-8">
           <?php if (!empty($article['comments'])): ?>
                <h3>Comments</h3>
                <?php foreach($article['comments'] as $comment):
                    echo $comment['name'].'<strong> says... </strong>';?>
                    <p><?php echo $comment['comment']; ?></p>
                    <col-lg-><?php echo date('g:i a, F j', $comment['posted_at']->sec); ?></col-lg-><br/><br>
                <?php endforeach;
            endif;?>


          <h3>Post your comment</h3>
          <form method="post" action="comment.php?id=<?php echo $article['_id']; ?>">
              <div><label for="fName">Name</label><br>
                  <input type="text" name="fName" id="fName" required="required" />
              </div>
              <div><label for="fEmail">Email address</label><br>
                <input type="email" name="fEmail" id="fEmail" required="required" placeholder="name@example.com" />
              </div>

              <div><label for="fQuestion">Question/Comments</label><br>
                <textarea name="fComment" cols="40" rows="8" class="col-lg-8 wmd-input"></textarea>
              </div>
              <input type="hidden" name="article_id" value="<?php echo $article['id']; ?>"/><br>
              <div class="submit">
                            <input type="submit" name=" comment_submit" id="contact-submit" value="Submit" /></div>
          </form>
       </div>

</div>
</div>

<?php
  include("footer.php");
?>