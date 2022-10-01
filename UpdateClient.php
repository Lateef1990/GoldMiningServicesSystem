
<?php
	error_reporting( ~E_NOTICE );
	
	require_once 'dbconfig.php';
	
	if(isset($_GET['Client_id']) && !empty($_GET['Client_id']))
	{
		$Client_id = $_GET['Client_id'];
		$stmt_edit = $db_con->prepare('SELECT Client_id,FullName,Email,Address,Phone,Username,Password FROM client WHERE Client_id =:uClient_id');
		$stmt_edit->execute(array(':uClient_id'=>$Client_id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: index.php");
    }
    ?>
		<?php  include 'clientheader.php'; ?>
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
	$email  = $_POST['email'];
	
	
  if	(!isset($errMSG))
	{
		$stmt = $db_con->prepare('UPDATE   client
								 SET 
								 FullName = :uname,
								 Phone = :uphone,
								 Address = :uaddress,
								 Username = :uusername, 
								 Password=:upassword,
								 Email = :uemail
							   WHERE Client_id=:uClient_id');
	   $stmt->bindParam(':uname',$name);
	   $stmt->bindParam(':uphone',$phone);
	   $stmt->bindParam(':uaddress',$address);
	   $stmt->bindParam(':uusername',$username);
	   $stmt->bindParam(':upassword',$Password);
	   $stmt->bindParam(':uemail',$email);
	   $stmt->bindParam(':uClient_id',$Client_id);
	
		if($stmt->execute()){
			?>
	<?php
	echo "<script>alert(\"Login Successfully\")</script>";
	echo "<script> window.location=\"ClientHome.php?Client_id={$row['Client_id']}\"</script>";
	?>
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
    color: white;
    margin-left: 30em;
}
</style>
<body>
      
        <div class="card">  
        <div class="card-body text-center">

		<h5>Update Your Information </h5>
		<form action="" method= "POST" enctype="multipart/form-data"> 
		
	    <div class="form-group">
        <input type="text" class="form-control" name="name" aria-describedby="emailHelp" value="<?php echo "$FullName"; ?>" required>
		</div>
	  <div class="form-group">
       <input type="email" class="form-control" name="email" aria-describedby="emailHelp" value="<?php echo "$Email"; ?>" required>
      </div>
	  <div class="form-group">
       <input type="number" class="form-control" name="phone" aria-describedby="emailHelp" value="<?php echo "$Phone"; ?>" required>
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
