<?php
  session_start();
  include 'sessionchk.php';
?>


<?php 

    include 'connectToDB.php';
    $problemID = $_POST['problemid'];
    $sql = "SELECT * FROM `bose_add_question` WHERE `problemId`=$problemID ";
    $result = $conn->query($sql);
    //if( $result->num_rows<=0 ) echo $problemID."lololo";
    $row = $result->fetch_assoc();
    
    echo json_encode($row);

?>
