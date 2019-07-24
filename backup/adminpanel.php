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

    <title>Admin Panel</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="js/yol.js"></script>


    <style>
        body {
            overflow-x: hidden;
        }
        
        .fas {
            font-size: 40px;
            color: white;
        }
        
        .fa-user-circle {
            font-size: 25px !important;
        }
        
        .menus {
            background: #22BBEA;
            padding-top: 45px;
            border-radius: 10px;
            color: white;
            height: 200px;
            width: 200px;
        }
        
        .menus:hover {
            background: #009DE1;
            text-decoration: none;
        }
        
        a:hover,
        a:focus {
            text-decoration: none;
        }
    </style>

</head>

<body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

        <p class="navbar-brand mr-1" id="title" href="#"><img class="logo" src="https://www.passerellesnumeriques.org/wp-content/uploads/2016/03/pn-logo.png">SBO ELECTION 2019</a>
            <!-- Navbar Search -->
            <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">

                </div>
            </div>


            <!-- Navbar -->
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link">Welcome Admin</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown no-arrow">
                    <p class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user-circle fa-fw" id="userIcon"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <p class="dropdown-item" href="404.html">Settings</a>
                                <div class="dropdown-divider"></div>
                                <p class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    Logout</a>
                        </div>
                </li>
            </ul>
    </nav>

    <div id="wrapper">

        <!-- Sidebar -->

        <div id="content-wrapper">

            <div class="container-fluid">
                <small>
                        <h4>Admin Panel<small> <sub><small> </small></sub>
                </small>
                </small>
                </h4>
                <hr>
                <br>
                <div class="container">
                    <!-- main content -->
                    <div class="container-fluid">
                        <div class="row counterCards">
                            <div class="col-md-4">
                                <center>
                                    <a href="candidates.php">
                                        <div class="menus">
                                            <i class="fas fa-user-edit"></i>
                                            <br>
                                            <br>
                                            <p class="h5">Manage Candidates</p>
                                        </div>
                                    </a>
                                </center>

                            </div>
                            <div class="col-md-4">
                                <center>
                                    <a href="dashboard.php">
                                        <div class="menus">
                                            <i class="fas fa-tachometer-alt"></i>
                                            <br><br>
                                            <p class="h5">Dashboard </p>
                                        </div>
                                    </a>
                                </center>
                            </div>
                            <div class="col-md-4">
                                <center>
                                    <a href="results.php">
                                        <div class="menus">
                                            <i class="fas fa-chart-line"></i>
                                            <br><br>
                                            <p class="h5">View Results </p>
                                        </div>
                                    </a>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
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
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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