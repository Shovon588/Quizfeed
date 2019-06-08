<?php

session_start();
$id=$_SESSION['id'];
include "connectToDB.php";

$data = "SELECT * FROM `bose_user_profile` WHERE `id`='$id' ";
$result = mysqli_query($conn, $data);


//Previous values from database for checking purposes
    while ($row = $result->fetch_assoc()) {
        $email=$row['email'];
        $fullName = $row['fullName'];
        $password = $row['password'];
        $birthDate = $row['birthDate'];
        $tShirt = $row['tShirt'];
        $profilePicture = $row['profilePicture'];
        $postalCode = $row['postalCode'];
        $country = $row['country'];
        $state = $row['state'];
        $city = $row['city'];
        $address = $row['address'];
        $phone = $row['phone'];
        $facebook = $row['facebook'];
        $twitter = $row['twitter'];
        $linkedin = $row['linkedin'];
        $github = $row['github'];

    }



//New values from form with condition

if(isset($_POST['email'])) $email=$_POST['email'];
if(isset($_POST['fullName'])) $fullName=$_POST['fullName'];
if (isset($_POST['dob'])) $birthDate = $_POST['dob'];
if (isset($_POST['tShirt'])) $tShirt = $_POST['tShirt'];
if (isset($_POST['zip'])) $postalCode = $_POST['zip'];
if (isset($_POST['country'])) $country = $_POST['country'];
if (isset($_POST['state'])) $state = $_POST['state'];
if (isset($_POST['city'])) $city = $_POST['city'];
if (isset($_POST['address'])) $address = $_POST['address'];
if (isset($_POST['phone'])) $phone = $_POST['phone'];
if (isset($_POST['facebook'])) $facebook = $_POST['facebook'];
if (isset($_POST['linkedin'])) $linkedin = $_POST['linkedin'];
if (isset($_POST['twitter'])) $twitter = $_POST['twitter'];
if (isset($_POST['github'])) $github = $_POST['github'];


//change password
if(isset($_POST['password'])){
    if(hash('sha512',$_POST['password'])==$password)
    {
        $password=hash('sha512',$_POST['password1']);

    $query = "UPDATE `bose_user_profile` SET `password`='$password' WHERE id='$id' ";
    $result=mysqli_query($conn,$query);

    if($result){
        $message = "Password updated.";

        echo "<script type='text/javascript'>alert('$message');
    window.location.href='settings.php';
    
    </script>";
    }
}
else{
        $message = "Incorrect old password.";

        echo "<script type='text/javascript'>alert('$message');
    window.location.href='settings.php';
    
    </script>";
}

}



//update profile picture
if (isset($_POST['upload'])) {
    $file = $id . "-" . $_FILES['file']['name'];
    $location = $_FILES['file']['tmp_name'];
    $folder = "upload/";


    $new_file = strtolower($file);
    $final_file = str_replace(' ', '-', $new_file);


    if (move_uploaded_file($location, $folder . $final_file)) {
        $sql = "UPDATE `bose_user_profile` SET `profilePicture`='$final_file' where id=$id";
        mysqli_query($conn, $sql);
        $message = "Profile picture updated.";

        echo "<script type='text/javascript'>alert('$message');
    window.location.href='profile.php';
    
    </script>";
    }
    else{
        $message = "Profile picture upload failed.";

        echo "<script type='text/javascript'>alert('$message');
    window.location.href='profile.php';
    
    </script>";
    }
}




//Query
$query = "UPDATE `bose_user_profile` SET `email`='$email', `fullName`='$fullName', `birthDate`='$birthDate', `tShirt`='$tShirt', `postalCode`='$postalCode', `country`='$country', `state`='$state', `city`='$city', `address`='$address', `phone`='$phone', `facebook`='$facebook', `twitter`='$twitter', `linkedin`='$linkedin', `github`='$github' WHERE id='$id' ";

$result=mysqli_query($conn,$query);

if($result){
    $message = "Settings updated.";

    echo "<script type='text/javascript'>alert('$message');
    window.location.href='settings.php';
    
    </script>";
}
else{
    echo $conn->error;
    die();
}


?>