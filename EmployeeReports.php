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
.p1{
  margin-top: 5em;
}


</style>

</head>

<body>
<div class="p1">
<div class="row">
<div class="col-md-4">
<div class="card">
<div class="card-body text-center">
<a href ="ClientRegReports.php" class="btn btn-success">Client Registration Reports</a>
</div>
</div>
</div>

<div class="col-md-4">
<div class="card">
<div class="card-body text-center">
<a href ="EquipmentRegReport.php" class="btn btn-success">Equipment Registration Reports</a>



</div>
</div>
</div>

<div class="col-md-4">
<div class="card">
<div class="card-body text-center">

<a href ="ProjectReport.php" class="btn btn-success">Project Report</a>


</div>
</div>
</div>

</div>

<div class="row">
<div class="col-md-4">
<div class="card">
<div class="card-body text-center">

<a href ="EquipmetRequestedReport.php" class="btn btn-success">Equipment Requested Reports</a>


</div>
</div>
</div>


<div class="col-md-4">
<div class="card">
<div class="card-body text-center">

<a href ="inspectionReport.php" class="btn btn-success">Equipment Inspection Report</a>


</div>
</div>
</div>

<div class="col-md-4">
<div class="card">
<div class="card-body text-center">

<a href ="ContactUsReport.php" class="btn btn-success">Contact Us Report</a>


</div>
</div>
</div>



</div>

</div>

<?php include 'footer.php'; ?>
</body>
</html>