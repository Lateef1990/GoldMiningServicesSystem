<?php
include_once 'dbconfig.php';

$stmt = $db_con->prepare("SELECT * FROM  employee  WHERE id=:uid");
$stmt->execute(array(":uid"=>$_SESSION['id']));
$row=$stmt->fetch(PDO::FETCH_ASSOC);
?>
<!--menu codes-->
<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-success">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">Gold Mining Services System</a>
                       

                        <!--Add here -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <!--Add here -->
   
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="EmployeeHome.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="registerClient4Project.php">Register Client For Project</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="euipmentReg.php">Register Equipment</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="clientRegemployee.php">Client Registration</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="UpdateEmployee.php?id=<?php echo $row['id']; ?>">Update</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="EmployeeReports.php">Reports</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="logout.php">LogOut</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    </div>