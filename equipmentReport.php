<?php
session_start();

if(!isset($_SESSION['Username']) && !isset($_SESSION['id'])){
	header("Location: index.php");
}
include_once 'dbconfig.php';

$stmt = $db_con->prepare("SELECT * FROM  admin  WHERE id=:uid");
$stmt->execute(array(":uid"=>$_SESSION['id']));
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
<?php include 'adminheader.php';  ?>
</head>

<body>
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					
							<h3 class="panel-title" align="center">Registered Equipment Reports</h3>
							
						</div>
						<div class="panel-body">
							<div class="row">
            <table class="table">

            <tr>
            <td> </td>
            <h3 style="margin-left: 15em; margin-top: 2em">Equipment Reports</h3>
            </tr>
            <tr>
            <th>Equipment Name</th>
            <th>Production Introduction</th>
            <th>Capacity</th>
            <th>Improvement</th>
            <th>Total</th>

            </tr>
           <!-- Nav -->
<?php
	require_once 'dbconfig.php';
	$stmt = $db_con->prepare('SELECT *	  
     FROM   equipment ORDER BY id DESC');
	$stmt->execute();
	
	if($stmt->rowCount() > 0)
	{
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			extract($row);
			?>
            <tr>
            
            
            <td><?php echo $EquipmentName;?></td>
            <td><?php echo $ProductionIntroduction;?></td>
            <td><?php echo $Capacity;?></td>
            <td><?php echo $Improvement;?></td>
            <td><?php echo $TotalInNumber;?></td>
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
<script src="_vendor/jquery/dist/jquery.min.js"></script>
    <script src="_vendor/popper.js/dist/umd/popper.min.js"></script>
    <script src="_vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="_assets/js/custom.js"></script>
</body>
</html>
