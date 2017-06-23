<?php
include("header.php");
$m = new MongoClient("localhost");
$c = $m->selectDB("cricket")->selectCollection("country");

$pipeline = array(
         array(
        '$sort' => array('no_of_wins' => -1),),
);
$out = $c->aggregate($pipeline);

$sixe = $c->aggregate(array(array('$project'=>array('player.sixes'=>1,'player.pname'=>1)),array('$sort'=>array('player.sixes'=>-1))));


$four = $c->aggregate(array(array('$project'=>array('player.fours'=>1,'player.pname'=>1)),array('$sort'=>array('player.fours'=>-1))));



$wkts = $c->aggregate(array(array('$project'=>array('player.wkts'=>1,'player.pname'=>1)),array('$sort'=>array('player.wkts'=>-1))));


$cent = $c->aggregate(array(array('$project'=>array('player.centuries'=>1,'player.pname'=>1)),array('$sort'=>array('player.centuries'=>-1))));


?>





<script type="text/javascript">
$(document).ready(function(){ 
    $("#myTab li:eq(1) a").tab('show');
});
</script>
  </head>
  <body style=" padding-top: 50px; ">
   
<!--first navigation bar-->

<body style=" padding-top: 50px;
 max-width:100%;
 overflow-x:hidden;
 ">


<!--carousal-->

<div class="row">
<div class="col-lg-7">

<div class="row">

<div id="myCarousel" class="carousel slide" data-ride="carousel" >
  <!-- Indicators -->

  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox" style="z-index:-100;" >
    <div class="item active" style="width:100%; ">
      <img src="images/tp-1.jpg" alt="Sachin">
    </div>

    <div class="item">
      <img src="images/tp-2.png" alt="Chania">
    </div>

    <div class="item">
      <img src="images/tp-3.jpg" alt="Flower">
    </div>

    <div class="item">
      <img src="images/tp-4.png" alt="Flower">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev" style="margin-left:60px">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
<div class="row">
<br><br>
<div class="col-lg-1"></div>


<!-- <div class="col-lg-1 vertical-container">
<a href="#" class="verticaltext"  data-toggle="popover"  data-placement="left" data-trigger="focus" data-content="Click anywhere in the document to close this popover "
title="Matches"><button type="button" id="btn" class="btn btn-primary btn-lg" style="margin-top:60px;">Matches</button></a>

</div> -->


<!--News Column-->
<div class="col-lg-6">
<div class="panel panel-primary bs-example" id="side" style="width:670px;margin-left:20px;">

 <div class="panel-heading" style="background-image: url(images/back.jpg)" >Latest News</div>
  <!--Image 1-->
  <br>
<div class="row">
 <div class="col-lg-6"> <img class="news" src="images/virat.jpg" style="width:300px;height:200px;" alt="Cinque Terre"></div>
<div class="col-lg-6"><a href="news1.php"><h3 style="color:black;">Virat Winning Hearts</h3></a><p>25 Sept 2016</p>
<p>Virat Kohli with his stupendous sixes is winning hearts all over the world</p></div>
</div><br><br>
<!--Img-2-->
<div class="row">
<div class="col-lg-6"> <img src="images/img-2.jpg" class="news" style="width:300px;height:200px;" alt="Cinque Terre" ></div>
<div class="col-lg-6"><a href="news2.php"><h3 style="color:black;">USA to hold five-day camp in Indianapolis ahead of WCL Division Four</h3></a>
<p>4 Sept 2016</p>
<p>Sep 3, 2016 USA are set to hold a five-day camp in Indianapolis from September 17-21 as part of their preparations for ICC WCL Division Four in October </p>

</div>
</div>
<br><br>
<!--img-3-->
<div class="row">
<div class="col-lg-6"> <img src="images/index.png"  class="news" style="width:300px;height:200px;" alt="Cinque Terre" ></div>
<div class="col-lg-6"><a href="news3.php"><h3 style="color:black;">CSA loses domestic T20 sponsorship</h3></a>
<p>2 Sept 2016</p>
<p>Sep 2, 2016 South Africa's domestic T20 tournament has lost its sponsor after courier company RAM chose not to renew its sponsorship after four seasons </p>

