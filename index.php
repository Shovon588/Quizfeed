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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="index.css">
  <title>Home</title>
</head>

<body>
  <div class="d-flex">
    <div class="dropdown mr-1">
      <button type="button" class="btn btn-secondary dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="130,0" style="background-color:black;">
        <i class="fa fa-bars"></i>
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
        <a class="dropdown-item" href="index.php">Home</a>
        <a class="dropdown-item" href="logOutCalendar.php">Calendar</a>
        <a class="dropdown-item" href="aboutUs.php">About Us</a>
      </div>
      <nobr style="font-family:Lobster; font-size:140%">&nbsp; Quiz Feed</nobr>
    </div>
  </div>

  <style>
    input[type=email],
    input[type=password] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }
  </style>


  <a href=" #" style="float:right;font-size:15px;font-family: Arial, Helvetica, sans-serif" onclick="document.getElementById('id01').style.display='block'" style="width:auto">Join now</a>

  <div id="id01" class="modal">
    <form class="modal-content animate" method="post" action="signInServer.php">
      <div class="imgcontainer">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
        <img src="student.png" alt="Avatar" class="avatar">
      </div>
      <div class="container">
        <label for="uname"><b>Email</b></label>
        <input type="email" placeholder="Enter Email" name="email" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>

        <button type="submit" class="modalbtn">Login</button>
        <label>
          <input type="checkbox" checked="checked" name="remember"> Remember me
        </label>
        <span class="psw">Forgot <a href="forgotPassword.php">password?</a></span>
      </div>
      <div class="container" style="background-color:#f1f1f1">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <span class="psw">Don't have an account? <a href=" #" style="float:right" onclick="document.getElementById('id02').style.display='block';document.getElementById('id01').style.display='none'" style="width:auto">Sign
            up</a></span>
      </div>
    </form>
  </div>



  <div id="id02" class="modal">
    <form class="modal-content animate" method="post" action="signUpServer.php">
      <div class="imgcontainer">
        <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
        <img src="student.png" alt="Avatar" class="avatar">
      </div>
      <div class="container">

        <label for="email"><b>Email</b></label>
        <input type="email" placeholder="Enter Email" name="email" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required id="password">

        <label for="psw"><b>Confirm Password</b></label>
        <input type="password" placeholder="Re-Enter Password" name="confirmpassword" required id="confirm_password">

        <button type="submit" class="modalbtn">Sign up</button>
      </div>
      <div class="container" style="background-color:#f1f1f1">
        <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
      </div>


      <script>
        var password = document.getElementById("password"),
          confirm_password = document.getElementById("confirm_password");

        function validatePassword() {
          if (password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
          } else {
            confirm_password.setCustomValidity('');
          }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
      </script>
      
    </form>
  </div>



  <div class="container">
    <div class="row">
      <div class="col-sm">
        <center>
          <div id="slidercaption" class="carousel slide" data-ride="carousel" style="width: 310px; height:310px;">

            <ol class="carousel-indicators">
              <li data-target="#slidercaption" data-slide-to="0" class="active"></li>
              <li data-target="#slidercaption" data-slide-to="1"></li>
              <li data-target="#slidercaption" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="d-block img-fluid" src="slide.jpg" alt="Slide1">
                <div class="carousel-caption d-none d-md-block">
                  <h3>Here is a caption for slide 1</h3>
                  <p>Here is short description for slide 1</p>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="slide.jpg" alt="Slide2">
                <div class="carousel-caption d-none d-md-block">
                  <h3>Here is a caption for slide 2</h3>
                  <p>Here is short description for slide 2</p>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="slide.jpg" alt="Slide3">
                <div class="carousel-caption d-none d-md-block">
                  <h3>Here is a caption for slide 3</h3>
                  <p>Here is short description for slide 3</p>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#slidercaption" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#slidercaption" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </center>
      </div>
      <div class="col-sm">
        <center>
          <img src="fixedimg.png" style="width: 350px; height:350px">
        </center>
      </div>
    </div>
  </div>



</body>

</html>