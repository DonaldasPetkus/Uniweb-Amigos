<?php
$DBhost = "localhost";
  $DBuser = "vandenis_uniwebamigos2";
  $DBpass = "uniwebamigos2";
  $DBname = "vandenis_uniwebamigos2";
  
  $dbcon = new MySQLi($DBhost,$DBuser,$DBpass,$DBname);
    
     if ($DBcon->connect_errno) {
         die("ERROR : -> ".$DBcon->connect_error);
     }
?>