<?php include('header.php');?>
<?php include('sidebar.php');?>
<!-- Main content -->
		<div class="content-wrapper">
		<!-- Content area -->
			<div class="content">

				<!-- Form inputs -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title font-weight-bold">Add Region</h5>
						
					</div>

					<div class="card-body">
						
						<form action="#">
							<div class="row">
									<div class="col-md-6">
							<fieldset class="mb-3">
								<div class="form-group row">
									<label class="col-form-label">State<span>*</span></label>
									<div class="col-lg-12">
										<select class="form-control" id="state" name="state" required="">
                    <option value="1">ANDAMAN AND NICOBAR ISLANDS </option>
                    <option value="2">ANDHRA PRADESH </option>
                    <option value="3">ARUNACHAL PRADESH </option>
                    <option value="4">ASSAM </option>
                    <option value="5">BIHAR </option>
                    <option value="6">CHATTISGARH </option>
                    <option value="7">CHANDIGARH </option>
                    <option value="8">DAMAN AND DIU </option>
                    <option value="9">DELHI </option>
                    <option value="10">DADRA AND NAGAR HAVELI </option>
                    <option value="11">GOA </option>
                    <option value="12">GUJARAT </option>
                    <option value="13">HIMACHAL PRADESH </option>
                    <option value="14">HARYANA </option>
                    <option value="15">JAMMU AND KASHMIR </option>
                    <option value="16">JHARKHAND </option>
                    <option value="17">KERALA </option>
                    <option value="18">KARNATAKA </option>
                    <option value="19">LAKSHADWEEP </option>
                    <option value="20">MEGHALAYA </option>
                    <option value="21">MAHARASHTRA </option>
                    <option value="22">MANIPUR </option>
                    <option value="23">MADHYA PRADESH </option>
                    <option value="24">MIZORAM </option>
                    <option value="25">NAGALAND </option>
                    <option value="26">ORISSA </option>
                    <option value="27">PUNJAB </option>
                    <option value="28">PONDICHERRY </option>
                    <option value="29">RAJASTHAN </option>
                    <option value="30">SIKKIM </option>
                    <option value="31">TAMIL NADU </option>
                    <option value="32">TRIPURA </option>
                    <option value="33">UTTARAKHAND </option>
                    <option value="34">UTTAR PRADESH </option>
                    <option value="35">WEST BENGAL </option>
                  </select>
									</div>
								</div>

								
								<div class="form-group row">
									<label class="col-form-label">City<span>*</span></label>
									<div class="col-lg-12">
										<input type="text" name="city" class="form-control" placeholder="Enter City Name">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-form-label">Region<span>*</span></label>
									<div class="col-lg-12">
										<input type="text" name="region" class="form-control" placeholder="Enter Region Name">
									</div>
								</div>
							</fieldset>
							<div class="text-right">
								<button type="submit" class="btn btn-primary rounded-round">Submit <i class="icon-paperplane ml-2"></i></button>
							</div>
						</div>
						
							</div>
							

							
						</form>
					</div>
				</div>
				<!-- /form inputs -->

			</div>
			<!-- /content area -->
<?php include 'footer.php';?>