<?php 
    session_start();
    ini_set('display_errors', 1);
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

    <title>Result</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="js/yol.js"></script>


    <style>
    .vtbl {
        height: 500px;
        overflow: auto;
    }

    .vtbl th {
        font-size: 14px;
    }

    .vtbl td {
        font-size: 14px;
    }

    .active {
        color: #22bbea;
    }

    .fa-home {
        font-size: 25px !important;
    }
    </style>

</head>

<body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

        <p class="navbar-brand mr-1" id="title" href="#">SBO ELECTION 2019</a>
            <!-- Navbar Search -->
            <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">

                </div>
            </div>
            </div>

            <!-- Navbar -->
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="adminpanel.php"><span>  <i class="fas fa-home fa-fw" id="userIcon"></i></span></a>
                </li>
            </ul>
    </nav>


    <div id="wrapper">
        <div id="content-wrapper">
            <div class="container-fluid">
                <small>
                    <h4>Results<small> <sub><small> </small></sub></small>
                </small></h4>
                <hr>
                <!-- Tab panes -->
                <div class="tab-content container-fluid ">
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Budget Table-->
                            <div class="card mb-3" id="bdgtbl">
                                <div class="card-header">
                                    <i class="fas fa-user-friends"></i>
                                    Candidates</div>
                                <div class="card-body">
                                    <div class="table-responsive">

                                        <table id="budgetTable" class="table table-bordered" id="dataTable" width="100%"
                                            cellspacing="0">
                                            <thead>
                                                <tr class='text-center table-striped'>
                                                    <th>Rank</th>
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
                                                        tblCandidates.CandidateId order by Votes desc ";
                                                        
                                                        $result = $link->query($sql);
                                                        if ($result->num_rows > 0) {
                                                            $rank = 1;

                                                            while ($row = $result->fetch_assoc()) {
                                                                echo "<tr>";
                                                                echo "<td>".$rank."</td>";
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
                    </div>
                </div>

            </div>
        </div>
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
    <script>
    $(document).ready(function() {

    });
    </script>


</body>

</html>