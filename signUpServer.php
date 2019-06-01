<?php
include "connectToDB.php";

$email=$_POST['email'];
$password=hash('sha512',$_POST['password']);

$emailsearch = "SELECT * FROM `bose_user_profile` WHERE email='$email'";
$searchresult = mysqli_query($conn, $emailsearch);
$matchemail  = mysqli_num_rows($searchresult);

if ($matchemail > 0) {
    $message = "Already registered with this email.";

    echo "<script type='text/javascript'>alert('$message');
    window.location.href='index.php';
    
    </script>";
    die('window.location.href = "index.php";');  
    
}
$token = 'qwertzuiopasdfghjklyxcvbnmQWERTZUIOPASDFGHJKLYXCVBNM0123456789!$/()*';
				$token = str_shuffle($token);
				$token = substr($token, 0, 10);

$query = "INSERT INTO `bose_user_profile` (`email`,`password`,`token`) VALUES('$email','$password','$token')";

$result = mysqli_query($conn, $query);

require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                            // Enable SMTP authentication
$mail->Username = 'jahanhaque7@gmail.com';          // SMTP username
$mail->Password = '12priyoshi34'; // SMTP password
$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                 // TCP port to connect to

$mail->setFrom('jahanhaque7@gmail.com', 'Quizfeed');
$mail->addReplyTo('jahanhaque7@gmail.com', 'Quizfeed');
$mail->addAddress($email);   // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->isHTML(true);  // Set email format to HTML

$bodyContent .= " Hey there! You just signed up for Quizfeed. Please click on the link below to verify your account:<br><br>
                    
<a href='http://quizfeed.selisestaging.com/confirm.php?email=$email&token=$token'>Click to verify.</a>

<br><br>
Thank You
<br>
Regards by Quizfeed team.
";

$mail->Subject = 'Email from Quizfeed';
$mail->Body    = $bodyContent;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} 

if ($result) {
    $_SESSION['email']=$email;
    $message = "An email has been sent.\\n Please check the email to varify your account.";
    echo "<script type='text/javascript'>alert('$message');
    window.location.href='index.php';
    
    </script>";
    echo 'window.location.href = "index.php";';    
} 
else {

    echo $conn->error;
    die();
    $message = "An error has been occured. Please try again.";

    echo "<script type='text/javascript'>alert('$message');
    window.location.href='index.php';
    
    </script>";
    echo 'window.location.href = "index.php";';  
    
}


?>