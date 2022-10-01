<?php
	error_reporting( ~E_NOTICE );
	
	require_once 'dbconfig.php';
	
	if(isset($_GET['id']) && !empty($_GET['id']))
	{
		$id = $_GET['id'];
		$stmt_edit = $db_con->prepare('SELECT id,emp_id,FullName,DateEmployed,Email,Address,Phone,Username,Password FROM employee WHERE id =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: .php");
    }
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
p{
  color: white;
  margin-left: 30em;
}
.card{   
width: 500px;
margin-top: 3em;
margin-left: 30em;
margin-right: 15em;
}
</style>
<?php

error_reporting( ~E_NOTICE ); // avoid notice

require_once 'dbconfig.php';

if(isset($_POST['update']))
{
	$name =$_POST['name'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$username =$_POST['username'];
	$Password =$_POST['password'];
	
	
  if	(!isset($errMSG))
	{
		$stmt = $db_con->prepare('UPDATE  employee
								 SET 
								 FullName = :uname,
								 Phone = :uphone,
								 Address = :uaddress,
								 Username = :uusername, 
								 Password=:upassword
							   WHERE id=:uid');
	   $stmt->bindParam(':uname',$name);
	   $stmt->bindParam(':uphone',$phone);
	   $stmt->bindParam(':uaddress',$address);
	   $stmt->bindParam(':uusername',$username);
	   $stmt->bindParam(':upassword',$Password);
		$stmt->bindParam(':uid',$id);
	
		if($stmt->execute()){
			?>
			<script>
			alert('Successfully Updated ...');
			window.location.href='EmployeeHome.php';
			</script>
			<?php
		}
		else{
			$errMSG = "Sorry Data Could Not Updated !";
		}
	
	}
	
					
}

?>


<?php
if(isset($errMSG)){
		?>
		<div class="alert alert-danger">
			<span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
		</div>
		<?php
}
else if(isset($successMSG)){
	?>
	<div class="alert alert-success">
	<h5><strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong></h5> 
	</div>
	<?php
}
?> 
<?php
if(isset($errMSG)){
		?>
		<div class="alert alert-danger">
			<span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
		</div>
		<?php
}
else if(isset($successMSG)){
	?>
	<div class="alert alert-success">
	<h5><strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong></h5> 
	</div>
	<?php
}

?> 
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
p{
    color: white;
    margin-left: 30em;
}
</style>
<body>
<?php include 'employeeheader.php'; ?>
      
        <div class="card">  
        <div class="card-body text-center">

		<h5> Update Employee Information </h5>
		<form action="" method= "POST" enctype="multipart/form-data"> 
		
	    <div class="form-group">
        <input type="text" class="form-control" name="name" aria-describedby="emailHelp" value="<?php echo "$FullName"; ?>" required>
		</div>
	 
	  <div class="form-group">
       <input type="text" class="form-control" name="phone" aria-describedby="emailHelp" value="<?php echo "$Phone"; ?>" required>
      </div>
	  <div class="form-group">
       <input type="text" class="form-control" name="address" aria-describedby="emailHelp" value="<?php echo "$Address"; ?>" required>
      </div>
	  <div class="form-group">
       <input type="text" class="form-control" name="username" aria-describedby="emailHelp" value="<?php echo "$Username"; ?>" required>
      </div>
	  <div class="form-group">
       <input type="text" class="form-control" name="password" aria-describedby="emailHelp" value="<?php echo "$Password"; ?>" required>
      </div>
    
    
    <input type="submit" class="btn btn-success" name="update" value="Update" >
</form>
        
        </div>
        </div>
        </div>

</div>

</body>


<?php  include 'footer.php'; ?>
