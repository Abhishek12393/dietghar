 <?php include_once APPPATH.'views/Admin/header.php' ; ?>
 <?php include_once APPPATH.'views/Admin/sidebar.php' ; ?>
 <!-- Main content -->
		<div class="content-wrapper">
 
			<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<a href="#" class="breadcrumb-item">Food Chart Check</a>
							<!-- <span class="breadcrumb-item active">All Food Master</span> -->
						</div>
					</div>
				</div>
			</div>
			<!-- /page header -->


			<!-- Content area -->
			<div class="content">

				<!-- Basic responsive configuration -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Select Calorie Group (Table)</h5>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-7"> 
								<select name="tableCat_dd" id="tableCat_dd" style="width: 100% !important;height: 2rem;    font-size: 15px;" onchange="selectdd()" required>
									<option value="">--Select--</option>
									<option value="600">600-699</option>
									<option value="700">700-799</option>
									<option value="800">800-899</option>
									<option value="900">900-999</option>
									<option value="1000">1000-1099</option>
									<option value="1100">1100-1199</option>
									<option value="1200">1200-1299</option>
									<option value="1300">1300-1399</option>
									<option value="1400">1400-1499</option>
									<option value="1500">1500-1599</option>
									<option value="1600">1600-1699</option>
									<option value="1700">1700-1799</option>
									<option value="1800">1800-1899</option>
									<option value="1900">1900-1999</option>
									<option value="2000">2000-2099</option>
									<option value="2100">2100-2199</option>
									<option value="2200">2200-2299</option>
									<option value="2300">2300-2399</option>
									<option value="2400">2400-2499</option>
									<option value="2500">2500-2599</option>
									<option value="2600">2600-2699</option>
									<option value="2700">2700-2799</option>
									<option value="2800">2800-2899</option>
									<option value="2900">2900-2999</option>
									<option value="3000">3000-3099</option>
									<option value="3100">3100-3199</option>
									<option value="remaining">Remaining</option>
									<option value="vertb">Verified Table</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-dark">
								<thead>
									<tr>
										<th>SNO</th>
										<th>Meal Group Name</th>
										<th>Count</th>
										<th>-</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>0</td>
										<td>Total meals</td>
										<td><span class="badge badge-primary badge-pill font-size-lg" id="total"></span></td>
										<td>
												 
												<button class="btn btn-primary-100 text-primary" id="btn_total" onclick="submit(this)">Show All Meals data</button>
										</td>


									</tr>
									<tr>
										<td>1.</td>
										<td>All Meals 7 meals</td>
										<td><span class="bg-dark py-1 px-2 rounded"><span class="text-white" id="all7meals"></span></span></td>
										<td><button type="button" class="btn btn-primary-100 text-primary" id="btn_sevenmeals" onclick="submit(this)">Show 7 meals data</button></td>
									</tr>
									<tr>
										<td>2.</td>
										<td>6 Meals without (MM - mid meal)</td>
										<td><span class="bg-dark py-1 px-2 rounded"><span class="text-white" id="withoumm"></span></span></td>
										<td><button type="button" class="btn btn-primary-100 text-primary " id="btn_outmm" onclick="submit(this)">Show Data</button></td>
									</tr>
									<tr>
										<td>3.</td>
										<td>6 Meals (without BT - BedTime)</td>
										<td><span class="bg-dark py-1 px-2 rounded"><span  class="text-white" id="withoutbt"></span></span> 
										</td>
										<td><button type="button" class="btn btn-primary-100 text-primary" id="btn_outbt" onclick="submit(this)">Show Data</button></td>
									</tr>
									<tr>
										<td>4.</td>
										<td>5 Meals without (MM , ES)</td>
										<td><span class="bg-dark py-1 px-2 rounded"><span class="text-white" id="withoutmmes"></span></span></td>
										<td><button type="button" class="btn btn-primary-100 text-primary" id="btn_outmmes" onclick="submit(this)">Show Data</button></td>
									</tr>
									<tr>
										<td>5.</td>
										<td>4 Meals without (MM , ES , BT)</td>
										<td><span class="bg-dark py-1 px-2 rounded"><span class="text-white" id="withoutmmesbt"></span></span></td>
										<td><button type="button" class="btn btn-primary-100 text-primary" id="btn_outmmesbt" onclick="submit(this)">Show Data</button></td>
									</tr>
									<tr>
										<td>6.</td>
										<td>6 Meals  ( without Evening snack)</td>
										<td><span class="bg-dark py-1 px-2 rounded"><span class="text-white" id="withouteve"></span></span></td>
										<td><button type="button" class="btn btn-primary-100 text-primary" id="btn_outes" onclick="submit(this)">Show Data</button></td>
									</tr>
									<tr class="table-border-double bg-black">
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr  class="table-border-double bg-secondary">
										<td>Extra.</td>
										<td>3 Meals  ( without Morning ,  mid meal ,  evening , bedtime)</td>
										<td><span class="bg-dark py-1 px-2 rounded"><span class="text-white" id="withoutmorMMEveBT"></span></span></td>
										<td><button type="button" class="btn btn-primary-100 text-primary"  id="btn_outmormmesbt" onclick="submit(this)">Show Data</button></td>
									</tr>
									</tr>
									<tr class="bg-secondary">
										<td>Extra.</td>
										<td>6 Meals  ( without Breakfast )</td>
										<td><span class="bg-dark py-1 px-2 rounded"><span class="text-white" id="withoutBf"></span></span></td>
										<td><button type="button" class="btn btn-primary-100 text-primary" id="btn_outbf"onclick="submit(this)">Show Data</button></td>
									</tr>
									<tr  class="bg-secondary">
										<td>Extra.</td>
										<td>5 Meals  ( without Breakfast and Evening snack)</td>
										<td><span class="bg-dark py-1 px-2 rounded"><span class="text-white" id="withoutBfEve"></span></span></td>
										<td><button type="button" class="btn btn-primary-100 text-primary" id="btn_outbfes" onclick="submit(this)">Show Data</button></td>
									</tr>
									<tr  class="bg-secondary">
										<td>Extra.</td>
										<td>5 Meals  ( without MM and BT)</td>
										<td><span class="bg-dark py-1 px-2 rounded"><span class="text-white" id="withoutMMBT"></span></span></td>
										<td><button type="button" class="btn btn-primary-100 text-primary" id="btn_outmmbt" onclick="submit(this)">Show Data</button></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- /basic responsive configuration -->

			</div>
			<!-- /content area -->
			<?php include_once APPPATH.'views/Admin/footer.php' ; ?>

			<script>
				function selectdd(){
					
					var selectdd = document.getElementById("tableCat_dd");
					var id= selectdd.value;
					console.log(id);

					let url = base_url+'DBManager/fetchCountDaychartintb';
					// console.log(url);
					var param  = '{"table":"'+id+'"}';

					let	resp = callajax(param,url);
					resp = JSON.parse(resp);
					console.log(resp);

					$("#total").html(resp.counttotal);
					$("#all7meals").html(resp.countallmeal);
					$("#withoumm").html(resp.countOutMM);
					$("#withoutmmes").html(resp.countOutEveAndMM);
					$("#withoutbt").html(resp.countOutBedtime);
					$("#withoutmmesbt").html(resp.countOutMMEveandBed);
					$("#withouteve").html(resp.countOutEve);
					$("#withoutBf").html(resp.countOutBf);
					$("#withoutBfEve").html(resp.countOutBfEve);
					$("#withoutmorMMEveBT").html(resp.countOutmorMMEveBT);
					$("#withoutMMBT").html(resp.countOutmorMMBT);
 
					 
				}
			</script>
			<script>

				function submit(elem){
					var selectdd = document.getElementById("tableCat_dd");
					var form = $(document.createElement('form'));
					$(form).attr("action", "<?=base_url();?>Admin/CronManager/ViewTabledata");
					$(form).attr("method", "POST");
					$(form).attr("target", "_blank");

					var input = $("<input>")
							.attr("type", "hidden")
							.attr("name", "table")
							.val(selectdd.value) ;
					var input2 = $("<input>")
							.attr("type", "hidden")
							.attr("name", "qtype")
							.val(elem.id) ;
					if(selectdd.value == '' || selectdd.value == 'vertb' ){ alert('Check Dropdown Value')}else{

						$(form).append($(input));
						$(form).append($(input2));

						form.appendTo(document.body);

						$(form).submit();
					}
				}
			</script>

 