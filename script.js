function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

async function displayGraph(data) {
    let speed = 0;
    var currentData = {x: [], y: [], t: []};
    var maxT = data[0].t[data[0].t.length - 1];

    yVals = {min: Math.min.apply(Math,data[0].y), max: Math.max.apply(Math,data[0].y)};
    xVals = {min: Math.min.apply(Math,data[0].x), max: Math.max.apply(Math,data[0].x)};

    for (var i = 0; i < data[0].x.length; i++) {
        currentData.x[i] = data[0].x[i];
        currentData.y[i] = data[0].y[i];
        currentData.t[i] = data[0].t[i];
        drawGraph(currentData, maxT, xVals, yVals);
        await sleep(speed * 100);
    }
    document.getElementById("showGraph").disabled = false;
}
function drawGraph(data,maxT,xVals,yVals)
{
    var graph1 = { x: data.t, y: data.x, type: 'scatter', name: 'x', line: {color: '#b3a50e', width: 3 } };
    var graph2 = { x: data.t, y: data.y, xaxis: 'x2', yaxis: 'y2', type: 'scatter', name: 'y', line: {color: 'gray', width: 3 }  };
    var layoutGraph = {
        xaxis: {range : [0,maxT]},
        yaxis: {range: [xVals.min - 0.1 ,xVals.max * 1.1]},
        xaxis2: {range : [0,maxT]},
        yaxis2: {range: [yVals.min - 0.1 ,yVals.max * 1.1], anchor: 'x2'},
        grid: {rows: 1, columns: 2, pattern: 'independent'},
        margin: {l : 150, r: 200}
    };
    var drawGraph = [graph1,graph2];
    Plotly.newPlot('graph',drawGraph,layoutGraph);
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
        $('#animation_checkbox').change(
            function () {
                if ($(this).is(':checked')){
                    $('#animation').show();
                }
                else {
                    $('#animation').hide();
                }
            });
        $('#graph_checkbox').change(
            function () {
                if ($(this).is(':checked')){
                    $('#graph').show();
                }
                else {
                    $('#graph').hide();
                }
            });
        $('#playground_cb').change(
            function () {
                if ($(this).is(':checked')){
                    $('#playground').show();
                }
                else {
                    $('#playground').hide();
                }
            });

    },
);
