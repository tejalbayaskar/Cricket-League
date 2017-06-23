<?php
    include("header.php");
  $connection = new Mongo();
  $db = $connection ->cricket; 
  $mObj = $db->country->find();
  $so = $db->country->find()->sort(array('no_of_wins' => -1));
?>

<script type="text/javascript">
$(document).ready(function(){ 
    $("#myTab li:eq(1) a").tab('show');
});
</script>
  </head>
  <body style=" padding-top: 50px; ">
   

	<div class="container">
  <h2 style="margin-left:400px;">LEADERBOARD</h2>
  <br><br>
  <div class="table-responsive">
  <table class="table table-hover table-bordered">
    <thead style="background-image: url(images/back.jpg);">
      <tr style="color:white;" >
        <th>Rank</th>
        <th>Team</th>
        <th>Matches</th>
        <th>Wins</th>
        <th>Losses</th>
        <th>Ties</th>
      </tr>
    </thead>
  <?php $x=1;
  foreach ($so as $row ) {
      ?>
    <tbody>
      <tr>
        <td><?php echo $x++ ?></td>
        <td><?php echo $row['countryname']?></td>
        <td><?php echo $row['no_of_matches']?></td>
        <td><?php echo $row['no_of_wins']?></td>
        <td><?php echo $row['no_of_losses']?></td>
        <td><?php echo $row['no_of_ties']?></td>
      </tr>
    </tbody>
    <?php }
    ?>
  </table>
  </div>
</div>

</body>

<?php
  include("footer.php");

?> 