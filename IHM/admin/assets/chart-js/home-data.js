$(document).ready(function() {
    var MONTHS=["Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Decembre"];
    var config= {
        type:'line', data: {
            labels:["Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août"], datasets:[ {
                label: "Lumiere", backgroundColor: window.chartColors.red, borderColor: window.chartColors.red, data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()], fill: false,
            }
            , {
                label: "KM4", fill: false, backgroundColor: window.chartColors.blue, borderColor: window.chartColors.blue, data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(),20],
            }
            , {
                label: "Danga", fill: false, backgroundColor: window.chartColors.orange, borderColor: window.chartColors.orange, data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(),20],
            }
            , {
                label: "Villa", fill: false, backgroundColor: window.chartColors.yellow, borderColor: window.chartColors.yellow, data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(),20],
            }
            ]
        }
        , options: {
            responsive:true, title: {
                display: true, text: 'Intevention par periode'
            }
            , tooltips: {
                mode: 'index', intersect: false,
            }
            , hover: {
                mode: 'nearest', intersect: true
            }
            , scales: {
                xAxes:[ {
                    display:true, scaleLabel: {
                        display: true, labelString: 'Periode'
                    }
                }
                ], yAxes:[ {
                    display:true, scaleLabel: {
                        display: true, labelString: 'Interventions'
                    }
                }
                ]
            }
        }
    }
    ;
    var ctx=document.getElementById("chartjs_line").getContext("2d");
    window.myLine=new Chart(ctx, config);
}

);
$(document).ready(function() {
	var randomScalingFactor = function() {
        return Math.round(Math.random() * 100);
    };

    var config = {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                ],
                backgroundColor: [
                    window.chartColors.red,
                    window.chartColors.orange,
                    window.chartColors.yellow,
                    window.chartColors.green,
                    window.chartColors.blue,
                ],
                label: 'Dataset 1'
            }],
            labels: [
                "Danga",
                "RP",
                "KM4",
                "Lumiere",
                "Villa"
            ]
        },
        options: {
            responsive: true,
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Toutes les intervention de chaque site'
            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        }
    };

        var ctx = document.getElementById("chartjs_doughnut").getContext("2d");
        window.myDoughnut = new Chart(ctx, config);
    
	});