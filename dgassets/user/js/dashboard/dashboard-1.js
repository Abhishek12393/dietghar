var btnAware = function () {

	$('.avtivity-card')
		.on('mouseenter', function (e) {
			var parentOffset = $(this).offset(),
				relX = e.pageX - parentOffset.left,
				relY = e.pageY - parentOffset.top;
			$(this).find('.effect').css({ top: relY, left: relX })
		})
		.on('mouseout', function (e) {
			var parentOffset = $(this).offset(),
				relX = e.pageX - parentOffset.left,
				relY = e.pageY - parentOffset.top;
			$(this).find('.effect').css({ top: relY, left: relX })
		});
}

jQuery(window).on('load', function () {
	setTimeout(function () {
		// dzChartlist.load();
		btnAware();
	}, 1000);

});

var arrdata = [90, 88.7, 86.1, 86, 85, 90, 88.7, 86.1, 86, 85];
//var dates = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug','Sep', 'oct' , 'Nov', 'Dec','Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug','Sep', 'oct' , 'Nov', 'Dec', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug','Sep', 'oct' , 'Nov', 'Dec','Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug','Sep', 'oct' , 'Nov', 'Dec'];
var dates = ['01-11-2013', '01-11-2014', '01-11-2015', '01-11-2016', '01-11-2017', '01-11-2018', '01-11-2019', '01-11-2020', '01-11-2021', '01-11-2022'];


var options = {
  chart: {
		height: 200,
		type: 'area',
		group: 'social',
		toolbar: {
			show: true,
			tools: {
				download: false,
				selection: false,
				zoom: false,
				zoomin: true,
				zoomout: true,
				pan: true,
				reset: true
			}
		},
 
  },
  dataLabels: {
      enabled: false
  },
	stroke: {
		// stroke for graph line
		width: [5],
		colors: ['#0B2A97'],
		curve: 'smooth'  // smooth , straight , stepline ,
	},
	legend: {
		show: false,
		tooltipHoverFormatter: function (val, opts) {
			return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
		},

	},
	markers: {
		strokeWidth: [5],
		strokeColors: ['#0B2A97'],
		border: 0,
		colors: ['#fff'],
		hover: {
			size: 13,
		}
	},
  series: [],
  noData: {
    text: 'Loading...'
  },
	xaxis: {
		range : 6,
 
		 categories: ['dates'],
		//  tickAmount: 'dataPoints',
    //   tickPlacement: 'between',
		labels: {
			style: {
				colors: '#3E4954', // #3E4954', #f185d0
				fontSize: '14px',
				fontFamily: 'Poppins',
				fontWeight: 100,

			},
		},
	},
	yaxis: {
		labels: {
			offsetX: -16,
			style: {
				colors: '#3E4954',
				fontSize: '14px',
				fontFamily: 'Poppins',
				fontWeight: 100,

			},
		},
	},
	fill: {
		colors: ['#0B2A97'],
		type: 'solid',
		opacity: 0
	},
	colors: ['#0B2A97'],
	grid: {
		borderColor: '#f1f1f1',
		xaxis: {
			lines: {
				show: true
			}
		}
	},
	responsive: [
		{
			breakpoint: 1601,
			options: {
				chart: {
					height: 400
				},
			},
		}
		, {
			breakpoint: 768,
			options: {
				chart: {
					height: 250
				},
				markers: {
					strokeWidth: [4],
					strokeColors: ['#0B2A97'],
					border: 0,
					colors: ['#fff'],
					hover: {
						size: 6,
					}
				},
				stroke: {
					width: [3],
					colors: ['#0B2A97'],
					curve: 'smooth'
				},
			}
		}
	]
}

var chart = new ApexCharts(
  document.querySelector("#chartBar"),
  options
);

chart.render();
getweightlossgraph();


var test = 'check';

function getweightlossgraph() {
	var geturl = base_url1+'User/getdataforchart/wl';
	console.log(test);

	$.getJSON(geturl, function(response) {
		console.log(response);
		chart.updateSeries([{
			name: 'Weight',
			data: response
		}])
	});
	$('#chartname').html('Weight Loss');
}

function getinchlossgraph(){
	var geturl = base_url1+'User/getdataforchart/il';
	console.log(test);

	$.getJSON(geturl, function(response) {
		console.log(response);
		chart.updateSeries([{
			name: 'InchLoss',
			data: response
		}])
		 

	});
	$('#chartname').html('Inch Loss');
}
 