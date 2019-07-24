<?php 
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

    <title>Candidates</title>
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
        
        body {
            overflow-x: hidden;
        }
        
        .vtbl th,
        .vtbl td {
            font-size: 18px;
        }
        
        .addC {
            float: right;
        }
        
        .btn {
            padding: 2px 6px;
        }
        
        .modal-header {
            background: #009DE1;
            color: white;
        }
        
        .modal-header img {
            height: 50px;
            margin-right: 15em;
        }
        
        #sub {
            padding: 10px;
            font-weight: bold;
        }
    </style>

</head>

<body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

        <p class="navbar-brand mr-1" id="title" href="#"><img class="logo" src="https://www.passerellesnumeriques.org/wp-content/uploads/2016/03/pn-logo.png">SBO ELECTION 2019
            </a>
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

        <!-- Sidebar -->

        <div id="content-wrapper">

            <div class="container-fluid">
                <small>
                    <h4>Manage Candidates<small> <sub><small> </small></sub>
                </small>
                </small>
                </h4>
                <hr>

                <div class="card mb-3 " id="bdgtbl">
                    <div class="card-header">
                        <i class="fas fa-user-friends"></i> Candidates
                        <span><button class="btn btn-primary addC" data-toggle="modal" data-target="#Add"><i
                                    class="fas fa-user-plus"></i> Add
                                Candidates</button></span>
                    </div>
                    <div class="card-body vtbl">
                        <div class="table-responsive">
                            <table id="candintbl" class=" text-center table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="table-striped">
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        $sql = "SELECT
                                        tblVoter.Name as name, 
                                        COUNT(tblVotes.CandidateId) AS Votes ,tblCandidates.CandidateId as ids,tblVotes.CandidateId as cn
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
                                                echo '<td><button class="btn btn-primary deleteRow" id="' . 
                                                $row['ids'] ."_".$row['cn']. '" ><i class="fas fa-trash " ></i> Delete</button></td>';
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

                <!-- The Modal -->
                <div class="modal fade" id="Add">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <span><img src="logo.png" alt="pnlogo"></span>
                                <h3 class="modal-title "><b> Select Candidates</b></h3>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <form action="add.php" method="POST">

                                    <div class="row">

                                        <div class="col-md-4">
                                            <?php 
                                            $sql = "SELECT ClassNumber as cn ,Name as name from tblVoter where ClassNumber Between 1 and 24";
                                            $id = 1;	
                                            $result = $link->query($sql);
                                            if ($result->num_rows > 0) {

                                                while ($row = $result->fetch_assoc()) {
                                                    // echo $row['cn'].'  '.$row["name"] ;
                                                    // echo "<br>";

                                                    echo '<div class="custom-control custom-checkbox">';
                                                    echo "";
                                                    echo '<input type="checkbox" class="custom-control-input single-checkbox" value="'.$row["cn"].'" id="customCheck'.$id.'" name="candid[]">';
                                                    echo "";
                                                    echo '<label class="custom-control-label" for="customCheck'.$id.'">'.$row["name"].'</label>';
                                                    echo "";
                                                    echo '</div>';
                                                    $id+=1;
                                                    
                                                }
                                            }

                                        ?>
                                        </div>


                                        <div class="col-md-4">
                                            <?php 
                                                    $sql = "SELECT ClassNumber as cn ,Name as name from tblVoter where ClassNumber Between 25 and 48";
                                                    $id = 25;	
                                                    $result = $link->query($sql);
                                                    if ($result->num_rows > 0) {

                                                        while ($row = $result->fetch_assoc()) {
                                                            echo '<div class="custom-control custom-checkbox">';
                                                            echo "";
                                                            echo '<input type="checkbox" class="custom-control-input single-checkbox" value="'.$row["cn"].'" id="customCheck'.$id.'" name="candid[]">';
                                                            echo "";
                                                            echo '<label class="custom-control-label" for="customCheck'.$id.'">'.$row["name"].'</label>';
                                                            echo "";
                                                            echo '</div>';
                                                            $id+=1;		
                                                        }
                                                    }
                                                ?>
                                        </div>
                                        <div class="col-md-4">
                                            <?php 
                                                $sql = "SELECT ClassNumber as cn ,Name as name from tblVoter where ClassNumber Between 49 and 72";
                                                $id = 49;	
                                                $result = $link->query($sql);
                                                if ($result->num_rows > 0) {

                                                    while ($row = $result->fetch_assoc()) {
                                                        echo '<div class="custom-control custom-checkbox">';
                                                        echo "";
                                                        echo '<input type="checkbox" class="custom-control-input single-checkbox" value="'.$row["cn"].'" id="customCheck'.$id.'" name="candid[]">';
                                                        echo "";
                                                        echo '<label class="custom-control-label" for="customCheck'.$id.'">'.$row["name"].'</label>';
                                                        echo "";
                                                        echo '</div>';
                                                        $id+=1;
                                                    }
                                                }
                                                $link->close(); 
                                                ?>
                                        </div>
                                    </div>
                                    <br>


                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <input type="button" id="sub" value="confirm" class="btn btn-primary">
                                </form>
                                </div>
                            </div>

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

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.deleteRow').click(function() {
                var num = this.id.split('_')
                var row = this;
                $.ajax({
                    url: 'deleteCandidates.php',
                    type: 'POST',
                    data: {
                        id: num[0],
                        cn: num[1]
                    },
                    success: function(response) {
                        if (response == 1) {
                            $(row)
                                .closest('tr')
                                .css('background', 'skyblue')
                            $(row)
                                .closest('tr')
                                .fadeOut(800, function() {
                                    $(row).remove()
                                    location.reload();
                                })
                        } else {
                            alert(response)
                        }
                    }
                })
            });
        });

        var count = 0;
        var truth = false;

        $('.single-checkbox').on('change', function() {
            count = $('.single-checkbox:checked').length;
            if ($('.single-checkbox:checked').length > 18) {
                this.checked = false;
                alert("You can only choose up to 18 Candidates!")
            }
        });
        $('#sub').click(function() {
            if (confirm("Confirm Submission ", "Confirmation!")) {
                $(this).attr('value', 'submit');
                $(this).attr('type', 'submit');
            }

        });
    </script>
</body>

</html>