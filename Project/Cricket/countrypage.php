  <?php
  include("header.php");
  $countryname= $_GET['countryname'];
  $connection = new Mongo();
  $db = $connection->cricket;
   echo "<br>";
   
   $mObj = $db->country->findOne(array('countryname' => $countryname ));
  $doc=$mObj['player'];

   foreach ($doc as $row) {
  if ($row['countryname'] == $countryname) {
        $a=$row;
       
  $image1=$mObj['player']['ppic']->bin;
    }
    
  $image2=$mObj['image']['lpic']->bin;
  }
    
?>    

<link href="image.css" rel="stylesheet" type="text/css">
<style type="text/css">
.under
{
position:relative;
z-index:-1;
float:right;
right:13px;
top:-120.5px;
right:0px;
}
.over
{
position:absolute;
left:00px;
top:148.55px;
z-index:-1;
float:left;

}
</style>
  </head>
  <body style=" padding-top: 50px;
 max-width:100%;
 overflow-x:hidden;
 ">



<!--third navigation bar-->



<nav class="navbar navbar-default  navbar-fixed" style="z-index:-1;border:0px;background-image: url(images/back.jpg);margin-top:-40px;" >
<div class="row">

<div class="col-lg-2 " ><a href="" class="dropbtn"><img src="images/flagindia.jpg" height="15" width="20"" > INDIA</a>
</div>

<div class="col-lg-2 " ><a href="" class="dropbtn"><img src="images/pakflag.png" height="15" width="20"" > PAKISTAN</a>
</div>

<div class="col-lg-2 " ><a href="" class="dropbtn"><img src="images/austflag.png" height="15" width="20"" > AUSTRALIA</a>
</div>

<div class="col-lg-2 " ><a href="" class="dropbtn"><img src="images/engflag.png" height="15" width="20"" > ENGLAND</a>
</div>

<div class="col-lg-2 " ><a href="" class="dropbtn"><img src="images/newflag.png" height="15" width="20"" >NEW ZEALAND</a>
</div>
<div class="col-lg-2 " ><a href="" class="dropbtn"><img src="images/zimbflag.png" height="15" width="20"" > ZIMBABAWE</a>
</div>
</div>
</nav>


<diV>
<img src="images/stad.jpg" max-width="100%" height="286" class="under" />
<img src="images/logof.png" max-width="100%" height="286" class="over" />
<div class="center">TEAM <br><?php echo $countryname; ?></div>
<div class="transbox">
<img src="data:image2/jpeg/png;base64,<?php echo base64_encode($image2)?>" width="110px" height="110px" style="margin-top:-150px;margin-left:80px;"/>
 <p>Coach: <?php echo  $mObj['coach']; ?> (Head coach)</p>
<p>Captain:<?php echo $mObj['captain']; ?></p>
  </div>

</diV>
<h1 style="margin-left:200px;margin-top:100px;"><?php echo $countryname ; ?>  SQUAD</h1>

 

      
  
  <div class="desc">



<div class="col-lg-8 ">
<?php  

for ($x = 0; $x <= 10; $x++) {?>
<div class="img">
<?php
  $mb = $db->country->findOne(array('player._id' => $doc[$x]['_id']));
  $img=$mb['player'];
   foreach ($img as $row) {
  if ($row['_id'] ==$doc[$x]['_id'] ) {
        $a=$row;
        $image1=$a['ppic']->bin;

    }
  }
  ?>  
<img class="img" style="margin-top:20px;width:200px;height:170px;margin-left:0px;
background-image:url(images/back3.jpg);" src="data:image1/jpeg/png;base64,<?php echo base64_encode($image1)?>">

<a href="viewplayer.php?id=<?php echo $doc[$x]['_id']?>">
 <button data-toggle="modal"   type="button" class="btn btn-link" data-target="#player-modal">
 <div class="desc"><?php echo $doc[$x]['pname'];?></div>
 </div>
 <?php
if($x%3==0)
{
echo '<div class="row">';
}
}
?>

</button>
</a>
</div>

