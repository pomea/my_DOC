<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        .h {
            font-weight: bold;
            font-size: large;
            margin-bottom: 10px;
            border-bottom: 1px solid gray;
        }

        .f {
            font-weight: bold;
            font-size: small;
            margin-top: 15px;
            /* border-top: 1px solid gray; */
        }

        /* width */
        ::-webkit-scrollbar {
            width: 10px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #ffdc16;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: rgba(14, 18, 134, 0.716);
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: rgba(50, 84, 255, 0.874);
        }

        .chartBox {
            width: 80%;
        }

        .chartBox2 {
            width: 85%;
        }

        #chartdiv {
            width: 100%;
            height: 500px;
        }
    </style>
</head>

<body style="background-color: gray;">

    <div class=" m-2">
        <div class="row">
            <div class="col-12" id="col_chart1">
                <div class="card">
                    <div class="card-body d-flex justify-content-center">
                        <div class="chartBox">
                            <div id="chartdiv"></div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="btn" onclick="zoom_1()">x</button>
                    </div>
                </div>
            </div>
            <div class="col-6" id="col_chart2">
                <div class="card">
                    <div class="card-body d-flex justify-content-center">
                        <div class="chartBox2">
                            <canvas id="chart2"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-3" id="col_chart3">
                <div class="card">
                    <div class="card-body d-flex justify-content-center">
                        
                    </div>
                </div>
            </div> -->
        </div>
    </div>

    <div class="card d-flex justify-content-center m-2">
        <div class="card-header">
            <div class=" d-flex justify-content-between mt-2">
                <h3>Daily Task</h3>
                <span><input data-provide="datepicker"><button class="btn-sm btn-primary">go</button></span>
            </div>

        </div>
        <div class="card-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <h4>Search Option</h4>
                                </div>
                                <div>
                                    <h4>Summary</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-9" style="overflow-y: auto; height: 500px;">
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="h">
                                    <span class="text-break">detail</span>
                                    <span>1</span>
                                </div>
                                <div class="text-break">
                                    <p>content</p>
                                </div>
                                <div class=" d-flex justify-content-between mt-2">
                                    <p class="badge mb-0 mt-1 text-wrap bg-warning" style="padding: 7px;">approve 1</p>
                                    <div class="btn btn-primary btn-sm text-white ">Approve</div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="h">
                                    <span class="text-break">detail</span>
                                    <span>1</span>
                                </div>
                                <div class="text-break">
                                    <p>content</p>
                                </div>
                                <div class=" d-flex justify-content-between mt-2">
                                    <p class="badge mb-0 mt-1 text-wrap bg-warning" style="padding: 7px;">approve 1</p>
                                    <div class="btn btn-primary btn-sm text-white ">Approve</div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>





    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

    <script>
        $(document).ready(() => {
            my_chart1();
        })


        var check_zoom = false;

        function zoom_1() {
            if (check_zoom == false) {
                $("#col_chart1").removeClass("col-3");
                $("#col_chart2").removeClass("col-6");
                $("#col_chart1, #col_chart2").toggleClass("col-6");
                check_zoom = true;
            } else {
                $("#col_chart1, #col_chart2").toggleClass("col-6");
                $("#col_chart1").addClass("col-3");
                $("#col_chart2").addClass("col-6");
                check_zoom = false;
            }
        }

        function get_request_value(users){
            const emp_id = users.id;
            // console.log(emp_id.length);
            const emp_name = users.name;
            $.ajax({
                type: 'GET',
                url: 'ajax/tech_chart1.php',
                data: {
                    ids: JSON.stringify(emp_id),
                    names: JSON.stringify(emp_name)
                },
                success: function(data) {
                    const quest_val = JSON.parse(data);
                    console.log(data);
                }
            })
        }

        function my_chart1() {

            $.ajax({
                type: 'GET',
                url: 'ajax/chart_get_user.php',
                data: {},
                success: function(data) {
                    const users = JSON.parse(data);
                    console.log(users);
                    get_request_value(users);
                }
            })

            

            am5.ready(function() {

                // Create root element
                // https://www.amcharts.com/docs/v5/getting-started/#Root_element
                var root = am5.Root.new("chartdiv");


                // Set themes
                // https://www.amcharts.com/docs/v5/concepts/themes/
                root.setThemes([
                    am5themes_Animated.new(root)
                ]);


                // Create chart
                // https://www.amcharts.com/docs/v5/charts/xy-chart/
                var chart = root.container.children.push(am5xy.XYChart.new(root, {
                    panX: false,
                    panY: false,
                    wheelX: "panX",
                    wheelY: "zoomX",
                    layout: root.verticalLayout
                }));

                // Add scrollbar
                // https://www.amcharts.com/docs/v5/charts/xy-chart/scrollbars/
                chart.set("scrollbarX", am5.Scrollbar.new(root, {
                    orientation: "horizontal"
                }));
                
                var str = '['

                str += ']'


                console.log(str)
                var data = [{
                    "year": "2021",
                    "europe": 2.5,
                    "namerica": 2.5,
                    "asia": 2.1,
                    "lamerica": 1,
                    "meast": 0.8,
                    "africa": 0.4
                }, {
                    "year": "2022",
                    "europe": 2.6,
                    "namerica": 2.7,
                    "asia": 2.2,
                    "lamerica": 0.5,
                    "meast": 0.4,
                    "africa": 0.3
                }, {
                    "year": "2023",
                    "europe": 2.8,
                    "namerica": 2.9,
                    "asia": 2.4,
                    "lamerica": 0.3,
                    "meast": 0.9,
                    "africa": 0.5
                }]


                // Create axes
                // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
                var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
                    categoryField: "year",
                    renderer: am5xy.AxisRendererX.new(root, {}),
                    tooltip: am5.Tooltip.new(root, {})
                }));

                xAxis.data.setAll(data);

                var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
                    min: 0,
                    renderer: am5xy.AxisRendererY.new(root, {})
                }));


                // Add legend
                // https://www.amcharts.com/docs/v5/charts/xy-chart/legend-xy-series/
                var legend = chart.children.push(am5.Legend.new(root, {
                    centerX: am5.p50,
                    x: am5.p50
                }));


                // Add series
                // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
                function makeSeries(name, fieldName) {
                    var series = chart.series.push(am5xy.ColumnSeries.new(root, {
                        name: name,
                        stacked: true,
                        xAxis: xAxis,
                        yAxis: yAxis,
                        valueYField: fieldName,
                        categoryXField: "year"
                    }));

                    series.columns.template.setAll({
                        tooltipText: "{name}, {categoryX}: {valueY}",
                        tooltipY: am5.percent(10)
                    });
                    series.data.setAll(data);

                    // Make stuff animate on load
                    // https://www.amcharts.com/docs/v5/concepts/animations/
                    series.appear();

                    series.bullets.push(function() {
                        return am5.Bullet.new(root, {
                            sprite: am5.Label.new(root, {
                                text: "{valueY}",
                                fill: root.interfaceColors.get("alternativeText"),
                                centerY: am5.p50,
                                centerX: am5.p50,
                                populateText: true
                            })
                        });
                    });

                    legend.data.push(series);
                }

                makeSeries("Europe", "europe");
                makeSeries("North America", "namerica");
                makeSeries("Asia", "asia");
                makeSeries("Latin America", "lamerica");
                makeSeries("Middle East", "meast");
                makeSeries("Africa", "africa");


                // Make stuff animate on load
                // https://www.amcharts.com/docs/v5/concepts/animations/
                chart.appear(1000, 100);

            }); // end am5.ready()
        }
    </script>
</body>

</html>