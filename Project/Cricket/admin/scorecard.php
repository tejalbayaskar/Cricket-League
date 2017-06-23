<?php
include("adminmenu.php");
//	 ini_set('display_errors',1); 
	$pname= $_GET['pname'];
	$id=$_GET['id'];
	 $connection = new Mongo();
	 $db = $connection->cricket;
	$id = new MongoId($id);
	 $mObj = $db->matches->findOne(array('_id' => $id ));
	$array['countryname']=$mObj['team1'];
	 $cou = $db->country->findOne($array);
$player=$cou['player'];
//echo $player[1]['runs'];
$p=$mObj['team1players'];

if(isset($_POST['submit'])){
$connection = new Mongo();
$db = $connection -> cricket;

$team1players=array(
'_id'=>new MongoId(),
'pname'=>$_POST['pname'],
'runs'=>$_POST['runs'],
'balls'=>$_POST['balls'],
'fours'=>$_POST['fours'],
'sixes'=>$_POST['sixes'],
'overs'=>$_POST['overs'],
'wkts'=>$_POST['wkts'],
'bruns'=>$_POST['bruns'],
'maidens'=>$_POST['maidens']
);

$id= $_GET['id'];
	$db->matches->update(
		array('_id' => new MongoId($id)),
		array(
			'$push' => array(
				 'team1players'=>  $team1players
				 )
			)
		);

 foreach ($player as $row) {
	if ($row['pname'] == $pname) {
				$a=$row;

		}

	}

// $pipeline = array(
//     array(
//         '$match' => array('pname' => '$pname')
//     )
// );


// $options = [];

// $out=$player->aggregate($pipeline, $options);
// var_dump($out);

 
$db->country->update(
	array('player.pname'=> $a['pname']),
	array('$inc'=> array('player.$.runs'=>(int)$_POST['runs']))
	);
$db->country->update(
	array('player.pname'=> $a['pname']),
	array('$inc'=> array('player.$.overs'=>(int)$_POST['overs']))
	);
$db->country->update(
	array('player.pname'=> $a['pname']),
	array('$inc'=> array('player.$.sixes'=>(int)$_POST['sixes']))
	);
$db->country->update(
	array('player.pname'=> $a['pname']),
	array('$inc'=> array('player.$.fours'=>(int)$_POST['fours']))
	);
$db->country->update(
	array('player.pname'=> $a['pname']),
	array('$inc'=> array('player.$.maidens'=>(int)$_POST['maidens']))
	);
$db->country->update(
	array('player.pname'=> $a['pname']),
	array('$inc'=> array('player.$.wkts'=>(int)$_POST['wkts']))
	);
$db->country->update(
	array('player.pname'=> $a['pname']),
	array('$inc'=> array('player.$.bruns'=>(int)$_POST['bruns']))
	);
$db->country->update(
	array('player.pname'=> $a['pname']),
	array('$inc'=> array('player.$.balls'=>(int)$_POST['balls']))
	);
	//header('location:showmatces.php');
}
if (((int)$_POST['runs']>=50) && ((int)$_POST['runs']<=100)) {
$db->country->update(
	array('player.pname'=> $a['pname']),
	array('$inc'=> array('player.$.fifties'=>1))
	);
}
if ((int)$_POST['runs']>=100 ) {
$h=floor(((int)$_POST['runs'])/100);
$db->country->update(
	array('player.pname'=> $a['pname']),
	array('$inc'=> array('player.$.hundreds'=>$h))
	);
}

?>

<!doctype html>
<head>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Team Info</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body>

<div class="row">


   
        <table  class="tftable" style="margin-left:100px;">
        <form action="" method="POST">
            <tr>
              
              <td><input type='text' name='pname' value="<?php echo $pname; ?>" readonly="readonly"></td>
			</tr>

			<tr> 

			<td>
			<table>
				<th colspan="2">Batting Statistics</th>
			

			<tr>
              <th>Runs</th>
              <td><input type='number' name='runs' value="runs" size='3' min="0"></td>
			</tr>

			<tr>
              <th>Balls</th>
              <td>&nbsp;<input type='number' name='balls' value="balls" size='2' min="0"></td>
            </tr>

            <tr>
              <th>4s</th>
              <td>&nbsp;<input type='number' name='fours' value="fours" size='3' min="0"></td>
            </tr>

            <tr>
              <th>6s</th>
              <td>&nbsp;<input type='number' name='sixes' value="sixes" size='2' min="0"></td>
            </tr>

            </table>
            </td>

            <td>
            <table>
            <tr>
            	<th>Bowling Statistics</th>
            </tr>

            <tr>
               <th>Overs</th>
               <td>&nbsp;<input type='number' name='overs' value="overs" size='2'></td>
			  

            </tr>

            <tr>
                <th>Maidens</th>
                <td>&nbsp;<input type='number' name='maidens' value="maidens" size='2'></td>
			  
            </tr>

            <tr>    
                 <th>Runs</th>
                 <td>&nbsp;<input type='number' name='bruns' value="bruns" size='2'></td>
			  
            </tr>

            <tr>    
                  <th>Wickets</th>
                  <td>&nbsp;<input type='number' name='wkts' value="wkts" size='2'></td>	
            </tr>		 	  

            	
            </table>
            </td>			              
              
			</tr>  

			<tr><td colspan="2"><input type="submit" name="submit" value="Submit"></td></tr>
			  </table>
			  
			  </form>
			  </section>
			  </div>
			  </div>
</form>


</div>
</table>
 </form>


</BODY>

</HTML>