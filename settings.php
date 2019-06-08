<?php
session_start();
require("sessionCheck.php");

include "connectToDB.php";

$id = $_SESSION['id'];

$data = "SELECT * FROM `bose_user_profile` WHERE `id`='$id' ";
$result = mysqli_query($conn, $data);



while ($row = $result->fetch_assoc()) {
    $email = $row['email'];
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

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="import" href="https://fonts.googleapis.com/css?family=Exo+2">
    <title>Settings</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css?family=Exo+2');
    @import url('https://fonts.googleapis.com/css?family=Lobster');

    ul {
        padding: 6%;
        font-family: "Exo 2";
        color: #ffffff;
    }

    li {
        font-size: 150%
    }

    .btn-primary,
    .btn-primary:hover,
    .btn-primary:active,
    .btn-primary:visited {
        background-color: #000000;
    }
</style>

<body style="margin:5% 5% 5% 5%">
    <div class="container">
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-bars"></i></button>
            <ul class="dropdown-menu">
                <li><a href="homepage.php">Home</a></li>
                <li><a href="#">Quiz</a></li>
                <li><a href="questionArchive.php">Questions</a></li>
                <li><a href="calander.php">Calander</a></li>
                <li><a href="#">Add Quiz</a></li>
                <li><a href="createProblem.php">Add Questions</a></li>
                <li><a href="aboutUs.php">About Us</a></li>
            </ul>
            <nobr style="font-family:Lobster; font-size:140%">&nbsp; Quiz Feed</nobr>
            <a href="logout.php" style="float:right; color: #000000;">
                <span class="glyphicon glyphicon-log-out" style="font-size:200%; padding-left:20px"></span>
            </a>

            <a href="profile.php" style="float:right; color: #000000;">
                <span class="glyphicon glyphicon-user" style="font-size:200%; padding-left:20px"></span>
            </a>

            <a href="settings.php" style="float:right; color: #000000;">
                <span class="glyphicon glyphicon-cog" style="font-size:200%; padding-left:20px"></span>
            </a>
        </div>
        <div class="nabil" style="width:45%; margin:10% 5% 5% 30%">
            <h2 align="center">Settings</h2>
            <ul class="nav nav-tabs">
                <li class="active"><a href="#basic_info">Basic info</a></li>
                <li><a href="#password">Password</a></li>
                <li><a href="#address">Address</a></li>
                <li><a href="#social">Social</a></li>
            </ul>

            <div class="tab-content">
                <div id="basic_info" class="tab-pane fade in active" style="margin-top:3em;">
                    <form action="settingsServer.php" method="post">
                        <div class="form-group">

                            <label for="name">Full name:</label>
                            <input type="text" class="form-control" placeholder="Enter your name" name="fullName" value="<?php echo "" . $fullName; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" name="email" value="<?php echo "" . $email; ?>">
                        </div>
                        <div class="form-group">
                            <label for="date">Date of birth:</label>
                            <input type="date" class="form-control" name="dob" value="<?php echo "" . $birthDate; ?>">
                        </div>
                        <div class="form-group">
                            <label for="tShirt">T-Shirt size:</label>
                            <input type="text" class="form-control" placeholder="Your t-shirt size" name="tShirt" value=<?php echo "" . $tShirt ?>>
                        </div>


                        <button type="submit" class="btn btn-default" style="margin:auto;display:block">Submit</button>

                    </form>
                </div>


                <div id="password" class="tab-pane fade">
                    <form action="settingsServer.php" method="post">
                        <div class="form-group">
                            <br /><br /><br />
                            <label for="pass">Previous password:</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter previous password" value="">
                        </div>
                        <div class="form-group">
                            <label for="npass">New password:</label>
                            <input type="password" id="password1" class="form-control" name="password1" placeholder="Enter new password" value="">
                        </div>
                        <div class="form-group">
                            <label for="cpass">Confirm password:</label>
                            <input type="password" id="password2" class="form-control" name="password2" placeholder="Confirm new password">
                        </div>
                        <script>
                            var password = document.getElementById("password1"),
                                confirm_password = document.getElementById("password2");

                            function validatePassword() {
                                if (password.value != confirm_password.value) {
                                    confirm_password.setCustomValidity("Passwords Don't Match");
                                } else {
                                    confirm_password.setCustomValidity('');
                                }
                            }

                            password.onchange = validatePassword;
                            confirm_password.onkeyup = validatePassword;
                        </script>
                        <button type="submit" class="btn btn-default" style="margin:auto;display:block">Submit</button>
                    </form>

                </div>





                <div id="address" class="tab-pane fade">
                    <form action="settingsServer.php" method="post">
                        <div class="form-group">
                            <br /><br />
                            <label for="zip">Zip/Postal code:</label>
                            <input type="text" class="form-control" name="zip" placeholder="Enter your postal code" value="<?php echo "" . $postalCode; ?>">
                        </div>
                        <div class="form-group">
                            <label for="country">Country:</label>
                            <input type="text" class="form-control" placeholder="Enter your country" name="country" value="<?php echo "" . $country; ?>">
                        </div>
                        <div class="form-group">
                            <label for="state">State:</label>
                            <input type="text" class="form-control" placeholder="Enter your state" name="state" value="<?php echo "" . $state; ?>">
                        </div>
                        <div class="form-group">
                            <label for="city">City:</label>
                            <input type="text" class="form-control" placeholder="Enter your city" name="city" value="<?php echo "" . $city; ?>">
                        </div>
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <input type="text" class="form-control" placeholder="Enter your address" name="address" value="<?php echo "" . $address; ?>">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="text" class="form-control" placeholder="Enter your mobile number" name="phone" value="<?php echo "" . $phone; ?>">
                        </div>
                        <button type="submit" class="btn btn-default" style="margin:auto;display:block">Submit</button>
                    </form>
                </div>

                <div id="social" class="tab-pane fade">
                    <form action="settingsServer.php" method="post">
                        <div class="form-group">
                            <br /><br />
                            <label for="zip">Facebook:</label>
                            <input type="text" class="form-control" placeholder="Facebook account link" name="facebook" value="<?php echo "" . $facebook; ?>">
                        </div>
                        <div class="form-group">
                            <label for="linkedin">Linkedin:</label>
                            <input type="text" class="form-control" name="linkedin" placeholder="Linkedin account link" value="<?php echo "" . $linkedin; ?>">
                        </div>
                        <div class="form-group">
                            <label for="twitter">Twitter:</label>
                            <input type="text" class="form-control" name="twitter" placeholder="Twitter account link" value="<?php echo "" . $twitter; ?>">
                        </div>
                        <div class="form-group">
                            <label for="github">Github:</label>
                            <input type="text" class="form-control" name="github" placeholder="Github account link" value="<?php echo "" . $github; ?>">
                        </div>
                        <button type="submit" class="btn btn-default" style="margin:auto;display:block">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <script>
        $(document).ready(function() {
            $(".nav-tabs a").click(function() {
                $(this).tab('show');
            });
        });
    </script>
</body>

</html>