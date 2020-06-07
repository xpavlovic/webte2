
function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

async function displayGraph(data) {
    var speed = Number(document.getElementById("speed").value);
    var currentData = {x: [], y: [], t: []};
    var maxT = data[1].t[data[1].t.length - 1];
    var maxY = Math.max.apply(Math,data[1].y);
    var minY = Math.min.apply(Math,data[1].y);
    for (var i = 0; i < data[1].x.length; i++) {
        currentData.x[i] = data[1].x[i];
        currentData.y[i] = data[1].y[i];
        currentData.t[i] = data[1].t[i];
        drawGraph(currentData, maxT, maxY,    minY);
        await sleep(speed * 100);
    }
    document.getElementById("showGraph").disabled = false;
}
function drawGraph(data,maxT,maxY,minY)
{
    var graph1 = { x: data.t, y: data.x, type: 'scatter', name: 'x', line: {color: 'blue', width: 3 } };
    var graph2 = { x: data.t, y: data.y, type: 'scatter', name: 'y', line: {color: 'gray', width: 3 } };
    var layout = { xaxis: {range : [0,maxT]}, yaxis: {range: [minY - 0.1 ,maxY * 1.1]}};
    var draw =  [graph2];

    Plotly.newPlot('graph',draw,layout);
}




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

