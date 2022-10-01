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
<?php include "adminheader.php" ; ?>

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
    margin: 5em;
}


</style>

</head>

<body>
<table class="table">
					<thead>
            <tr>
            <th>Client Number</th>
            <th>Client Name</th>
            <th>Location Of the Project</th>
			<th>Total Equipment Allocated</th>
			<th>Status</th>

            </tr>
            </thead>
<?php
	require_once 'dbconfig.php';
	$stmt = $db_con->prepare('SELECT e.Client_id, e.FullName, u.Location, u.Client_id, u.Total, u.Status FROM `client` AS e INNER JOIN `requestequipment` AS u ON e.Client_id = u.Client_id AND u.Status="Approved"');
	$stmt->execute();
	
	if($stmt->rowCount() > 0)
	{
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			extract($row);
			?>
             <tr>
            <td><?php echo $Client_id;?></td>
            <td><?php echo $FullName;?></td>
            <td><?php echo $Location;?></td>
			<td><?php echo $Total;?></td>
			<td><?php echo $Status;?></td>
        
        
            <?php
		}
	}
	else
	{
		?>
        <td colspan="2"></td>
        <td>
      <a href ="#"  class="btn btn-danger">No Data Found </a>
        </td>
        <?php
	}	
?>
</tr>

</table>


<?php include 'footer.php'; ?>
<script src="_vendor/jquery/dist/jquery.min.js"></script>
    <script src="_vendor/popper.js/dist/umd/popper.min.js"></script>
    <script src="_vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="_assets/js/custom.js"></script>
</body>
</html>
