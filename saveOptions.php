<?php
 session_start();
  include 'sessionchk.php';

include 'connectToDB.php';
/*
    questID: problemID,
                    optionid: optionID,
                    optiondes: optionDescript,
                    iscorr: optionChecked

*/

$questID = $_POST['questID'];
$optionid = $_POST['optID'];
$optiondes = $_POST['optiondes'];
$iscorr = $_POST['WorR'];



$sql = "


INSERT INTO `bose_add_option`
(`problemId`,
`optionId`,
`optionDescription`,
`wrongOrRight`)
VALUES
($questID , '$optionid',$optiondes,'$iscorr')


";

if( $conn->query($sql) === TRUE ) echo '1';
else echo "-1";


?>