<!--################# MODAL ########################-->
<div class="modal fade" id="player_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog" style="width:75%;">
      <div class="modal-content">
       

        <div class="modal-header" align="center" >
          <a href="countrypage.php?countryname=<?php echo $mObj['countryname'];?>"><button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
</button></a>
          
        </div>   

        <div class="modal-body">  

        <?php
  

  $countryname= $_GET['countryname'];
  $connection = new Mongo();
  $db = $connection->cricket;
   echo "<br>";
   
   $mObj = $db->country->findOne(array('countryname' => $countryname ));
  $doc=$mObj['player'];

  $id= $doc['_id'];
  // $connection = new Mongo();
  // $db = $connection->cricket;
    $id = new MongoId($id);
   echo "<br>";
   
   $mObj = $db->country->findOne(array('player._id' => $id ));
  $doc=$mObj['player'];
  echo "<br>";

   foreach ($doc as $row) {
  if ($row['_id'] == $id) {
        $a=$row;
        $image1=$a['ppic']->bin;

    }
$image4=$mObj['image']['lpic']->bin;
  }
  
  
?>      

<div class="row" style="background-image: url(images/back.jpg);margin-right:18px;margin-left:20px;">
<div class="col-lg-1"></div>
<div class="col-lg-3">
<td><img style="margin-top:70px;width:200px;height:210px;margin-left:-30px;" src="data:image1/jpeg/png;base64,<?php echo base64_encode($image1)?>" ></td>

 </div>
<div class="col-lg-4" style="color: white">
<div class="row"><h1 style="font-size: 50px;margin-left:20px; "><?php echo $a['pname'];?></h1></div>
<div class="row">
<br>
<br>

<div class="col-lg-4 " style="color: white">
<div class="row"> <h6 style="color: white">DOB</h6></div>
  <div class="row"><h6> Role</h6> </div>
  <div class="row"> <h6> Batting Style</h6> </div>
  <div class="row"><h6>  Bowls</h6></div>
  <div class="row"><h6>  Country</h6></div>
</div>

<div class="col-lg-6" style="color: white;font-weight:900;">

    <div class="row"><h6><b> <?php echo $a['dob'];?> </b></h6></div>
  <div class="row"><h6><b><?php echo $a['role'];?></b></h6></div>
  <div class="row"><h6><b><?php echo $a['batstyle'];?></b></h6> </div>
  <div class="row"><h6><b><?php echo $a['bstyle'];?></b></h6></div>
  <div class="row"><h6><b><?php echo $mObj['countryname'];?></b></h6> </div>
</div>
</div>
  </div>
  <div class="col-lg-4 ">
<td><img style="margin-top:70px;width:180px;height:190px;margin-right:-25px;" src="data:image4/jpeg/png;base64,<?php echo base64_encode($image4)?>" ></td>
  </div>

  </div>
<br><br>
<div class="col-lg-2"></div>
<div class="col-lg-8"><b style="font-family: Arial, Helvetica, sans-serif;color:black;"><?php echo $a['description'];?></b></div>
<div class="col-lg-2"></div>
<br>
<div class="row" style="margin-left:100px;margin-top:100px; " ><h3 style="color:black;"><b><?php echo $a['pname'];?>T20I Career Stats</b></h3></div>


  <h4  style="margin-left: 100px;margin-top: 30px;background-color:#081725;color: white;line-height:30px;width:85%;font-size:15px;padding-left:10px; "><b>BATTING AND FIELDING</b></h4>

  <div class="row" >

  
<div class="col-lg-1"></div>
  <div class="col-lg-11" style="color:black;font-size:10px;">

  <div class="col-lg-10">
          <div class="col-lg-1 " ><b>MAT</b> </div>
      <div class="col-lg-1" ><b>INSS</b></div>
      <div class="col-lg-1" ><b>NO</b></div>
      <div class="col-lg-1" ><b>RUNS</b></div>
      <div class="col-lg-1" ><b>HS</b></div>
      <div class="col-lg-1" ><b>AVE</b></div>
            <div class="col-lg-1" ><b>BF</b></div>
            <div class="col-lg-1" ><b>SR</b></div>
            <div class="col-lg-1" ><b>100s</b></div>
            <div class="col-lg-1"><b>50s</b></div>
      <div class="col-lg-1"><b>4s</b></div>
            <div class="col-lg-1"><b>6s</b></div>
            </div>
          <div class="col-lg-2">
      <div class="col-lg-6"><b>CT</b></div>
      <div class="col-lg-6"><b>ST</b></div></div>
      </div>

      </div>
  
  <div class="row" >

  
