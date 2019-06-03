<?php
session_start();
require("connectToDB.php");
require("sessionCheck.php");
$id = $_SESSION['id'];
?>


<!DOCTYPE html>
<html>
<title>Homepage</title>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style>
        * {
            box-sizing: border-box;
        }

        /* Add a gray background color with some padding */
        body {
            font-family: Arial;
            background: #f1f1f1;
        }

        /* Add a card effect for articles */
        .card {
            background-color: purple;
        }
    </style>
</head>

<body style="margin:5% 5% 5% 5%; width:auto;">
    <?php require("header.php"); ?>


    <div class="row" style="margin-top:5%">
        <div class="col-sm-10">
            <?php
            $query = "select * from bose_blog";
            $result = mysqli_query($conn, $query);
            while ($row = $result->fetch_assoc()) {
                $title = $row['blogTitle'];
                $blog = $row['blogContent'];
                $time = $row['time'];
                $blogID = $row['blogNo'];

                ?>
                <div class="card" style="height:max-content;background-color:white;margin-bottom:5%;border:2px solid black;">

                    <h5><?php echo "" . $title; ?></h5>
                    <h6><b><?php echo "Published on: " . date("M d,Y h:i A", $time); ?></b> </h6>
                    <br>
                    <p><?php echo "" . substr($blog, 0, 275) . "   ....." . "<a href='http://quizfeed.selisestaging.com/readFullBlog.php?blogID=$blogID' data-toggle='modal' data-target='#myModal'>Read full blog</a>"; ?></p>
                    <?php ?>
                </div>
                

            <?php } ?>


            <!-- Modal -->
            <style>
                .modal.show .modal-dialog {
                    margin-right: 50%;
                    margin-left:18%;
                }
            </style>
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog modal-lg">

                    <div class="modal-content" style="width:200%;margin-left:25%">
                        <div class="modal-body">
                            <?php require("readFullBlog.php"); ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="container">
                <!-- Trigger the modal with a button -->
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal1" style="width:170px;">Upcomming Quiz</button>

                <!-- Modal -->
                <style>
                    .modal-dialog {
                        max-width: 400px;
                        margin: 2% 5% 5% 30%;
                    }
                </style>
                <div class=" modal fade" id="myModal1" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content" style="width:230%;align:center">
                            <div class="modal-body">
                                <?php require("upcomingQuiz.php");  ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Trigger the modal with a button -->
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2" style="width:170px;margin-top:2%">Previous Quiz</button>

                <!-- Modal -->
                <div class=" modal fade" id="myModal2" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content" style="width:230%;">
                            <div class="modal-body">
                                <?php require("preQuiz.php");  ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>

</html>