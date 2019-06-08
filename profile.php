<?php
session_start();
require("sessionCheck.php");
include "connectToDB.php";

$id = $_SESSION['id'];

$sql = "select * from bose_user_profile where id ='$id' ";
$result = $conn->query($sql);

$dir = 'upload/';



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
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="profile.css" rel="stylesheet">


    <title>Profile</title>
</head>
<?php require 'header.php'; ?>

<body style="margin: 5% 5% 5% 5%">
    <br /><br /><br /><br /><br />
    <center>
        <img src="<?php echo "" . $dir . "" . $profilePicture ?>" class="avatar" style="height:10%; width:10%;">
        <br>
        <br>
        <form action="settingsServer.php" method="post" enctype="multipart/form-data">
            <div class="file">
                <label class="file-label">
                    <input class="file-input" type="file" name="file" style="display:none">
                    <span class="file-cta">
                        <span class="file-icon">
                            <i class="fas fa-upload"></i>
                        </span>
                        <span class="btn btn-light">
                            Browse Photo
                        </span>
                    </span>
                </label>
            </div>

            <button type="submit" class="btn btn-outline-secondary" name="upload">Upload</button>
        </form>

    </center>
    <br /><br /><br /><br /><br /><br />
    <div class="container-fluid">
        <form method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <h5>
                            <?php echo "" . $fullName; ?>
                        </h5>

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <a href="settings.php">
                        <input type="button" class="profile-edit-btn" name="btnAddMore" value="Edit Profile" />
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-work">
                        <p>Other Account Links</p>
                        <a href="<?php echo "http://" . $facebook; ?>">Facebook</a><br />
                        <a href="<?php echo "http://" . $twitter; ?>">Twitter</a><br />
                        <a href="<?php echo "http://" . $github; ?>">GitHub</a><br />
                        <a href="<?php echo "http://" . $linkedin; ?>">Linkedin</a><br />
                        <p>Your Contribution</p>
                        <a href="myBlog.php">My Blogs</a><br />
                        <a href="#">Exam Attended</a><br />
                        <a href="myQuiz.php">My Quiz</a><br />
                        <a href="myQues.php">My Questions</a><br />
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo "" . $email; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Phone</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo "" . $phone; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Date of Birth</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php if ($birthDate <> "0000-00-00") {
                                            echo "" . $birthDate;
                                        } ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Address</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo "" . $address; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>City</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo "" . $city; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Zip Code</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo "" . $postalCode; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>State</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo "" . $state; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Country</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo "" . $country; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>T-Shirt Size</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo "" . $tShirt; ?></p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </form>
    </div>

</body>

</html>