<?php
	error_reporting( ~E_NOTICE ); // avoid notice
	
	require_once 'dbconfig.php';
	
	if(isset($_POST['request']))
	{
	
		$client_id =$_POST['client_id'];
		$Location =$_POST['Location'];
        $description =$_POST['description'];
        

        $status = "Pending";
        
        
        $stmt_check = $db_con->prepare("SELECT Client_id FROM   requestequipment WHERE Client_id=:uclient_id");
        $stmt_check->execute(array(":uclient_id"=>$client_id));
        $row = $stmt_check->fetch(PDO::FETCH_ASSOC);
        $count = $stmt_check->rowCount();
        
        if($row['Client_id']==$client_id){
        	?>
                <script>
				alert('You have already Requested for Equipment...');
				window.location.href='requestfortools.php';
				</script>
                <?php

		// if no error occured, continue ....
        }elseif(!isset($errMSG))
		{
			$stmt = $db_con->prepare('INSERT INTO    requestequipment (Client_id,Location,DescriptionOfTools,Status) VALUES
			(:uclient_id,:uLocation, :udescription,:ustatus)');
		
			$stmt->bindParam(':uclient_id',$client_id);
			$stmt->bindParam(':uLocation',$Location);
            $stmt->bindParam(':udescription',$description);
            $stmt->bindParam(':ustatus',$status);			
			
		
			if($stmt->execute())
			{
				?>
				<script>
				alert('Successfully Requested...');
				window.location.href= 'requestfortools.php';
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
<?php  include 'employeeheader.php'; ?>
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
<body>
      <div class="row">
        <div class="card">  
        <div class="card-body text-center">

		<h5>Requesting Equipment Form for Mining Processing</h5>
		<form action="" method= "POST" enctype="multipart/form-data"> 
		
		
	    <div class="form-group">
        <input type="text" class="form-control" name="client_id" aria-describedby="emailHelp" placeholder="Enter Client Id" required>
		</div>
	  
	  <div class="form-group">
       <input type="text" class="form-control" name="Location" aria-describedby="emailHelp" placeholder="Location of the Project" required>
      </div>
	  <div class="form-group">
       <input type="text" class="form-control" name="description" aria-describedby="emailHelp" placeholder="List of the Details of the Equipment needed" required>
      </div>
	
    <input type="submit" class="btn btn-success" name="request" value="Request" >
</form>
        
        </div>
        </div>
        </div>

</div>

</body>


<?php  include 'footer.php'; ?>