<div class="col-lg-1"></div>
  <div class="col-lg-11" style="background-color:#D3DBDE;color:black;">

  <div class="col-lg-10">
<div class="col-lg-1 " ><?php echo $a['tmat']?></div>
<div class="col-lg-1 " ><?php echo$a['tinns']?></div>
<div class="col-lg-1 " ><?php echo $a['no']?></div>
<div class="col-lg-1 " ><?php echo $a['runs']?></div>
<div class="col-lg-1 " ><?php echo $a['hs']?></div>
<div class="col-lg-1 " ><?php echo $a['tave']?></div>
<div class="col-lg-1"><?php echo $a['bf']?></div>
<div class="col-lg-1 " ><?php echo $a['tsr']?></div>
<div class="col-lg-1 " ><?php echo $a['hundreds']?></div>
<div class="col-lg-1 " ><?php echo $a['fifties']?></div>
<div class="col-lg-1 " ><?php echo $a['fours']?></div>
<div class="col-lg-1 " ><?php echo $a['sixes']?></div>
</div>

<div class="col-lg-2">
<div class="col-lg-6" ><?php echo $a['ct']?></div>
<div class="col-lg-6 " ><?php echo $a['st']?></div></div>

      </div>
</div>


<br>
<br><br>



  <h4  style="margin-left: 100px;margin-top: 0px;background-color:#081725;color: white;line-height:30px;width:85%;font-size:15px;padding-left:10px; "><b>BOWLING</b></h4>

  <div class="row" >

  
<div class="col-lg-1"></div>
  <div class="col-lg-10"  style="color:black;font-size:10px;">

  <div class="col-lg-6">
          <div class="col-lg-2 " ><b>MAT</b> </div>
      <div class="col-lg-2" ><b>INSS</b></div>
      <div class="col-lg-2" ><b>BALLS</b></div>
      <div class="col-lg-2" ><b>WKT</b></div>
      <div class="col-lg-2" ><b>AVE</b></div>
      <div class="col-lg-2" ><b>BBI</b></div></div>
      
      <div class="col-lg-6">
            <div class="col-lg-2" ><b>ECON</b></div>
            <div class="col-lg-2" ><b>SR</b></div>
            <div class="col-lg-2" ><b>4w</b></div>
            <div class="col-lg-2"><b>5w</b></div>
      <div class="col-lg-2"><b>10w</b></div></div>
        

      </div>
  </div>

  <div class="row" >

  
<div class="col-lg-1">
</div>
  <div class="col-lg-10" style="background-color:#D3DBDE;color:black;">

  <div class="col-lg-6" >
<div class="col-lg-2 " ><?php echo $a['bmat']?></div>
<div class="col-lg-2 " ><?php echo$a['binns']?></div>
<div class="col-lg-2 " ><?php echo $a['balls']?></div>
<div class="col-lg-2 " ><?php echo $a['wkts']?></div>
<div class="col-lg-2 " ><?php echo $a['hs']?></div>
<div class="col-lg-2 " ><?php echo $a['bave']?></div>
</div>

<div class="col-lg-6">
<div class="col-lg-2" ><?php echo $a['econ']?></div>
<div class="col-lg-2 " ><?php echo $a['bsr']?></div>
<div class="col-lg-2 " ><?php echo $a['4w']?></div>
<div class="col-lg-2 " ><?php echo $a['5w']?></div>
<div class="col-lg-2" ><?php echo $a['10w']?></div>
</div>
</div>
<div class="col-lg-1"></div>
</div>







</div>
</div>
</div>
</div>

<br><br><br>

<script src="modal.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    </div>
    </div>
<?php
  include("footer.php");

?> 





