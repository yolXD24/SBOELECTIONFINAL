<?php
session_start();
require_once "config.php";
$pwd = $_POST["pw"];       

$password = md5($pwd);
$cn = $_SESSION["ClassNumber"];


$sql1 = "update tblVoter set password ='".$password."' WHERE ClassNumber = '$cn'";
$result = $link->query($sql1);
if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $_SESSION["ClassNumber"] = $row['ClassNumber'];
        $_SESSION["login"] == true;
    }
} else {
    echo $cn;
}

$link->close();
