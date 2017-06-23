<?php
	include("adminmenu.php");
	$connection = new Mongo();
	$db = $connection ->cricket; 
	$mObj = $db->country->find()->sort(array('countryname'=>1));
?>
<html>
<head>
	
</head>
<body>

<div style="width:80%;margin-left:20%;">
	<table align="center" cellpadding="20px" border=1>
		<tr>
			<th>Country Name </th>
			<th>Flag Image</th>	
			<th> Action</th>
		</tr>
			<tr>
			<?php
			foreach ($mObj as $row ) {
			$image3=$row['image']['fpic']->bin;
			//$image4=$row['image']['lpic']->bin;
			?>


		<td><?php echo $row['countryname']?></td>

<td><img src="data:image3/jpeg/png;base64,<?php echo base64_encode($image3)?>" max-width="50%" height="80px"></td>

	<td><a href="addplayer.php?countryname=<?php echo $row['countryname']?>">
				Add Player </a> |
				<a href="showplayers.php?countryname=<?php echo $row['countryname']?>">
				Update Players</a>
 </td>
			</tr>
	
		<?php
	}
	?>
		<tr>
			
		</tr>
	</table>

</div>
</body>
</html>
