// Class definition
var KTLib = function() {

    return {
        initMiniChart: function(src, data, color, border, fill, tooltip) {
            if (src.length == 0) {
                return;
            }

            // set default values
            fill = (typeof fill !== 'undefined') ? fill : false;
            tooltip = (typeof tooltip !== 'undefined') ? tooltip : false;

            var config = {
                type: 'line',
                data: {
                    labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October"],
                    datasets: [{
                        label: "",
                        borderColor: color,
                        borderWidth: border,
                        pointHoverRadius: 4,
                        pointHoverBorderWidth: 4,
                        pointBackgroundColor: Chart.helpers.color('#000000').alpha(0).rgbString(),
                        pointBorderColor: Chart.helpers.color('#000000').alpha(0).rgbString(),
                        pointHoverBackgroundColor: KTApp.getStateColor('brand'),
                        pointHoverBorderColor: Chart.helpers.color('#000000').alpha(0.1).rgbString(),
                        fill: fill,
                        backgroundColor: color,
                        data: data,
                    }]
                },
                options: {
                    title: {
                        display: false,
                    },
                    tooltips: (tooltip ? {
                        enabled: true,
                        intersect: false,
                        mode: 'nearest',
                        bodySpacing: 5,
                        yPadding: 10,
                        xPadding: 10, 
                        caretPadding: 0,
                        displayColors: false,
                        backgroundColor: KTApp.getStateColor('brand'),
                        titleFontColor: '#ffffff', 
                        cornerRadius: 4,
                        footerSpacing: 0,
                        titleSpacing: 0
                    } : false),
                    legend: {
                        display: false,
                        labels: {
                            usePointStyle: false
                        }
                    },
                    responsive: false,
                    maintainAspectRatio: true,
                    hover: {
                        mode: 'index'
                    },
                    scales: {
                        xAxes: [{
                            display: false,
                            gridLines: false,
                            scaleLabel: {
                                display: false,
                                labelString: 'Month'
                            }
                        }],
                        yAxes: [{
                            display: false,
                            gridLines: false,
                            scaleLabel: {
                                display: false,
                                labelString: 'Month'
                            }
                        }]
                    },

                    elements: {
                        line: {
                            tension: 0.5
                        },
                        point: {
                            radius: 2,
                            borderWidth: 4
                        },
                    },

                    layout: {
                        padding: {
                            left: 6,
                            right: 0,
                            top: 4,
                            bottom: 0
                        }
                    }
                }
            };

            var chart = new Chart(src, config);
        },

        initMediumChart: function(src, data, max, color, border) {
            if (!document.getElementById(src)) {
                return;
            }

            var border = border ? border : 2;

            // Main chart
            var ctx = document.getElementById(src).getContext("2d");

            var gradient = ctx.createLinearGradient(0, 0, 0, 100);
            gradient.addColorStop(0, Chart.helpers.color(color).alpha(0.3).rgbString());
            gradient.addColorStop(1, Chart.helpers.color(color).alpha(0).rgbString());

            var mainConfig = {
                type: 'line',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October'],
                    datasets: [{
                        label: 'Orders',
                        borderColor: color,
                        borderWidth: border,
                        backgroundColor: gradient,
                        pointBackgroundColor: KTApp.getStateColor('brand'),
                        data: data,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    title: {
                        display: false,
                        text: 'Stacked Area'
                    },
                    tooltips: {
                        enabled: true,
                        intersect: false,
                        mode: 'nearest',
                        bodySpacing: 5,
                        yPadding: 10,
                        xPadding: 10, 
                        caretPadding: 0,
                        displayColors: false,
                        backgroundColor: KTApp.getStateColor('brand'),
                        titleFontColor: '#ffffff', 
                        cornerRadius: 4,
                        footerSpacing: 0,
                        titleSpacing: 0
                    },
                    legend: {
                        display: false,
                        labels: {
                            usePointStyle: false
                        }
                    },
                    hover: {
                        mode: 'index'
                    },
                    scales: {
                        xAxes: [{
                            display: false,
                            scaleLabel: {
                                display: false,
                                labelString: 'Month'
                            },
                            ticks: {
                                display: false,
                                beginAtZero: true,
                            }
                        }],
                        yAxes: [{
                            display: false,
                            scaleLabel: {
                                display: false,
                                labelString: 'Value'
                            },
                            gridLines: {
                                color: '#eef2f9',
                                drawBorder: false,
                                offsetGridLines: true,
                                drawTicks: false
                            },
                            ticks: {
                                max: max,
                                display: false,
                                beginAtZero: true
                            }
                        }]
                    },
                    elements: {
                        point: {
                            radius: 0,
                            borderWidth: 0,
                            hoverRadius: 0,
                            hoverBorderWidth: 0
                        }
                    },
                    layout: {
                        padding: {
                            left: 0,
                            right: 0,
                            top: 0,
                            bottom: 0
                        }
                    }
                }
            };

            var chart = new Chart(ctx, mainConfig);

            // Update chart on window resize
            KTUtil.addResizeHandler(function() {
                chart.update();
            });
        }
    };
}();

// webpack support
if (typeof module !== 'undefined') {
    module.exports = KTLib;
}