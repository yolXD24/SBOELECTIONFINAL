<?php 
session_start();
require_once 'config.php'?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Result</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="js/yol.js"></script>

    <style>
    body{
        font-family:'Arial',sans-serif;
    }

    tr th, td{
        text-align:justify;
    }
    .logo{
        height:50px;
        width:50px;
        float:left;
      
    }
    </style>
</head>

<body>
    <h2><span><img class="logo" src="https://www.passerellesnumeriques.org/wp-content/uploads/2016/03/pn-logo.png"></span>
2019 SBO ELECTION Results</h2>
    <table id="budgetTable" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr class='table-striped'>
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
                echo "<tr class='text-center'>";
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
    
</body>

</html>