<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <title>Gold Mining Services System</title>
        <meta http-equiv="x-ua-compatible" content="ie=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,800">
        <link rel='stylesheet' href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css\bootstrap.css">
        <link rel="stylesheet" href="style.css">
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

</head>

<body>
<?php include 'header.php'; ?>

                    <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">Admin and User Login</h5>
                                            
                                            <form action="login_process.php" method= "POST"> 
                                            <div class="form-group">
                                            <input type="text" class="form-control" name="username" aria-describedby="emailHelp" placeholder="Enter Username">
                                            </div>
                                            <div class="form-group">
                                            <input type="password" class="form-control" name="password" aria-describedby="emailHelp" placeholder="Enter Password">
                                            </div>
                                            <div class="form-group">
                                            <select name="type" class="form-control">
                                            <option value="Admin">Admin</option>
                                            <option value="Client">Client</option>
                                            <option value="Employee">Employee</option>
                                            </select>
                                            </div>
                                            <input type="submit" class="btn btn-success" name="login" value="login" >
                                        </div>
                                    </div>
                                </div>
                                </div>
       
                                <?php include 'footer.php'; ?>

    </body>
    </html>
    <script src="_vendor/jquery/dist/jquery.min.js"></script>
    <script src="_vendor/popper.js/dist/umd/popper.min.js"></script>
    <script src="_vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="_assets/js/custom.js"></script>