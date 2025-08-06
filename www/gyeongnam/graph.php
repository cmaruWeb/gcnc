<?php
	$m1 = 3;
	$m2 = 4;
	$m3 = 1;

	include("../inc/top.php" );
	include("../inc/sub_top.php" );
?>

<div class="pdinner">
    <div class="leftmenu">
        <?php include("../inc/menu.php" ); ?>
    </div>
    <div class="rightContent">
        <div class="subtop">
            <h3><?=$mTitle[$m1][$m2][0]?></h3>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <div class="sub_graph">
            <div class="titbox mb">
                <div class="tit">
                    <p class="h_m">경상남도 온실가스 배출량</p>
                </div>
                <div class="con">
                    <canvas id="ghgChart"></canvas>
                    <script>
                        const ctx = document
                            .getElementById('ghgChart')
                            .getContext('2d');

                        const data = {
                            labels: [
                                '2016',
                                '2017',
                                '2018',
                                '2019',
                                '2020',
                                '2021',
                                '2022'
                            ],
                            datasets: [
                                {
                                    label: '도시건물',
                                    data: [
                                        9498.9,
                                        9781.4,
                                        10321.8,
                                        9532.4,
                                        9532.4,
                                        9098.4,
                                        9101.6
                                    ],
                                    backgroundColor: '#7b7990',
                                    stack: 'stack1',
                                    order: 5
                                }, {
                                    label: '수송/교통',
                                    data: [
                                        7189.1,
                                        7098.4,
                                        7009.5,
                                        7141.8,
                                        7058.9,
                                        7267.7,
                                        7261.1
                                    ],
                                    backgroundColor: '#6692A8',
                                    stack: 'stack1',
                                    order: 5
                                }, {
                                    label: '농축수산',
                                    data: [
                                        2217.9,
                                        2180.9,
                                        2131.7,
                                        2132.7,
                                        2085.4,
                                        2092.7,
                                        2051.7
                                    ],
                                    backgroundColor: '#9A87C1',
                                    stack: 'stack1',
                                    order: 5
                                }, {
                                    label: '폐기물',
                                    data: [
                                        1361.7,
                                        1434.2,
                                        1304.4,
                                        1235.9,
                                        1262.5,
                                        1215.5,
                                        1201.8
                                    ],
                                    backgroundColor: '#E1925A',
                                    stack: 'stack1',
                                    order: 5
                                }, {
                                    label: '산림녹지환경',
                                    data: [
                                        -5486.8,
                                        -4906.6,
                                        -4667.3,
                                        -4351.2,
                                        -4368.8,
                                        -4375.7,
                                        -4537.5
                                    ],
                                    backgroundColor: '#8CBF26',
                                    stack: 'stack1',
                                    order: 5
                                }, {
                                    label: '순배출합계',
                                    data: [
                                        14780.8,
                                        15588.2,
                                        16100.1,
                                        15691.7,
                                        15570.4,
                                        15298.7,
                                        15078.7
                                    ],
                                    type: 'line',
                                    borderColor: '#4d5172ff',
                                    backgroundColor: 'rgba(51, 102, 204, 0.1)',
                                    borderWidth: 2,
                                    pointRadius: 6,
                                    pointBackgroundColor: '#4d5172ff',
                                    pointBorderColor: '#ffffff',
                                    pointBorderWidth: 2,
                                    tension: 0,
                                    yAxisID: 'y1',
                                    order: 1,
                                    fill: false
                                }, {
                                    label: '총배출합계',
                                    data: [
                                        20267.6,
                                        20494.8,
                                        20767.4,
                                        20042.9,
                                        19939.2,
                                        19674.3,
                                        19616.2
                                    ],
                                    type: 'line',
                                    borderColor: '#d32f2f',
                                    backgroundColor: 'rgba(255, 102, 0, 0.1)',
                                    borderWidth: 2,
                                    pointRadius: 6,
                                    pointBackgroundColor: '#d32f2f',
                                    pointBorderColor: '#ffffff',
                                    pointBorderWidth: 2,
                                    tension: 0,
                                    yAxisID: 'y1',
                                    order: 2,
                                    fill: false
                                }
                            ]
                        };

                        const config = {
                            type: 'bar',
                            data: data,
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                layout: {
                                    padding: {
                                        top: 40 // ✅ 상단 여백 추가 (필요 시 값 조절)
                                    }
                                },
                                plugins: {
                                    legend: {
                                        position: 'bottom',
                                        labels: {
                                            usePointStyle: true,
                                            font: {
                                                weight: 'bold'
                                            }
                                        }
                                    },
                                    tooltip: {
                                        mode: 'index',
                                        intersect: false,
                                        callbacks: {
                                            label: (context) => context.dataset.label + ': ' + context.formattedValue + ' 천 tCO₂eq'
                                        }
                                    }
                                },
                                interaction: {
                                    mode: 'nearest',
                                    axis: 'x',
                                    intersect: false
                                },
                                scales: {
                                    y: {
                                        type: 'linear',
                                        position: 'left',
                                        beginAtZero: false,
                                        min: -6000,
                                        max: 22000,
                                        grid: {
                                            color: 'rgba(0,0,0,0.1)'
                                        }
                                    },
                                    y1: {
                                        type: 'linear',
                                        position: 'right',
                                        min: -6000,
                                        max: 22000,
                                        grid: {
                                            drawOnChartArea: false,
                                            drawTicks: false,
                                            color: 'transparent'
                                        },
                                        border: {
                                            display: false
                                        },
                                        ticks: {
                                            color: '#666'
                                        }
                                    },
                                    x: {
                                        stacked: true,
                                        grid: {
                                            color: 'rgba(0,0,0,0.1)'
                                        }
                                    }
                                }
                            },
                            plugins: [
                                {
                                    id: 'customText',
                                    afterDraw: (chart) => {
                                        const {ctx, chartArea: {
                                                top
                                            }} = chart;
                                        const canvasWidth = chart.width;

                                        ctx.save();
                                        ctx.font = '14px Arial';
                                        ctx.fillStyle = '#444';
                                        ctx.textAlign = 'right';
                                        ctx.textBaseline = 'top';

                                        // ✅ 노란색 영역(오른쪽 위 바깥쪽)에 위치
                                        ctx.fillText('단위 : 천 tCO₂eq', canvasWidth - 50, top - 25);

                                        ctx.restore();
                                    }
                                }
                            ]
                        };

                        new Chart(ctx, config);
                    </script>
                </div>

            </div>
            <div class="titbox bmb">
                <div class="tit"></div>
                <div class="con">
                    <div class="scroll-box bg">
                        <table class="tab01 type01 tac small">
                            <thead>
                                <tr>
                                    <th rowspan="2">구분</th>
                                    <th colspan="7">연도</th>
                                </tr>
                                <tr>
                                    <th>2016</th>
                                    <th>2017</th>
                                    <th>2018</th>
                                    <th>2019</th>
                                    <th>2020</th>
                                    <th>2021</th>
                                    <th>2022</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <strong>총 배출 합계</strong>
                                    </td>
                                    <td>20,267.6</td>
                                    <td>20,494.8</td>
                                    <td>20,767.4</td>
                                    <td>20,042.9</td>
                                    <td>19,939.2</td>
                                    <td>19,674.3</td>
                                    <td>19,616.2</td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>순 배출 합계</strong>
                                    </td>

                                    <td>14,780.8</td>
                                    <td>15,588.2</td>
                                    <td>16,100.1</td>
                                    <td>15,691.7</td>
                                    <td>15,570.4</td>
                                    <td>15,298.7</td>
                                    <td>15,078.7</td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>도시건물</strong>
                                    </td>
                                    <td>9,498.9</td>
                                    <td>9,781.4</td>
                                    <td>10,321.8</td>
                                    <td>9,532.4</td>
                                    <td>9,532.4</td>
                                    <td>9,098.4</td>
                                    <td>9,101.6</td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>수송/교통</strong>
                                    </td>
                                    <td>7,189.1</td>
                                    <td>7,098.4</td>
                                    <td>7,009.5</td>
                                    <td>7,141.8</td>
                                    <td>7,058.9</td>
                                    <td>7,267.7</td>
                                    <td>7,261.1</td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>농축수산</strong>
                                    </td>
                                    <td>2,217.9</td>
                                    <td>2,180.9</td>
                                    <td>2,131.7</td>
                                    <td>2,132.7</td>
                                    <td>2,085.4</td>
                                    <td>2,092.7</td>
                                    <td>2,051.7</td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>폐기물</strong>
                                    </td>
                                    <td>1,361.7</td>
                                    <td>1,434.2</td>
                                    <td>1,304.4</td>
                                    <td>1,235.9</td>
                                    <td>1,262.5</td>
                                    <td>1,215.5</td>
                                    <td>1,201.8</td>
                                </tr>
                                <tr>
                                    <td class="tb-bg">
                                        <strong>산림녹지환경</strong>
                                    </td>
                                    <td class="tb-bg">-5,486.8</td>
                                    <td class="tb-bg">-4,906.6</td>
                                    <td class="tb-bg">-4,667.3</td>
                                    <td class="tb-bg">-4,351.2</td>
                                    <td class="tb-bg">-4,368.8</td>
                                    <td class="tb-bg">-4,375.7</td>
                                    <td class="tb-bg">-4,537.5</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>

            <div class="titbox bmb">
                <div class="tit">
                    <p class="h_m">경남의 평균 기온변화</p>
                </div>
                <div class="con">
                    <canvas id="tempRangeChart"></canvas>
                    <script>
                        const ctxRange = document
                            .getElementById('tempRangeChart')
                            .getContext('2d');

                        // ✅ 2015~2024 데이터
                        const years = [
                            2015,
                            2016,
                            2017,
                            2018,
                            2019,
                            2020,
                            2021,
                            2022,
                            2023,
                            2024
                        ];
                        const avgTemp = [
                            14.1,
                            14.4,
                            14.4,
                            13.8,
                            14.6,
                            14.1,
                            14.4,
                            14.4,
                            14.8,
                            15.5
                        ];
                        const minTemp = [
                            9.4,
                            9.8,
                            8.8,
                            8.8,
                            9.8,
                            7.7,
                            10.0,
                            9.5,
                            10.5,
                            11.2
                        ];
                        const maxTemp = [
                            19.7,
                            19.7,
                            20.0,
                            19.6,
                            20.2,
                            19.5,
                            20.0,
                            19.7,
                            20.3,
                            20.8
                        ];

                        const dataRange = {
                            labels: years,
                            datasets: [
                                {
                                    label: '평균최저기온(°C)',
                                    data: minTemp,
                                    borderColor: 'transparent',
                                    backgroundColor: 'rgba(255,182,72,0.4)', // 🔹 노란빛 영역
                                    pointBackgroundColor: 'orange',
                                    pointBorderColor: 'orange',
                                    pointRadius: 3,
                                borderWidth: 2,
                                    fill: '+1',
                                    order: 3
                                }, {
                                    label: '평균최고기온(°C)',
                                    data: maxTemp,
                                    borderColor: 'transparent',
                                    backgroundColor: 'rgba(255,182,72,0.4)',
                                    pointBackgroundColor: 'orange',
                                    pointBorderColor: 'orange',
                                    pointRadius: 3,
                                borderWidth: 2,
                                    fill: '-1',
                                    order: 2
                                }, {
                                    label: '평균기온(°C)',
                                    data: avgTemp,
                                    borderColor: '#272d96',
                                    backgroundColor: '#272d96',
                                    tension: 0.3,
                                    pointRadius: 4,
                                    pointBackgroundColor: '#272d96',
                                    pointBorderColor: '#fff',
                                borderWidth: 2,
                                    pointBorderWidth: 2,
                                    fill: false,
                                    order: 1 // ✅ 항상 맨 위
                                }
                            ]
                        };

                        const configRange = {
                            type: 'line',
                            data: dataRange,
                            options: {
                                responsive: true,
                                plugins: {
                                    legend: {
                                        position: 'bottom',
                                    labels: {
                                        usePointStyle: true,
                                        pointStyle: 'circle',
                                        font: {
                                            weight: 'bold'
                                        }
                                    }
                                    },
                                    tooltip: {
                                        mode: 'index',
                                        intersect: false
                                    }
                                },
                                scales: {
                                    y: {
                                        min: 0,
                                        max: 25,
                                        title: {
                                            display: true,
                                            text: '온도(°C)'
                                        }
                                    }
                                }
                            }
                        };

                        new Chart(ctxRange, configRange);
                    </script>

                </div>
            </div>

            <!--<div class="titbox bmb"> <div class="tit"> <p class="h_m">경남의 폭염일수</p>
            </div> <div class="con"> <canvas id="heatwaveChart"></canvas> <script> const
            heatwaveCtx = document .getElementById('heatwaveChart') .getContext('2d'); const
            heatwaveData = { labels: [ '2015', '2016', '2017', '2018', '2019', '2020',
            '2021', '2022', '2023', '2024' ], datasets: [ { label: '폭염일수', data: [ 5.5,
            13.8, 14.2, 19.5, 12.3, 8.6, 7.5, 16.7, 10.5, 32 ], borderColor: '#ed5136',
            backgroundColor: '#ed5136', borderWidth: 2, tension: 0, pointRadius: 5,
            pointBackgroundColor: '#ed5136', pointBorderColor: '#ed5136', yAxisID: 'y1',
            fill: false }, { label: '평균 최고기온(℃)', data: [ 19.7, 19.9, 20.0, 19.6, 20.2,
            19.5, 20.0, 19.9, 20.3, 20.8 ], borderColor: '#888888', backgroundColor:
            '#888888', borderWidth: 2, tension: 0, pointRadius: 5, pointBackgroundColor:
            '#888888', pointBorderColor: '#888888', yAxisID: 'y2', fill: false } ] }; const
            heatwaveConfig = { type: 'line', data: heatwaveData, options: { responsive:
            true, plugins: { legend: { position: 'bottom', labels: { padding: 15,
            usePointStyle: true, // ✅ 마커 스타일 사용 pointStyle: 'circle', font: { weight: 'bold'
            // ✅ 여기 추가! } // } }, //title: { display: true, text: '경상남도 폭염일수' } }, scales: {
            y1: { type: 'linear', position: 'left', //title: { display: true, text: '폭염일수'
            }, beginAtZero: true }, y2: { type: 'linear', position: 'right', //title: {
            display: true, text: '평균 최고기온(℃)' }, grid: { drawOnChartArea: false },
            suggestedMin: 18, suggestedMax: 22 }, x: { //title: { display: true, text: '연도'
            } } } } }; new Chart(heatwaveCtx, heatwaveConfig); </script> </div> </div> <div
            class="titbox bmb"> <div class="tit"> <p class="h_m">경남의 열대야 일수</p> </div> <div
            class="con"> <canvas id="heatChart"></canvas> <script> const heatCtx = document
            .getElementById('heatChart') .getContext('2d'); const heatData = { labels: [
            '2015', '2016', '2017', '2018', '2019', '2020', '2021', '2022', '2023', '2024'
            ], datasets: [ { label: '열대야일수', data: [ 5.5, 13.8, 14.2, 19.5, 12.3, 8.6, 7.5,
            16.7, 10.5, 32 ], borderColor: '#ed5136', backgroundColor: '#ed5136',
            borderWidth: 2, tension: 0, pointRadius: 5, pointBackgroundColor: '#ed5136',
            pointBorderColor: '#ed5136', yAxisID: 'y1', fill: false }, { label: '평균
            최고기온(℃)', data: [ 19.7, 19.9, 20.0, 19.6, 20.2, 19.5, 20.0, 19.9, 20.3, 20.8 ],
            borderColor: '#888888', backgroundColor: '#888888', borderWidth: 2, tension: 0,
            pointRadius: 5, pointBackgroundColor: '#888888', pointBorderColor: '#888888',
            yAxisID: 'y2', fill: false } ] }; const heatConfig = { type: 'line', data:
            heatData, options: { responsive: true, plugins: { legend: { position: 'bottom',
            labels: { padding: 15, usePointStyle: true, // ✅ 마커 스타일 사용 pointStyle: 'circle',
            font: { weight: 'bold' // ✅ 여기 추가! } // ✅ 동그라미로 표시 } }, //title: { display:
            true, text: '경상남도 폭염일수' } }, scales: { y1: { type: 'linear', position: 'left',
            //title: { display: true, text: '열대야일수' }, beginAtZero: true }, y2: { type:
            'linear', position: 'right', //title: { display: true, text: '평균 최고기온(℃)' },
            grid: { drawOnChartArea: false }, suggestedMin: 18, suggestedMax: 22 }, x: {
            //title: { display: true, text: '연도' } } } } }; new Chart(heatCtx, heatConfig);
            </script> </div> </div>-->

            <div class="titbox bmb">
                <div class="tit">
                    <p class="h_m">경상남도 폭염 및
                        <span class="pEnter">열대야 일수</span></p>
                </div>
                <div class="con" style="height:450px">
                    <canvas id="heatIndexChart"></canvas>
                </div>

                <script>
                    const heatIndexCtx = document
                        .getElementById('heatIndexChart')
                        .getContext('2d');

                    const heatIndexData = {
                        labels: [
                            '2015',
                            '2016',
                            '2017',
                            '2018',
                            '2019',
                            '2020',
                            '2021',
                            '2022',
                            '2023',
                            '2024'
                        ],
                        datasets: [
                            {
                                label: '폭염(일수)',
                                data: [
                                    11.7,
                                    24.8,
                                    20.9,
                                    32.8,
                                    12.8,
                                    9.5,
                                    11.3,
                                    12.3,
                                    13.6,
                                    35.6
                                ],
                                borderColor: '#dd1010ff',
                                backgroundColor: '#dd1010ff',
                                borderWidth: 2,
                                tension: 0,
                                pointRadius: 5,
                                pointBackgroundColor: '#dd1010ff',
                                pointBorderColor: '#dd1010ff',
                                pointBorderWidth: 2,
                                yAxisID: 'y1',
                                fill: false
                            }, {
                                label: '열대야(일수)',
                                data: [
                                    5.5,
                                    13.8,
                                    14.2,
                                    19.5,
                                    12.3,
                                    8.6,
                                    7.5,
                                    16.7,
                                    10.5,
                                    32
                                ],
                                borderColor: '#ed6a3b',
                                backgroundColor: '#ed6a3b',
                                borderWidth: 2,
                                tension: 0,
                                pointRadius: 5,
                                pointBackgroundColor: '#ed6a3b',
                                pointBorderColor: '#ed6a3b',
                                pointBorderWidth: 2,
                                yAxisID: 'y1',
                                fill: false
                            }
                        ]
                    };

                    const heatIndexConfig = {
                        type: 'line',
                        data: heatIndexData,
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            //layout: { padding: { top: 40 } },
                            plugins: {
                                legend: {
                                    position: 'bottom',
                                    labels: {
                                        usePointStyle: true,
                                        pointStyle: 'circle',
                                        font: {
                                            weight: 'bold'
                                        }
                                    }
                                },
                                tooltip: {
                                    mode: 'index',
                                    intersect: false
                                }
                            },
                            scales: {
                                y1: {
                                    type: 'linear',
                                    position: 'left',
                                    beginAtZero: true,
                                    suggestedMax: 40,
                                    ticks: {
                                        color: '#333'
                                    },
                                    grid: {
                                        color: 'rgba(0,0,0,0.1)'
                                    }
                                },
                                y2: {
                                    type: 'linear',
                                    position: 'right',
                                    suggestedMin: 18,
                                    suggestedMax: 22,
                                    ticks: {
                                        color: '#666'
                                    },
                                    grid: {
                                        drawOnChartArea: false
                                    }
                                },
                                x: {
                                    ticks: {
                                        color: '#333'
                                    },
                                    grid: {
                                        color: 'rgba(0,0,0,0.05)'
                                    }
                                }
                            }
                        },
                        plugins: [
                            {
                                id: 'customText',
                                afterDraw: (chart) => {
                                    if (!chart.chartArea) 
                                        return; // ✅ 안전 처리
                                    const {ctx, chartArea: {
                                            top
                                        }, width} = chart;
                                    ctx.save();
                                    ctx.font = 'bold 13px Arial';
                                    ctx.fillStyle = '#444';
                                    ctx.textAlign = 'right';
                                    //ctx.fillText('단위 : 일수 / ℃', width - 10, top - 25);  🔹 위치 조절
                                    ctx.restore();
                                }
                            }
                        ]
                    };

                    new Chart(heatIndexCtx, heatIndexConfig);
                </script>

            </div>
            <div class="titbox bmb">
                <div class="tit">
                    <p class="h_m">경상남도 강수량 분석</p>
                </div>
                <div class="con" style="height:500px">
                    <!-- ✅ 세로 길이 유지 -->
                    <canvas id="rainChart"></canvas>
                </div>

                <script>
                    const rainCtx = document
                        .getElementById('rainChart')
                        .getContext('2d');

                    const rainData = {
                        labels: [
                            '2015',
                            '2016',
                            '2017',
                            '2018',
                            '2019',
                            '2020',
                            '2021',
                            '2022',
                            '2023',
                            '2024'
                        ],
                        datasets: [
                            {
                                label: '강수량 (mm)',
                                data: [
                                    1236.4,
                                    1669.8,
                                    819.3,
                                    1576,
                                    1624.4,
                                    1927.1,
                                    1530.2,
                                    982,
                                    2084.4,
                                    1713.6
                                ],
                                backgroundColor: '#3f6ccf',
                                borderRadius: 4
                            }
                        ]
                    };

                    const rainConfig = {
                        type: 'bar',
                        data: rainData,
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            layout: {
                                padding: {
                                    top: 40
                                }
                            }, // ✅ 상단 여백 확보
                            plugins: {
                                legend: {
                                    display: false
                                },
                                tooltip: {
                                    enabled: true, // ✅ Hover 시만 툴팁 표시
                                    callbacks: {
                                        label: (context) => `${context.parsed.y} mm`
                                    }
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    suggestedMax: 2500,
                                    grid: {
                                        color: 'rgba(0,0,0,0.1)'
                                    }
                                },
                                x: {
                                    grid: {
                                        color: 'rgba(0,0,0,0.05)'
                                    }
                                }
                            }
                        },
                        plugins: [
                            {
                                // ✅ 단위(mm) 오른쪽 상단에 표시
                                id: 'customUnitText',
                                afterDraw: (chart) => {
                                    if (!chart.chartArea) 
                                        return;
                                    const {ctx, chartArea: {
                                            top
                                        }, width} = chart;
                                    ctx.save();
                                    ctx.font = 'bold 13px Arial';
                                    ctx.fillStyle = '#444';
                                    ctx.textAlign = 'right';
                                    ctx.fillText('단위 : mm', width - 10, top - 20);
                                    ctx.restore();
                                }
                            }
                        ]
                    };

                    new Chart(rainCtx, rainConfig);
                </script>
            </div>

        </div>
    </div>
</div>
<!--subcon-->
</div>
<!--subwrap-->
<? include("../inc/footer.php" )?>