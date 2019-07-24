<?php
ini_set('display_errors',1);
session_start();
require "config.php";

$candid = $_POST["candid"];

for ($i = 0; $i < count($candid); $i++) {
    $sql = "INSERT INTO tblCandidates( ClassNumber )
    VALUES (' $candid[$i]')";
    

    if ($link->query($sql) === true) { //if query is successful
        $truth = true;
        header("Location: candidates.php");


    } else { 
        $truth = false;

        echo ("Error description: " . mysqli_error($sql));
    }

}

$link->close(); //disconnect from db
