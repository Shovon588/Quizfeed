<html>

<head>
    <title>Question Archive</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
  
</head>

<body style="margin: 5% 5% 5% 5%; width:auto;">

    
      <table id="parchiveTable" class="table table-striped table-bordered" style="width:100%">            
         <thead>
                <tr>
                    <th>Serial</th>
                    <th>Title:  </th>
                    <th>Solve/Submission</th>
                    
                </tr>
        </thead>
        
        <tbody>
            <?php
                include 'connectToDB.php';
                $sql = "SELECT * FROM  bose_add_question WHERE publicOrPrivate='0' ";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                
                $serial = 0;
                while ($row = $result->fetch_assoc()) {
                    $title = $row['problemTitle'];
                    $privarcy = $row['publicOrPrivate'];
                    $Qid = $row['problemId'];
                    if ($privarcy == 1) $privacy = "Private";
                    else $privacy = "Public";
                    $sub = $row['submissionCount'];
                    $solve = $row['solveCount'];
                    $percent = ($solve / $sub) * 100;
                    $percent=100-$percent;
                    //die($percent);

                    echo "<tr>";
                        echo "<td>".$serial."</td>";
                        echo "<td><a href=\"viewProblem.php?problemID=".$Qid."\">".$title."</a></td>";
                        echo "<td>".$percent."%</td>";
                    echo "</tr>";
                    $serial++;
                }
                }
                else{
                echo "No Question added";
                }
             ?>
        </tbody>
        </table>
   

</body>



<script src="http://code.jquery.com/jquery-3.3.1.js"></script>
<script src="http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="http://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>


<script>
    $(document).ready(function() {
       $("#parchiveTable").DataTable();
    });
</script>


</html>
