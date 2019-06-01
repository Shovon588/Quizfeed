<?php

include "connectToDB.php";

$email=$_POST['email'];
$password=hash('sha512',$_POST['password']);


$emailsearch = "SELECT * FROM `bose_user_profile` WHERE `email`='$email' and `password`='$password' and `isEmailConfirmed`='1'";

$searchresult = mysqli_query($conn, $emailsearch);
$matchemail  = mysqli_num_rows($searchresult);

if ($matchemail > 0) {
    session_start();
    $search = "SELECT `id` FROM `bose_user_profile` WHERE `email`='$email' ";
    $result = mysqli_query($conn,$search);

    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
    }
    $_SESSION['id']=$id;
    $_SESSION['email']=$email;
    if($_POST['remember']){
        setcookie($id,$email,$password,time()+86400);
    }

    header("Location: homepage.php");
}
else{
    $emailsearch = "SELECT * FROM `bose_user_profile` WHERE `email`='$email' and `password`='$password' and `isEmailConfirmed`='0'";
    $searchresult = mysqli_query($conn, $emailsearch);
    $matchemail  = mysqli_num_rows($searchresult);

    if ($matchemail > 0) {
        $message = "Your email is not verified.\\nPlease verify your email to continue.";

        echo "<script type='text/javascript'>alert('$message');
    window.location.href='index.php';
    
    </script>";

    }
    else{
        $message = "Incorrect email or password!!";

        echo "<script type='text/javascript'>alert('$message');
    window.location.href='index.php';
    
    </script>";
    }


}


?>