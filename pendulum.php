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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <script src="script.js"></script>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>

<?php include 'navbar.php' ?>
<?php if (isset($pendulum_heading)) echo "<h3> <img src=\"https://www.gnu.org/software/octave/img/octave-logo.svg\"
             style=\"width: 32px; height: auto\" alt=\"GNU Octave logo\">".$pendulum_heading."</h3>"; ?>
<input style="display: none" id='speed' type="number" name="speed" value=0>

<script>

</script>
<form class="mt-5 col-lg-12 d-flex justify-content-center">
    <div class="col-lg-5">
        <div class="form-group">
            <label for="param"><?php if (isset($pendulum_input_text)) echo $pendulum_input_text ?></label>
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
<div class="d-flex justify-content-center">
    <div id="animation" class="col-lg-10" style="display: none">
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
             x="0px" y="0px"
             viewBox="0 0 1200 300" style="enable-background:new 0 0 1200 300;" xml:space="preserve">
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
            <rect y="-0.4" class="st0" width="1200" height="274.4"/>
            <g id="pendulum">
                <path id="rod" class="st1" d="M606.4,71.1v118.8c0,3.1-2.5,5.6-5.6,5.6h-0.9c-3.1,0-5.6-2.5-5.6-5.6V71.1c0-3.1,2.5-5.6,5.6-5.6h0.9
		C603.9,65.5,606.4,68,606.4,71.1z"/>
                <circle class="st1" cx="600.5" cy="193.1" r="9"/>
                <rect x="544.7" y="191.5" class="st1" width="111.1" height="69.3"/>
                <circle class="st2" cx="566.2" cy="260.9" r="13"/>
                <circle class="st2" cx="636.1" cy="260.7" r="13"/>
                <circle cx="600.3" cy="189.7" r="0.8"/>
            </g>
            <rect y="274" class="st3" width="1200" height="26"/>
        </svg>
    </div>
</div>
<div id="graph" style="display: none">
</div>


<script>
    let pendulum = document.getElementById('pendulum');
    let rod = document.getElementById('rod');
    let initUhol = 0;
    let initPozicia = 50;
    let offset = 0;

    $(document).ready(
        function () {
            $("#showGraph").click(function () {
                document.getElementById("showGraph").disabled = true;
                var param = document.getElementById('param').value;
                if (param>100){
                    param = 100;
                }
                if (param<0){
                    param =0;
                }
                var parameterURL = encodeURIComponent(param + ";initUhol=" + initUhol + ";initPozicia=" + initPozicia + ";");
                var url = "https://147.175.121.210:4629/final_p/api/scripts?scripts=kyvadlo&key=99cf0f8b-8b17-4a1b-93e7-be2efaec965e&parameter=" + parameterURL;
                $.getJSON(url, function (data) {
                    displayGraph(data.data);
                    animate_pendulum(data.data);
                    initUhol = data.data[0].x[(data.data[0].x.length)-1];
                    initPozicia = data.data[0].y[(data.data[0].y.length)-1];
                });
            });

            $('#animation_checkbox').change(function () {
                if ($(this).is(':checked')) {
                    $('#animation').show();
                } else {
                    $('#animation').hide();
                }
            });
            $('#graph_checkbox').change(function () {
                if ($(this).is(':checked')) {
                    $('#graph').show();
                } else {
                    $('#graph').hide();
                }
            });
        }
    );

    function move_pendulum(position, angle) {
        let degree_angle = angle * (180/Math.PI);
        let rotation = parseFloat(degree_angle);
        offset = 11*(position- 50);
        rod.setAttribute('transform', 'rotate(' + rotation + ' 600.3 189.7)');
        pendulum.setAttribute('transform', 'translate('+offset+' 0)');
    }

    async function animate_pendulum(data) {
        var speed = Number(document.getElementById("speed").value);
        for (var i = 0; i < data[0].x.length; i++) {
            move_pendulum(data[0].y[i],data[0].x[i]);

            await sleep(speed * 100);
        }
    }
</script>
</body>
</html>