<?php
session_start();
require("sessionCheck.php");
require("connectToDB.php");

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

    <center>
        <a href="#upcoming" class="btn btn-lg btn-primary" data-toggle="modal">Upcoming Quiz</a>
        <a href="#previous" class="btn btn-lg btn-primary" data-toggle="modal">Previous Quiz</a>
    </center>


    <!-- Upcoming Quiz -->
    <div id="upcoming" class="modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="border:3px solid black;width:100%">
                <div class="modal-body">
                    <p>

                        <?php
                        include("upcomingQuiz.php");
                        ?>

                    </p>
                </div>
                <div class="modal-footer" style="border-top:0px">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Previpus Quiz -->
    <div id="previous" class="modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="border:3px solid black;width:100%">
                <div class="modal-body">
                    <p>

                        <?php
                        include("preQuiz.php");
                        ?>

                    </p>
                </div>
                <div class="modal-footer" style="border-top:0px">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-2">
            </div>

            <div class="col-sm-8">
                <?php
                $query = "select * from bose_blog";
                $result = mysqli_query($conn, $query);
                while ($row = $result->fetch_assoc()) {
                    $title = $row['blogTitle'];
                    $blog = $row['blogContent'];
                    $time = $row['time'];
                    $blogID = $row['blogNo'];

                    ?>
                    <div class="card" style="border:3px solid;">
                        <h3><?php echo "" . $title; ?></h3>
                        <h5><?php echo "Published on: " . date("M d,Y h:i A", $time); ?></h5><br>


                        <?php echo "" . "<a href='http://quizfeed.selisestaging.com/readFullBlog.php?blogID=$blogID'>Read full blog</a>"; ?>

                    </div>
                <?php } ?>
            </div>

            <div class="col-sm-2">
            </div>
        </div>
    </div>


</body>

</html>