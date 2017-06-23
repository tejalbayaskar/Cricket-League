<?php
include("adminmenu.php");
	ini_set('display_errors', 1);

	$id = $_GET['id'];
	$connection = new Mongo();
	$id = new MongoId($id);
	$db = $connection -> cricket;
	$doc=$db->matches->findOne(array('_id'=>$id));
	?>
<!doctype html>
<head>
<title>Add Result</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<div class="row">
<div class="col-lg-6">

First Innings:
        <table  class="tftable" style="margin-left:100px;">
        <form action="" method="POST">
            <tr>
              <th>Batsman</th>
              <th>Runs</th>
              <th>Balls</th>
              <th>4s</th>
              <th>6s</th>
              <th>Del</th>
            </tr>				              
            <tr>
            <?php
	echo $doc['batting_first'];
			$array['countryname']=$doc['batting_first'];
			echo $array['countryname'];
			$mObj1 = $db->country->findOne($array);
			$docc= $mObj1['player'];
echo $docc[1]['pname'];
			foreach ($docc as $row ) 
			{
				
				 $a=$row;
				echo $a['pname']; 
			?>


			<td><input type='number' name='runs' value='' size='3'></td>
			  <td>&nbsp;<input type='number' name='balls' value="" size='2'></td>
			  <td>&nbsp;<input type='number' name='fours' value="" size='3'></td>
			  <td>&nbsp;<input type='number' name='sixes' value="" size='2'></td>
			 	  
		<?php
				 echo "</tr><br>";

		}
	}

*/?></tr>
			  </table>
			  </form>
			  </div>
			  </div>
<input type="submit" name="submit" value="SUBMIT">
</form>
</div>
<div class="col-lg-6">

</div>
</div>

</body>