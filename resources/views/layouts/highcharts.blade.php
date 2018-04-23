<!-- Highcharts -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    <h4>Charts</h4>
                </div>
            
                <div class="card-body">
                    
                    <div id="currentMonth" class=""></div>
                    <br />
                    <div id="lastMonth" class=""></div>
                    <br />
                    <div id="rollingHistory" class=""></div>
                    <br />
                    <div id="chart2" class=""></div>
                    <br />
                    <div id="chart3" class=""></div>
                    <br />
                    <div id="chart1" class=""></div>
                    
                </div><!-- card-body -->

            </div><!-- card -->

        </div>
    </div>
</div><!-- container -->
        
<script> // Highcharts Options

    Highcharts.setOptions({
        lang: {
            thousandsSep: ','
        },
        chart: {
            backgroundColor: {
                linearGradient: [0, 0, 500, 500],
                stops: [
                    [0, 'rgb(255, 255, 255)'],
                    [1, 'rgb(240, 240, 240)']
                ]
            },
            borderWidth: 1,
            borderColor: '#DFE2E6',
            plotShadow: false,
            plotBorderWidth: 0
        }
    });

</script>

<script> // Current Month -- LINE CHART
    
    $(function() {
    
        var JsonData = $.ajax({
            dataType: "json",
            url: "{{ url('/charts/currentMonth') }}",
            async: true,
            complete: function(data) {

                var chartData = data.responseJSON;
                
                var categories = chartData['categories'];
                var series = chartData['series'];

                // console.log(categories);
                // console.log(series);

                drawMyChart(categories, series);
            }
        });

        function drawMyChart(categories, series) {
            var myChart = Highcharts.chart('currentMonth', {

                credits: {
                    enabled: false
                },
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Current Month'
                },
                subtitle: {
                    text: 'Total push-ups for {{ date('F') }}'
                },
                xAxis: {
                    categories: categories
                },
                yAxis: {
                    title: {
                        text: 'Push-ups'
                    }
                },
                plotOptions: {
                    line: {
                        dataLabels: {
                            enabled: false
                        },
                        enableMouseTracking: true
                    }
                },
                type: 'category',
                series: series

            }); // Highcharts options
        }
    });

</script>
    
<script> // Last Month -- BAR CHART
    
    $(function() {

        var JsonData = $.ajax({
            dataType: "json",
            url: "{{ url('/charts/lastMonth') }}",
            async: true,
            complete: function(data) {
                // console.log(data.responseJSON);
                drawMyChart(data.responseJSON);
            }
        });
    
        function drawMyChart(chartData) {
            var myChart = Highcharts.chart('lastMonth', {
                credits: {
                    enabled: false
                },
                chart: {
                    type: 'bar'
                },
                title: {
                    text: 'Last Month'
                },
                subtitle: {
                    text: 'Total push-ups for {{ date("F", strtotime("first day of previous month")) }}'
                },
                xAxis: {
                    categories: ['{{ date("F", strtotime("first day of previous month")) }}']
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Push-ups'
                    }
                },
                plotOptions: {
                    bar: {
                        dataLabels: {
                            enabled: true
                        },
                        enableMouseTracking: true
                    }
                },
                series: chartData
            })
        }
    });

</script>

<script> // Rolling History -- STACKED AREA

    $(function() {
        
        var JsonData = $.ajax({
            dataType: "json",
            url: "{{ url('/charts/rollingHistory') }}",
            async: true,
            complete: function(data) {

                var chartData = data.responseJSON;
                
                var categories = chartData['categories'];
                var series = chartData['series'];

                console.log(categories);
                console.log(series);

                drawMyChart(categories, series);
            }
        });

        function drawMyChart(categories, series) {
            var myChart = Highcharts.chart('rollingHistory', {

                credits: {
                    enabled: false
                },
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Current Month'
                },
                subtitle: {
                    text: 'Total push-ups for {{ date('F') }}'
                },
                xAxis: {
                    categories: categories
                },
                yAxis: {
                    title: {
                        text: 'Push-ups'
                    }
                },
                plotOptions: {
                    line: {
                        dataLabels: {
                            enabled: false
                        },
                        enableMouseTracking: true
                    }
                },
                type: 'category',
                series: series

            }); // Highcharts options
        }
    });

</script>

<script> // WORD CLOUD -- TBD

</script>


<script> // myChart1 -- COLUMN CHART -- Total by Year
    
    $(function () {
        var myChart1 = Highcharts.chart('chart1', {
            credits: {
                enabled: false
            },
            chart: {
                type: 'column'
            },
            title: {
                text: 'Annual'
            },
            subtitle: {
                text: 'Total push-ups by year'
            },
            xAxis: {
                categories: ['2018', '2017']
            },
            yAxis: {
                title: {
                    text: 'Push-ups'
                }
            },
            series: [{"name":"bernie","data":[3100,4748]},{"name":"moti","data":[3520,5380]},{"name":"nikosuave","data":[760,0]},{"name":"ashman","data":[470,0]}]      });
    });

</script>

<script> // myChart2 -- PIE CHART -- Total Overall
    
    $(function () {
        var myChart2 = Highcharts.chart('chart2', {
            credits: {
                enabled: false
            },
            chart: {
                type: 'pie'
            },
            title: {
                text: 'Overall'
            },
            subtitle: {
                text: 'Total overall push-ups'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>:<br />{point.y:,.0f}',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{
                name: 'Push-ups',
                colorByPoint: true,
                data: [{"name":"bernie","y":7848},{"name":"moti","y":8900},{"name":"nikosuave","y":760},{"name":"ashman","y":470}]          }]
        });
    });

</script>

<script> // myChart3 -- LINE CHART -- Total by Month

    $(function () {
        var myChart3 = Highcharts.chart('chart3', {
            credits: {
                enabled: false
            },
            chart: {
                type: 'line'
            },
            title: {
                text: 'Monthly'
            },
            subtitle: {
                text: 'Total push-ups by month'
            },
            xAxis: {
                categories: ['Sep', 'Oct', 'Nov', 'Dec', 'Jan', 'Feb', 'Mar', 'Apr']
            },
            yAxis: {
                title: {
                    text: 'Push-ups'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: true
                }
            },
            series: [{"name":"bernie","data":[400,2400,948,1000,1100,500,1200,300]},{"name":"moti","data":[210,1570,1800,1800,1200,840,1180,300]},{"name":"nikosuave","data":[0,0,0,0,0,0,460,300]},{"name":"ashman","data":[0,0,0,0,0,0,270,200]}]      
        });
    });
</script>
