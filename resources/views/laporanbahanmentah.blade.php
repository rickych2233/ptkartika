@extends('layouts.headerAdmin')
@section('title')
<?php
    $tempchart1['namabarang'] = [];
    $tempchart1['stok']= [];
    $idx = 0;
    $arraybulan = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
    $tempchart2['kodesupplier'] = [];
    $tempchart2['jumlah']= []; 
    $tempchart3['kodebarang'] = [];
    $tempchart3['qtyhasilPP'] = [];
?> 
@endsection
@section('content')

  <!-- INI MENU UTAMA-->
  {{ Form::open(array('url' => 'savekategoribarang')) }}
    <div class="container">
        <span class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5>Laporan Bahan Mentah Yang Dikirim Supplier</h5>
                    <div class="table-responsive" style="position: relative; height:50%; width:100%">
                        @php($idx = 0)
                        @foreach($databarang as $rows)
                            @if($rows->kodekategoribarang != "KB001")
                                @php($tempchart1['namabarang'][$idx]    = $rows->namabarang)
                                @php($tempchart1['stok'][$idx]          = $rows->stok)
                                @php($idx++)
                            @endif
                        @endforeach
                        <canvas id="userChart" class="userChart">test</canvas>
                    </div>  
                </div>
            </div>
        </span>
        <span class="col-sm-1">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive" style="position: relative; height:50%; width:100%">
                        <h5>Laporan Bahan Mentah Yang Dikirim Supplier</h5>
                        {{ Form::select('txtfilter2', $arraybulan, null, ['id'=>'txtfilter2', 'class'=>'validate browser-default','onchange'=>"bulan()"]) }}
                        <canvas id="userChart2" width="100" height="100" class="userChart2">test</canvas>
                    </div>  
                </div>
            </div>
        </span>
        <span class="col-sm-1">
            <div class="card">
                <div class="card-body">
                    <h5>Laporan Bahan Mentah Yang Dikirim Supplier</h5>
                    <h4>Dari Tanggal:</h4>
                    {{Form::date('txttgldari', date('Y-m-d'), ['id'=>'txttgldari', 'class'=>'form-control','onchange'=>"rubah()"])}}
                    <h4>Sampai Tanggal:</h4>
                    {{Form::date('txttglsampai', date('Y-m-d'), ['id'=>'txttglsampai', 'class'=>'form-control','onchange'=>"rubah()"])}}
                    @php($idx = 0)
                    @foreach($dataprosesproduksi as $rows2)
                        @php($tempchart3['kodebarang'][$idx]    = $rows2->kodebarang)
                        @php($tempchart3['qtyhasilPP'][$idx]    = $rows2->qtyhasilPP)
                        @php($idx++)
                    @endforeach
                    <div class="table-responsive" style="position: relative; height:50%; width:100%">
                        <canvas id="userChart3" width="100" height="100" class="userChart3">test</canvas>
                    </div>  
                </div>
            </div>
        </span>
    </div>
{{ Form::close() }}
@endsection
@section('scripts')
@endsection

<script>
  var myurl = "<?php echo URL::to('/'); ?>";
  function bulan(){
    var tgl = $("#txtfilter2").val();
    $.get(myurl + '/getbulan',
    { tgl: tgl  },
      function(result){ 
        // alert(result);
        var arr = JSON.parse(result);
        chartcoba2(arr);
      }
    );
  }
<<<<<<< HEAD

  function rubah(){
    var tgldari     = $("#txttgldari").val();
    var tglsampai   = $("#txttglsampai").val();
    $.get(myurl + '/getproduksiperperiode',
    { tgldari: tgldari, tglsampai:tglsampai  },
      function(result){ 
        var arr = JSON.parse(result);
        chartcoba3(arr);
        // alert(result);
      }
    );
  }
  
    document.addEventListener('DOMContentLoaded', function () {
        chartcoba();
        bulan();      
        rubah();  
    });

    function chartcoba3(arr){
            var arrayData =arr,
            datasets = arrayData.map(item => {
            return {
                label: `${item.kodebarang}`,
                data: [item.qtyhasilPP],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }
        }),
        ctx = document.getElementById("userChart3").getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create type: 'doughnut', line, bar
            type: 'bar',
            data: {
                datasets: datasets
            },
            options: {
                scales: {
                    xAxes: [{
                        barPercentage : 0.5
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            callback: function(value) {if (value % 1 === 0) {return value;}}
                        },
                        scaleLabel: {
                            display: false
                        }
                    }]
                },
                legend: {
                    labels: {
                        fontColor: '#122C4B',
                        fontFamily: "'Muli', sans-serif",
                        padding: 25,
                        boxWidth: 20,
                        fontSize: 14,
                    }
                },
                layout: {
                    padding: {
                        left: 10,
                        right: 10,
                        top: 0,
                        bottom: 10
                    }
                }
            }
        });
    }

