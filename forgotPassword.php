<?php
session_start();
require("connectToDB.php");

if (isset($_POST['email'])) {

    $email = $_POST['email'];

    $emailsearch = "SELECT * FROM `bose_user_profile` WHERE `email`='$email'";
    $searchresult = mysqli_query($conn, $emailsearch);
    $matchemail  = mysqli_num_rows($searchresult);


    if ($matchemail > 0) {

        while ($row = $searchresult->fetch_assoc()) {
            $id = $row['id'];
        }

        $vkey = md5(time() . $id);

        $query = "UPDATE `bose_user_profile` SET `vkey`='$vkey' where id=$id";
        $result = mysqli_query($conn, $query);


        //=========================================================phpMailer===================================================
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

        $bodyContent = '<h1>Love from Quizfeed.</h1>';
        $bodyContent .= "<br>Reset your password by clicking the link below:<br>
        <a href='http://quizfeed.selisestaging.com/changePass.php?vkey=$vkey'>Change Password!</a><br><br>
        Thank You
        <br>
        Regards by Quizfeed team.";

        $mail->Subject = 'Email from Localhost By Quizfeed';
        $mail->Body    = $bodyContent;
        //=========================================================phpMailer===================================================

        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            $message = "An email has been sent to your account.\\nPlease check your email and change password.";

            echo "<script type='text/javascript'>alert('$message');
            window.location.href='index.php';
    
            </script>";
            echo 'window.location.href = "index.php";';
        }
    } else {
        $message = "Your email does not exist.\\nPlease type in a valid email.";

        echo "<script type='text/javascript'>alert('$message');
            window.location.href='forgotPassword.php';
    
            </script>";
        echo 'window.location.href = "forgotPassword.php";';
    }
}


?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<div class="form-gap"></div>
<div class="container">
    <div class="row">
        <div class="row">
            <div class="row">
                <br><br><br><br><br>
                <h1 align="center">Opps!! Seems like someone's password has been lost !</h1><br><br><br><br><br><br>

                <div class="col-md-4 col-md-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="text-center">
                                <h3><i class="fa fa-lock fa-4x"></i></h3>
                                <p>Fear not. You can reset your password here.</p>
                                <div class="panel-body">

                                    <form id="register-form" role="form" autocomplete="off" class="form" action="" method="post">

                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                                <input id="email" name="email" placeholder="email address" class="form-control" type="email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input name="submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                                        </div>

                                        <input type="hidden" class="hide" name="token" id="token" value="">
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>