<?php
//session_start();
//require("sessionCheck.php");
require("connectToDB.php");

if (isset($_GET['blogID'])) {
    $blogID = $_GET['blogID'];
    $id = $_SESSION['id'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Full Blog</title>
    <style>
        * {
            box-sizing: border-box;
        }

        /* Add a gray background color with some padding */
        body {
            font-family: Arial;
            padding: 20px;
            background: #f1f1f1;
        }

        /* Add a card effect for articles */
        .card {
            background-color: linen;
        }
    </style>
</head>

<body>
    <?php
    $query = "SELECT * FROM bose_blog where `blogNo`='$blogID'";
    $result = mysqli_query($conn, $query);


    while ($row = $result->fetch_assoc()) {
        $title = $row['blogTitle'];
        $blog = $row['blogContent'];
        $time = $row['time'];
        ?>
        <div class="row">
            <div class="card" style="width:100%">
                <h2 align="center"><?php echo "" . $title ?> </h1>
                    <h5 align="center" style="color:yellowgreen"><?php echo "Published on: ";
                                                                    echo date("M d,Y h:i A", $time) ?></h5>
                    <p align="center" style="margin-top:3%"><?php echo "" . $blog ?></p>
            </div>
        <?php } ?>

        <div class="card" style="width:100%;background-color:burlywood;padding-bottom:2%">
            <h3 align="center">Comments</h3>
            <?php echo "" . "<a style='font-size:20px' href='http://quizfeed.selisestaging.com/writeComment.php?blogID=$blogID'>Write new comment</a>"; ?>

            <?php
            //fetch comments

            $query = "SELECT * FROM bose_comments where `blogID`='$blogID' order by time desc";
            $result = mysqli_query($conn, $query);

            if (!$result) { ?>
                <br><br><br><br><br><br>
                <div class="card" style="height:max-content;background-color:white;margin-bottom:5%;border:2p x solid black;">
                    <h1 align="center">No comments right now!!</h1>
                </div>

            <?php

        } else {
            while ($row = $result->fetch_assoc()) {
                $userID = $row['userID'];
                $comment = $row['comment'];
                $userName = $row['userName'];

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
                    <div class="card" style="height:max-content;background-color:white;margin-bottom:2%;border:2px solid black;">

                        <b> <a style="font-size:15px;"><?php echo "By: " . $userName; ?></a><b><br><br />
                                <p><?php echo "" . $comment; ?> </p>
                    </div>

                <?php
            }
        }
        ?>
        </div>
    </div>
</body>

</html>