=======


  $(document).ready(function(){
    $('.sidenav').sidenav();
    $('.modal').modal();
    chartcoba();
    chartcoba2();
  });

>>>>>>> 711ca42d7774825dc0471cb4587cc658b1873098
  function chartcoba2(arr){
    var arrayData =arr,
        datasets = arrayData.map(item => {
        return {
            label: `${item.kodesupplier}`,
            data: [item.jumlah],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }
    }),
    ctx = document.getElementById("userChart2").getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create type: 'doughnut', line, bar
        type: 'bar',
        data: {
            datasets: datasets
        },
        options: {
            scales: {
                xAxes: [{
                    barPercentage : 0.5
                }],
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        callback: function(value) {if (value % 1 === 0) {return value;}}
                    },
                    scaleLabel: {
                        display: false
                    }
                }]
            },
            legend: {
                labels: {
                    fontColor: '#122C4B',
                    fontFamily: "'Muli', sans-serif",
                    padding: 25,
                    boxWidth: 20,
                    fontSize: 14,
                }
            },
            layout: {
                padding: {
                    left: 10,
                    right: 10,
                    top: 0,
                    bottom: 10
                }
            }
        }
    });
  }
  //modal
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, options);
  });

<<<<<<< HEAD
=======
  //
>>>>>>> 711ca42d7774825dc0471cb4587cc658b1873098
  function chartcoba(){
    <!-- javascript init -->
    chartColor = "#FFFFFF";

    // General configuration for the charts with Line gradientStroke
    gradientChartOptionsConfiguration = {
    maintainAspectRatio: false,
    legend: {
        display: false
    },
    tooltips: {
      bodySpacing: 4,
      mode:"nearest",
      intersect: 0,
      position:"nearest",
      xPadding:10,
      yPadding:10,
      caretPadding:10
    },
    responsive: 1,
    scales: {
        yAxes: [{
          display:0,
          gridLines:0,
          ticks: {
              display: false
          },
          gridLines: {
              zeroLineColor: "transparent",
              drawTicks: false,
              display: false,
              drawBorder: false
          }
        }],
        xAxes: [{
          display:0,
          gridLines:0,
          ticks: {
              display: false
          },
          gridLines: {
            zeroLineColor: "transparent",
            drawTicks: false,
            display: false,
            drawBorder: false
          }
        }]
    },
        layout:{
        padding:{left:0,right:0,top:15,bottom:15}
        }
    };

        ctx = document.getElementById('userChart').getContext("2d");

        gradientStroke = ctx.createLinearGradient(500, 0, 100, 0);
        gradientStroke.addColorStop(0, '#80b6f4');
        gradientStroke.addColorStop(1, chartColor);

        gradientFill = ctx.createLinearGradient(0, 170, 0, 50);
        gradientFill.addColorStop(0, "rgba(128, 182, 244, 0)");
        gradientFill.addColorStop(1, "rgba(249, 99, 59, 0.40)");

        myChart = new Chart(ctx, {
<<<<<<< HEAD
        type: 'line',
        data: {
            labels: {!! json_encode($tempchart1['namabarang']) !!},
            datasets: [{
                label: "Active Users",
                borderColor: "#f96332",
                pointBorderColor: "#FFF",
                pointBackgroundColor: "#f96332",
                pointBorderWidth: 2,
                pointHoverRadius: 4,
                pointHoverBorderWidth: 1,
                pointRadius: 4,
                fill: true,
                backgroundColor: gradientFill,
                borderWidth: 2,
                data: {!! json_encode($tempchart1['stok']) !!}
            }]
        },
        options: gradientChartOptionsConfiguration
    });
=======
            type: 'line',
            data: {
                labels: {!! json_encode($tempchart1['namabarang']) !!},
                datasets: [{
                    label: "Active Users",
                    borderColor: "#f96332",
                    pointBorderColor: "#FFF",
                    pointBackgroundColor: "#f96332",
                    pointBorderWidth: 2,
                    pointHoverRadius: 4,
                    pointHoverBorderWidth: 1,
                    pointRadius: 4,
                    fill: true,
                    backgroundColor: gradientFill,
                    borderWidth: 2,
                    data: {!! json_encode($tempchart1['stok']) !!}
                }]
            },
            options: gradientChartOptionsConfiguration
        });

>>>>>>> 711ca42d7774825dc0471cb4587cc658b1873098
  }
</script>