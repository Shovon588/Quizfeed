<?php
session_start();
require("connectToDB.php");

if (isset($_GET['vkey'])) {
    $vkey = $_GET['vkey'];
}

if (isset($_POST['password1'])) {
    $emailsearch = "SELECT * FROM `bose_user_profile` WHERE `vkey`='$vkey'";
    $searchresult = mysqli_query($conn, $emailsearch);
    $matchemail  = mysqli_num_rows($searchresult);

    if ($matchemail > 0) {
        while ($row = $searchresult->fetch_assoc()) {
            $id = $row['id'];
        }
    } else {
        echo "<br><h1>The link you clicked is not valid!!\nBye Bye</h1>";
        header("refresh:3; url=index.php");
    }

    $pass = hash('sha512', $_POST['password1']);

    $query = "UPDATE `bose_user_profile` SET `password`='$pass',`vkey`='' where `id`=$id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION['id'] = $id;
        $message = "Password has been changed.\\nWelcome back!";

        echo "<script type='text/javascript'>alert('$message');
            window.location.href='homepage.php';
    
            </script>";
    } else {
        $message = "Something went wrong.\\nTry again.";

        echo "<script type='text/javascript'>alert('$message');
            window.location.href='index.php';
    
            </script>";
    }
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Change password</title>
</head>


<body>
    <div class="row" style="margin-top:15%">
        <div class="col-md-6 offset-md-3">
            <span class="anchor" id="formLogin"></span>

            <div class="card card-outline-secondary">
                <div class="card-header">
                    <h3 class="mb-0">Change Password</h3>
                </div>
                <div class="card-body">

                    <form action="" method="post">
                        <div class="form-group">
                            <label for="npass">New password:</label>
                            <input type="password" id="password1" class="form-control" name="password1" placeholder="Enter new password" value="">
                        </div>
                        <div class="form-group">
                            <label for="cpass">Confirm password:</label>
                            <input type="password" id="password2" class="form-control" name="password2" placeholder="Confirm new password">
                        </div>
                        <script>
                            var password = document.getElementById("password1"),
                                confirm_password = document.getElementById("password2");

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
                        <button type="submit" class="btn btn-default" style="margin:auto;display:block;color:black;border:1px solid black">Submit</button>
                    </form>


                </div>
                <!--/card-body-->
            </div>
            <!-- /form card login -->

        </div>
    </div>
</body>

</html>