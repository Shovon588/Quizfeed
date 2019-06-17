<?php
session_start();
require("sessionCheck.php");
include "connectToDB.php";

$id = $_SESSION['id'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <title>My Questions</title>
</head>


<body style="margin: 5% 5% 5% 5%; width:auto;">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <a class="dropdown-item" href="quizInfo.php">Quiz</a>
        <a class="dropdown-item" href="questionArchive.php">Questions</a>
        <a class="dropdown-item" href="calendar.php">Calendar</a>
        <a class="dropdown-item" href="createQuiz.php">Add Quiz</a>
        <a class="dropdown-item" href="createProblem.php">Add Questions</a>
        <a class="dropdown-item" href="yourBlog.php">Blog</a>
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




  <br><br><br>


  <div class="container">
    <center>
      <h2>My Questions</h2>
    </center><br><br>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Serial No</th>
          <th>Question Title</th>
          <th>Privacy</th>
          <th>Difficulty</th>
          <th>Operation</th>
        </tr>
      </thead>



      <tbody>
        <?php
        $sql = "SELECT * FROM  BOSE_add_question WHERE problemSetter=$id ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          
          $serial = 0;
          while ($row = $result->fetch_assoc()) {
            $title = $row['problemTitle'];
            $privarcy = $row['publicOrPrivate'];
            $Qid = $row['problemId'];
            if ($privarcy == 1) $privacy = "Private";
            else $privacy = "Public";
            $sub = $row['submissionCount'];
            $solve = $row['solveCount'];
            $percent = ($solve / $sub) * 100;
            $percent=100-$percent;
            //die($percent);

            //echo 
            
            echo "<tr><td>" . $serial . "</td><td>" . "<a style='color:red' href='viewProblem.php?problemID=$Qid'>$title</a>" . "</td><td>" . $privacy . "</td><td>" . '
            <div class="progress">
              <div class="progress-bar" role="progressbar" style="width:'.$percent.'%"></div></div>' ."</td><td>" . "<a style='color:red' href='deleteQuestion.php?Qid=$Qid'>Delete</a>" . "</td></tr>";
            
              $serial++;
          }
        }
        else{
          echo "No Question added";
        }
        ?>
      </tbody>
    </table>
  </div>




</body>

</html>