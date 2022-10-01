<?php
session_start();

if(!isset($_SESSION['Username']) && !isset($_SESSION['id'])){
	header("Location: index.php");
}
?>
<?php include "employeeheader.php" ; ?>

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
    margin-top: 1em;
    margin-left: 2em;
    height: 200px;
    padding-top: 40px;
    width: 300px;
}
p{
  color: white;
  margin-left: 30em;
}
table{
    margin: 1em;
}


</style>

</head>

<body>
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					
							<h3 class="panel-title" align="center">Project Reports</h3>
							
						</div>
						<div class="panel-body">
							<div class="row">
            <table class="table">
					<thead>
            <tr>

            <th>Client_id</th>
            <th>Location</th>
            <th>Date to be Commence</th>
            <th>Date to be Completed</th>

            </tr>
            </thead>       <!-- Nav -->
<?php
	require_once 'dbconfig.php';
	$stmt = $db_con->prepare('SELECT *	  
     FROM   project ORDER BY Client_id DESC');
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
            <td><?php echo $DateCommenced;?></td>
            <td><?php echo $DateCompleted;?></td>
            </tr>
           
			
			<?php
		}
	}
	else
	{
		?>
        <div class="col-xs-12">
        	<div class="alert alert-warning">
            	<span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Data Found ...
            </div>
        </div>
        <?php
	}
	
?>
<tr>
<td></td>
<td align="center"><button class="btn btn-success" onClick="window.print();">Print</button></td>
 </table>

 

<?php include 'footer.php'; ?>
</body>
</html>
