<?php
/* this script is used to update the passwords from excel file*/
require "config.php";

$file = fopen("password/2021Codes.csv","r");
$xn = 0; 
$arr = [];
$x = [];
while(! feof($file))
  {
    array_push($arr,fgetcsv($file));
  }

for ($i=0; $i < sizeof($arr); $i++) { 
    foreach($arr[$i] as $value){
        $x[$i] = $value;
      }
  }

fclose($file);

for ($i=1; $i <= 72 ; $i++) { 
    $sql = "update tblVoter set password ='".md5($x[$i-1])."' where ClassNumber = '$i'";
    if ($link->query($sql) != true) { 
            echo "Error";
    }
}
$link->close();
?>