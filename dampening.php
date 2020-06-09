<?php
include 'localization.php';
include 'config.php';
$_SESSION['current_page'] = 'dampening.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php if (isset($title_text)) echo $title_text; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <script src="script.js"></script>
    <script src="fabric.min.js"></script>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
<?php include 'navbar.php'?>
<?php if (isset($dampening_heading)) echo "<h3> <img src=\"https://www.gnu.org/software/octave/img/octave-logo.svg\"
             style=\"width: 32px; height: auto\" alt=\"GNU Octave logo\">".$dampening_heading."</h3>"; ?>
<script>
    function change_language(language) {
        document.cookie = "lang="+language;
        location.reload();
    }
</script>
<form class="mt-5 col-lg-12 d-flex justify-content-center">
    <div class="col-lg-5">
        <div class="form-group">
            <label for = speed style="display: none">Rychlosť zobrazovania grafu:</label>
            <input id ='speed' type="number" name="speed" value= 0 style="display: none">
            <label for="param"><?php if (isset($input_text)) echo $input_text; ?></label>
            <input class="form-control" id='param' type="number" name="param" value=1 >
        </div>

        <button id="showGraph" type="button" name="showGraph" class="btn btn-secondary float-right"><?php if (isset($submit_button)) echo $submit_button; ?></button>
    </div>
</form>
<div class="container">
    <div class="form-row justify-content-center mt-4">
        <div class="form-group">
            <label for="animation_checkbox">Animácia</label>
            <input class="form-control" type="checkbox" id="animation_checkbox" name="animation" style="height: 80%">
        </div>
        <div class="form-group ml-5">
            <label for="graph_checkbox">Graf</label>
            <input class="form-control" type="checkbox" id="graph_checkbox" name="graph" style="height: 80%">
        </div>
    </div>
</div>
<div class="d-flex justify-content-center">
    <div id="animation" class="col-lg-10" style="display: none">
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1400 650" style="enable-background:new 0 0 1400 650;" xml:space="preserve">
        <style type="text/css">
            .st0 {
                fill: #FFFEDC;
                stroke: #000000;
                stroke-miterlimit: 10;
            }

            .st1 {
                fill: #BABABA;
                stroke: #000000;
                stroke-miterlimit: 10;
            }

            .st2 {
                fill: #EAEAEA;
                stroke: #000000;
                stroke-miterlimit: 10;
            }
        </style>
            <rect x="0" y="0" class="st0" width="1400" height="650"></rect>
            <g id="dampening">

                <rect x="544.7" y="291.5" class="st1" width="130" height="20" id="suspension"></rect>
                <circle class="st2" cx="545.2" cy="320.7" r="30" id="wheel1"></circle>
                <circle class="st2" cx="670.1" cy="320.7" r="30" id="wheel2"></circle>

            </g>
           <!-- <rect y="350" class="st3" width="1402" height="26"></rect>-->
    </svg>
    </div>
</div>

<script>


    let dampening = document.getElementById('dampening');
    let suspension = document.getElementById('suspension');
    let wheel1 = document.getElementById('wheel1');
    let wheel2 = document.getElementById('wheel2');

    let initX1 = 0;
    let initX2 = 0;

    $("#showGraph").click(function () {
        document.getElementById("showGraph").disabled = true;
        var param = document.getElementById('param').value;
        var parameterURL = encodeURIComponent(param + ";initX1=" + initX1 + ";initX2=" + initX2 + ";");
        var url = "https://147.175.121.210:4629/final_p/api/scripts?scripts=tlmenie&key=99cf0f8b-8b17-4a1b-93e7-be2efaec965e&parameter=" + parameterURL;
        $.getJSON(url, function(data){
            initX2 = data.data[0].x[(data.data[0].x.length)-1];
            initX1 = data.data[0].y[(data.data[0].y.length)-1];
            displayGraph(data.data);
            animate_dampening(data.data);
        });

    });
    $(document).ready(
        function() {
            $('#animation_checkbox').change(
                function () {
                    if ($(this).is(':checked')) {
                        $('#animation').show();
                    } else {
                        $('#animation').hide();
                    }
                });
            $('#graph_checkbox').change(
                function () {
                    if ($(this).is(':checked')) {
                        $('#graph').show();
                    } else {
                        $('#graph').hide();
                    }
                });
        });


    function move_dampening(positionCar, positionWheel) {
        let degree_angle = positionWheel * (180/Math.PI);
        let rotation = parseFloat(degree_angle);
        offset = 20*(positionCar);
        wheel1.setAttribute('transform', 'rotate(' + rotation + '544.7 291.5)');
        wheel2.setAttribute('transform', 'rotate(' + rotation + '544.7 291.5)');
        //suspension.setAttribute('transform', 'rotate(' + rotation + '544.7 291.5)');

        dampening.setAttribute('transform', 'translate('+offset+')');

    }

    async function animate_dampening(data) {

        var speed = Number(document.getElementById("speed").value);
        for (var i = 0; i < data[0].x.length; i++) {
            move_dampening(data[0].y[i],data[0].x[i]);

            await sleep(speed * 100);
        }

    }
</script>

<div id = 'graph' style="margin-top: 5%"></div>

</body>
</html>