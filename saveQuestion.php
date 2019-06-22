
<?php
  session_start();
  include 'sessionchk.php';




    include 'connectToDB.php';
    $setter = $personID;
  //echo "setter ".$personID."<br>";
    $pubOrPri = $_POST['pubOrPri'];
    $title = $_POST['questTit'];
    $description = $_POST['descrip'];
    //$questID = $_POST['questID'];

$sql = "  INSERT INTO `bose_add_question`
(
`problemTitle`,
`problemStatement`,
`problemSetter`,
`publicOrPrivate`)
VALUES
(
    
    '$title',
    $description,
    '$setter',
    '$pubOrPri'
) ";


if( $conn->query($sql) === TRUE ){
    echo $conn->insert_id;
}
else echo "-1";

?>
