<?php include('header.php'); ?>
<link rel="stylesheet" href="<?=base_url();?>assets/thedatepicker-master/dist/the-datepicker.css">
<script src="<?=base_url();?>assets/thedatepicker-master/dist/the-datepicker.js"></script>
<style>
 
 
			article {
				width: 100%;
				height: 10%;
				position: fixed;
				border-bottom: 1px #aaa solid;
				background: #fff;
				padding: 1em;
				z-index: 1;
			}
			aside {
				width: 100%;
				height: 83%;
				float: left;
				position: absolute;
				top: 13%;
				background: #fff;
				padding: 1em;
			}
			h1 em {
				font-style: italic;
				font-weight: normal;
				font-size: 0.75em;
				color: #999;
			}
			#form-wrapper,
			#form-wrapper input,
			#form-wrapper select,
			#my-container input,
			#my-container select,
			#button-wrapper input,
			#button-wrapper select,
			#paragraph-wrapper input,
			#paragraph-wrapper select
			{
				font-family: "Arial", sans-serif !important;
			}
			#my-paragraph {
				display: inline;
			}
			#footer {
				float: left;
				clear: left;
				color: #555;
				font-size: 0.8em;
				padding: 0;
			}
			.desktop-only {
				display: none;
			}
			#my-container {
				position: absolute;
				right: 6%;
			}
			@media (min-width: 920px) {
				article {
					width: 20%;
					height: 95%;
					border-right: 1px #aaa solid;
				}
				aside {
					width: 73%;
					height: 100%;
					float: right;
					position: static;
					top: 0;
				}
				#footer {
					position: absolute;
					bottom: 0;
				}
				.desktop-only {
					display: block;
				}
				#my-container {
					position: static;
					clear: left;
					padding: 1em 1em 0 0;
				}
				#footer {
					padding: 1em 1em 0 0;
				}
			}
			@media (min-width: 1300px) {
				#footer {
					font-size: 0.9em;
				}
			}
			#label-wrapper {
				float: left;
			}
			#input-wrapper {
				float: left;
				margin-left: 0.8em;
			}
			#button-wrapper {
				float: left;
			}
			.space {
				margin-bottom: 0.5em;
			}
			.settings {
				font-family: "Courier New", serif;
				list-style: none;
				padding-left: 0;
			}
			.code {
				font-family: "Courier New", serif;
			}
			.invalid {
				background: #fdd;
			}
			.error {
				color: red;
			}
			.red .the-datepicker__button {
				background-color: red;
			}
			.green .the-datepicker__button {
				background-color: green;
			}
			.hidden {
				display: none;
			}
		</style>
<form name="myform" id="form_id" method="post" action="<?=base_url('Stepper/stepper_4')?>">
	<section id="main-sectoin">
		<div class="container" id="id3">
			<div class="row justify-content-md-center">
				<div class="col col-lg-8">
					<div class="section-area" id="dob1">
						<!--<img src="<?php echo base_url(); ?>stepper/calendar.png" class="title-images" alt="set">-->
						<h4 class="title-label"><span>3) </span> Enter Date Of Birth? * </h4>

						<!-- <input  type="tel" id="i3" maxlength="10" onkeyup="show(event)" placeholder="DD/MM/YYYY" class="main-input date-format" onkeypress="javascript:return isNumber(event)"  autocomplete="off"  required> -->
						<input type="text" id="i3" placeholder="DD/MM/YYYY"  required autocomplete="off" class="main-input date-format" onchange="show()" >
						<span class="error" id="sp" style="display: none">age should be in between 18 to 65 years</span>	
					</div>
					
					<div class="section-area">
						<h4 class="title-label" id="sp1" ></h4>
						<div class="main-button11" id="next" ><button  type="button" class="main-okay-btn"> Ok </button></div>
					</div>
				</div>
			</div>
		</div>
	</section>
</form>
<div class="next-and-back-arrow"><a href="<?=base_url('Stepper/stepper_2')?>"><img src="<?php echo base_url(); ?>dgassets/stepper/back-arrow.png"></a></div>
<?php include('footer.php'); ?>
<script>
		var datepicker;
		var input = document.getElementById('i3');
 
		(function () {
			datepicker = new TheDatepicker.Datepicker(input);
			datepicker.render();
			datepicker.options.setInputFormat('j/n/Y');
					// updateSelectedDate();
					var show = function(){
						console.log('show');
						document.getElementById("next").style.display="block"; 
					}
					datepicker.options.onSelect(show);
		})();

		var clickHandler = ('ontouchstart' in document.documentElement ? "touchstart" : "click");
		$("#next").bind(clickHandler, function(e) {
    	// alert("clicked or tapped. This button used: " + clickHandler);
    	// updatedatacheck();
			console.log(input.value);
			updatedob(input.value);
		});


		function updatedob(newdate){
			$.ajax({
					url:  baseURL + 'Diet/checkdob',
					type: 'POST',
					data: {value:newdate},
					error: function() {
						alert('Something is wrong');
					},
					success: function(data) {
						console.log(data)
						$("#sp1").html(data);
						setTimeout(function(){
							$.ajax({
								url:  baseURL + 'Diet/Update',
								type: 'POST',
								data: {table: 'customers_info',column:'dob',value:newdate,where:'id',button:'stepper_4'},
								error: function() {
									alert('Something is wrong');
								},
								success: function(data) {
									$("#form_id").submit();
								}
							});
						}, 3000);
					}
				});
		}

	</script>