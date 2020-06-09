<?php
include 'localization.php';
include 'config.php';
$_SESSION['current_page'] = 'aeroplane.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php if (isset($title_text)) echo $title_text; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <script src="fabric.min.js"></script>
    <script src="script.js"></script>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
<?php include 'navbar.php'?>
<?php if (isset($aeroplane_heading)) echo "<h3> <img src=\"https://www.gnu.org/software/octave/img/octave-logo.svg\"
             style=\"width: 32px; height: auto\" alt=\"GNU Octave logo\">".$aeroplane_heading."</h3>"; ?>
<input style="display: none" id = 'speed' type="number" name="speed" value= 0>
<form class="mt-5 col-lg-12 d-flex justify-content-center">
    <div class="col-lg-5">
        <div class="form-group">
            <label for="param"><?php if (isset($aeroplane_input_text)) echo $aeroplane_input_text ?></label>
            <input class="form-control" type="number" name="param" id="param" max="100" min="0" value="50">
        </div>
        <button id="showGraph" type="button"
                class="btn btn-secondary float-right"><?php if (isset($submit_button)) echo $submit_button ?></button>
    </div>
</form>
<div class="col-lg-12 form-row justify-content-center mt-4">
    <div class="form-group">
        <label for="animation mr-5"><?php echo $animation_checkbox_text ?></label>
        <input class="form-control" type="checkbox" id="animation_checkbox" name="animation">
    </div>
    <div class="form-group ml-5">
        <label for="graph_checkbox"><?php echo $graph_checkbox_text ?></label>
        <input class="form-control" type="checkbox" id="graph_checkbox" name="graph">
    </div>
</div>

<script>
    let initQ = 0;
    let initTheta = 0;

    $("#showGraph").click(function () {
        document.getElementById("showGraph").disabled = true;
        var param = document.getElementById('param').value;
        var parameterURL = encodeURIComponent(param + ";initQ=" + initQ + ";initTheta=" + initTheta + ";");
        var url = "https://147.175.121.210:4629/final_p/api/scripts?scripts=lietadlo&key=99cf0f8b-8b17-4a1b-93e7-be2efaec965e&parameter=" + parameterURL;
        $.getJSON(url, function(data){
            initTheta = data.data[0].x[(data.data[0].x.length)-1];
            initQ = data.data[0].y[(data.data[0].y.length)-1];
            displayGraph(data.data);
        });
    });
</script>
<canvas id = "plane"></canvas>
<div id = 'graph'></div>
<img src="plane.png" class = "hiddenImg" id = 'planeImg'>
<img src="elevator.png" class = "hiddenImg" id = 'elevatorImg'>
<script>

    var canvas = new fabric.Canvas('plane');
    canvas.setHeight(450);
    canvas.setWidth(900);

    var plane = document.getElementById("planeImg");
    plane = new fabric.Image(plane,{left: 300,  top: 200});
    plane.scaleToHeight(200);
    plane.scaleToWidth(400);

    var elevator = document.getElementById("elevatorImg");
    elevator = new fabric.Image(elevator, {left: 320 ,top: 243});
    elevator.scaleToHeight(90);
    var group = new fabric.Group([plane,elevator],{ selectable: false});
    canvas.add(group).renderAll();

    var  objs = canvas.getObjects();
    var planeObj= objs[0];
    var elevatorObj = objs[0].item(1);
    canvas.renderAll();
    function drawPlaneWithData(elevatorAngle,planeAngle)
    {
        planeObj.rotate(-1 * (planeAngle));
        elevatorObj.rotate(-1 * elevatorAngle);
    }
</script>
</body>
</html>
