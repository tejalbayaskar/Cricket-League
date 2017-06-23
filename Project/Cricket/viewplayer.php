        

<!doctype html>
<head>
<title>Player</title>
<link rel="stylesheet" href="style.css" type="text/css" />
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
<link href="image.css" rel="stylesheet" type="text/css">
<link href="modal.css" rel="stylesheet" type="text/css">
   <script src="js/jquery.js"></script>
 <script src="js/bootstrap.js"></script>
<script src="modal.js"></script>
 <script type="text/javascript">
    $(window).load(function(){
        $('#player-modal').modal('show');
    });
</script>


</head>

<body>



<!-- 
<button data-toggle="modal" data-target="#player-modal" href="" type="button" class="btn btn-link">Virat</button>
 -->

<!--################# MODAL ########################-->

  

        <div class="modal-body">  

        <?php
	
	$id= $_GET['id'];
	$connection = new Mongo();
	$db = $connection->cricket;
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
<div class="modal fade" id="player-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog" style="width:75%;">
      <div class="modal-content">
       

        <div class="modal-header" align="center">
          <a href="countrypage.php?countryname=<?php echo $mObj['countryname'];?>">close</a>
          
        </div> 
<div class="row" style="background-image: url(back.jpg);margin-right:18px;margin-left:20px;">
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

    <div class="row"><h6 >DOB</h6></div>
	<div class="row"><h6> Role</h6> </div>
	<div class="row"><h6> Batting Style</h6></div>
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
<div class="col-lg-8"><b style="font-family: Arial, Helvetica, sans-serif;"><?php echo $a['description'];?></b></div>
<div class="col-lg-2"></div>
<br><br><br>
<div class="row" style="margin-left:100px;margin-top:100px; " ><h3><b><?php echo $a['pname'];?> T20I Career Stats</b></h3></div>


	<h4  style="margin-left: 64px;margin-top: 30px;background-color:#081725;color: white;line-height:30px;width:84%;font-size:15px;padding-left:10px; "><b>BATTING AND FIELDING</b></h4>
<div class="container">
  <div class="table-responsive">
  <table class="table" style="width:800px;margin-left:50px;">
    <thead>
      <tr>
        <th>Runs</th>
        <th>Balls</th>
        <th>sixes</th>
        <th>fours</th>
        <th>fifties</th>
        <th>hundreds</th>
        
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?php echo $a['runs']?></td>
        <td><?php echo $a['balls']?></td>
        <td><?php echo $a['sixes']?></td>
        <td><?php echo $a['fours']?></td>
        <td><?php echo $a['fifties']?></td>
        <td><?php echo $a['hundreds']?></td>
      </tr>
    </tbody>
  </table>
  </div>
</div>
	
<br>
<br><br>



	<h4  style="margin-left: 64px;margin-top: 0px;background-color:#081725;color: white;line-height:30px;width:84%;font-size:15px;padding-left:10px; "><b>BOWLING</b></h4>
<div class="container">
  <div class="table-responsive">
  <table class="table" style="width:800px;margin-left:50px;">
    <thead>
      <tr>
        <th>Overs</th>
        <th>Maidens</th>
        <th>runs</th>
        <th>Wickets</th>
    
        
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?php echo $a['overs']?></td>
        <td><?php echo $a['maidens']?></td>
        <td><?php echo $a['bruns']?></td>
        <td><?php echo $a['wkts']?></td>
      </tr>
    </tbody>
  </table>
  </div>
</div>
	




 <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

	</body>
</html>

