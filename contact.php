<?php  include 'header.php'; ?>
<?php
	error_reporting( ~E_NOTICE ); // avoid notice
	
	require_once 'dbconfig.php';
	
	if(isset($_POST['contact']))
	{
	
		$name =$_POST['name'];
		$email =$_POST['email'];
		$phone =$_POST['phone'];
		$address =$_POST['address'];
		$message =$_POST['message'];
	
		// if no error occured, continue ....
	if(!isset($errMSG))
		{
			$stmt = $db_con->prepare('INSERT INTO   contact (Name,Phone,Email,Address,Message) VALUES
			(:uname,:uphone, :uemail,:uaddress, :umessage)');
		
			$stmt->bindParam(':uname',$name);
			$stmt->bindParam(':uphone',$phone);
            $stmt->bindParam(':uemail',$email);
            $stmt->bindParam(':uaddress',$address);			
			$stmt->bindParam(':umessage',$message);
		
			if($stmt->execute())
			{
				?>
				<script>
				alert('Successfully Send...');
				window.location.href= 'Clientcontact.php';
				</script>
			<?php
			}
			else
			{
				$errMSG = "error while inserting....";
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

		<h5> Contact Us </h5>
		<form action="" method= "POST" enctype="multipart/form-data"> 
		
		
	    <div class="form-group">
        <input type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="Enter Your FullName" required>
		</div>
	  
	  <div class="form-group">
       <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter Email" required>
      </div>
	  <div class="form-group">
       <input type="number" class="form-control" name="phone" aria-describedby="emailHelp" placeholder="Enter Number" required>
      </div>
	  <div class="form-group">
       <input type="text" class="form-control" name="address" aria-describedby="emailHelp" placeholder="Enter Address" required>
      </div>
	  <div class="form-group">
      <textarea col="" row="" class="form-control" name="message" required>Messages</textarea>
      </div>
	
    <input type="submit" class="btn btn-success" name="contact" value="Send" >
</form>
        
        </div>
        </div>
        </div>

</div>

</body>

<?php  include 'footer.php'; ?>