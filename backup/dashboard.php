    <?php 
        session_start();
        require_once "config.php";
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="yol torres">

        <title>Dashboard</title>
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="css/sb-admin.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="js/yol.js"></script>


        <style>
        body {
            overflow-x: hidden;
        }

        .vtbl th {
            font-size: 14px;
        }

        .vtbl td {
            font-size: 14px;
        }

        .fa-home {
            font-size: 25px !important;
        }
        </style>

    </head>

    <body id="page-top">

        <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

            <p class="navbar-brand mr-1" id="title" href="#"><img class="logo"
                    src="https://www.passerellesnumeriques.org/wp-content/uploads/2016/03/pn-logo.png">SBO ELECTION
                2019</a>
                <!-- Navbar Search -->
                <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                    <div class="input-group">

                    </div>
                </div>
                </div>

                <!-- Navbar -->
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="adminpanel.php"><span> <i class="fas fa-home fa-fw"
                                    id="userIcon"></i></span></a>
                    </li>
                </ul>
        </nav>

        <div id="wrapper">

            <!-- Sidebar -->

            <div id="content-wrapper">

                <div class="container-fluid">
                    <small>
                        <h4>Dashboard<small> <sub><small> </small></sub></small>
                    </small></h4>
                    <hr>


                    <div class="container">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#home">Candidates</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#menu1">Voters</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div id="home" class="container tab-pane active"><br>
                                <div class="card mb-3 " id="bdgtbl">
                                    <div class="card-header">
                                        <i class="fas fa-user-friends"></i>
                                        Candidates</div>
                                    <div class="card-body vtbl">
                                        <div class="table-responsive">

                                            <table id="candintbl" class=" text-center table table-bordered"
                                                id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr class="table-striped">
                                                        <th>Candidate Number</th>
                                                        <th>Name</th>
                                                        <th>Votes</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                                $sql = "SELECT
                                                    tblVoter.Name as name, 
                                                    COUNT(tblVotes.CandidateId) AS Votes 
                                                    FROM 
                                                    tblCandidates 
                                                    JOIN tblVoter ON tblCandidates.ClassNumber = tblVoter.ClassNumber 
                                                    left JOIN tblVotes on tblCandidates.CandidateId = tblVotes.CandidateId 
                                                    GROUP BY 
                                                    tblCandidates.CandidateId";

                                                      
                                                    $result = $link->query($sql);
                                                    $rank = 1;
                                                    if ($result->num_rows > 0) {

                                                        while ($row = $result->fetch_assoc()) {
                                                            echo "<tr>";

                                                            echo "<td>". $rank."</td>";
                                                            echo "<td>".$row['name']."</td>";
                                                            echo "<td>". $row['Votes']."</td>";
                                                            echo "</tr>";
                                                            ++$rank;
                                                            }
                                                    }
                                                    ?>



                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div id="menu1" class="container tab-pane fade"><br>
                                <div id="exptbl">
                                    <div class="card mb-3" id="bdgtbl">
                                        <div class="card-header">
                                            <i class="fas fa-users"></i>
                                            Voters</div>
                                        <div class="card-body vtbl">
                                            <div class="table-responsive">

                                                <table id="candintbl" class=" text-center table table-bordered"
                                                    id="dataTable">
                                                    <thead>
                                                        <tr class="table-striped">
                                                            <th>Voter Number</th>
                                                            <th>Name</th>
                                                            <th>Already Voted?</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                    $sql = "SELECT ClassNumber , Name , Status from tblVoter";
                                                        $result = $link->query($sql);
                                                        if ($result->num_rows > 0) {
                                                    
                                                            while ($row = $result->fetch_assoc()) {
                                                                if ($row['Status'] == 'True') {
                                                                echo "<tr class= 'table-success'>";  
                                                                }
                                                                echo "<td>".$row['ClassNumber']."</td>";
                                                                echo "<td>".$row['Name']."</td>";
                                                                echo "<td>".$row['Status']."</td>";                 
                                                                echo "</tr>";
                                                            }
                                                        }
                                                    
                                                ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Tab panes -->
                        <div class="tab-content container-fluid ">
                            <br>

                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>
        <br>
        <br>
        <br>
        <footer class="sticky-footer">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Passerelles numériques Philippines SBO Election 2019</span>
                </div>
            </div>
        </footer>

        </div>
        <!-- /.content-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body text-center"><span>
                            <h5><i class="fa fa-question-circle" aria-hidden="true"></i>
                        </span> Are You Sure You Want To Log Out?</h5>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="js/sb-admin.min.js"></script>
        <script src="js/yol.js"></script>


    </body>

    </html>