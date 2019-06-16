<?php
session_start();
require("sessionCheck.php");
require("connectToDB.php");

if (isset($_GET['commentID'])) {
    $commentID = $_GET['commentID'];
    $blogID=$_GET['blogID'];

}
$id = $_SESSION['id'];

$query="DELETE FROM bose_comments WHERE commentID=$commentID";
$result=mysqli_query($conn,$query);


if($result)
{
//successful

header("Location: readFullBlog.php?blogID=$blogID");
}