</div>
</div>
<br><br>
<!--img-4-->
<div class="row">
<div class="col-lg-6"> <img src="images/img-3.jpg"  class="news" style="width:300px;height:200px;" alt="Cinque Terre" ></div>
<div class="col-lg-6"><a href="news4.php"><h3 style="color:black;">BCCI set to oppose two-tier Test proposal</h3></a>
<p>23 Sept 2016</p>
<p>Sri Lanka Cricket, Zimbabwe Cricket, Bangladesh Cricket Board, West Indies Cricket Board and the Pakistan Cricket Board agree with BCCI's views</p>
</div>
</div>
<br><br>
<!--img-5-->
<div class="row">
<div class="col-lg-6"> <img src="images/img-5.jpg"  class="news" style="width:300px;height:200px;" alt="Cinque Terre" ></div>
<div class="col-lg-6"><a href="news5.php"><h3 style="color:black;">Badrinath confirms Hyderabad switch for upcoming Ranji season</h3></a>
<p>25 Sept 2016</p>
<p>The experienced campaigner will be donning a player-cum-mentor role for Hyderabad</p></div>
</div>


</div>

</div> <!-- End of News Division -->
 </div>
</div>
    

<div class="col-lg-1"></div>
<div class="col-lg-3">
<div class="row">
<div class="panel bs-example panel-primary" id="side">
  <div class="panel-body panel-primary" >


    <ul class="nav nav-tabs" id="myTab" >
   <li><a data-toggle="tab" href="#pointtable" style="background-image: url(images/back.jpg); color:white;">Point Table</a></li>
  <li><a data-toggle="tab" href="#leaderboard" style="background-image: url(images/back.jpg);color:white;">Leaderboard</a></li>
 </ul>
<div class="tab-content">
  <div id="pointtable" class="tab-pane fade in active">
    <h3>Point Table</h3><br>

  <table class="table table-hover">
    
    <TR><H4><B>
      <th> Team name </th>  
          <th>Points</th>  
    </B></H4></TR>
<?php
$count=1;
      foreach ($out as $key ) {
        foreach ($key as $row) {
      if($count<=3)    
        {
      ?>

   <tr> <td><?php echo $row['countryname']?></td> <td><?php echo $row['no_of_wins']?></td></tr>
  <?php
  $count++;
  }}}
  ?>
  </table>

  <a href="leaderboard.php" class="btn btn-info" role="button" style="background-image: url(images/back.jpg);margin-left:80px;">Full Table</a>
  </div>
  <div id="leaderboard" class="tab-pane fade in active">
    <h3>Leaderboard</h3>
  <table class="table table-hover">
    
    <TR "><H4><B>
    <th>Rank</th>  <th>Team Name</th><th>Match</th><th>Won</th> <th>Lost</th> 
    </B></H4></TR>
<?php
$x=1;
      foreach ($out as $key ) {
        foreach ($key as $row) {
          if ($x<=3) {
          
        
      ?>

   <tr><td><?php echo $x++ ?></td><td><?php echo $row['countryname']?></td> <td><?php echo $row['no_of_matches']?></td><td><?php echo $row['no_of_wins']?></td><td><?php echo $row['no_of_losses']?></td></tr>
  <?php
  }}}
  ?>
  </table>
  <a href="leaderboard.php" class="btn btn-info" role="button" style="background-image: url(images/back.jpg);margin-left:80px;">Full Table</a>
  </div>
    </div>
</div>
</div>
</div>
<!--end of row 1-->
<div class="row">
<div class="panel panel-primary bs-example" id="side">
 
 <div class="panel-heading" style="background-image: url(images/back.jpg);" >Most Sixes</div>

<table class="table">
    <?php 
