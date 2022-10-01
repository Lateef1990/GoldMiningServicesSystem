
<?php
session_start();

if(!isset($_SESSION['Username']) && !isset($_SESSION['id'])){
	header("Location: index.php");
}
include_once 'include/dbconn.php';
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
margin-top: 3em;
margin-bottom: 3em;
}
.p{
    margin-top: 5em;
    margin-bottom: 5em;
}
</style>
<body>
        <?php include 'employeeheader.php'; ?>
      


        <div class="container">
<div class="p">
<h1>Welcome to Employee Home Page</h1>
<h1>Equipments</h1>
<div class="row">
<div class="col-md-4">
<p>Washing Thickener</p>
<img src="images/equipment/Gold Extration Equipment/Washing Thickener.jpg" height="200" width="200">
</div>

<div class="col-md-4">
<p>Extration Field</p>
<img src="images/homepage-slide4.jpg" height="200" width="300" >
</div>

<div class="col-md-4">
<p>Autogenous mill</p>
<img src="images/equipment/Autogenous mill.jpg" height="200" width="200" >
</div>
</div>

<div class="row">
<div class="col-md-4">
<p>spring cone crusher</p>
<img src="images/equipment/spring cone crusher.jpg" height="200" width="200">
</div>

<div class="col-md-4">
<p>zg-pe(x) jaw crusher</p>
<img src="images/equipment/zg-pe(x) jaw crusher.jpg" height="200" width="200" >
</div>

<div class="col-md-4">
<p>Zinc Powder Displacement Device </p>
<img src="images/equipment/Gold Extration Equipment/Zinc Powder Displacement Device.jpg" height="200" width="200" >
</div>
</div>


</div>
</div>


<?php  include 'footer.php'; ?>
</body>
</html>