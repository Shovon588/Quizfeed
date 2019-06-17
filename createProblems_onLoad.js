//alert("onLoad Starts");

$(document).ready(function() {

    $("#errMsg").hide();

    $("#sucMsg").hide();

    var y = [];
    y.push(new Quill("#editor", lessEditorOptions));

    var problemID;
    var totalOptions = 0;



    $(".addCardButton").click(function() {

        totalOptions++;
        var newCard = document.createElement("div");
        $(newCard).attr("class", "card");

        var cardHeader = document.createElement("div");
        $(cardHeader).attr("class", "card-header");


        var cardFooter = document.createElement("div");
        $(cardFooter).attr("class", "card-footer");

        var serialBox = document.createElement("input");
        $(serialBox).attr("type", "hidden");
        $(serialBox).val(totalOptions);

        var closeButton = document.createElement("button");
        $(closeButton).attr("class", "close");
        $(closeButton).attr("aria-label", "Close");
        $(closeButton).attr("style", "color:red");
        $(closeButton).html("&times;");
        //$(closeButton).attr("onclick", "delCard(this)");


        var chkbx = document.createElement("input");
        $(chkbx).attr("type", "checkbox");

        $(cardHeader).append(closeButton);
        $(cardHeader).append(chkbx);
        $(cardFooter).append(serialBox);

        var newOption = document.createElement("div");
        $(newOption).attr("class", "card-body");
        $(newOption).attr("id", "id" + totalOptions.toString(10));

        $(newCard).append(cardHeader);
        $(newCard).append(newOption);
        $(newCard).append(cardFooter);

        $("#divOptions").append(newCard);
        y.push(new Quill("#id" + totalOptions.toString(10), lessEditorOptions));


    });


    $("#divOptions").on("click", ".close", function() {
        $(this)
            .parents(".card")
            .remove();
    });


    $("#saveQuestion").click(function() {


        var questionTitle = document.getElementById("problemTitle").value;
        console.log("Question title = " + questionTitle);
        var questionDescription = JSON.stringify(y[0].root.innerHTML);
        console.log("Question Description: " + questionDescription);
        var tmpchk = document.getElementById("pubOrPri").checked;
        var _pubOrPri;
        if (tmpchk == 1) _pubOrPri = 1;
        else _pubOrPri = 0;
        console.log("_pubOrPri" + _pubOrPri);
        $.ajax({
            method: "POST",
            url: "saveQuestion.php",
            data: {
                descrip: questionDescription,
                pubOrPri: _pubOrPri,
                questTit: questionTitle

            },
            async: false,
            success: function(dataSaveQues) {
                problemID = dataSaveQues;
                console.log("Problem Created with id: " + problemID);
                if (problemID != "-1") {
                    insertOptions();
                    console.log(dataSaveQues);
                    console.log("Problem Added Successfully");
                    $("#errMsg").hide();
                    $("#sucMsg").show();
                    $("#sucMsg .Msg").html("Question created successfully!");
                    //window.location.href = "createProblem.php";
                } else {
                    $("#sucMsg").hide();
                    $("#errMsg").show();
                    $("#errMsg .Msg").html("Sorry, Question was not created. Please try again!");

                }
            },
            error: function(dataNotSaves) {
                $("#sucMsg").hide();
                $("#errMsg").show();
                $("#errMsg .Msg").html("Sorry, Question was not created. Please try again!");

            }

        });



        // SAVE OPTIONS PART
        function insertOptions() {
            var allOptions = document.querySelectorAll(".card");
            console.log(allOptions.length);
            osize = allOptions.length;
            for (oi = 0; oi < osize && problemID != "-1"; oi++) {
                //var childNode = allOptions.childNode;
                console.log("ProblemID : " + problemID);
                console.log("cardNo: " + allOptions[oi].children[3].children[0].value);
                var optionID = allOptions[oi].children[3].children[0].value;
                var optionDescript = JSON.stringify(y[optionID].root.innerHTML);
                console.log("card Desc: " + optionDescript);
                var optionCheck = allOptions[oi].children[0].children[1].checked;
                optionChecked = 0;
                if (optionCheck == 1) optionChecked = 1;
                console.log("correct ans: " + optionChecked);

                $.ajax({
                    method: "POST",
                    url: "saveOptions.php",

                    data: {
                        questID: problemID,
                        optID: optionID,
                        optiondes: optionDescript,
                        WorR: optionChecked
                    },
                    async: false,
                    success: function(data1, status1) {
                        if (data1 == "-1") alert("Sorry ! Try again");
                        else {
                            console.log("success optionID: " + optionID + " bool: " + optionChecked);
                            //alert("Success! :D");

                        }
                    }
                });

            }

        }
    });




});


/*
function loadData() {
    $.post(
        "loadOptions.php", {
            Qid: problemID
        },
        function(data, status) {
            recievedOptions = JSON.parse(data);
            //alert(recievedData.length);
            totalOptions = recievedData.length;
        }
    );
}
*/