$count=0;
foreach ($sixe as $keyy ) {
  foreach ($keyy as $variablee) {
  foreach ($variablee as  $value) {
foreach ($value as $row ) {
  $x=0;
  $x++;
foreach ($row as $kkey ) {
  ?>
  <?php $x++; ?>
  <?php if($x%2==0) { ?>
     <?php  $count++ ?>
    <?php  if ($count==1) { ?>
       
      
    <TR><!--img src="bg-footer.jpg" --> 
      <TD> 1.</TD>
      <TD> <H4><B><?php echo $row['pname'] ?></B> </H4><br>
      <H4><B><?php echo $row['sixes'] ?></B></H4>&nbsp;<b>Sixes</b></TD>
      <TD><H4><B>  <img src="images/virat.png" alt="Most sixes"></B></H4> </TD>
    </TR>


     <?php
}
?>


 <?php
if($count==2){ ?>
    <TR>
      <TD> 2.</TD>
      <TD><?php echo $row['pname'] ?></</TD>
      <TD align="right"><?php echo $row['sixes'] ?>&nbsp;<b>Sixes</b></TD>
    </TR>



     <?php
}
?>

 <?php
if($count==3){ ?>
    <TR>
      <TD> 3. </TD>
      <TD><?php echo $row['pname'] ?></</TD>
      <TD align="right"> <?php echo $row['sixes'] ?>&nbsp;<b>Sixes</b></TD>
    </TR>


     <?php
}
?>
<?php }
}}
}
}
} ?>

  </table>


  <div class="panel-body "><center>
<button type="button" class="btn btn-primary" style="background-image: url(images/back.jpg);">View  Full Table</button></center>
</div>
  </div>
  </div>


<!--tfggh-->
<div class="row">
<div class="panel panel-primary  bs-example" id="side">
 
 <div class="panel-heading" style="background-image: url(images/back.jpg);color:white;">Most Fours</div>

<table class="table">
    
    <?php 
$count=0;
foreach ($four as $keyy ) {
  foreach ($keyy as $variablee) {
  foreach ($variablee as  $value) {
foreach ($value as $row ) {
  $x=0;
  $x++;
foreach ($row as $kkey ) {
  ?>
  <?php $x++; ?>
  <?php if($x%2==0) { ?>
     <?php  $count++ ?>
    <?php  if ($count==1) { ?>
       
      
    <TR><!--img src="bg-footer.jpg" --> 
      <TD> 1.</TD>
      <TD> <H4><B><?php echo $row['pname'] ?></B> </H4><br>
      <H4><B><?php echo $row['fours'] ?></B></H4>&nbsp;<b>Fours</b></TD>
      <TD><H4><B>  <img src="images/virat.png" alt="Most sixes"></B></H4> </TD>
    </TR>


     <?php
}
?>


 <?php
if($count==2){ ?>
    <TR>
      <TD> 2.</TD>
      <TD><?php echo $row['pname'] ?></</TD>
      <TD align="right"><?php echo $row['fours'] ?>&nbsp;<b>Fours</b></TD>
    </TR>



     <?php
}
?>

 <?php
if($count==3){ ?>
    <TR>
      <TD> 3. </TD>
      <TD><?php echo $row['pname'] ?></</TD>
      <TD align="right"> <?php echo $row['fours'] ?>&nbsp;<b>Fours</b></TD>
    </TR>


     <?php
}
?>
<?php }
}}
}
}
} ?>

  </table>


  <div class="panel-body " ><center>
<button type="button" class="btn btn-primary" style="background-image: url(images/back.jpg);">View  Full Table</button></center>
</div>
  </div>
  </div>
<!--end of row 3-->






<div class="row">
<div class="panel  bs-example panel-primary " id="side">
 
 <div class="panel-heading" style="background-image: url(images/back.jpg);color:white;">Most Wickets</div>

<table class="table">
      <?php 
