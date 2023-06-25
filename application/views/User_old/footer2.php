 
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="<?php echo base_url(); ?>user/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="<?php echo base_url(); ?>user/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="<?php echo base_url(); ?>user/assets/js/off-canvas.js"></script>
    <script src="<?php echo base_url(); ?>user/assets/js/hoverable-collapse.js"></script>
    <script src="<?php echo base_url(); ?>user/assets/js/misc.js"></script>
    <script src="<?php echo base_url(); ?>user/assets/js/dashboard.js"></script>
    <script src="<?php echo base_url(); ?>user/assets/js/todolist.js"></script>
   
<script>
      var speedCanvas = document.getElementById("speedChart");
      Chart.defaults.global.defaultFontFamily = "Lato";
      Chart.defaults.global.defaultFontSize = 18;

      var speedData = {
        labels: ["12/20", "2/4", "14/8", "6/3", "16/8", "12/4"],
        datasets: [{
          label: "",
          data: [0, 40, 60, 20, 40, 60, 20],
          fill: false,
          borderColor: "#ff6a73",
          backgroundColor: "#e755ba",
        }]
      };

      var chartOptions = {
        legend: {
          display: true,
          position: 'top',
          labels: {
            boxWidth: 0,
            fontColor: '#ff6a73',
            display: false
          }
        }
      };

      var lineChart = new Chart(speedCanvas, {
        type: 'line',
        data: speedData,
        options: chartOptions,
        borderColor: "#ff6a73",
        backgroundColor: "#e755ba",
      });
</script>

<script>
  var speedCanvas = document.getElementById("speedChart1");
  Chart.defaults.global.defaultFontFamily = "Lato";
  Chart.defaults.global.defaultFontSize = 16;

  var speedData = {
    labels: ["", "", "", "", "", ""],
    datasets: [{
      label: "",
      data: [0, 40, 60, 20, 40, 60, 20],
      fill: true,
      borderColor: "#ff7871",
      backgroundColor: "#FFF",
    }]
  };

  var chartOptions = {
    legend: {
      display: true,
      position: 'top',
      labels: {
        boxWidth: 0,
        fontColor: '#ff6a73',
        display: false
      }
    },
    yAxes: [{
              //  display: false, //this will remove all the x-axis grid lines
       fontSize: '0'          
       }],
       scales:
       {
            yAxes:[{ 
             ticks: {
                    beginAtZero: true,
             fontSize: '0',
           //  stacked: true
                } ,
                gridLines: {
                color: "rgba(0, 0, 0, 0)",
            }
              
            }],
            xAxes:[{ 
             ticks: {
                    beginAtZero: true,
               fontSize: '0',
           //  stacked: true
                } ,
            gridLines: {
                color: "rgba(0, 0, 0, 0)",
                zeroLineColor: '#FFF'
            },              
            }],
          }
  };

  var lineChart = new Chart(speedCanvas, {
    type: 'line',
    data: speedData,
    options: chartOptions,
    borderColor: "#   ",
    backgroundColor: "#e755ba",
  });
</script>

<script>
  var speedCanvas = document.getElementById("speedChart2");
  Chart.defaults.global.defaultFontFamily = "Lato";
  Chart.defaults.global.defaultFontSize = 16;

  var speedData = {
    labels: ["", "", "", "", "", ""],
    datasets: [{
      label: "",
      data: [0, 40, 60, 20, 40, 60, 20],
      fill: true,
      borderColor: "#dca6d7",
      backgroundColor: "#FFF",
    }]
  };

  var chartOptions = {
    legend: {
      display: true,
      position: 'top',
      labels: {
        boxWidth: 0,
        fontColor: '#ff6a73',
        display: false
      }
    },
    yAxes: [{
              //  display: false, //this will remove all the x-axis grid lines
       fontSize: '0'          
       }],

       scales:
       {
            yAxes:[{ 
             ticks: {
                    beginAtZero: true,
           fontSize: '0',
           //  stacked: true
                } ,
                gridLines: {
                color: "rgba(0, 0, 0, 0)",
            }
              
            }],
            xAxes:[{ 
             ticks: {
                    beginAtZero: true,
            fontSize: '0',
           //  stacked: true
                } ,
                gridLines: {
                color: "rgba(0, 0, 0, 0)",
            }
              
            }],
          }
  };

  var lineChart = new Chart(speedCanvas, {
    type: 'line',
    data: speedData,
    options: chartOptions,
    borderColor: "#ff6a73",
    backgroundColor: "#e755ba",
  });
</script>

<script>
  var speedCanvas = document.getElementById("speedChart3");
  Chart.defaults.global.defaultFontFamily = "Lato";
  Chart.defaults.global.defaultFontSize = 16;

  var speedData = {
    labels: ["", "", "", "", "", ""],
    datasets: [{
      label: "",
      data: [0, 40, 60, 20, 40, 60, 20],
      fill: true,
      borderColor: "#22b3ec",
      backgroundColor: "#FFF",
    }]
  };

  var chartOptions = {
    legend: {
      display: true,
      position: 'top',
      labels: {
        boxWidth: 0,
        fontColor: '#ff6a73',
        display: false
      }
    },
    yAxes: [{
              //  display: false, //this will remove all the x-axis grid lines
       fontSize: '0'          
       }],

       scales:
       {
            yAxes:[{ 
             ticks: {
                    beginAtZero: true,
           fontSize: '0',
           //  stacked: true
                } ,
                gridLines: {
                color: "rgba(0, 0, 0, 0)",
            }
              
            }],
            xAxes:[{ 
             ticks: {
                    beginAtZero: true,
            fontSize: '0',
           //  stacked: true
                } ,
                gridLines: {
                color: "rgba(0, 0, 0, 0)",
            }
              
            }],
          }
  };

  var lineChart = new Chart(speedCanvas, {
    type: 'line',
    data: speedData,
    options: chartOptions,
    borderColor: "#ff6a73",
    backgroundColor: "#e755ba",
  });
</script>

<script>
  var speedCanvas = document.getElementById("speedChart4");
  Chart.defaults.global.defaultFontFamily = "Lato";
  Chart.defaults.global.defaultFontSize = 16;

  var speedData = {
    labels: ["", "", "", "", "", ""],
    datasets: [{
      label: "",
      data: [0, 40, 60, 20, 40, 60, 20],
      fill: true,
      fontSize: 12,
      borderColor: "#574dfb",
      backgroundColor: "#FFF",
    }],

  };

  var chartOptions = {
    legend: {
      display: true,
      position: 'top',
      labels: {
        boxWidth: 0,
        fontColor: '#574dfb',
        display: false,
        borderColor: "#FFF",
        backgroundColor: "#FFF",
      }
    },
    yAxes: [{
              //  display: false, //this will remove all the x-axis grid lines
       fontSize: '0'          
       }],

       scales:
        {
            yAxes:[{ 
             ticks: {
                    beginAtZero: true,
           fontSize: '0',
           //  stacked: true
                } ,
                gridLines: {
                color: "rgba(0, 0, 0, 0)",
            }
              
            }],
            xAxes:[{ 
             ticks: {
                    beginAtZero: true,
            fontSize: '0',
           //  stacked: true
                } ,
                gridLines: {
                color: "rgba(0, 0, 0, 0)",
            }
              
            }],
          }
  };

  var lineChart = new Chart(speedCanvas, {
    type: 'line',
    data: speedData,
    options: chartOptions,
    borderColor: "#FFF",
    backgroundColor: "#FFF",
  });
</script>

  </body>
</html>