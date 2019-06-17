$(document).ready(function() {

    var recievedOptions;
    var problemID = document.getElementById("problemID").innerText;
    console.log("problemID : " + problemID);
    $.post(
        "loadOptions.php", {
            Qid: problemID
        },
        function(data, status) {
            recievedOptions = JSON.parse(data);
            //console.log(data);
            //alert(recievedOptions.length);
            totalOptions = recievedOptions.length;
            addDescription();
            addOptions();
        }
    );

    function addOptions() {
        for (oi = 0; oi < totalOptions; oi++) {
            row = recievedOptions[oi];
            console.log("option ID: " + row.optionId);
            console.log("option descripton: " + row.optionDescription);
            console.log("right? : " + row.wrongOrRight);
            var node = document.createElement("div");
            $(node).attr("class", "card");
            var _des = document.createElement("div");
            $(_des).attr("class", "card-body");
            $(_des).html((row.optionDescription))
            var _select = document.createElement("input");
            $(_select).attr("type", "checkbox");
            var _footer = document.createElement("div");
            $(_footer).attr("class", "card-footer");

            var _header = document.createElement("div");
            $(_header).attr("class", "card-header");
            $(_header).html("option #" + (oi + 1));

            $(_footer).append(_select);
            $(node).append(_header);
            $(node).append(_des);
            $(node).append(_footer);
            $("#divOptions").append(node);
        }

    }

    function addDescription() {
        $.post(
            "loadProblemDescription.php", {
                problemid: problemID
            },
            function(data1, status1) {
                console.log(data1);
                console.log(JSON.parse(data1));
                var gp = JSON.parse(data1);
                console.log("Problem Description: " + gp.problemStatement);
                $("#problemDescription").html(gp.problemStatement);
                $("#problemTitle").html("<b>Title: " + gp.problemTitle + "</b>");
            }
        );
    }

    function F() {
        alert("boss");
    }

    $("#judgeMe").click(

        function() {
            var jnode = document.querySelectorAll(".card");
            var jsize = jnode.length;
            var oka = 1;
            for (ji = 0; ji < jsize; ji++) {
                var stat = jnode[ji].children[2].children[0].checked;
                var stati = 0;
                if (stat) stati = 1;
                if (stat != recievedOptions[ji].wrongOrRight)
                    oka = 0;
            }

            $.post(
                "storeSubmission.php", { problemId: problemID, isOK: oka },
                function(storeResponse, status) {
                    //alert(storeResponse);
                    console.log("storeResponse: " + storeResponse);
                     if (oka == 0) {
                            alert("Wrong ans!");

                        } else {
                            alert("hurraaay ! correct answer!");
                        }
                    alert(storeResponse);
                }
            );


        }
    );


});
