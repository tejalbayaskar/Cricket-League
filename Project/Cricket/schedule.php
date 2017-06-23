<?php
	include("header.php");
	$connection = new Mongo();
	$db = $connection ->cricket; 
	$mObj = $db->matches->find()->sort(array('date_match' => 1));
	//echo "<pre>";
	//print

?>
<body>
<div class="row">

<div class="col-lg-1"></div>
<div class="col-lg-6">
<div style="overflow-x:auto;">

<h2>Schedule
</h2>
<table  class="box">
		<tr>
			<th style="background-image: url(images/back.jpg);">Team 1 </th>
			<th  style="background-image: url(images/back.jpg);">Team 2</th>
			<th style="background-image: url(images/back.jpg);">Date of match</th>
			<th style="background-image: url(images/back.jpg);">Stadium</th>
			
			</tr>
			<tr>
			<?php
			foreach ($mObj as $row ) {
			?>

			<td><?php echo $row['team1']?></td>
			<td><?php echo$row['team2']?></td>
			<td><?php echo $row['date_match']?></td>
			<td><?php echo $row['stadium']?></td>
			</tr>
	
		<?php
	}
	?>
		<tr>
			
		</tr>
	</table>
	</div>
	</div>

	<div class="col-lg-5">
<div style="overflow-x:auto;">
<div class="panel panel-primary bs-example" >
  <div class="panel-body" id="side">

  
    <ul class="nav nav-tabs" id="myTab" >
   <li><a data-toggle="tab" href="#Upcoming" style="background-image: url(images/back.jpg); color:white;">Upcoming</a></li>
  <li><a data-toggle="tab" href="#Recent" style="background-image: url(images/back.jpg);color:white;">Recent</a></li>
 </ul>
 <div class="tab-content">
  <div id="Recent" class="tab-pane fade in active">

	<table  class="box" >
		<tr >
			<th style="background-image: url(images/back.jpg);">Team 1 </th>
			<th style="background-image: url(images/back.jpg);">Team 2</th>
			<th style="background-image: url(images/back.jpg);">Scorecard</th>
			</tr>
			<tr>
			<?php
			foreach ($mObj as $row ) {
				if(strtotime($row['date_match'])< strtotime("now"))
				{
			?>
			
			<td><?php echo $row['team1']?></td>
			<td><?php echo$row['team2']?></td>
			<td><a href="viewscorecard.php?id=<?php echo $row['_id'] ?>">View</a></td>
			</tr>
	
		<?php
	}
	}
	?>
		<tr>
			
		</tr>
	</table>

	</div>
	

	<!---Upcomin-->
 <div id="Upcoming" class="tab-pane fade">
	<table  class="box">
		<tr>
			<th>Team 1 </th>
			<th>Team 2</th>
			<th>Date of match</th>
		
			</tr>
			<tr>
			<?php
			foreach ($mObj as $row ) {
				if(strtotime($row['date_match'])> strtotime("now"))
				{
			?>


			<td><?php echo $row['team1']?></td>
			<td><?php echo$row['team2']?></td>
			<td><?php echo $row['date_match']?></td>
			</tr>
	
		<?php
	}
	}
	?>
		<tr>
			
		</tr>
	</table>
</div>

	</div></div>
	</div>
	</div>
	</div>
	</div>
<br><br>

<?php
  include("footer.php");
?>