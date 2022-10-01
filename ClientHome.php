<?php
session_start();

if(!isset($_SESSION['Username']) && !isset($_SESSION['Client_id'])){
	header("Location: index.php");
}
include_once 'dbconfig.php';

$stmt = $db_con->prepare("SELECT * FROM  client  WHERE Client_id=:uClient_id");
$stmt->execute(array(":uClient_id"=>$_SESSION['Client_id']));
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
width: 500px;
margin-top: 3em;
margin-left: 30em;
margin-right: 15em;
}
p{
	align: justify;
	font: bold;
}
b,blockquote,.p2{
	padding: 1em;
}
.p1{
	margin-top: 5em;
	margin-bottom: 5em;
}
</style>
<body>
<?php include 'clientheader.php'; ?>
        
        </div>
        </div>
        </div>

 </div>
</div>

<div class="container">
 <div class="p1">

 <h1>Welcome to Client Home Page</h1>

 <div class="row">
<div class="col-md-6">
<h3>We put safety on top of the agenda</h3><br>
<blockquote>African Mining Services is a safely conscious mining contracting entity committed to maintaining the highest standards of HS&E in the industry in order to eliminate conditions and incidents that could result in personal injury, ill health or damage to the environment.
We are committed to taking all possible steps to ensure the safety and health of all persons working in the workplace and prevent damage to company property, equipment and the environment.
Our management ensure that supervisors and employees understand their specific responsibilities for HS&E and that all site activities are carried out in accordance with Mines Regulations and any other relevant HS&E requirements.
We are committed to effective training so that each employee can develop skills in an efficient and safe manner.
Our employees share responsibility with management in ensuring the safety and well-being of themselves and other persons in the workplace and ensuring that no-one is allowed to work in an unsafe situation or in an unsafe manner. It is essential that all dangerous situations are identified and isolated. Immediate supervision, along with management, are made aware immediately.
<blockquote>
</div>

<div class="col-md-6">
<h3>Continually improving our record in health and safety on site</h3>
<div class="p2">
<p><li>Continual improvement of workplace health and safety in partnership with employees and sub-contractors.</li></p></div>
<div class="p2">
<p><li>Regular identification of hazards, risk assessment and risk control in order to identify all issues of HS&E concern and thereby establish objectives, targets and strategies for their management.</li></p></div>
<div class="p2">
<p><li>Building a team attitude and approach to safety and training and promotes fluid interaction between staff and employees where all matters of HS&E are concerned.</li></p></div>
</div>
</div>


<div class="row">
<div class="col-md-6">
<h3>Becoming a Supplier</h3><br>
<p>When sourcing high quality goods and services we value companies with the following qualities:<p>
<p><li>	Excellent safety record</li> </p>
<p> <li>	Cost efficiency </li></p>
<p> <li> Financial viability </li></p>
<p> <li>	Competitive pricing </li></p>
<p> <li>Customer focus </li></p>
<p> <li>Innovative business solutions </li></p>
<p>	<li> 24hr Technical Support </li></p>

</div>

<div class="col-md-6">
<h3>African Mining Services Procurement Procedures Outline</h3>
<div class="p2">
<p> <li> The role of the Procurement function within the African Mining Services Group and the way we want to operate. </li></p></div>
<div class="p2">
<p><li> The expectations and commitments between Procurement and its internal customers.</p></div>
<div class="p2">
<p> <li>  The expectations between Procurement and suppliers; and.</li></p></div>
<p> <li> African Mining Services expectations of its own employees and contractors.</li></p></div>
</div>
</div>





</div>




 <nav class="navbar navbar-expand-lg fixed-bottom navbar-dark bg-dark">
                    <div class="container-fluid">
                      <p style="color: white; margin-left: 30em"> @ Designed by Andrew Musa with Registration Number UG14/COMS/1019 </p>
                    </nav>
                    </div>
</div>
 
<script src="_vendor/jquery/dist/jquery.min.js"></script>
    <script src="_vendor/popper.js/dist/umd/popper.min.js"></script>
    <script src="_vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="_assets/js/custom.js"></script>
</body>
</html>