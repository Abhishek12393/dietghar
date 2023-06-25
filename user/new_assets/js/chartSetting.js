let myChart_1 = document.getElementById('myChart-1').getContext('2d');
let myChart_2 = document.getElementById('myChart-2').getContext('2d');

// Global Options
Chart.defaults.global.defaultFontSize = 8;
Chart.defaults.global.defaultFontColor = '#777';
Chart.defaults.showLines = false;
Chart.defaults.global.defaultFontStyle = 'bolder';
Chart.scaleService.updateScaleDefaults('linear', {
    ticks: {
        min: 0
    }
});	

let massPopChart_1 = new Chart(myChart_1, {
  type:'line', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
  data:{
    labels:['JAN', 'FEB', 'MAR', 'APRIL', 'MAY', 'JUN','JUL'],
    datasets:[{
      label:'KG.',
      data:[
       40,
       40,
       35,
       48,
       57,
       69,
       75,
      ],
      //backgroundColor:'green',
    //   backgroundColor:[
    //     'rgba(255, 99, 132, 0.6)',
       
    //   ],
      borderWidth:2,
      borderColor:'#777',
      hoverBorderWidth:3,
      hoverBorderColor:'#000',
      pointBorderColor: ['#F15062','#F15062','#F15062','#F15062','#F15062','#F15062','#F15062'],
      pointBackgroundColor: ['#FAF7F5','#FAF7F5','#FAF7F5','#FAF7F5','#FAF7F5','#FAF7F5','#FAF7F5'],
      pointBorderWidth :2,
      //Now for lane:
      lineTension: 0,
      showLines: true,
      fill: false
    //   backgroundColor: 'transparent',
    //   pointHoverBackgroundColor: 'transparent',
    //   pointHoverBorderColor: 'transparent'
    }]
  },
    options:{
        
        title:{
        display:false,
        text:'weight Loss -1',
        fontSize:5
        },
        scales: {
    xAxes: [{
        gridLines: {
            display:false,
        }
    }],
    yAxes: [{
        gridLines: {
            display:false
        }   
    }]
    },
    legend:{
      display:false,
      labels:{
        fontColor:'#555',
        fontSize: 9,
        borderWidth:0,
      }
    },
    layout:{
      padding:{
        // left:50,
        // right:0,
        // bottom:0,
        // top:0
      }
    },
    tooltips:{
      enabled:true,
      backgroundColor: '#FE4459',
      titleFontSize: 0,
      titleFontStyle: 'bold',
      bodyFontSize: 10	
    }
  }
});
let massPopChart_2 = new Chart(myChart_2, {
  type:'line', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
  data:{
    labels:['JAN', 'FEB', 'MAR', 'APRIL', 'MAY', 'JUN','JUL'],
    datasets:[{
      label:'In.',
      data:[
       5,
       5.5,
       4,
       5,
       6,
       7,
       8
      ],
      //backgroundColor:'green',
    //   backgroundColor:[
    //     'rgba(255, 99, 132, 0.6)',
       
    //   ],
      borderWidth:2,
      borderColor:'#777',
      hoverBorderWidth:3,
      hoverBorderColor:'#000',
      pointBorderColor: ['#F15062','#F15062','#F15062','#F15062','#F15062','#F15062','#F15062'],
      pointBackgroundColor: ['#FAF7F5','#FAF7F5','#FAF7F5','#FAF7F5','#FAF7F5','#FAF7F5','#FAF7F5'],
      pointBorderWidth :2,
      //Now for lane:
      lineTension: 0,
      showLines: true,
      fill: false,
    //   backgroundColor: 'transparent',
    //   pointHoverBackgroundColor: 'transparent',
    //   pointHoverBorderColor: 'transparent'
    }]
  },
    options:{
        
        title:{
        display:false,
        text:'weight Loss -1',
        fontSize:5
        },
        scales: {
    xAxes: [{
        gridLines: {
            display:false,
        }
    }],
    yAxes: [{
        gridLines: {
            display:false
        }   
    }]
    },
    legend:{
      display:false,
      labels:{
        fontColor:'#555',
        fontSize: 9,
        borderWidth:0,
      }
    },
    layout:{
      padding:{
        // left:50,
        // right:0,
        // bottom:0,
        // top:0
      }
    },
    tooltips:{
      enabled:true,
      backgroundColor: '#FE4459',
      titleFontSize: 0,
      titleFontStyle: 'bold',
      bodyFontSize: 10	
    }
  }
});