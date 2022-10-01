<?php
session_start();
require_once("include/dbconn.php");

if(isset($_POST['login']))
{

//$userlevel=$_GET['user'];
// username and password sent from form 

$username=$_POST['username']; 
$password=$_POST['password']; 

// To protect MySQL injection (more detail about MySQL injection)
$username = stripslashes($username);
$password = stripslashes($password);


// Admin Login
if($_POST['type'] == 'Admin'){
$sql="SELECT * FROM  admin WHERE Username ='$username' AND Password='$password'";
$result=mysqli_query($conn,$sql);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);
$row=mysqli_fetch_assoc($result);
$_SESSION['Username']= $username;
$id=$row['id'];
// If result matched $myusername and $mypassword, table row must be 1 row
if($count==0){

	echo "<script type='text/javascript'>alert('Invalid Username/Password!')</script>";
	echo "<script>document.location='index.php'</script>";

		}else{		
// Register $myusername, $mypassword and redirect to file "login_success.php"
	$_SESSION['Username']= $username;
	$_SESSION['id']=$id;
	echo "<script>alert(\"Login Successfully\")</script>";
	echo "<script> window.location=\"admin.php?id={$row['id']}\"</script>";
		//header("location:../admin.php?id={$row['id']}");
		}

		// Customer Login
	}elseif($_POST['type'] == 'User'){
		$sql="SELECT * FROM   customer WHERE Username ='$username' AND Password='$password'";
		$result=mysqli_query($conn,$sql);

// Mysql_num_row is counting table row
		$count=mysqli_num_rows($result);
		$row=mysqli_fetch_assoc($result);
		$id=$row['customer_id'];
// If result matched $myusername and $mypassword, table row must be 1 row
if($count==0){

	echo "<script type='text/javascript'>alert('Invalid Username/Password!')</script>";
		  echo "<script>document.location='index.php'</script>";
		}else{	
			// Register $myusername, $mypassword and redirect to file "login_success.php"
	$_SESSION['Username']= $username;
	$_SESSION['customer_id']=$id;
	echo "<script>alert(\"Login Successfully\")</script>";
	echo "<script> window.location=\"CustomerHome.php?customer_id={$row['customer_id']}\"</script>";
		//header("location:../admin.php?id={$row['id']}");
		}

		// Client Login
	}elseif($_POST['type'] == 'Client'){
		$sql="SELECT * FROM    client WHERE Username ='$username' AND Password='$password'";
		$result=mysqli_query($conn,$sql);

// Mysql_num_row is counting table row
		$count=mysqli_num_rows($result);
		$row=mysqli_fetch_assoc($result);
		$id=$row['Client_id'];
// If result matched $myusername and $mypassword, table row must be 1 row
if($count==0){

	echo "<script type='text/javascript'>alert('Invalid Username/Password!')</script>";
		  echo "<script>document.location='index.php'</script>";
		}else{	
			// Register $myusername, $mypassword and redirect to file "login_success.php"
	$_SESSION['Username']= $username;
	$_SESSION['Client_id']=$id;
	echo "<script>alert(\"Login Successfully\")</script>";
	echo "<script> window.location=\"ClientHome.php?Client_id={$row['Client_id']}\"</script>";
		//header("location:../admin.php?id={$row['id']}");
        }
        
        // Employee Login
	}elseif($_POST['type'] == 'Employee'){
		$sql="SELECT * FROM    employee WHERE Username ='$username' AND Password='$password'";
		$result=mysqli_query($conn,$sql);

// Mysql_num_row is counting table row
		$count=mysqli_num_rows($result);
		$row=mysqli_fetch_assoc($result);
		$id=$row['id'];
// If result matched $myusername and $mypassword, table row must be 1 row
if($count==0){

	echo "<script type='text/javascript'>alert('Invalid Username/Password!')</script>";
		  echo "<script>document.location='index.php'</script>";
		}else{	
			// Register $myusername, $mypassword and redirect to file "login_success.php"
	$_SESSION['Username']= $username;
	$_SESSION['id']=$id;
	echo "<script>alert(\"Login Successfully\")</script>";
	echo "<script> window.location=\"EmployeeHome.php?id={$row['id']}\"</script>";
		//header("location:../admin.php?id={$row['id']}");
		}



	}
}	
?>