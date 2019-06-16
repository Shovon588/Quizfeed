<?php
session_start();
require("sessionCheck.php");
require("connectToDB.php");
$id = $_SESSION['id'];

?>


<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style type="text/css">
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
            background-color: white;
            padding: 20px;
            margin-top: 20px;
            border: 3px solid black;
            align: middle;
            border-radius: 15%;

        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }


        @media screen and (max-width: 800px) {

            .leftcolumn,
            .rightcolumn {
                width: 100%;
                padding: 0;
            }
        }

        .bs-example {
            margin: 20px;
        }

        @media screen and (min-width: 992px) {
            .modal-lg {
                width: 950px;
                /* New width for large modal */
            }
        }
    </style>
</head>

<body style="margin-top:5%">
    <?php require("header.php"); ?><br><br><br><br>



    <div class="container-fluid">
        <div class="row">


            <div class="col-sm-2">
            </div>

            <div class="col-sm-8">
                <?php

                $query = "select * from bose_blog where bloggerID=$id";
                $result = mysqli_query($conn, $query);

                if ($result->num_rows == 0) {

                    ?>
                    <div class="card" style="height:max-content;background-color:aquamarine;margin-top:20%;border:2px solid black;">
                        <h1 align="center">You don't have any blogs right now!!</h1>
                    </div>

                <?php

            } else {
                while ($row = $result->fetch_assoc()) {
                    $title = $row['blogTitle'];
                    $blog = $row['blogContent'];
                    $time = $row['time'];
                    $blogID = $row['blogNo'];

                    ?>
                        <div class="card" style="height:max-content;background-color:white;margin-bottom:5%;border:2px solid black;">

                            <h3><?php echo "" . $title; ?></h3>
                            <h5><?php echo "Published on: " . date("M d,Y h:i A", $time); ?> </h5>
                            <br>
                            <p style="font-size:17px"><?php echo "" . substr($blog, 0, 275) . "   ....." . "<a href='http://quizfeed.selisestaging.com/readFullBlog?blogID=$blogID'> Read full blog</a>"; ?></p>

                            <?php echo "<a style='color:red;font-size:17px' href='http://quizfeed.selisestaging.com/deleteBlog.php?blogID=$blogID'>Delete blog</a>" ?>
                            <?php ?>
                        </div>

                    <?php
                }
            }
            ?>
            </div>

            <div class="col-sm-2">
            </div>
        </div>
    </div>


</body>

</html>