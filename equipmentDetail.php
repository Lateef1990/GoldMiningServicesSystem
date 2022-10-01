<?php include 'header.php';  ?>
<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <title>Gold Mining Services System</title>
        <meta http-equiv="x-ua-compatible" content="ie=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,800">
        <link rel='stylesheet' href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css\bootstrap.css">
</head>
<body>
<?php
	error_reporting( ~E_NOTICE );
	
	require_once 'dbconfig.php';
	
	if(isset($_GET['id']) && !empty($_GET['id']))
	{
		$id = $_GET['id'];
		$stmt_edit = $db_con->prepare('SELECT EquipmentName,Image,	ProductionIntroduction,Capacity,Improvement FROM  equipment WHERE id =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
    }
    ?>

    <!-- Example row of columns -->
    <p class="lead" style="margin: 25px 0"><a href="Equipmment.php">Equipment</a> <?php echo $EquipmentName; ?></p>
      <div class="row">
        <div class="col-md-3 text-center">
          <img class="img-responsive img-thumbnail" src="user_images/<?php echo $Image; ?>">
        </div>
        <div class="col-md-6">
          <h5>Equipment Name</h5>
          <p><?php echo $EquipmentName; ?></p>
          <h4>Production Introduction</h4>
          <p><?php echo $ProductionIntroduction; ?></p>
          <h4>Capacity</h4>
          <p><?php echo $Capacity; ?></p>
          <h4>Improvement</h4>
          <p><?php echo $Improvement; ?></p>



          <?php  include  'footer.php';  ?>