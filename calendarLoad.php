<?php

//load.php

$connect = new PDO( 'mysql:host=intern-sls.cdts6wfxxv6z.eu-central-1.rds.amazonaws.com;dbname=bose', 'slsadmin', 'EMSAFNgw04ljnyKN4');


$data = array();

$query = "SELECT * FROM bose_quiz_info";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach ($result as $row) {
    $data[] = array(
        'id'   => $row["quizID"],
        'title'   => $row["quizTitle"],
        'start'   => $row["startTime"],
        'end'   => $row["endTime"]
    );
}

die( json_encode($data));

?>
