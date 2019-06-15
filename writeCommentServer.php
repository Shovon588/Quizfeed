<?php
session_start();
require("sessionCheck.php");
require("connectToDB.php");


$blogID = $_SESSION['blogID'];


if (isset($_POST['submit'])) {
    if (isset($_POST['editor']) && !empty($_POST['editor'])) {
        $comment = $_POST['editor'];
        $time = time() + 21600;
        $userID=$_SESSION['id'];
    } 
    else {
        $message = "You need to write some comment first.";

        echo "<script type='text/javascript'>alert('$message');
    window.location.href='readFullBlog.php?blogID=$blogID';
    
    </script>";
        echo 'window.location.href = "readFullBlog.php?blogID=$blogID";';
    }


    if (isset($comment) && !empty($comment)) {
        //have to insert data into database

        $query = "INSERT INTO `bose_comments` (`blogID`,`userID`,`comment`,`time`) VALUES('$blogID','$userID','$comment','$time')";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            die("" . mysqli_error($conn));
            $message = "Something went wrong.\\nTry again";

            echo "<script type='text/javascript'>alert('$message');
        window.location.href='readFullBlog.php?blogID=$blogID';
    
    </script>";
            echo 'window.location.href = "readFullBlog.php?blogID=$blogID";';
        } else {
            header("Location: readFullBlog.php?blogID=$blogID");
        }
    }
}
