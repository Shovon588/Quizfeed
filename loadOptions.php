<?php
  session_start();
  include 'sessionchk.php';

    include 'connectToDB.php';
    $Qid = $_POST['Qid'];

    $sql = "SELECT * FROM bose_add_option WHERE `problemId` = '$Qid'";
    $result = $conn->query($sql);
    $row = $result->fetch_all(MYSQLI_ASSOC);
    //print_r(json_encode($row));
    echo json_encode($row);

?>
