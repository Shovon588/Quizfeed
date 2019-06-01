<?php 
  
$dbServerName = "intern-sls.cdts6wfxxv6z.eu-central-1.rds.amazonaws.com";
    $dbServerUserID = "slsadmin";
    $dbServerPass = "EMSAFNgw04ljnyKN4";
    $dbName = "bose";

    $conn = mysqli_connect( $dbServerName , $dbServerUserID , $dbServerPass , $dbName  );

  
    /*
    $dbServerName = "localhost";
    $dbServerUserID = "root";
    $dbServerPass = "";
    $dbName = "bose";

    $conn = mysqli_connect( $dbServerName , $dbServerUserID , $dbServerPass , $dbName  );
    */

?> 
