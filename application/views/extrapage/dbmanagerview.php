<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Run Cron by ajax </title>
	<style>body{color: white; background: black;font-family: Lato; font-style: normal; font-variant: normal;line-height: 15px; }</style>
	<script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
</head>
<body>
	View
	<div > <button id="stopexec" > STOP </button> 
	&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; <button id="startexec1"> START 1 sec </button>
	&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; <button id="startexec2"> START 2sec </button>
	&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; <button id="hitapi"> Hit Api </button>
</div>
	<div id="output">
		<!-- <span class="tbindex">value </span> => <span class="offset">1</span> <br> -->
 
	</div>
</body>

<script>
	console.log($().jquery);
	// var json = 'dbm/markok_fctable_atcheck';
	// var json = 'dbm/remove_missing_quantiy';
	var json = 'dbm/updateByFoodCombination_correction';
			console.log(json);

	// let url = "https://dietghar.com/diet/DBManager2/markok_fctable_atcheck";
	// let url = "https://dietghar.com/diet/DBManager2/remove_missing_quantiy";
	let url = "https://dietghar.com/diet/DBManager2/updateByFoodCombination";

	var offset = '';
	var tbindex = '';
	var myInterval ='';
	function is_alive(jsonpath) {
			//check if station is alive
			// console.log('jsonpath',jsonpath );
			return $.ajax({
					url: "viewjsonForAjax1",
					data: "check_live=1&jsonpath=" + jsonpath,
					type: "GET",
					async: false, 
					error: function (e) {
							console.dir(e);
					}
			});
	}

	function hitapi(url){
		
		return $.ajax({
					url: url ,
					data: "check_live=1",
					type: "GET",
					async: false, 
					error: function (e) {
							console.dir(e);
					}
			});
	}

function callback(){
	is_alive(json).then(function(result){
		// console.log(result, '<--result');
		data = JSON.parse(result);
		// console.log(data , data.offset);
		let string  = "<span class='tbindex'>"+data.tbindex+" </span> => <span class='offset'>"+data.offset+"</span> <br>";
		// console.log(string);
		$("#output").prepend(string);
		if(data.tbindex >= 3200){
		}else{
			   //calls click event after a certain time
			hitapi(url).then(function(resp2){
				// console.log('hitapi resp => ',resp2 );
				let string2 =  " ";
			 
				if(resp2 == 'DONE'){
					 string2 =  resp2+" ";
				}else{
					 string2 =  "-Api called - >";
				}

				$("#output").prepend(string2);
			});

		}
	});
	
}

$("#hitapi").click(function(){
	console.log('Api hit single :' , url);
	hitapi(url).then(function(resp2){
		// console.log('hitapi resp => ',resp2 );
		if(resp2 == 'DONE'){
			let string2 =  " "+resp2;
		}else{
			let string2 =  " - Api called.";
		}
		console.log(resp2);
	});

});

$("#startexec1").click(function(){
	console.log('1 sec interval started');
	window.myInterval = setInterval(function () {
			callback();
		}, 1000); 
});
$("#startexec2").click(function(){
	console.log('2 sec interval started');
	window.myInterval = setInterval(function () {
			callback();
		}, 2000); 

});
$("#stopexec").click(function(){
	console.log(' interval stoped' ,  window.myInterval);
		 clearInterval(window.myInterval);
});
</script>




</html>