<?php
//session_start();
require("connectToDB.php");
//require("sessionCheck.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.material.min.css">
    <title>Upcoming Quiz</title>
</head>

<body>

    <?php
    $sql = "SELECT * FROM  bose_quiz_info WHERE startTime<CURRENT_TIMESTAMP";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        ?>
        <h3 align="center">Previous Quiz</h3>

        <table class="mdl-data-table" id='prequiz' style="border:3px solid black;white-space:nowrap;font-size:15px;">
            <thead>
                <tr>
                    <th>Quiz Title</th>
                    <th>Started</th>
                    <th>Ended</th>
                </tr>
            </thead>

            <tbody>

                <?php


                while ($row = $result->fetch_assoc()) {
                    $title = $row['quizTitle'];
                    $quizID = $row['quizID'];
                    $min = strtotime($row['startTime']) - (time() + 21600);
                    $min = $min / 60;

                    $hour = $min / 60;
                    $day = floor($hour / 24);
                    $hour = floor($hour - ($day * 24));


                    echo "<tr><td>" . "<a href='http://quizfeed.selisestaging.com/quizArena?quizId=$quizID'>$title</a>" . "</td><td>" . date("M d,Y h:i A", strtotime($row['startTime'])) . "</td><td>" . date("M d,Y h:i A", strtotime($row['endTime'])) . "</td></tr>";
                }
            } else {
                echo "<h2 align='center'>No previous quiz available</h2>";
            }

            ?>

        </tbody>

    </table>

</body>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.material.min.js"></script>

<script>
    $(document).ready(function() {
        $('#prequiz').DataTable({
            pageLength: 5,
            lengthMenu: [
                [5, 10, 20, -1],
                [5, 10, 20, "Show All"]
            ]
        });
    });
</script>
<style>
    .pagination {
        padding-left: 20px
    }
</style>


</html>