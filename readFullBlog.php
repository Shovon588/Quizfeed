<?php
session_start();
require("sessionCheck.php");
require("connectToDB.php");

if (isset($_GET['blogID'])) {
    $blogID = $_GET['blogID'];
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Read blog</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body style="margin:5% 5% 5% 5%">
    <?php require("header.php"); ?>

    <br><br><br><br><br>
    <div class="container-fluid">
        <div class="row">


            <div class="col-sm-2">
            </div>

            <div class="col-sm-8" style="background-color:mintcream;border:3px solid black">
                <?php
                $query = "SELECT * FROM bose_blog where `blogNo`='$blogID'";
                $result = mysqli_query($conn, $query);


                while ($row = $result->fetch_assoc()) {
                    $title = $row['blogTitle'];
                    $blog = $row['blogContent'];
                    $time = $row['time'];

                    ?>
                    <center><a style="font-size:40px;"><?php echo "" . $title ?> </a></center>
                    <h5 align="center" style="color:yellowgreen"><?php echo "Published on: ";
                                                                    echo date("M d,Y h:i A", $time) ?></h5>
                    <div style="font-size:20px;border-top:3px solid black;margin-top:3%"><br><?php echo "" . $blog ?></div>
                <?php } ?>

            </div>

            <div class="col-sm-2">
            </div>
        </div>
    </div>



    <div class="container-fluid" style="margin-top:3%">
        <div class="row">


            <div class="col-sm-3">
            </div>

            <div class="col-sm-6" style="background-color:white;border:3px solid black">

                <center><a style="font-size:40px;">Comments</a></center>

                <a style="font-size:20px" href='#comment' data-toggle='modal'>Write comment</a>


                <!-- Write comment modal -->
                <div id="comment" class="modal">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-footer" style="border-top:0px">
                                <button class="btn" data-dismiss="modal"><i class="fa fa-close" style="font-size:20px;"></i></button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    <?php require("writeComment.php"); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>



                <br><br>
                <?php
                //fetch comments


                $query = "SELECT * FROM bose_comments where `blogID`='$blogID' order by time desc";
                $result = mysqli_query($conn, $query);
                $match  = mysqli_num_rows($result);


                if ($match == 0) { ?>
                    <br><br><br><br><br><br>
                    <div style=" height:max-content;margin-bottom:20px;padding:15px;border-top:3px solid black">
                        <h1 align="center">No comments right now!!</h1>
                    </div>

                <?php

            } else {
                while ($row = $result->fetch_assoc()) {
                    $userID = $row['userID'];
                    $comment = $row['comment'];
                    $userName = $row['userName'];
                    $time = $row['time'];
                    $commentID = $row['commentID'];

                    $q = "select fullName from bose_user_profile where id=$userID limit 1";
                    $re = mysqli_query($conn, $q);

                    if ($re) {
                        while ($r = $re->fetch_assoc()) {
                            if ($r['fullName']) {
                                $userName = $r['fullName'];
                            }
                        }
                    }

                    ?>
                        <br>
                        <div style="height:max-content;margin-bottom:20px;padding:15px;border-top:3px solid black;">

                            <a style="font-size:20px;"><?php echo "By: " . $userName . "<br>At: " . date("M d,Y h:i A", $time); ?></a>
                            <br><br>
                            <div style="font-size:25px"><?php echo "" . $comment; ?></div><br>

                            <?php
                            if ($userID == $_SESSION['id']) {
                                echo "<a href='http://quizfeed.selisestaging.com/deleteComment.php?commentID=$commentID&blogID=$blogID' style='font-size:15px'>Delete</a>";
                            }

                            ?>
                        </div>

                    <?php
                }
            }
            ?>

            </div>

            <div class="col-sm-3">
            </div>
        </div>
    </div>


</body>

</html>