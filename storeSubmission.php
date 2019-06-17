<?php 

session_start();
include 'sessionchk.php';
include 'connectToDB.php';
$quizId = -1;
if(isset($_POST['quizID']))
    $quizId = $_POST['quizID'];
//echo "quizID: ".$quizId."\n";
$problemId = $_POST['problemId'];
$isOK = $_POST['isOK'];

$prevSolved = "SELECT * FROM `BOSE_submission` WHERE `problemId` = '$problemId' AND `userId`='$personID' ";
$res = $conn->query($prevSolved);
if($res->num_rows > 0) die( "You are not eligible to solve this problem");


$sql = "INSERT INTO `BOSE_submission` (`problemId`,`userId`,`rightOrWrong`) VALUES ('$problemId','$personID','$isOK')";
if( $conn->query($sql) === TRUE) {
    echo "submission stored!";

    $inc = 1;
    if($isOK == "0") $inc = 0; 
    $inc = 1;
    $updateProbInfo = "
        UPDATE `BOSE_add_question`
        SET
        solveCount = solveCount + '$inc' ,
        submissionCount = submissionCount + 1
        WHERE `problemId`='$problemId'
    ";
    if($conn->query($updateProbInfo)==TRUE);
    else die( $conn->error );

    $scores = $conn->query("SELECT `weight`,`penalty` FROM `BOSE_quiz_problem` WHERE `problemID` = '$problemId' AND `quizID`='$quizId'");
    $dtscores = $scores->fetch_assoc();

    $inc = $dtscores['weight'];
    if($isOK=="0") $inc = 0 - $dtscores['penalty'];

    $performancerow = $conn->query("SELECT * FROM `BOSE_quiz_performance` WHERE `quizID`='$quizId' AND `userID`='$personID' ");

    if( $performancerow->num_rows > 0 );
    else{
        $conn->query("INSERT INTO `BOSE_quiz_performance` (`quizID`,`userID`) VALUES ('$quizId','$personID') ");
    }


    $updatePerformance = "
        UPDATE `BOSE_quiz_performance`
        SET 
        score = score+'$inc'
        WHERE `quizID`='$quizId' AND `userID`='$personID'
    ";
    if($conn->query($updatePerformance) == TRUE);
    else die("performance added!");
    
}
else echo "submission not stored";

?>