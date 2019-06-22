<?php
session_start();
//require("sessionCheck.php");
require("connectToDB.php");



if (isset($_POST['submit'])) {
    if (isset($_POST['editor']) && !empty($_POST['editor'])) {
        $blog = $_POST['editor'];
        $title=$_POST['title'];
        $time = time() + 21600;
        $bloggerID =$_SESSION['id'];
        $userName = 'user' . $bloggerID;

        echo "".$blog.' '.$title.' ' .$time;
    } else {
        $message = "You did not write any blog.";

        echo "<script type='text/javascript'>alert('$message');
    window.location.href='writeBlog.php';
    
    </script>";
        echo 'window.location.href = "writeBlog.php";';
    }


    if (isset($blog) && !empty($blog)) {
        //have to insert data into database

        $query = "INSERT INTO `bose_blog` (`blogTitle`,`blogContent`,`time`,`bloggerID`,`bloggerName`) VALUES('$title','$blog','$time','$bloggerID','$bloggerName')";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            die("" . mysqli_error($conn));
            $message = "Something went wrong.\\nTry again";

            echo "<script type='text/javascript'>alert('$message');
              window.location.href='writeBlog.php';
    
    </script>";
            echo 'window.location.href = "writeBlog.php";';
            
        } else {
            header("Location: homepage.php");
        }
    }
}
