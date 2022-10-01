<?php
session_start();

if(!isset($_SESSION['Username']) && !isset($_SESSION['Client_id'])){
	header("Location: index.php");
}
require_once 'dbconfig.php';
$Client_id = $_GET['Client_id'];

$stmt = $db_con->prepare('UPDATE   requestequipment SET Status = "Approved"  WHERE Client_id=:uClient_id');
$stmt->bindParam(':uClient_id',$Client_id);
if($stmt->execute()){
echo "<script>alert('The Equipment Request  is Successfully Approved');</script>";
//echo "<script>document.location='generalreport.php'</script>";
echo "<script> window.location=\"EquipmetRequestedReport.php\"</script>";
}
else{
    $errMSG = "Sorry Data Could Not Updated !";
}

?>