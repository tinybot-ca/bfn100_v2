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
                    <div id="overall" class=""></div>
                    <br />
                    <div id="annual" class=""></div>
                    <br />
                    <div id="wordCloud" class=""></div>
                    
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

<script> // Rolling History -- STACKED COLUMN

    $(function() {
        
        var JsonData = $.ajax({
            dataType: "json",
            url: "{{ url('/charts/rollingHistory') }}",
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
            var myChart = Highcharts.chart('rollingHistory', {

                // Options for STACKED AREA
                // credits: {
                //     enabled: false
                // },
                // chart: {
                //     type: 'column'
                // },
                // title: {
                //     text: 'Last 6 Months'
                // },
                // subtitle: {
                //     text: 'Rolling 6 month history'
                // },
                // xAxis: {
                //     categories: categories,
                //     tickmarkPlacement: 'on',
                //     title: {
                //         enabled: false
                //     }
                // },
                // yAxis: {
                //     title: {
                //         text: 'Push-ups'
                //     },
                //     stackLabels: {
                //         enabled: true,
                //         style: {
                //             fontWeight: 'bold',
                //             color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                //         }
                //     }
                // },
                // tooltip: {
                //     split: true,
                //     valueSuffix: ' push-ups'
                // },
                // plotOptions: {
                //     area: {
                //         stacking: 'normal',
                //         lineColor: '#666666',
                //         lineWidth: 1,
                //         marker: {
                //             lineWidth: 1,
                //             lineColor: '#666666'
                //         }
                //     }
                // },
                // series: series

                credits: {
                    enabled: false
                },
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Last 6 Months'
                },
                subtitle: {
                    text: 'Rolling 6 month history'
                },
                xAxis: {
                    categories: categories
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Push-ups'
                    },
                    stackLabels: {
                        enabled: true,
                        style: {
                            fontWeight: 'bold',
                            color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                        }
                    }
                },
                // legend: {
                //     align: 'right',
                //     x: -30,
                //     verticalAlign: 'top',
                //     y: 25,
                //     floating: true,
                //     backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
                //     borderColor: '#CCC',
                //     borderWidth: 1,
                //     shadow: false
                // },
                tooltip: {
                    headerFormat: '<b>{point.x}</b><br/>',
                    pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
                },
                plotOptions: {
                    column: {
                        stacking: 'normal',
                        dataLabels: {
                            enabled: false,
                            color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
                        }
                    }
                },
                series: series

            }); // Highcharts options
        }
    });

</script>

<script> // Overall -- PIE CHART

    $(function () {

        var JsonData = $.ajax({
                dataType: "json",
                url: "{{ url('/charts/overall') }}",
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
            var myChart = Highcharts.chart('overall', {

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
                    data: series
                }]
            });
        }
    });

</script>
    
<script> // Annual -- COLUMN CHART
    
    $(function () {

        var JsonData = $.ajax({
                dataType: "json",
                url: "{{ url('/charts/annual') }}",
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
            var myChart = Highcharts.chart('annual', {
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
                    categories: categories
                },
                yAxis: {
                    title: {
                        text: 'Push-ups'
                    }
                },
                series: series    
            });
        }
    });

</script>

<script src="https://code.highcharts.com/modules/wordcloud.js"></script>

<script> // Comment Cloud -- WORD CLOUD

    $(function () {

        var JsonData = $.ajax({
                dataType: "json",
                url: "{{ url('/charts/wordCloud') }}",
                async: true,
                complete: function(data) {

                    var chartData = data.responseText;
                    
                    // console.log(chartData);

                    drawMyChart(chartData);
                }
            });

        function drawMyChart(text) {

            var lines = text.split(/[,\. ]+/g),
                data = Highcharts.reduce(lines, function (arr, word) {
                    var obj = Highcharts.find(arr, function (obj) {
                        return obj.name === word;
                    });
                    if (obj) {
                        obj.weight += 1;
                    } else {
                        obj = {
                            name: word,
                            weight: 1
                        };
                        arr.push(obj);
                    }
                    return arr;
                }, []);

            Highcharts.chart('wordCloud', {
                series: [{
                    type: 'wordcloud',
                    data: data,
                    name: 'Occurrences'
                }],
                title: {
                    text: 'Word Cloud'
                },
                subtitle: {
                    text: 'Occurrence-based word algorithm'
                },
                credits: {
                    enabled: false
                }
            });
        }
    });

</script>