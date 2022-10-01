<?php
session_start();

if(!isset($_SESSION['Username']) && !isset($_SESSION['id'])){
	header("Location: index.php");
}
include_once 'dbconfig.php';

$stmt = $db_con->prepare("SELECT * FROM  admin  WHERE id=:uid");
$stmt->execute(array(":uid"=>$_SESSION['id']));
$row=$stmt->fetch(PDO::FETCH_ASSOC);
?>
<?php
	error_reporting( ~E_NOTICE ); // avoid notice
	
	require_once 'dbconfig.php';
	
	if(isset($_POST['client']))
	{
		$client_id =$_POST['client_id'];
		$name =$_POST['name'];
		$email =$_POST['email'];
		$phone =$_POST['phone'];
		$address =$_POST['address'];
		$username =$_POST['username'];
		$password =$_POST['password'];
		

		
		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
		
		
		if(empty($name)){
			$errMSG = "Please Enter Username.";
		}
		else if(empty($name)){
			$errMSG = "Please Enter Your Job Work.";
		}
		else if(empty($imgFile)){
			$errMSG = "Please Select Image File.";
		}
		else
		{
			$upload_dir = 'user_images/'; // upload directory
	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		
			// valid image extensions
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		
			// rename uploading image
			$userpic = rand(1000,1000000).".".$imgExt;
				
			// allow valid image file formats
			if(in_array($imgExt, $valid_extensions)){			
				// Check file size '5MB'
				if($imgSize < 5000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$userpic);
				}
				else{
					$errMSG = "Sorry, your file is too large.";
				}
			}
			else{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}
		}
		
		$stmt_check = $db_con->prepare("SELECT Phone FROM client WHERE Phone=:uphone");
        $stmt_check->execute(array(":uphone"=>$phone));
        $row = $stmt_check->fetch(PDO::FETCH_ASSOC);
        $count = $stmt_check->rowCount();
        
        if($row['Phone']==$phone){
        	?>
                <script>
				alert('The Employee is Already Exist...');
				window.location.href='ClientReg.php';
				</script>
                <?php

        }elseif
		// if no error occured, continue ....
	(!isset($errMSG))
		{
			$stmt = $db_con->prepare('INSERT INTO  client (Client_id,FullName,Image,Email,Address,Phone
			,Username,Password) VALUES
			(:uclient_id, :uname ,:upic, :uemail,:uaddress,  :uphone, :uusername,:upassword)');
			$stmt->bindParam(':uclient_id',$client_id);
			$stmt->bindParam(':uname',$name);
			$stmt->bindParam(':upic',$userpic);
            $stmt->bindParam(':uemail',$email);
            $stmt->bindParam(':uaddress',$address);
			$stmt->bindParam(':uphone',$phone);
			$stmt->bindParam(':uusername',$username);
			$stmt->bindParam(':upassword',$password);
		
			if($stmt->execute())
			{
				?>
				<script>
				alert('Registration Successfully...');
				window.location.href= 'ClientReg.php';
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
<?php  include 'adminheader.php'; ?>
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
margin-bottom: 2em;
}
p{
    color: white;
	margin-left: 30em;
}
</style>
<body>
<div class="card">  
        <div class="card-body text-center">

		<h5> Client Registration </h5>
		<form action="" method= "POST" enctype="multipart/form-data"> 
		
		<div class="form-group">
        <input type="text" class="form-control" name="client_id" aria-describedby="emailHelp"  value="<?php $rand = rand(100000,999999);
echo $rand;?>" readonly="disable" required>
		</div>
	    <div class="form-group">
        <input type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="Enter FullName" required>
		</div>
	  <div class="form-group">
       <input type="file" class="form-control" name="user_image" aria-describedby="emailHelp" placeholder="Picture" required>
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
       <input type="text" class="form-control" name="username" aria-describedby="emailHelp" placeholder="Enter Username" required>
      </div>
	  <div class="form-group">
       <input type="password" class="form-control" name="password" aria-describedby="emailHelp" placeholder="Enter Password" required>
      </div>
    
    
    <input type="submit" class="btn btn-success" name="client" value="Submit" >
</form>
        
        </div>
        </div>
        </div>

</div>

</body>


<?php  include 'footer.php'; ?>

<script src="_vendor/jquery/dist/jquery.min.js"></script>
    <script src="_vendor/popper.js/dist/umd/popper.min.js"></script>
    <script src="_vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="_assets/js/custom.js"></script>
</body>
</html>

