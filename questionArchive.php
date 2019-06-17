<html>

<head>
    <title>Question Archive</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.material.min.css">
    <!--
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	-->

</head>

<body style="margin: 5% 5% 5% 5%; width:auto;">
<?php include 'header.php';?>
<br><br><br><br>
  
    <center>
        <table id="parchiveTable" class="mdl-data-table" style="width:60%; ">
            <thead>
                <tr>
                    <th>Title: <input type="search" id = "searchinp" placeholder="search"> </th>
                    <th>Solve/Submission</th>
                    <th>Solve rate</th>
                </tr>
            </thead>
            <tbody>

                <?php
                                include 'connectToDB.php';
                                $sql = "SELECT * FROM bose_add_question WHERE `publicOrPrivate` = 0";
                                $result = $conn->query($sql);
                                if( $result->num_rows  > 0){
                                    while( $row = $result->fetch_assoc() ){
                                        echo "<tr>";
                                            echo "<td>";
                                                echo "<a href = \"/every-end/viewProblem.php?problemID=";
                                                echo $row['problemId'];
                                                echo "\" >";
                                                echo $row['problemTitle'];
                                                echo "</a>";
                                            echo "</td>";
                                            echo "<td> feature on process </td>";
                                            echo "<td> feature on process </td>";
                                        echo "</tr>";
                                    }
                                }
                            ?>


            </tbody>
        </table>
    </center>

</body>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.material.min.js"></script>

<script>
    $(document).ready(function() {
        $("#parchiveTable").DataTable(

            {
                columnDefs: [{
                    targets: [0, 1, 2],
                    className: 'mdl-data-table__cell--non-numeric'
                }]
                
            }

        );

        $(".dataTables_filter").hide();
        $('#searchinp').keyup(function(){
            table.search($(this).val()).draw() ;
        });

    });
</script>
<style>
.form-inline label {
    display: -ms-flexbox;
    display: block;
}
.pagination {
 
    padding-left: 30px;
}
.form-inline label {
    margin-bottom: 300%;
}
.mdl-data-table {
    margin-right: 260px;
}
</style>
</html>
