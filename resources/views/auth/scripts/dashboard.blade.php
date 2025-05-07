<script>
    if ('{{ $data['menuData']['menu'] }}' == 'FORPI') {
        var sudah = 'Sudah Mengisi';
        var belum = 'Belum Mengisi';
        var jumlah = 'Total Mahasiswa';
    } else if ('{{ $data['menuData']['menu'] }}' == 'DVERSI') {
        var sudah = 'Sudah Diproses';
        var belum = 'Belum Dibuat';
        var jumlah = 'Total Mahasiswa';
    } else if ('{{ $data['menuData']['menu'] }}' == 'FORBELA') {
        var sudah = 'Sudah Mengisi';
        var belum = 'Belum Mengisi';
        var jumlah = 'Total Mahasiswa';
    }
    'use strict';

    (function() {
        let cardColor, headingColor, axisColor, shadeColor, borderColor;

        cardColor = config.colors.white;
        headingColor = config.colors.headingColor;
        axisColor = config.colors.axisColor;
        borderColor = config.colors.borderColor;

        const chartOrderStatistics = document.querySelector('#orderStatisticsChart');
        const chartLogbook = document.querySelector('#chartLogbook');
        const chartGaugeTransaksi = document.querySelector('#gaugeTransaksi');

        fetch('/{{ request()->segment(1) }}/chart')
            .then(response => response.json())
            .then(data => {
                // Configuration for the donut chart
                const orderChartConfig = {
                    chart: {
                        height: 165,
                        width: 130,
                        type: 'donut'
                    },
                    labels: [sudah, belum, jumlah],
                    series: [data.total_mahasiswa_isset_pisn, data.total_mahasiswa_noset_pisn],
                    colors: [config.colors.primary, config.colors.danger],
                    stroke: {
                        width: 5,
                        colors: cardColor
                    },
                    dataLabels: {
                        enabled: false,
                        formatter: function(val, opt) {
                            return parseInt(val);
                        }
                    },
                    legend: {
                        show: false
                    },
                    grid: {
                        padding: {
                            top: 0,
                            bottom: 0,
                            right: 15
                        }
                    },
                    plotOptions: {
                        pie: {
                            donut: {
                                size: '75%',
                                labels: {
                                    show: true,
                                    value: {
                                        fontSize: '1.5rem',
                                        fontFamily: 'Public Sans',
                                        color: headingColor,
                                        offsetY: -15,
                                        formatter: function(val) {
                                            return parseInt(val);
                                        }
                                    },
                                    name: {
                                        offsetY: 20,
                                        fontFamily: 'Public Sans'
                                    },
                                    total: {
                                        show: true,
                                        fontSize: '0.8125rem',
                                        color: axisColor,
                                        label: 'Mahasiswa',
                                        formatter: function(w) {
                                            return parseInt(data.total_mahasiswa);
                                        }
                                    }
                                }
                            }
                        }
                    }
                };


                const updateMahasiswaSeries = data.update_mahasiswa.map((jumlah, index) => ({
                    x: data.update_mahasiswa_tanggal[index],
                    y: jumlah
                }));

                const logbookChartConfig = {
                    series: [{
                        name: 'Jumlah pengajuan dokumen',
                        data: updateMahasiswaSeries, // Format yang benar
                        color: '#ff3e1d'
                    }],
                    chart: {
                        height: 350,
                        type: 'area',
                        toolbar: {
                            show: true,
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: 'smooth'
                    },
                    xaxis: {
                        type: 'datetime',
                        labels: {
                            format: "yyyy-MM-dd"
                        }
                    },
                    tooltip: {
                        x: {
                            format: 'dd/MM/yyyy'
                        },
                        y: {
                            formatter: function(val) {
                                return Math.round(val); // Menghapus desimal .0
                            }
                        }
                    },
                };

                // Configuration for the gauge chart
                const gaugeTransaksiConfig = {

                    series: [data.periode_mahasiswa],
                    chart: {
                        height: 200,
                        type: 'radialBar',
                        offsetY: -10
                    },
                    plotOptions: {
                        radialBar: {
                            startAngle: -135,
                            endAngle: 135,
                            dataLabels: {
                                name: {
                                    fontSize: '16px',
                                    color: undefined,
                                    offsetY: 120
                                },
                                value: {
                                    offsetY: 76,
                                    fontSize: '22px',
                                    color: undefined,
                                    formatter: function(val) {
                                        return val;
                                    }
                                }
                            }
                        }
                    },
                    fill: {
                        type: 'gradient',
                        gradient: {
                            shade: 'dark',
                            shadeIntensity: 0.15,
                            inverseColors: false,
                            opacityFrom: 1,
                            opacityTo: 1,
                            stops: [0, 50, 65, 91]
                        },
                    },
                    stroke: {
                        dashArray: 4
                    },
                    labels: ['Mahasiswa terdaftar'],

                };

                if (typeof chartOrderStatistics !== undefined && chartOrderStatistics !== null) {
                    const statisticsChart = new ApexCharts(chartOrderStatistics, orderChartConfig);
                    statisticsChart.render();
                }

                if (typeof chartLogbook !== undefined && chartLogbook !== null) {
                    const logbookChart = new ApexCharts(chartLogbook, logbookChartConfig);
                    logbookChart.render();
                }

                if (typeof chartGaugeTransaksi !== undefined && chartGaugeTransaksi !== null) {
                    const gaugeTransaksi = new ApexCharts(chartGaugeTransaksi, gaugeTransaksiConfig);
                    gaugeTransaksi.render();
                }

            })
            .catch(error => console.error('Error fetching data:', error));
    })();
</script>
