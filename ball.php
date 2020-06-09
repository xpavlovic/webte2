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
    <link rel = "stylesheet" href = "style/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <script src="script.js" defer></script>
    <script src="fabric.min.js"></script>
    <script src="matter.js"></script>
</head>
<body>
<?php include 'navbar.php'?>
<?php if (isset($ball_heading)) echo "<h3> <img src=\"https://www.gnu.org/software/octave/img/octave-logo.svg\"
             style=\"width: 32px; height: auto\" alt=\"GNU Octave logo\">".$ball_heading."</h3>"; ?>
<form class="mt-5 col-lg-12 d-flex justify-content-center">
    <div class="col-lg-5">
        <div class="form-group">
            <label for="param"><?php if (isset($input_for_ball)) echo $input_for_ball; ?></label>
            <input class="form-control" id='param' type="number" name="param" value=25 min="0" max="100">
        </div>

        <button id="showGraph" type="button" name="showGraph" class="btn btn-secondary float-right"><?php if (isset($submit_button)) echo $submit_button?></button>
    </div>
</form>
<div class="container">
    <div class="form-row justify-content-center mt-4">
        <div class="form-group">
            <label for="animation_checkbox"><?php if (isset($animation_text)) echo $animation_text?></label>
            <input class="form-control" type="checkbox" id="animation_checkbox" name="animation">
        </div>
        <div class="form-group ml-5">
            <label for="graph_checkbox"><?php if (isset($graph_text)) echo $graph_text?></label>
            <input class="form-control" type="checkbox" id="graph_checkbox" name="graph">
        </div>
        <div class="form-group ml-5">
            <label for="playground_cb">Playground</label>
            <input class="form-control" type="checkbox" id="playground_cb" name="playground_cb">
        </div>
    </div>
</div>
<div class="d-flex justify-content-center">
    <div id="animation" class="col-lg-8" style="display: none">
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
            <g id="ballandbeam">
                <circle id="ball" class="st1" cx="230" cy="270" r="30"></circle>
                <path id="beam" class="st1" d="M 200 300 L 200 350 L 1200 350 L 1200 300 Z"></path>
                <circle id="gear" class="st1" cx="1150" cy="550" r="60"></circle>
                <circle id="dot1" cx="1150" cy="550" r="1.5"></circle>
                <circle id="dot2" cx="700" cy="325" r="1.5"></circle>
                <path id="lever" class="st2" d="M 1180 350 L 1180 550 L 1200 550 L 1200 350 Z"></path>
            </g>
    </svg>
    </div>
</div>
<div id="graph" style="display: none"></div>

<canvas id="playground" style="display: none" class="justify-content-center"></canvas>

<script>


    let ballAndBeam = document.getElementById('ballandbeam');
    let ball1 = document.getElementById('ball');
    let beam = document.getElementById('beam');
    let lever = document.getElementById('lever');

    let initPozicia = 0;
    let offset = 0;

    $(document).ready(
        function() {
            $("#showGraph").click(function () {
                document.getElementById("showGraph").disabled = true;
                var param = document.getElementById('param').value;
                var parameterURL = encodeURIComponent(param + ";initPozicia=" + initPozicia + ";");
                var url = "https://147.175.121.210:4629/final_p/api/scripts?scripts=gulicka&key=99cf0f8b-8b17-4a1b-93e7-be2efaec965e&parameter=" + parameterURL;
                $.getJSON(url, function(data){
                    displayGraph(data.data);
                    animate(data.data);
                    initPozicia = data.data[0].y[(data.data[0].y.length)-1];
                    console.log(initPozicia);
                });
            });
        }
    );

    function move_ball(position, angle) {
        let degree_angle = angle * (180/Math.PI);
        let rotation = parseFloat(degree_angle);
        offset = 9*position;

        ball1.setAttribute('transform', 'translate('+ offset+' 0)');
        beam.setAttribute('transform', 'rotate('+ rotation*2 + ' 700 325)');
        lever.setAttribute('transform', 'translate(0 '+ rotation +') rotate('+ rotation*3 +' 1190 250)');

    }
    async function animate(data) {
        let speed = 0;
        for (let i = 0; i < data[0].x.length; i++) {
            move_ball(data[0].y[i], data[0].x[i]);
            await sleep(speed * 100);
        }
    }

    $("#playground_cb").click(function () {

        let canvas = document.getElementById('playground');
        canvas.style.margin = 'auto';
        canvas.style.display = 'block';
        // module aliases
        var Engine = Matter.Engine,
            Render = Matter.Render,
            Constraint = Matter.Constraint,
            MouseConstraint = Matter.MouseConstraint,
            Mouse = Matter.Mouse,
            World = Matter.World,
            Bodies = Matter.Bodies;

        // create engine
        var engine = Engine.create(),
            world = engine.world;


        // create renderer
        var render = Render.create({
            element: document.body,
            canvas: canvas,
            engine: engine,
            options: {
                width: 800,
                height: 600,
                showAngleIndicator: true
            }
        });

        Render.run(render);

        // add revolute constraint
        var body = Bodies.rectangle(600, 200, 200, 20);
        var ball = Bodies.circle(550, 150, 20);

        var constraint = Constraint.create({
            pointA: { x: 600, y: 200 },
            bodyB: body,
            length: 0
        });

        World.add(world, [body, ball, constraint]);

        // add soft global constraint
        var body = Bodies.polygon(280, 100, 3, 30);

        var constraint = Constraint.create({
            pointA: { x: 280, y: 120 },
            bodyB: body,
            pointB: { x: -10, y: -7 },
            stiffness: 0.001
        });

        World.add(world, [body, constraint]);

        // add damped soft global constraint
        var bodyA = Bodies.polygon(500, 400, 6, 30);
        var bodyB = Bodies.polygon(600, 400, 7, 60);

        var constraint = Constraint.create({
            bodyA: bodyA,
            pointA: { x: -10, y: -10 },
            bodyB: bodyB,
            pointB: { x: -10, y: -10 },
            stiffness: 0.001,
            damping: 0.1
        });

        World.add(world, [bodyA, bodyB, constraint]);

        // add revolute multi-body constraint
        var body = Bodies.rectangle(500, 400, 100, 20, { collisionFilter: { group: -1 } });
        var ball = Bodies.circle(600, 400, 20, { collisionFilter: { group: -1 } });

        var constraint = Constraint.create({
            bodyA: body,
            bodyB: ball
        });

        World.add(world, [body, ball, constraint]);

        World.add(world, [
            // walls
            Bodies.rectangle(400, 0, 800, 50, { isStatic: true }),
            Bodies.rectangle(400, 600, 800, 50, { isStatic: true }),
            Bodies.rectangle(800, 300, 50, 600, { isStatic: true }),
            Bodies.rectangle(0, 300, 50, 600, { isStatic: true })
        ]);

        // add mouse control
        var mouse = Mouse.create(render.canvas),
            mouseConstraint = MouseConstraint.create(engine, {
                mouse: mouse,
                constraint: {
                    // allow bodies on mouse to rotate
                    angularStiffness: 0,
                    render: {
                        visible: false
                    }
                }
            });

        World.add(world, mouseConstraint);

        // keep the mouse in sync with rendering
        render.mouse = mouse;

        // fit the render viewport to the scene
        Render.lookAt(render, {
            min: { x: 0, y: 0 },
            max: { x: 800, y: 600 }
        });

        // run the engine
        Engine.run(engine);
    });
</script>
</body>
</html>