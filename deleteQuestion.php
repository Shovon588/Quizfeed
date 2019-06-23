<?php
session_start();
require("sessionCheck.php");
require("connectToDB.php");

if (isset($_GET[ 'Qid'])) {
    $Qid = $_GET[ 'Qid'];

}
$id = $_SESSION['id'];

$query="DELETE FROM bose_add_question WHERE problemId=$Qid";
$result=mysqli_query($conn,$query);


if($result)
{
//successful

header("Location: myQues.php.php");
}
