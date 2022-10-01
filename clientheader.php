
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
                                    <a class="nav-link" href="ClientHome.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="projectClientReport.php">Check  for Project</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="requesttoolsforequipment.php">Request for Equipment</a>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="UpdateClient.php?Client_id=<?php echo $row['Client_id']; ?>">Update</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="AcceptedEquipmentReport.php">Equipment Request Accepted</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="Clientcontact.php">Contact Us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="logout.php">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    </div>