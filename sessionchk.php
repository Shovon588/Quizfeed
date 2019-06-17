<?php
if(isset($_SESSION['id']))
{
    $personID=$_SESSION['id'];
}
else{
    echo "<br><h1>You are not logged in!!\nPlease login first.\nBye Bye</h1>";
    header("refresh:3; url=index.php");
    die();
}
