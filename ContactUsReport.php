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
					
							<h3 class="panel-title" align="center">Contact Us Reports</h3>
							
						</div>
						<div class="panel-body">
							<div class="row">
            <table class="table">
					<thead>
            <tr>

            <th>FullName</th>
            <th>Mobile Number</th>
            <th>Email</th>
            <th>Address</th>
            <th>Message</th>
            <th>Action</th>
            </tr>
            </thead>       <!-- Nav -->
<?php
	require_once 'dbconfig.php';
	$stmt = $db_con->prepare('SELECT *	  
     FROM contact ORDER BY id DESC');
	$stmt->execute();
	
	if($stmt->rowCount() > 0)
	{
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			extract($row);
			?>
            <tr>
            <td><?php echo $Name;?></td>
            <td><?php echo $Phone;?></td>
            <td><?php echo $Email;?></td>
            <td><?php echo $Address;?></td>
            <td><?php echo $Message;?></td>
            <td><a class="btn btn-danger" href="DeleteContact.php?id=<?php echo $id;?>"?>Delete </a></td>
            
           
			
			<?php
		}
	}
	else
	{
		?>
        <td>
        <div class="col-xs-12">
        	<div class="alert alert-warning">
            	<span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Data Found ...
            </div>
        </div>

        </td>
        <?php
	}
	
?>
</tr>
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
