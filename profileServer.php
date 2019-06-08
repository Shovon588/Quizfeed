<?php
session_start();
require("connectToDB.php");

$id=$_SESSION['id'];


if (isset($_POST['upload'])) {
    $file = rand(1000, 100000) . "-" . $_FILES['file']['name'];
    $location = $_FILES['file']['tmp_name'];
    $size = $_FILES['file']['size'];
    $type = $_FILES['file']['type'];
    $folder = "upload/";

    $new_size=$size/1024;
    $new_file=strtolower($file);
    $final_file = str_replace(' ', '-', $new_file);

    if (move_uploaded_file($location, $folder . $final_file)) {
        $sql = "INSERT INTO bose_user_profile (profilePicture) VALUES('$final_file') where id=$id ";
        mysqli_query($conn, $sql);
        header("Location: profile.php");
    }
    else{
        echo "Upload failed";
    }

}


?>
