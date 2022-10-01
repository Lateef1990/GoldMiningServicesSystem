<?php
session_start();

if(!isset($_SESSION['Username']) && !isset($_SESSION['id'])){
	header("Location: index.php");
}
?>
<?php include "employeeheader.php" ; ?>
<?php
	error_reporting( ~E_NOTICE ); // avoid notice
	
	require_once 'dbconfig.php';
	
	if(isset($_POST['return']))
	{
		$client_id =$_POST['client_id'];
		$total =$_POST['total'];
		$good =$_POST['good'];
        $bad =$_POST['bad'];
        $date =$_POST['date'];
	
		
		
		$stmt_check = $db_con->prepare("SELECT Client_id FROM inspection WHERE Client_id=:uclient_id");
        $stmt_check->execute(array(":uclient_id"=>$client_id));
        $row = $stmt_check->fetch(PDO::FETCH_ASSOC);
        $count = $stmt_check->rowCount();
        
        if($row['Client_id']==$client_id){
        	?>
                <script>
				alert('The Client Equipment Has Already Been Inspect ...');
				window.location.href='EquipmetRequestedReport.php';
				</script>
                <?php

        }elseif
		// if no error occured, continue ....
	(!isset($errMSG))
		{
			$stmt = $db_con->prepare('INSERT INTO inspection (Client_id,Total,GoodEquipment,BadEquipment,
			Date) VALUES
			(:uclient_id, :utotal, :ugood, :ubad,  :udate)');
			$stmt->bindParam(':uclient_id',$client_id);
			$stmt->bindParam(':utotal',$total);
			$stmt->bindParam(':ugood',$good);
			$stmt->bindParam(':ubad',$bad);
			$stmt->bindParam(':udate',$date);
		
			if($stmt->execute())
			{
				?>
				<script>
				alert('Registration Successfully...');
				window.location.href= 'EquipmetRequestedReport.php';
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
margin-top: 1em;
margin-left: 30em;
margin-right: 15em;
}
p{
    color: white;
    margin-left: 30em;
}
.p1{
	margin-top: 1em;
}
p{
  color: white;
  margin-left: 30em;
}
table{
    margin: 1em;
}
.p2{
    margin-top: 5em;
}


</style>

</head>

<body>
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					
							<h3 class="panel-title" align="center">Equipment Requested Reports</h3>
							
						</div>
						<div class="panel-body">
							<div class="row">
            <table class="table">
					<thead>
            <tr>

            <th>Client_id</th>
            <th>Location</th>
            <th>Equipment One</th>
            <th>Number One</th>
            <th>Equipment Two</th>
            <th>Number Two</th>
            <th>Equipment Three</th>
            <th>Number Three</th>
            <th>Equipment Four</th>
            <th>Number Four</th>
            <th>Equipment Five</th>
            <th>Number Five</th>
            <th>Equipment Six</th>
            <th>Number Six</th>
            <th>Equipment Seven</th>
            <th>Number Seven</th>
            <th>Equipment Eight</th>
            <th>Number Eight</th>
            <th>Equipment Nine</th>
            <th>Number Nine</th>
            <th>Equipment Ten</th>
            <th>Number Ten</th>
            <th>Total Equipment Requested</th>
            <th>Status</th>
            <th>Accept</th>
            <th>Reject</th>
            <th>Delete</th>

            </tr>
            </thead>       <!-- Nav -->
<?php
	require_once 'dbconfig.php';
	$stmt = $db_con->prepare('SELECT *	  
     FROM  requestequipment ORDER BY Client_id DESC');
	$stmt->execute();
	
	if($stmt->rowCount() > 0)
	{
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			extract($row);
			?>
            <tr>
            <td><?php echo $Client_id;?></td>
            <td><?php echo $Location;?></td>
            <td><?php echo $Equipment1;?></td>
            <td><?php echo $Number1;?></td>
            <td><?php echo $Equipment2;?></td>
            <td><?php echo $Number2;?></td>
            <td><?php echo $Equipment3;?></td>
            <td><?php echo $Number3;?></td>
            <td><?php echo $Equipment4;?></td>
            <td><?php echo $Number4;?></td>
            <td><?php echo $Equipment5;?></td>
            <td><?php echo $Number5;?></td>
            <td><?php echo $Equipment6;?></td>
            <td><?php echo $Number6;?></td>
            <td><?php echo $Equipment7;?></td>
            <td><?php echo $Number7;?></td>
            <td><?php echo $Equipment8;?></td>
            <td><?php echo $Number8;?></td>
            <td><?php echo $Equipment9;?></td>
            <td><?php echo $Number9;?></td>
            <td><?php echo $Equipment10;?></td>
            <td><?php echo $Number10;?></td>
            <td><?php echo $Total;?></td>
            <td><?php echo $Status;?></td>

            <td><a class="btn btn-success" href="acceptrequest.php?Client_id=<?php echo $Client_id; ?>">Accept</a></td>
            <td><a class="btn btn-danger" href="RejectRequest.php?Client_id=<?php echo $Client_id; ?>">Reject</a></td>
            <td><a class="btn btn-danger" href="DeleteRequest.php?Client_id=<?php echo $Client_id; ?>">Delete</a></td>
          
           
			
			<?php
		}
	}
	else
	{
		?>
        <td  colspan="10"></td>
        <td>
            <a href="#" class="btn btn-danger">Table is Empty </a>
        
        </td>
        <?php
	}
	
?>
  </tr>
<tr>
<td></td>
<td align="center"><button class="btn btn-success" onClick="window.print();">Print</button></td>
 </table>
 <div class="p1">
      <div class="row">
        <div class="card">  
        <div class="card-body text-center">

		<h5>Equipment Inspection When Returning</h5>
		<form action="" method= "POST" enctype="multipart/form-data"> 
		
		
	    <div class="form-group">
        <input type="text" class="form-control" name="client_id" aria-describedby="emailHelp" placeholder="Client Id" required>
		</div>
	  
	  <div class="form-group">
       <input type="text" class="form-control" name="total" aria-describedby="emailHelp" placeholder="Total Number of Equipment Allocated to the Client" required>
      </div>

	  <div class="form-group">
       <input type="text" class="form-control" name="good" aria-describedby="emailHelp" placeholder="Total Number of Equipment in  Good Shape" required>
      </div>

	  <div class="form-group">
       <input type="text" class="form-control" name="bad" aria-describedby="emailHelp" placeholder="Total Number of Equipment in Bad Shape">
      </div>

      <div class="form-group">
       <input type="Date" class="form-control" name="date" aria-describedby="emailHelp" placeholder="Date Returned">
      </div>

        
    <input type="submit" class="btn btn-success" name="return" value="Submit" >
</form>
        </div>
        </div>
        </div>


<div class="p2">

      <nav class="navbar navbar-expand-lg fixed-bottom navbar-dark bg-dark">
                    <div class="container-fluid">
                      <p style="color: white; margin-left: 30em"> @ Designed by Andrew Musa with Registration Number UG14/COMS/1019 </p>
                    </nav>
                    </div>
        <script src="_vendor/jquery/dist/jquery.min.js"></script>
    <script src="_vendor/popper.js/dist/umd/popper.min.js"></script>
    <script src="_vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="_assets/js/custom.js"></script>
</body>
</html>
