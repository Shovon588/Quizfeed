<?php
session_start();
require("sessionCheck.php");
$id=$_SESSION['id'];

?>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
<style>
    @import url('https://fonts.googleapis.com/css?family=Exo+2');
    @import url('https://fonts.googleapis.com/css?family=Lobster');

    .dropdown-toggle::after {
        display: none;
    }

    .dropdown-item {
        padding: 6%;
        font-family: "Exo 2";
    }

    .d-flex {
        float: left;
    }

    .iconlinks {
        float: right;
    }
</style>
<div class="d-flex">
    <div class="dropdown mr-1">
        <button type="button" class="btn btn-secondary dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="130,0" style="background-color:black;">
            <i class="fa fa-bars"></i>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
            <a class="dropdown-item" href="homepage.php">Home</a>
           <!-- <a class="dropdown-item" href="quizInfo.php">Quiz</a>-->
            <a class="dropdown-item" href="questionArchive.php">Questions</a>
            <a class="dropdown-item" href="calendar.php">Calendar</a>
            <a class="dropdown-item" href="createQuiz.php">Add Quiz</a>
            <a class="dropdown-item" href="createProblem.php">Add Questions</a>
            <a class="dropdown-item" href="aboutUs.php">About Us</a>
        </div>
        <nobr style="font-family:Lobster; font-size:140%">&nbsp; Quiz Feed</nobr>
    </div>
</div>
<div class="iconlinks">
    <a href="settings.php" style="color: #000000;">
        <span class="fa fa-cog" style="font-size:200%; padding-left:20px;"></span>
    </a>
    <a href="profile.php" style="color: #000000;">
        <span class="fa fa-user" style="font-size:200%; padding-left:20px;"></span>
    </a>
    <a href="logout.php" style="color: #000000;">
        <span class="fa fa-sign-out" style="font-size:200%; padding-left:20px;"></span>
    </a>
</div>

<!DOCTYPE html>
<html>

<head>
    <title>Calendar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script>
        $(document).ready(function() {
            var calendar = $('#calendar').fullCalendar({
                editable: true,
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                events: 'calendarLoad.php',
                selectable: true,
                selectHelper: true,

            });
        });
    </script>
</head>

<body style="margin:5% 5% 5% 5%">

    <br>


    <center>
        <div id="calendar" style="width:800px;margin-top:5%"></div>
    </center>

</body>

</html>