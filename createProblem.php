<!DOCTYPE html>
<html>

<head>
    <title>Create Questions</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.7.1/katex.min.css" rel="stylesheet" />
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet" />
    <link href="https://cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet" />
    <link href="https://cdn.quilljs.com/1.3.6/quill.core.css" rel="stylesheet" />
    <link href="https://highlight.js/monokai-sublime.min.css" rel="stylesheet" />
    <link href="createProblem.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />

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

</head>

<body style="margin:5% 5% 5% 5%">

    <div class="d-flex">
        <div class="dropdown mr-1">
            <button type="button" class="btn btn-secondary dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="130,0" style="background-color:black;">
            <i class="fa fa-bars"></i>
        </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                <a class="dropdown-item" href="homepage.php">Home</a>
                <!--<a class="dropdown-item" href="quizInfo.php">Quiz</a>-->
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

    <br />
    <br />
    <br />

    <center>
        <div class="container-fluid">
            <div class="row">
                <div class="col"></div>
                <div class="col-sm-8">
                    <div style="margin-bottom: 1%; margin-top: 1%;">

                        <input class="form-control" style="border-width: 0px 0px 1px 0px; border-radius: 0; border-color: #6e707d;" placeholder="Problem title" type="text" id="problemTitle" ; />
                    </div>

                    <div class="shadow bg-white rounded" name="editor" id="editor"></div>
                    <br />
                    <span><input type="checkbox" id = "pubOrPri"><label> Select if this problem is private.</label></span>

                    <!--------------OPTIONS LOAD ---------------------------->
                    <div class="card-columns" id="divOptions">

                    </div>

                    <!--------------OPTIONS LOAD ENDS ---------------------------->
                    <div class="alert alert-danger alert-dismissible fade show" id="errMsg">
                        <div class="Msg"></div>
                    </div>

                    <div class="alert alert-success alert-dismissible fade show" id="sucMsg">
                        <div class="Msg"></div>
                    </div>

                    <button class="w3-button w3-teal addCardButton">
            +add more option
          </button>
                    <button class="w3-button w3-green" id="saveQuestion">
            Save Question
          </button>
                </div>

                <div class="col"></div>
            </div>
            <br />
        </div>
    </center>
</body>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
    < script src = "https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.7.1/katex.min.js" >
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="quilljsInterface.js"></script>
<script src="createProblems_onLoad.js"></script>
<script src="saveQuestionlib.js"></script>

</html>
