//When the page first loads.
$(document).ready(function () {
    console.log("Ready!");
    Chart.defaults.global.defaultFontColor = "black";

    var labelsArr = sessionStorage.getItem("labelsArr");
    console.log(labelsArr)
    labelsArr = labelsArr.split(",");
    var dataArr = sessionStorage.getItem("dataArr");
    console.log(dataArr)
    dataArr = dataArr.split(",");
    var db = sessionStorage.getItem("db");
    var yaxis = sessionStorage.getItem("y");
    var xaxis = sessionStorage.getItem("x");
    var gtype = sessionStorage.getItem("graph_type");
    var color = sessionStorage.getItem("color");
    var citation = sessionStorage.getItem("citation");

    var ctx = document.getElementById("graphRegion");
    ctx = ctx.getContext("2d");
    
    console.log(sessionStorage);
    var graph = new Chart(ctx, {
        type: gtype,
        data: {
            datasets: [{
                label: yaxis + " (" + gtype + ")",
                data: dataArr,
            }],
            labels: labelsArr
        },
        options: {
            plugins: {
                colorschemes: { scheme: color, }
            },
            scales: {
                yAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: db,
                        fontSize: 15
                    }
                }],
                xAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: xaxis,
                        fontSize: 15
                    }
                }]
            },
            title: {
                display: true,
                text: db + " -- " + yaxis,
                fontSize: 20
            },
            citations: {
                display: true,
                text: "citations",
                fontSize: 10
            }
        }
    });
});
