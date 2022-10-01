
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
                                    <a class="nav-link" href="admin.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="UpdateAdmin.php?id=<?php echo $row['id']; ?>">Update</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="ClientReg.php">Client Registration</a>
                                </li>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="employeereg.php">Employee Registration</a>
                                </li>
                        <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="dropdown13" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Equipment</a>
                      <div class="dropdown-menu" aria-labelledby="dropdown13">
                      <a class="dropdown-item" href="EquipmentAllocatedtoEachClient.php">Equipment Allocated</a>
                      <a class="dropdown-item" href="EquipmentReportInpieces.php">Total Number of Equipment</a>
                      <a class="dropdown-item" href="ReturningEquipmentTime.php">Time To Return Equipment</a>
                      </div>
                    </li>

                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="dropdown11" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Reports</a>
                      <div class="dropdown-menu" aria-labelledby="dropdown11">
                      <a class="dropdown-item" href="equipmentReport.php">Equipment Reports</a>
                      <a class="dropdown-item" href="employeeRegReport.php">Employee Reports</a>
                      <a class="dropdown-item" href="clientReport.php">Client Reports</a>
                      </div>
                    </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="logout.php">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    </div>

</body>
</html>