$(document).ready(
    function()
    {
        $("#submit").click(
            function() {
                var input = encodeURIComponent(document.getElementById("inputName").value);
                var apiKey = document.getElementById("apiKey").value;

                var url = "https://147.175.121.210:4629/final_p/api/scripts?scripts=" + input + "&key=" + apiKey;

                $.get(url, function (data) {
                    document.getElementById("output").value=data;
                });
            });
    }
);