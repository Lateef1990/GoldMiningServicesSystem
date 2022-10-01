<?php
session_start();

if(!isset($_SESSION['Username']) && !isset($_SESSION['Client_id'])){
	header("Location: index.php");
}
include_once 'dbconfig.php';

$stmt = $db_con->prepare("SELECT * FROM  client  WHERE Client_id=:uClient_id");
$stmt->execute(array(":uClient_id"=>$_SESSION['Client_id']));
$row=$stmt->fetch(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <title>Gold Mining Services System</title>
        <meta http-equiv="x-ua-compatible" content="ie=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,800">
        <link rel='stylesheet' href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css\bootstrap.css">
<style>
.card{   
width: 500px;
margin-top: 3em;
margin-left: 30em;
margin-right: 15em;
}
p{
  color: white;
  margin-left: 30em;
}

</style>

</head>

<body>

<?php include 'clientheader.php'; ?>

<?php
	error_reporting( ~E_NOTICE ); // avoid notice
	
	require_once 'dbconfig.php';
	
	if(isset($_POST['request']))
	{
	
		$client_id =$_POST['client_id'];
		$Location =$_POST['Location'];
		$equipment1 =$_POST['equipment1'];
		$number1 =$_POST['number1'];
		$equipment2 =$_POST['equipment2'];
	    $number2 =$_POST['number2'];
        $equipment3 =$_POST['equipment3'];
		$number3 =$_POST['number3'];
		$equipment4 =$_POST['equipment4'];
		$number4 =$_POST['number4'];
		$equipment5 =$_POST['equipment5'];
		$number5 =$_POST['number5'];
		$equipment6 =$_POST['equipment6'];
		$number6 =$_POST['number6'];
		$equipment7 =$_POST['equipment7'];
		$number7 =$_POST['number7'];
		$equipment8 =$_POST['equipment8'];
		$number8 =$_POST['number8'];
		$equipment9 =$_POST['equipment9'];
		$number9 =$_POST['number9'];
		$equipment10 =$_POST['equipment10'];
	    $number10 =$_POST['number10'];

		
	$total = $number1  + $number2 + $number3 + $number4 + $number5 + $number6 + $number7 + $number8 + $number9 + $number10;
		
		$status = "Pending";
        
        
        $stmt_check = $db_con->prepare("SELECT Client_id FROM   requestequipment WHERE Client_id=:uclient_id");
        $stmt_check->execute(array(":uclient_id"=>$client_id));
        $row = $stmt_check->fetch(PDO::FETCH_ASSOC);
        $count = $stmt_check->rowCount();
        
        if($row['Client_id']==$client_id){
        	?>
                <script>
				alert('You have already Requested for Equipment...');
				window.location.href='ClientHome.php';
				</script>
                <?php

		// if no error occured, continue ....
        }elseif(!isset($errMSG))
		{
			$stmt = $db_con->prepare('INSERT INTO    requestequipment (Client_id,Location,Equipment1,Number1,Equipment2,Number2,Equipment3,Number3,
			Equipment4,Number4,Equipment5,Number5,Equipment6,Number6,Equipment7,Number7,Equipment8,Number8,Equipment9,Number9,
			Equipment10,Number10,Total,	Status) VALUES
			(:uclient_id,:uLocation, :uequipment1, :unumber1,:uequipment2, :unumber2, :uequipment3, :unumber3, :uequipment4, :unumber4,
			:uequipment5, :unumber5, :uequipment6, :unumber6, :uequipment7, :unumber7, :uequipment8, :unumber8, :uequipment9, :unumber9,
			:uequipment10, :unumber10,:utotal,:ustatus)');
		
			$stmt->bindParam(':uclient_id',$client_id);
			$stmt->bindParam(':uLocation',$Location);
			$stmt->bindParam(':uequipment1',$equipment1);
			$stmt->bindParam(':unumber1',$number1);
			$stmt->bindParam(':uequipment2',$equipment2);
			$stmt->bindParam(':unumber2',$number2);
			$stmt->bindParam(':uequipment3',$equipment3);
			$stmt->bindParam(':unumber3',$number3);
			$stmt->bindParam(':uequipment4',$equipment4);
			$stmt->bindParam(':unumber4',$number4);
			$stmt->bindParam(':uequipment5',$equipment5);
			$stmt->bindParam(':unumber5',$number5);
			$stmt->bindParam(':uequipment6',$equipment6);
			$stmt->bindParam(':unumber6',$number6);
			$stmt->bindParam(':uequipment7',$equipment7);
			$stmt->bindParam(':unumber7',$number7);
			$stmt->bindParam(':uequipment8',$equipment8);
			$stmt->bindParam(':unumber8',$number8);
			$stmt->bindParam(':uequipment9',$equipment9);
			$stmt->bindParam(':unumber9',$number9);
			$stmt->bindParam(':uequipment10',$equipment10);
			$stmt->bindParam(':unumber10',$number10);
			$stmt->bindParam(':utotal',$total);
            $stmt->bindParam(':ustatus',$status);			
			
		
			if($stmt->execute())
			{
				?>
				<script>
				alert('Successfully Requested...');
				window.location.href= 'ClientHome.php';
				</script>
			<?php
			}
			else
			{
				$errMSG = "error while inserting....";
			}
		}
	}
?>
 
					<?php
	if(isset($errMSG)){
			?>
            <div class="alert alert-danger">
            	<span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
            </div>
            <?php
	}
	else if(isset($successMSG)){
		?>
        <div class="alert alert-success">
		<h5><strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong></h5> 
        </div>
        <?php
	}
	?> 

<?php
session_start();

if(!isset($_SESSION['Username']) && !isset($_SESSION['id'])){
	header("Location: index.php");
}
include_once 'include/dbconn.php';
?>

<div class="p1">
      <div class="row">
        <div class="card">  
        <div class="card-body text-center">

		<h5>Requesting Equipment Form for Mining Processing</h5>
		<form action="" method= "POST" enctype="multipart/form-data"> 
		
		
	    <div class="form-group">
        <input type="text" class="form-control" name="client_id" aria-describedby="emailHelp" value="<?php echo $row['Client_id']; ?>" required>
		</div>
	  
	  <div class="form-group">
       <input type="text" class="form-control" name="Location" aria-describedby="emailHelp" placeholder="Location of the Project" required>
      </div>
	  <div class="form-group">
       <input type="text" class="form-control" name="equipment1" aria-describedby="emailHelp" placeholder="Equipment one" required>
      </div>

	  <div class="form-group">
       <input type="text" class="form-control" name="number1" aria-describedby="emailHelp" placeholder="How Many of the Equipment One Needed" required>
      </div>

	  <div class="form-group">
       <input type="text" class="form-control" name="equipment2" aria-describedby="emailHelp" placeholder="Equipment Two">
      </div>

	  <div class="form-group">
       <input type="text" class="form-control" name="number2" aria-describedby="emailHelp" placeholder="How Many of the Equipment Two Needed">
      </div>

	  <div class="form-group">
       <input type="text" class="form-control" name="equipment3" aria-describedby="emailHelp" placeholder="Equipment Three">
      </div>

	  <div class="form-group">
       <input type="text" class="form-control" name="number3" aria-describedby="emailHelp" placeholder="How Many of the Equipment Three Needed">
      </div>

	  <div class="form-group">
       <input type="text" class="form-control" name="equipment4" aria-describedby="emailHelp" placeholder="Equipment Four">
      </div>

	  <div class="form-group">
       <input type="text" class="form-control" name="number4" aria-describedby="emailHelp" placeholder="How Many of the Equipment Four Needed">
      </div>

	  <div class="form-group">
       <input type="text" class="form-control" name="equipment5" aria-describedby="emailHelp" placeholder="Equipment Five">
      </div>

	  <div class="form-group">
       <input type="text" class="form-control" name="number5" aria-describedby="emailHelp" placeholder="How Many of the Equipment Five Needed" >
      </div>

	  <div class="form-group">
       <input type="text" class="form-control" name="equipment6" aria-describedby="emailHelp" placeholder="Equipment Six">
      </div>

	  <div class="form-group">
       <input type="text" class="form-control" name="number6" aria-describedby="emailHelp" placeholder="How Many of the Equipment Six Needed" >
      </div>

	  <div class="form-group">
       <input type="text" class="form-control" name="equipment7" aria-describedby="emailHelp" placeholder="Equipment Seven">
      </div>

	  <div class="form-group">
       <input type="text" class="form-control" name="number7" aria-describedby="emailHelp" placeholder="How Many of the Equipment Seven Needed" >
      </div>

	  <div class="form-group">
       <input type="text" class="form-control" name="equipment8" aria-describedby="emailHelp" placeholder="Equipment Eight">
      </div>

	  <div class="form-group">
       <input type="text" class="form-control" name="number8" aria-describedby="emailHelp" placeholder="How Many of the Equipment Eight Needed" >
      </div>
	  <div class="form-group">
       <input type="text" class="form-control" name="equipment9" aria-describedby="emailHelp" placeholder="Equipment Nine">
      </div>

	  <div class="form-group">
       <input type="text" class="form-control" name="number9" aria-describedby="emailHelp" placeholder="How Many of the Equipment Nine Needed" >
      </div>

	  <div class="form-group">
       <input type="text" class="form-control" name="equipment10" aria-describedby="emailHelp" placeholder="Equipment Ten">
      </div>

	  <div class="form-group">
       <input type="text" class="form-control" name="number10" aria-describedby="emailHelp" placeholder="How Many of the Equipment Ten Needed" >
      </div>

    <input type="submit" class="btn btn-success" name="request" value="Request" >
</form>
        
        </div>
        </div>
        </div>

 </div>
</div>

 <div class="p1">


 <nav class="navbar navbar-expand-lg fixed-bottom navbar-dark bg-dark">
                    <div class="container-fluid">
                      <p style="color: white; margin-left: 30em"> @ Designed by Andrew Musa with Registration Number UG14/COMS/1019 </p>
                    </nav>
                    </div>
</div>
 
<script src="_vendor/jquery/dist/jquery.min.js"></script>
    <script src="_vendor/popper.js/dist/umd/popper.min.js"></script>
    <script src="_vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="_assets/js/custom.js"></script>
</body>
</html>