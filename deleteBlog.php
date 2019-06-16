<?php

session_start();
require("sessionCheck.php");
require("connectToDB.php");

if (isset($_GET['blogID'])) {
    $blogID = $_GET['blogID'];
}
$id = $_SESSION['id'];

$query="DELETE FROM bose_comments WHERE blogID=$blogID";
$result=mysqli_query($conn,$query);

$query="DELETE FROM bose_blog WHERE blogNo=$blogID";
$result=mysqli_query($conn,$query);

if($result)
{
    //successfull
    $message = "Blog has been deleted successfully from the database.";

    echo "<script type='text/javascript'>alert('$message');
    window.location.href='http://quizfeed.selisestaging.com/myBlog.php?id=$id';
    
    </script>";
    echo 'window.location.href = "myBlog.php";';
}
else{
    //not successfull
    echo "".mysqli_error($conn);
    die();
    $message = "Can not remove blog.\\nTry again.";

    echo "<script type='text/javascript'>alert('$message');
    window.location.href='myBlog.php';
    
    </script>";
    echo 'window.location.href = "myBlog.php";';
}

?>
