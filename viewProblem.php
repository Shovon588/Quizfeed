<?php
  session_start();
  include 'sessionchk.php';
  include 'connectToDB.php';
  
  $tempid = $_GET['problemID'];
  $sql = $conn->query("SELECT * FROM `bose_add_question` WHERE `problemId` = '$tempid'" );
  $res = $sql->fetch_assoc();
  if($res['publicOrPrivate'] == '1' && $res['problemSetter']!=$personID ) die("Sorry! You can't view this problem!");
  
?>

<html>
<head>
    <title>
        View problem
    </title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    />
   
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.7.1/katex.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.quilljs.com/1.3.6/quill.snow.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.quilljs.com/1.3.6/quill.bubble.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.quilljs.com/1.3.6/quill.core.css"
      rel="stylesheet"
    />
    <link
      href="https://highlight.js/monokai-sublime.min.css"
      rel="stylesheet"
    />
    <link
      href="createProblem.css"
      rel="stylesheet"
      type="text/css"
    />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />

    
</head>

<body style="margin: 5% 5% 5% 5%; width:auto;">

    <div class="container-fluid">
    
        <div class="row">
            <div class="col-sm-2">
            
            </div>
            <div class="col-sm-8">
            <?php
                  $hProblemID = $_GET['problemID'];
                  $ageiSolved = $conn->query("SELECT * FROM bose_submission WHERE userId='$personID' AND problemId='$hProblemID' ") ;
                  if( $ageiSolved->num_rows > 0 ) echo "<div class=\"alert alert-warning\">You have submitted this problem</div>";
                  
                ?>
              <label>Question ID: #
                <a href="#" id = "problemID">
                  <?php echo $_GET['problemID']; ?> </a>
                </label>
                <h4 id="problemTitle"></h4>
                <div id="problemDescription">asas</div>
                <div class="card-columns" id="divOptions">

                </div>
                
                <button id = "judgeMe" class="btn btn-primary">Judge</button>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script src="viewProblem.js"></script>
</html>