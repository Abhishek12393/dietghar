<?php $this->load->view('Stepper/steps/header') ; ?>
<style>
    .inputs input {
        width: 40px;
        height: 40px;
    }
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        margin: 0;
    }
    .form-control:focus {
        box-shadow: none;
        border: 2px solid green;
    }
    td {
        color: whitesmoke;
    }
    button {
        color: whitesmoke;
    }
    .validate {
        border-radius: 20px;
        height: 40px;
        background-color: green;
        border: 1px solid green;
        width: 140px;
    }
  .align-items-center{-webkit-box-align:center!important;-webkit-align-items:center!important;-ms-flex-align:center!important;align-items:center!important}
  .cardpad {width: 30rem;}
  @media screen and (max-width: 600px) {
  .cardpad {width: 25rem;}
}
</style>

  <center>
    <div class="card align-items cardpad" >
      <form name="myform" id="form_id" method="post" action="<?=base_url('Stepper/stepper_4')?>">
        <div class="card-body d-flex flex-column gap-2 align-items-center justify-content-center">
            <h4 class="mb-0">Date of Birth</h4>
            <br />
            <div class="row gy-3 align-items-center justify-content-center">
                <!-- <input class="result form-control" type="text" id="date" placeholder="Select DOB..." data-dtp="dtp_HUqgC" required> -->
                <input type="text" name="finaldate" id="finaldate" class="result form-control" readonly>
                <div class="col-4">
                <select name="seldate" id="seldate"class ="form-control" onchange="onselectdate(this)">
                  <?php for ($i=1; $i <=31 ; $i++) { 
                    ?>
                     <option value="<?=$i ; ?>"><?=$i ; ?></option>
                     <?php
                  } ; ?>
                 
            
                </select>
                </div>
                <div class="col-4">
                <select name="selmonth" id="selmonth"class ="form-control"  onchange="onselectdate(this)">
                  <?php 
                  $months = array('January',    'February',    'March',    'April',    'May',    'June',    'July ',    'August',    'September',    'October',    'November',    'December');
                    for ($i=0; $i <12 ; $i++) { 
                    ?>
                     <option value="<?=$i+1 ; ?>"><?=$months[$i] ; ?></option>
                     <?php
                  } ; ?>
                </select>
                </div>
                <div class="col-4">
                  <select name="selyear" id="selyear"class ="form-control"  onchange="onselectdate(this)">
                  <?php for ($i=1950; $i <=2012 ; $i++) { 
                    ?>
                     <option value="<?=$i ; ?>"><?=$i ; ?></option>
                     <?php
                  } ; ?>
            
                </select></div>
                
                <span class="error" id="sp" style="display: none">age should be in between 18 to 65 years</span>
            </div>
          <div class="mt-4">
            <h4 class="title-label" id="sp1" ></h4>
            <button class="btn btn-danger px-4 validate" style="display: none;" type="button" id="next" >Next</button>
          </div>
        </div>
      </form>
    </div>
  </center>
</div>
  <?php $this->load->view('Stepper/steps/footer') ; ?>
  <script>
  // defines
  var input = document.getElementById('finaldate');

  
  
  // document.addEventListener("DOMContentLoaded", function(event) {
  //   // alert('content loaded');
  //       $('#date').bootstrapMaterialDatePicker({
  //           time: false,
  //           format: 'DD-MM-YYYY',
  //           closeOnDateSelect: true,
  //       }).on('change', function(e) {
  //         document.getElementById("next").style.display="block"; 
  //       }) ; 
  // });
  function onselectdate(elem){
    // let finaldate = document.getElementById('finaldate');
    let seldate = document.getElementById('seldate');
    let selmonth = document.getElementById('selmonth');
    let selyear = document.getElementById('selyear');
    var seldatev = seldate.options[seldate.selectedIndex].value;
    var selmonthv = selmonth.options[selmonth.selectedIndex].value;
    var selyearv = selyear.options[selyear.selectedIndex].value;
    if(seldatev>=0 && seldatev <=9){
      seldatev = '0'+seldatev;
    }
    if(selmonthv>=0 && selmonthv <=9){
      selmonthv = '0'+selmonthv;
    }
    input.value = seldatev+'-'+selmonthv+'-'+selyearv;
    document.getElementById("next").style.display="block"; 
  }



  // bind click handler 
  var clickHandler = ('ontouchstart' in document.documentElement ? "touchstart" : "click");
		$("#next").bind(clickHandler, function(e) {
    	// alert("clicked or tapped. This button used: " + clickHandler);
    	// updatedatacheck();
			console.log(input.value);
      if(input.value == '' || input.value == null){
        console.log('blank val');
      }else{
       updatedob(input.value);
      }
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
						console.log(data);
						console.log(newdate);
            var parts = newdate.split('-')
       var     mydate = parts[2]+'-'+parts[1]+'-'+parts[0];
             
            console.log(mydate);
						$("#sp1").html(data);
						setTimeout(function(){
							$.ajax({
								url:  baseURL + 'Diet/Update',
								type: 'POST',
								data: {table: 'customers_info',column:'dob',value:mydate,where:'id',button:'stepper_4'},
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

  // function
</script>
</html>