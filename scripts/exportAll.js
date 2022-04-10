//When the page first loads.
$(document).ready( function() {
    console.log("Ready!");
    Chart.defaults.global.defaultFontColor = "black";

    for(let i = 1; i < 11; i++) {

        //check if saved slot is in session storage
        var labelsArr = sessionStorage.getItem("labelsArr"+i);
        if(!labelsArr){
            continue;
        } else {
            document.getElementById("graph" + String(i)).style.display = "block";
        } 
        labelsArr = labelsArr.split(",");
        var dataArr = sessionStorage.getItem("dataArr"+i);
        dataArr = dataArr.split(",");
        var db = sessionStorage.getItem("location"+i);
        var yaxis = sessionStorage.getItem("db"+i);
        var xaxis = sessionStorage.getItem("lowDate"+i);
        var gtype = sessionStorage.getItem("graph_type"+i);
        var color = "black"

        var ctx = document.getElementById("graphRegion" + (i - 1));
        ctx = ctx.getContext("2d");
        
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
                    colorschemes: {scheme: color,}
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
                }
            }
        });
    }
});
