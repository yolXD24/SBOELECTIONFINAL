<?php
session_start();
ini_set('display_errors', 1);
require_once "config.php";
$cn = $_POST["cn"];
$email = $_POST["email"];
$pwd = $_POST["pw"];   


$password = md5($pwd);

$resp= null;


$sql1 = "SELECT ClassNumber , Status ,password FROM tblVoter where email ='$email' and ClassNumber = '$cn' and password = '$password' ";
$result = $link->query($sql1);
if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $_SESSION["ClassNumber"] = $row['ClassNumber'];
        $_SESSION["login"] == true;
        $resp  =  $row['Status'];
    }

    echo $resp;
    
} else {
    $sql2 = "SELECT ClassNumber , Status ,password FROM tblVoter2 where email ='$email' and ClassNumber = '$cn' and password = '$password' ";
    $result2 = $link->query($sql2);
    if ($result->num_rows > 0) {

        while ($row = $result2->fetch_assoc()) {
            $_SESSION["ClassNumber"] = $row['ClassNumber'];
            $_SESSION["login"] == true;
            $resp  =  $row['Status'];
        }
        echo $resp;
        
    }
    else{
        echo 0;
    }
}

$link->close();

?>