
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
    height: 200px;
    width: 300px;
}
p{
  color: white;
  margin-left: 30em;
}
.pad{
    margin-top: 2em;
}

</style>




<?php  include 'header.php';   ?>

<div class="pad">
<div class="container-fluid">
<div class="row">
<?php
require_once 'dbconfig.php';
$stmt = $db_con->query("SELECT * FROM equipment");
$stmt->execute(); 
while ($row = $stmt->fetch()) {
    //echo $row['name']."<br />\n";
?>
<div class="col-md-3">
<a href="equipmentDetail.php?id=<?php echo $row['id']; ?>">
<img src="user_images/<?php echo $row['Image']; ?>" class="img-responsive img-thumbnail" width="200px" height="150px" />
<br> <br>
</div>
</a>
<?php
}
?>
</div>
</div>
</div>
<?php include 'footer.php';  ?>