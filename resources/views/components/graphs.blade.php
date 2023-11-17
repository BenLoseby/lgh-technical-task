<div id="graphs" class="v1-graphs">
    <div class="card">
        <h2><?= __('Contracts') ?></h2>
        <div id="bar-graph-contracts" class="graph"></div>
    </div>
    <div class="card">
        <h2><?= __('Quotes') ?></h2>
        <div id="bar-graph-quotes" class="graph"></div>
    </div>
    <div class="card">
        <h2><?= __('Weekly Hire Value') ?></h2>
        <div id="line-graph" class="graph"></div>
    </div>
</div>

<script>
    var contractsGraph = document.getElementById('bar-graph-contracts');
    if (contractsGraph) {
        var bars_basic = echarts.init(contractsGraph);
        bars_basic.setOption({
            color: ['#3398DB'],
            tooltip: {
                trigger: 'axis',
                axisPointer: {            
                    type: 'shadow'
                }
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            xAxis: [
                {
                    type: 'category',
                    data: <?php
                        echo(json_encode(array_keys($contracts)));
                    ?>,
                    axisTick: {
                        alignWithLabel: true
                    }
                }
            ],
            yAxis: [
                {
                    type: 'value'
                }
            ],
            series: [
                {
                    name: 'Contract Count',
                    type: 'bar',
                    barWidth: '20%',
                    data: <?php
                        echo(json_encode(array_values($contracts)));
                    ?>
                }
            ]
        });
    }

    var quptesGraph = document.getElementById('bar-graph-quotes');
    if (quptesGraph) {
        var bars_basic = echarts.init(quptesGraph);
        bars_basic.setOption({
            color: ['#3398DB'],
            tooltip: {
                trigger: 'axis',
                axisPointer: {            
                    type: 'shadow'
                }
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            xAxis: [
                {
                    type: 'category',
                    data: <?php
                        echo(json_encode(array_keys($quotes)));
                    ?>,
                    axisTick: {
                        alignWithLabel: true
                    }
                }
            ],
            yAxis: [
                {
                    type: 'value'
                }
            ],
            series: [
                {
                    name: 'Contract Count',
                    type: 'bar',
                    barWidth: '20%',
                    data: <?php
                        echo(json_encode(array_values($quotes)));
                    ?>
                }
            ]
        });
    }

    var line_stacked_element = document.getElementById('line-graph');
    if (line_stacked_element) {
        var line_stacked = echarts.init(line_stacked_element);
        line_stacked.setOption({
            animationDuration: 750,
            grid: {
                left: 0,
                right: 20,
                top: 35,
                bottom: 0,
                containLabel: true
            },        
            legend: {
                data: ['test'],
                itemHeight: 8,
                itemGap: 20
            },

            // Add tooltip
            tooltip: {
                trigger: 'axis',
                backgroundColor: 'rgba(0,0,0,0.75)',
                padding: [10, 15],
                textStyle: {
                    fontSize: 13,
                    fontFamily: 'Roboto, sans-serif'
                }
            },
            
            xAxis: [{
                type: 'category',
                boundaryGap: false,
                data:  <?php
                        echo(json_encode(array_keys($hireValue)));
                    ?>,
                axisLabel: {
                    color: '#333'
                },
                axisLine: {
                    lineStyle: {
                        color: '#999'
                    }
                },
                splitLine: {
                    lineStyle: {
                        color: ['#eee']
                    }
                }
            }],

            // Vertical axis
            yAxis: [{
                type: 'value',
                axisLabel: {
                    color: '#333'
                },
                axisLine: {
                    lineStyle: {
                        color: '#999'
                    }
                },
                splitLine: {
                    lineStyle: {
                        color: ['#eee']
                    }
                },
                splitArea: {
                    show: true,
                    areaStyle: {
                        color: ['rgba(250,250,250,0.1)', 'rgba(0,0,0,0.01)']
                    }
                }
            }],

            // Add series
            series: [            
                {
                    name: 'Weekly Hire Value',
                    type: 'line',
                    stack: 'Total',
                    smooth: false,
                    symbolSize: 7,
                    data: <?php
                        echo(json_encode(array_values($hireValue)));
                    ?>,
                    itemStyle: {
                        normal: {
                            borderWidth: 2
                        }
                    }
                }
            ]
        });
    }
</script>