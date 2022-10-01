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
    margin-left: 20em;
    margin-top: 5em;
    margin-right: 10em;
}
.p1{
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
					
							
							
						</div>
						<div class="panel-body">
							<div class="row">

                            <div class="p">

                           
                            </div>
            <table class="table">
            <tr>
            <td> <h5>Total Number of Equipment For Each Pieces Of Equipment And Total Number of Equipment the Company Have</h5> </td>
            </tr>
					
<?php
	require_once 'dbconfig.php';

   
    $stmt1 = $db_con->prepare("SELECT  SUM(TotalInNumber) As total FROM  equipment");
    $stmt1->execute();
    $row1 = $stmt1->fetch(PDO::FETCH_ASSOC);
    
    $total = 0;
    $total += $row1['total'];
        

$stmt = $db_con->prepare('SELECT *	  
     FROM   equipment');
    $stmt->execute();
    

	if($stmt->rowCount() > 0)
	{
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			extract($row);
			?>
            <tr>
            <th>Equipment Name</th>
            <th><?php echo $EquipmentName;?></th>
            </tr>
            <tr>
            <th>Total Number </th>
            <th><?php echo $TotalInNumber;?></th>
           </tr>
       			
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
<tr>

<th>Total Number of Equipment the Company Have</th>
<th> <?php echo $total;  ?></th>
</tr>

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
