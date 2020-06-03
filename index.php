<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
<form action="" method="post">
    <label for="inputName">Zadaj meno skriptu (lietadlo, gulicka, kyvadlo, tlmenie): </label>
    <input type="text" name="inputName" id="inputName" placeholder="Name">

    <label for="inputParameter">Zadaj parameter: </label>
    <input type="number" name="inputParameter" id="inputParameter" placeholder="Parameter">

    <input type="button" value="Submit" id="submit">

</form>

<script>
    $(document).ready(
        function()
        {
            $("#submit").click(
                function() {
                    var inputName = document.getElementById("inputName").value;
                    var inputParameter = document.getElementById("inputParameter").value;

                    var url = "https://147.175.121.210:4629/final_p/api/scripts?scripts=" + inputName + "&parameter=" + inputParameter;
                    console.log(url);
                    $.getJSON(url, function (data) {
                        console.log(data);

                    });
                });
        }
    );
</script>
</body>
</html>
<?php

