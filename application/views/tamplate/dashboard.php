<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">

        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">


    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <!-- AREA CHART -->

          <!-- /.card -->

          <!-- DONUT CHART -->

          <!-- /.card -->

          <!-- PIE CHART -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Data Total Summary</h3>


            </div>
            <div class="card-body">
              <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col (LEFT) -->
        <div class="col-md-6">
          <!-- LINE CHART -->

          <!-- /.card -->

          <!-- BAR CHART -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Data Status Quotation Event</h3>


            </div>
            <div class="card-body">
              <div class="chart">
                <canvas id="barChartEvent" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
            <!-- /.card-body -->
          </div>



        </div>
        <!-- /.col (RIGHT) -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-md-6">

          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Data Status Quotation Other</h3>


            </div>
            <div class="card-body">
              <div class="chart">
                <canvas id="barChartOther" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col (LEFT) -->
        <div class="col-md-6">
          <!-- LINE CHART -->

          <!-- /.card -->

          <!-- BAR CHART -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Data Status BAST</h3>


            </div>
            <div class="card card-primary">
              <div class="chart">
                <canvas id="barChartBast" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
            <!-- /.card-body -->
          </div>



        </div>
        <!-- /.col (RIGHT) -->
      </div>


      <div class="row">
        <div class="col-md-6">

          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Data Status Faktur</h3>


            </div>
            <div class="card-body">
              <div class="chart">
                <canvas id="barChartFaktur" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col (LEFT) -->
        <div class="col-md-6">
          <!-- LINE CHART -->

          <!-- /.card -->

          <!-- BAR CHART -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Data Status Delivery</h3>


            </div>
            <div class="card-body">
              <div class="chart">
                <canvas id="barChartDelivery" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
            <!-- /.card-body -->
          </div>



        </div>
        <!-- /.col (RIGHT) -->
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<script>
  $(document).ready(function() {


    dataquotation('barChartEvent', 'getStatatusEvent', "quotation", "openquotation", "rejectquotation", "closequotation");
    dataquotation('barChartOther', 'getStatatusOther', "quotationother", "openquotationother", "rejectquotationother", "closequotationother");

    dataquotationevent('barChartBast', 'getStatatusBast', "quotationbast", "openquotationbast", "rejectquotationbast", "closequotationbast");

    dataquotationevent('barChartFaktur', 'getStatatusFaktur', "quotationfaktur", "openquotationfaktur", "rejectquotationfaktur", "closequotationfaktur");
    dataquotationevent('barChartDelivery', 'getStatatusDelivery', "quotationDeliery", "openquotationDelivery", "rejectquotationDelivery", "closequotationDelivery");

  });

  function dataquotation(id, aksi, label, open, reject, close) {
    //getStatatusEvent
    //getStatatusOther
    //getStatatusFaktur
    //getStatatusDelivery
    $.ajax({
      type: "post",
      url: '<?php echo base_url("Dashboard/") ?>' + aksi,

      dataType: 'json',
      success: function(data) {
        label = [];
        open = [];
        reject = [];
        close = [];
        final = [];

        console.log(data);
        for (var i = 0; i < data.length; i++) {

          var b = data[i].date;
          var b1 = b;
          var b2 = b1.substring(3, 5);
          var tahun = b1.substring(6, 10);
          var bulan;
          console.log(parseInt(b2));
          //               switch(parseInt(b2)) {
          //               if 0:  varbulan = "Januari"; break;
          //               case 1: bulan = "Februari"; break;
          //               case 2: bulan = "Maret"; break;
          //               case 3: bulan = "April"; break;
          //               case 4: bulan = "Mei"; break;
          //               case 5: bulan = "Juni"; break;
          //               case 6: bulan = "Juli"; break;
          //               case 7: bulan = "Agustus"; break;
          //               case 8: bulan = "September"; break;
          //               case 9: bulan = "Oktober"; break;
          //               case 10: bulan = "November"; break;
          //               case 11: bulan = "Desember"; break;
          // }
          if (parseInt(b2) == 1) {
            bulan = "Desember"

          } else if (parseInt(b2) == 2) {
            bulan = "Februari"

          } else if (parseInt(b2) == 3) {
            bulan = "Maret"

          } else if (parseInt(b2) == 4) {
            bulan = "April"

          } else if (parseInt(b2) == 5) {
            bulan = "Mei"

          } else if (parseInt(b2) == 6) {
            bulan = "Juni"

          } else if (parseInt(b2) == 7) {
            bulan = "Juli"

          } else if (parseInt(b2) == 8) {
            bulan = "Agustus"

          } else if (parseInt(b2) == 9) {
            bulan = "September"

          } else if (parseInt(b2) == 10) {
            bulan = "Oktober"

          } else if (parseInt(b2) == 11) {
            bulan = "November"

          } else if (parseInt(b2) == 12) {
            bulan = "Desember"

          }
          var d = new Date(data[i].date);
          label.push(bulan + " " + tahun);
          open.push(data[i].Open);
          reject.push(data[i].Reject);
          close.push(data[i].Close);
          final.push(data[i].Final);

        }





        var areaChartData = {
          labels: label,
          datasets: [{


              label: 'Reject',
              backgroundColor: '#f56954',
              borderColor: 'rgba(60,141,188,0.8)',
              pointRadius: false,
              pointColor: '#3b8bba',
              pointStrokeColor: 'rgba(60,141,188,1)',
              pointHighlightFill: '#f39c12',
              pointHighlightStroke: 'rgba(60,141,188,1)',
              data: reject
            },

            {
              label: 'Open',
              backgroundColor: '#f39c12',
              borderColor: 'rgba(210, 214, 222, 1)',
              pointRadius: false,
              pointColor: 'rgba(210, 214, 222, 1)',
              pointStrokeColor: '#c1c7d1',
              pointHighlightFill: '#fff',
              pointHighlightStroke: 'rgba(220,220,220,1)',
              data: open
            },
            {
              label: 'Close',
              backgroundColor: '#00a65a',
              borderColor: 'rgba(210, 214, 222, 1)',
              pointRadius: false,
              pointColor: 'rgba(210, 214, 222, 1)',
              pointStrokeColor: '#c1c7d1',
              pointHighlightFill: '#fff',
              pointHighlightStroke: 'rgba(220,220,220,1)',
              data: close
            },
            {
              label: 'Final',
              backgroundColor: '#00FFFF',
              borderColor: 'rgba(210, 214, 222, 1)',
              pointRadius: false,
              pointColor: 'rgba(210, 214, 222, 1)',
              pointStrokeColor: '#c1c7d1',
              pointHighlightFill: '#fff',
              pointHighlightStroke: 'rgba(220,220,220,1)',
              data: final
            },
          ]
        }
        var barChartCanvas = $('#' + id).get(0).getContext('2d')
        var barChartData = jQuery.extend(true, {}, areaChartData)
        var temp0 = areaChartData.datasets[0]
        var temp1 = areaChartData.datasets[1]
        barChartData.datasets[0] = temp1
        barChartData.datasets[1] = temp0

        var barChartOptions = {
          responsive: true,
          maintainAspectRatio: false,
          datasetFill: false
        }

        var barChart = new Chart(barChartCanvas, {
          type: 'bar',
          data: barChartData,
          options: barChartOptions
        })





      },
      error: function(hasil) {


      }


    });

  }


  function dataquotationevent(id, aksi, label, open, reject, close) {
    //getStatatusEvent
    //getStatatusOther
    //getStatatusFaktur
    //getStatatusDelivery
    $.ajax({
      type: "post",
      url: '<?php echo base_url("Dashboard/") ?>' + aksi,

      dataType: 'json',
      success: function(data) {
        label = [];
        open = [];
        reject = [];
        close = [];

        console.log(data);
        for (var i = 0; i < data.length; i++) {

          var b = data[i].date;
          var b1 = b;
          var b2 = b1.substring(3, 5);
          var tahun = b1.substring(6, 10);
          var bulan;
          console.log(parseInt(b2));
          //               switch(parseInt(b2)) {
          //               if 0:  varbulan = "Januari"; break;
          //               case 1: bulan = "Februari"; break;
          //               case 2: bulan = "Maret"; break;
          //               case 3: bulan = "April"; break;
          //               case 4: bulan = "Mei"; break;
          //               case 5: bulan = "Juni"; break;
          //               case 6: bulan = "Juli"; break;
          //               case 7: bulan = "Agustus"; break;
          //               case 8: bulan = "September"; break;
          //               case 9: bulan = "Oktober"; break;
          //               case 10: bulan = "November"; break;
          //               case 11: bulan = "Desember"; break;
          // }
          if (parseInt(b2) == 1) {
            bulan = "Desember"

          } else if (parseInt(b2) == 2) {
            bulan = "Februari"

          } else if (parseInt(b2) == 3) {
            bulan = "Maret"

          } else if (parseInt(b2) == 4) {
            bulan = "April"

          } else if (parseInt(b2) == 5) {
            bulan = "Mei"

          } else if (parseInt(b2) == 6) {
            bulan = "Juni"

          } else if (parseInt(b2) == 7) {
            bulan = "Juli"

          } else if (parseInt(b2) == 8) {
            bulan = "Agustus"

          } else if (parseInt(b2) == 9) {
            bulan = "September"

          } else if (parseInt(b2) == 10) {
            bulan = "Oktober"

          } else if (parseInt(b2) == 11) {
            bulan = "November"

          } else if (parseInt(b2) == 12) {
            bulan = "Desember"

          }
          var d = new Date(data[i].date);
          label.push(bulan + " " + tahun);
          open.push(data[i].Open);
          reject.push(data[i].Reject);
          close.push(data[i].Close);

        }





        var areaChartData = {
          labels: label,
          datasets: [{


              label: 'Reject',
              backgroundColor: '#f56954',
              borderColor: 'rgba(60,141,188,0.8)',
              pointRadius: false,
              pointColor: '#3b8bba',
              pointStrokeColor: 'rgba(60,141,188,1)',
              pointHighlightFill: '#f39c12',
              pointHighlightStroke: 'rgba(60,141,188,1)',
              data: reject
            },

            {
              label: 'Open',
              backgroundColor: '#f39c12',
              borderColor: 'rgba(210, 214, 222, 1)',
              pointRadius: false,
              pointColor: 'rgba(210, 214, 222, 1)',
              pointStrokeColor: '#c1c7d1',
              pointHighlightFill: '#fff',
              pointHighlightStroke: 'rgba(220,220,220,1)',
              data: open
            },
            {
              label: 'Close',
              backgroundColor: '#00a65a',
              borderColor: 'rgba(210, 214, 222, 1)',
              pointRadius: false,
              pointColor: 'rgba(210, 214, 222, 1)',
              pointStrokeColor: '#c1c7d1',
              pointHighlightFill: '#fff',
              pointHighlightStroke: 'rgba(220,220,220,1)',
              data: close
            },
          ]
        }
        var barChartCanvas = $('#' + id).get(0).getContext('2d')
        var barChartData = jQuery.extend(true, {}, areaChartData)
        var temp0 = areaChartData.datasets[0]
        var temp1 = areaChartData.datasets[1]
        barChartData.datasets[0] = temp1
        barChartData.datasets[1] = temp0

        var barChartOptions = {
          responsive: true,
          maintainAspectRatio: false,
          datasetFill: false
        }

        var barChart = new Chart(barChartCanvas, {
          type: 'bar',
          data: barChartData,
          options: barChartOptions
        })





      },
      error: function(hasil) {


      }


    });

  }



  $(function() {


    var donutData = {
      labels: [
        'Quotation Event',
        'Quotation Other',
        'Faktur Event',
        'Faktur Other',


      ],
      datasets: [{
        data: [<?php echo $totalquotation ?>, <?php echo $totalquotationother; ?>, <?php echo $totalfaktur; ?>, <?php echo $totalfakturother; ?>],
        backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#FFD700'],
      }]
    }
    var donutOptions = {
      maintainAspectRatio: false,
      responsive: true,
    }

    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData = donutData;
    var pieOptions = {
      maintainAspectRatio: false,
      responsive: true,
      tooltips: {
        callbacks: {
          label: function(tooltipItem, data) {
            var dataset = data.datasets[tooltipItem.datasetIndex];
            var labels = data.labels[tooltipItem.index];
            var currentValue = dataset.data[tooltipItem.index];
            return labels + ": Rp. " + currentValue.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."); + "";
          }
        }
      }
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var pieChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = jQuery.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive: true,
      maintainAspectRatio: false,
      datasetFill: false
    }

    var barChart = new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })

    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = jQuery.extend(true, {}, barChartData)

    var stackedBarChartOptions = {
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    var stackedBarChart = new Chart(stackedBarChartCanvas, {
      type: 'bar',
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })
  })

  function toDate(dateStr) {
    var parts = dateStr.split("-")
    return new Date(parts[2], parts[1] - 1, parts[0])
  }

  $("#dashboarMainNav").addClass('active');
</script>