<?php
include 'localization.php';
include 'config.php';
$_SESSION['current_page'] = 'pendulum.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php if (isset($title_text)) echo $title_text; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
    $("#showGraph").click(function () {
        document.getElementById("showGraph").disabled = true;
        var param = document.getElementById('param').value;
        var url = "https://147.175.121.210:4629/final_p/api/scripts?scripts=kyvadlo&key=99cf0f8b-8b17-4a1b-93e7-be2efaec965e&parameter=" + param;
        $.getJSON(url, function(data){
            displayGraph(data.data);
        });
    });
</script>
<div id = 'graph'></div>
<form class="mt-5 col-lg-12 d-flex justify-content-center">
    <div class="col-lg-5">
        <div class="form-group">
            <label for="apiKey"><?php if (isset($api_key_text)) echo $api_key_text?></label>
            <input class="form-control" type="text" name="apiKey" id="apiKey" value="99cf0f8b-8b17-4a1b-93e7-be2efaec965e">
        </div>
        <div class="form-group">
            <label for="apiKey"><?php if (isset($pendulum_input_text)) echo $pendulum_input_text?></label>
            <input class="form-control" type="number" name="new_position" id="new_position" max="100" min="0" value="50">
        </div>
        <button id="submit" type="button" class="btn btn-secondary float-right"><?php if (isset($submit_button)) echo $submit_button?></button>
    </div>
</form>
<div class="form-row justify-content-center mt-4">
    <div class="form-group">
        <label for="animation mr-5"><?php echo $animation_checkbox_text?></label>
        <input class="form-control" type="checkbox" id="animation_checkbox" name="animation">
    </div>
    <div class="form-group ml-5">
        <label for="graph_checkbox"><?php echo $graph_checkbox_text?></label>
        <input class="form-control" type="checkbox" id="graph_checkbox" name="graph">
    </div>
</div>
<div class="d-flex justify-content-center">
    <div id="animation" class="col-lg-8" style="display: none">
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
             x="0px" y="0px"
             viewBox="0 0 1400 600" style="enable-background:new 0 0 1400 600;" xml:space="preserve">
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

        .st3 {
            stroke: #000000;
            stroke-miterlimit: 10;
        }
    </style>
            <rect x="-0.5" y="-0.5" class="st0" width="1400" height="548"/>
            <g id="pendulum">
                <path id="rod" class="st1" d="M739.3,142.9V379c0,6.5-5.3,11.7-11.7,11.7h-0.8c-6.5,0-11.7-5.3-11.7-11.7V142.9c0-6.5,5.3-11.7,11.7-11.7h0.8
    C734,131.2,739.3,136.5,739.3,142.9z"/>
                <circle class="st1" cx="727.5" cy="386" r="18.1"/>
                <rect x="616" y="382.9" class="st1" width="221.9" height="138.3"/>
                <circle class="st2" cx="659" cy="521.4" r="25.9"/>
                <circle class="st2" cx="798.5" cy="521.1" r="25.9"/>
                <circle cx="727" cy="379.3" r="1.5"/>
            </g>
            <rect x="-0.5" y="547.5" class="st3" width="1400" height="52"/>
    </svg>
    </div>
</div>
<div id="graph">

</div>
<script>
    let pendulum = document.getElementById('pendulum');
    let rod = document.getElementById('rod');
    $(document).ready(
        function() {
            $('#animation_checkbox').change(function () {
                if ($(this).is(':checked')){
                    $('#animation').show();
                }
                else {
                    $('#animation').hide();
                }
            });
            $('#graph_checkbox').change(function () {
                if ($(this).is(':checked')){
                    $('#graph').show();
                }
                else {
                    $('#graph').hide();
                }
            });
        }
    );
    function move_pendulum(position,angle) {
        let rotation = -parseFloat(angle) + 180;
        rod.setAttribute('transform','rotate('+rotation+' 727 379.3)');
    }
</script>
</body>
</html>