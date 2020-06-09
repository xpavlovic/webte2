<?php
include 'localization.php';
include 'config.php';
$_SESSION['current_page'] = 'ball.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php if (isset($title_text)) echo $title_text; ?></title>
    <link rel = "stylesheet" href = "stlyle/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <script src="script.js"></script>
</head>
<body>
<?php include 'navbar.php'?>
<label for = speed>Rychlosť zobrazovania grafu:</label>
<input id = 'speed' type="number" name="speed" value= 0>
<label for = speed>Parameter r:</label>
<input id = 'param' type="number" name="param" value= 0.25>
<input type="button" id = "showGraph" name="showGraph" value="GRAFUJ!">
<script>
    let initPozicia = 0;

    $("#showGraph").click(function () {
        document.getElementById("showGraph").disabled = true;
        var param = document.getElementById('param').value;
        var parameterURL = encodeURIComponent(param + ";initPozicia=" + initPozicia + ";");
        var url = "https://147.175.121.210:4629/final_p/api/scripts?scripts=gulicka&key=99cf0f8b-8b17-4a1b-93e7-be2efaec965e&parameter=" + parameterURL;
        $.getJSON(url, function(data){
            initPozicia = data.data[0].y[(data.data[0].y.length)-1];
            displayGraph(data.data);
        });
    });
</script>
<div id = 'graph'></div>
</body>
</html>