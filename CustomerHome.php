<?php
session_start();

if(!isset($_SESSION['Username']) && !isset($_SESSION['customer_id'])){
	header("Location: index.php");
}
include_once 'include/dbconn.php';
?>