$count=0;
foreach ($wkts as $keyy ) {
  foreach ($keyy as $variablee) {
  foreach ($variablee as  $value) {
foreach ($value as $row ) {
  $x=0;
  $x++;
foreach ($row as $kkey ) {
  ?>
  <?php $x++; ?>
  <?php if($x%2==0) { ?>
     <?php  $count++ ?>
    <?php  if ($count==1) { ?>
       
      
    <TR><!--img src="bg-footer.jpg" --> 
      <TD> 1.</TD>
      <TD> <H4><B><?php echo $row['pname'] ?></B> </H4><br>
      <H4><B><?php echo $row['wkts'] ?></B></H4>&nbsp;<b>Wickets</b></TD>
      <TD><H4><B>  <img src="images/virat.png" alt="Most sixes"></B></H4> </TD>
    </TR>


     <?php
}
?>


 <?php
if($count==2){ ?>
    <TR>
      <TD> 2.</TD>
      <TD><?php echo $row['pname'] ?></</TD>
      <TD align="right"><?php echo $row['wkts'] ?>&nbsp;<b>Wickets</b></TD>
    </TR>



     <?php
}
?>

 <?php
if($count==3){ ?>
    <TR>
      <TD> 3. </TD>
      <TD><?php echo $row['pname'] ?></</TD>
      <TD align="right"> <?php echo $row['wkts'] ?>&nbsp;<b>Wickets</b></TD>
    </TR>


     <?php
}
?>
<?php }
}}
}
}
} ?> 
    
  </table>


  <div class="panel-body"><center>
<button type="button" class="btn btn-primary" style="background-image: url(images/back.jpg);color:white;">Most Runs</button></center>
</div>
  </div>
  </div>

<div class="row">
<div class="panel panel-primary  bs-example" id="side">
 
 <div class="panel-heading " style="background-image: url(images/back.jpg);color:white;">Most centuries</div>

<table class="table">
    
      <?php 
$count=0;
foreach ($cent as $keyy ) {
  foreach ($keyy as $variablee) {
  foreach ($variablee as  $value) {
foreach ($value as $row ) {
  $x=0;
  $x++;
foreach ($row as $kkey ) {
  ?>
  <?php $x++; ?>
  <?php if($x%2==0) { ?>
     <?php  $count++ ?>
    <?php  if ($count==1) { ?>
       
      
    <TR><!--img src="bg-footer.jpg" --> 
      <TD> 1.</TD>
      <TD> <H4><B><?php echo $row['pname'] ?></B> </H4><br>
      <H4><B><?php echo $row['centuries'] ?></B></H4>&nbsp;<b>Centuries</b></TD>
      <TD><H4><B>  <img src="images/virat.png" alt="Most sixes"></B></H4> </TD>
    </TR>


     <?php
}
?>


 <?php
if($count==2){ ?>
    <TR>
      <TD> 2.</TD>
      <TD><?php echo $row['pname'] ?></</TD>
      <TD align="right"><?php echo $row['centuries'] ?>&nbsp;<b>Centuries</b></TD>
    </TR>



     <?php
}
?>

 <?php
if($count==3){ ?>
    <TR>
      <TD> 3. </TD>
      <TD><?php echo $row['pname'] ?></</TD>
      <TD align="right"> <?php echo $row['centuries'] ?>&nbsp;<b>Centuries</b></TD>
    </TR>


     <?php
}
?>
<?php }
}}
}
}
} ?> 
 
  </table>
  <div class="panel-body"><center>
<button type="button" class="btn btn-primary" style="background-image: url(images/back.jpg);color:white;">View  Full Table</button></center>
</div>
  </div>
  </div>
</div>
</div>
<!--end of row 3-->
</div>
</div>
<!--end of row 2-->
</div>
</div>
<br><br>
<br>
<br>
<br>
<br>

<!--div class="row footer">
<img src="bg-footer.jpg" class="foot"-->
<!--font color="red">
<div class="col-lg-2">
</div>
  <div class="col-lg-3">

Quick Links
<ul class="footer">
    <li>News</li>
    <li>Results</li>
    <li>Schedule</li>
    <li>Photos</li>
    <li>Venues</li>
</ul>
</div>
<div class="col-lg-3">
Teams
<ul class="footer">
    <li>India</li>
    <li>England</li>
    <li>Pakistan</li>
    <li>New Zealand</li>
    <li>South Africa</li>
    </ul>
</div>
<div class="col-lg-3">
Quick Links
<ul class="footer">
    <li>News</li>
    <li>Results</li>
    <li>Videos</li>
    <li>Photos</li>
    <li>Venues</li>
    <li>Stats</li>
    <li>Archive</li>
    <li>Tickets</li>
</ul>
</font>
</div-->
<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
</script>

    <jQuery (necessary for Bootstrap's JavaScript plugins)>

<script src="modal.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
<?php
  include("footer.php");

?> 



