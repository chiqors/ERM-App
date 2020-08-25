'use strict';
$(document).ready(function () {
    // Beranda
    var rekammedis_chart = AmCharts.makeChart("rekammedis-map", {
        "type": "serial",
        "theme": "light",
        "dataDateFormat": "YYYY-MM-DD",
        "precision": 2,
        "valueAxes": [{
            "id": "v1",
            "title": "Sales",
            "position": "left",
            "autoGridCount": false,
            "labelFunction": function (value) {
                return "$" + Math.round(value) + "M";
            }
        }, {
            "id": "v2",
            "title": "Data Rekam Medis",
            "gridAlpha": 0,
            "autoGridCount": false
        }],
        "graphs": [{
            "id": "g1",
            "valueAxis": "v2",
            "bullet": "round",
            "bulletBorderAlpha": 1,
            "bulletColor": "#FFFFFF",
            "bulletSize": 5,
            "hideBulletsCount": 50,
            "lineThickness": 2,
            "lineColor": "#448aff",
            "type": "smoothedLine",
            "title": "Jam Aktif",
            "useLineColorForBulletBorder": true,
            "valueField": "market1",
            "balloonText": "[[title]]<br /><b style='font-size: 130%'>[[value]]</b>"
        }, {
            "id": "g2",
            "valueAxis": "v2",
            "bullet": "round",
            "bulletBorderAlpha": 1,
            "bulletColor": "#FFFFFF",
            "bulletSize": 5,
            "hideBulletsCount": 50,
            "lineThickness": 2,
            "lineColor": "#536dfe",
            "type": "smoothedLine",
            "title": "Seluruh Jam Aktif",
            "useLineColorForBulletBorder": true,
            "valueField": "market2",
            "balloonText": "[[title]]<br /><b style='font-size: 130%'>[[value]]</b>"
        }],
        "chartCursor": {
            "pan": true,
            "valueLineEnabled": true,
            "valueLineBalloonEnabled": true,
            "cursorAlpha": 0,
            "valueLineAlpha": 0.2
        },
        "categoryField": "date",
        "categoryAxis": {
            "parseDates": true,
            "dashLength": 1,
            "minorGridEnabled": true
        },
        "legend": {
            "useGraphSettings": true,
            "position": "top"
        },
        "balloon": {
            "borderThickness": 1,
            "shadowAlpha": 0
        },
        "export": {
            "enabled": true
        },
        "dataProvider": [{
            "date": "2013-01-16",
            "market1": 85,
            "market2": 75
        }, {
            "date": "2013-01-17",
            "market1": 74,
            "market2": 80
        }, {
            "date": "2013-01-18",
            "market1": 78,
            "market2": 88
        }, {
            "date": "2013-01-19",
            "market1": 85,
            "market2": 75
        }, {
            "date": "2013-01-20",
            "market1": 82,
            "market2": 89
        }, {
            "date": "2013-01-21",
            "market1": 83,
            "market2": 78
        }, {
            "date": "2013-01-22",
            "market1": 72,
            "market2": 92
        }, {
            "date": "2013-01-23",
            "market1": 85,
            "market2": 76
        }]
    });
    var sapi_rekammedis_barchart = AmCharts.makeChart("sapisakit-barchart", {
        "type": "serial",
        "theme": "light",
        "dataProvider": [
            {
                "type": "Sapi A",
                "visits": 14
            }, {
                "type": "Sapi B",
                "visits": 11
            }, {
                "type": "Sapi C",
                "visits": 9
            }
        ],
        "valueAxes": [{
            "gridAlpha": 0.3,
            "gridColor": "yellow",
            "axisColor": "transparent",
            "color": 'green',
            "dashLength": 0
        }],
        "gridAboveGraphs": true,
        "startDuration": 1,
        "graphs": [{
            "balloonText": "Jumlah Rekam Medis: <b>[[value]]</b>",
            "fillAlphas": 1,
            "lineAlpha": 1,
            "lineColor": "#36d3d6",
            "type": "column",
            "valueField": "visits",
            "columnWidth": 0.5
        }],
        "chartCursor": {
            "categoryBalloonEnabled": false,
            "cursorAlpha": 0,
            "zoomable": false
        },
        "categoryField": "type",
        "categoryAxis": {
            "gridPosition": "start",
            "gridAlpha": 0,
            "axesAlpha": 0,
            "lineAlpha": 0,
            "fontSize": 12,
            "color": '#000',
            "tickLength": 0
        },
        "export": {
            "enabled": false
        }
    });
    floatchart()
    $(window).on('resize', function () {
        floatchart();
    });
    $('#mobile-collapse').on('click', function () {
        setTimeout(function () {
            floatchart();
        }, 700);
    });
});

function floatchart() {
    $(function () {
        var options = {
            legend: {
                show: false
            },
            series: {
                label: "",
                curvedLines: {
                    active: true,
                    nrSplinePoints: 20
                },
            },
            tooltip: {
                show: true,
                content: "x : %x | y : %y"
            },
            grid: {
                hoverable: true,
                borderWidth: 0,
                labelMargin: 0,
                axisMargin: 0,
                minBorderMargin: 0,
            },
            yaxis: {
                min: 0,
                max: 30,
                color: 'transparent',
                font: {
                    size: 0,
                }
            },
            xaxis: {
                color: 'transparent',
                font: {
                    size: 0,
                }
            }
        };
        $.plot($("#obat-dailysales"), [{
            data: [
                [0, 2],
                [1, 20],
                [2, 10],
                [3, 27],
                [4, 10],
                [5, 20],
                [6, 15],
                [7, 24],
                [8, 16],
                [9, 20],
                [10, 10],
                [11, 18],
                [12, 20],
                [13, 10],
                [14, 5],
            ],
            color: "#448aff",
            bars: {
                show: true,
                lineWidth: 1,
                fill: true,
                fillColor: {
                    colors: [{
                        opacity: 1
                    }, {
                        opacity: 1
                    }]
                },
                barWidth: 0.5,
                align: 'center',
                horizontal: false
            },
            points: {
                show: false
            },
        }], options);
        $.plot($("#obat-weeksales"), [{
            data: [
                [0, 2],
                [1, 20],
                [2, 10],
                [3, 27],
                [4, 10],
                [5, 20],
                [6, 15],
                [7, 24],
                [8, 16],
                [9, 20],
                [10, 10],
                [11, 18],
                [12, 20],
                [13, 10],
                [14, 5],
            ],
            color: "#448aff",
            bars: {
                show: true,
                lineWidth: 1,
                fill: true,
                fillColor: {
                    colors: [{
                        opacity: 1
                    }, {
                        opacity: 1
                    }]
                },
                barWidth: 0.5,
                align: 'center',
                horizontal: false
            },
            points: {
                show: false
            },
        }], options);
    });
}
