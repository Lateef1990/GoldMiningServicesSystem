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
<?php  include 'adminheader.php'; ?>
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
margin-bottom: 2em;
}
.p{
	margin-top: 4em;
    margin-bottom: 5em;
}
</style>
<body>

<div class="container">
<div class="p">
<h1>Welcome to Admin Home Page</h1>
<h1>Gold Extration Equipment</h1>
<div class="row">
<div class="col-md-4">
<p>Air Lifter </p>
<img src="images/equipment/Gold Extration Equipment/air lifter.jpg" height="200" width="200">
</div>

<div class="col-md-4">
<p>Chute feeder</p>
<img src="images/equipment/Gold Extration Equipment/Chute feeder.jpg" height="200" width="200" >
</div>

<div class="col-md-4">
<p>Desorption Electrolysis System </p>
<img src="images/equipment/Gold Extration Equipment/Desorption Electrolysis System.jpg" height="200" width="200" >
</div>
</div>

<div class="row">
<div class="col-md-4">
<p>Leaching Agitation Tank </p>
<img src="images/equipment/Gold Extration Equipment/Leaching Agitation Tank.jpg" height="200" width="200">
</div>

<div class="col-md-4">
<p>pendulum feeder</p>
<img src="images/equipment/Gold Extration Equipment/pendulum feeder.jpg" height="200" width="200" >
</div>

<div class="col-md-4">
<p>Zinc Powder Displacement Device </p>
<img src="images/equipment/Gold Extration Equipment/Zinc Powder Displacement Device.jpg" height="200" width="200" >
</div>
</div>


</div>
</div>

<script src="_vendor/jquery/dist/jquery.min.js"></script>
    <script src="_vendor/popper.js/dist/umd/popper.min.js"></script>
    <script src="_vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="_assets/js/custom.js"></script>

</body>


<?php  include 'footer.php'; ?>