<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Write blog</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <style>
        ::placeholder {
            /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: red;
            opacity: 1;
            font-size:20px;
            padding-left:3%;
            text-align: center;
            /* Firefox */
        }
    </style>

</head>

<body style="margin:5% 5% 5% 5%">


    <?php require("header.php"); ?>

    <br><br><br>
    <div class="container">
        <form action="writeBlogServer.php" method="post">
            <center>
                <h2>Title</h2>
                <input style="width:85%;height:50px;border:2px solid black;font-size:20px" type="text" placeholder="Your blog title." name="title" required>
                <br><br><br><br>
                <h2>Blog</h2>
                <textarea class="ckeditor" name="editor" required></textarea><br>

                <button type="submit" style="font-size:20px" class="btn btn-success" name="submit">Post</button>
            </center>
        </form>


    </div>

    
    <script src="ckeditor1/ckeditor.js"></script>

</body>

</html>