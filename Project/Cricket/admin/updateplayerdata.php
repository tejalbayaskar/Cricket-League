<?php
ini_set("display_errors", 1);
if (isset($_POST['submit_player'])){
	$connection = new Mongo();
	$db = $connection->cricket;
	$id = new MongoId($_POST['id']);
	$mObj = $db->country->findOne(array('player._id' => $id ));
	echo $mObj['countryname'];
	$doc=$mObj['player'];
	

	echo "<br>";
	echo "<br>";
		
	foreach ($doc as $row) {
	if ($row['_id'] == $id) {
				$a=$row;
		}
	}

	echo "<br>";
	echo "<br>";
	
	


	$db->country->update(
			array('player._id' => $a['_id']),
			array(
				'$set'=>array(

					'player.$.pname'=>  $_POST['pname'],
					'player.$.dob'=> $_POST['dob'],
					'player.$.role'=> $_POST['role'],
					'player.$.bstyle'=>  $_POST['bstyle'],
	       			'player.$.batstyle'=>  $_POST['batstyle'],
	        		'player.$.description'=>$_POST['description'],
                	'player.$.bruns'=>$_POST['bruns'],
		                                                 //'player.$.binns' =>  $_POST['binns'],
	                  'player.$.balls' =>  $_POST['balls'],
		                                                'player.$.wkts' =>  $_POST['wkts'],
								 // 'player.$.bave' =>  $_POST['bave'], 
								 // 'player.$.bbi' =>  $_POST['bbi'],
								 // 'player.$.econ' =>  $_POST['econ'],
								 // 'player.$.bsr' =>  $_POST['bsr'],
								 // 'player.$.4w' =>  $_POST['4w'],
								 // 'player.$.5w' =>  $_POST['5w'],
								 // 'player.$.10w' =>  $_POST['10w'],

								// 'player.$.tinns' =>  $_POST['tinns'],
								// 'player.$.tmat' =>  $_POST['tmat'],
								// 'player.$.no' =>  $_POST['no'],
								'player.$.runs' =>  $_POST['runs'],
										'player.$.overs' =>  $_POST['overs'],
												'player.$.maidens' =>  $_POST['maidens'],
								// 'player.$.hs' =>  $_POST['hs'],
								// 'player.$.tave' =>  $_POST['tave'],
								// 'player.$.bf' =>  $_POST['bf'],
								// 'player.$.tsr' =>  $_POST['tsr'],
								'player.$.hundreds' =>  $_POST['hundreds'],
								'player.$.fifties' =>  $_POST['fifties'],
								'player.$.fours' =>  $_POST['fours'],
								'player.$.sixes' =>  $_POST['sixes'],
								// 'player.$.st' =>  $_POST['st'],
        //                         'player.$.ct' =>  $_POST['ct']
		
					
					             )
				)
		);

header('location:showcountry.php');
	
}
?>