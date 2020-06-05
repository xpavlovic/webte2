$(document).ready(
    function()
    {
        $("#submit").click(
            function() {
                var inputName = document.getElementById("inputName").value;
                var inputParameter = document.getElementById("inputParameter").value;
                var apiKey = document.getElementById("apiKey").value;

                var url = "https://147.175.121.210:4629/final_p/api/scripts?scripts=" + inputName + "&parameter=" + inputParameter + "&key=" + apiKey;

                console.log(url);

                $.getJSON(url, function (data) {
                    console.log(data);
                });
            });
    }
);