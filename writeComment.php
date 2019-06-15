<?php

$blogID=$_GET['blogID'];
$_SESSION['blogID']=$blogID;

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Write comment</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>

<body>

    <div class="container">

        <form action="writeCommentServer.php" method="post">

            <textarea class="ckeditor" name="editor" required></textarea><br><br>
            <center>
                <button type="submit" style="font-size:20px" class="btn btn-success" name="submit">Comment</button>
            </center>
        </form>


    </div>



    <script src="ckeditor/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('editor');

        $(function() {
            $('#editor').ckeditor({
                toolbar: 'Full',
                enterMode: CKEDITOR.ENTER_BR,
                shiftEnterMode: CKEDITOR.ENTER_P
            });
        });
    </script>

</body>

</html>