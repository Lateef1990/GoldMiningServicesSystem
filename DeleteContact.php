<?php
session_start();

if(!isset($_SESSION['id']))
{
	header("Location: login.php");

}
include_once 'dbconfig.php';
$stmt = $db_con->prepare("SELECT * FROM employee WHERE id=:uid");
$stmt->execute(array(":uid"=>$_SESSION['id']));
$row=$stmt->fetch(PDO::FETCH_ASSOC);


	
	$id=$_GET['id'];
	$result = $db_con->prepare("DELETE FROM contact WHERE id= :uid");
	$result->bindParam(':uid', $id);
	$result->execute();
	echo "<script>alert(\"Record Deleted Successfully\")</script>";
	echo "<script> window.location=\"ContactUsReport.php\"</script>";
?>