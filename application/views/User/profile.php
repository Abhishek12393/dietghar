<?php include('header.php');
include('sidebar.php'); ?>
<!--********************************** Content body start ***********************************-->
<link rel="stylesheet" href="https://foliotek.github.io/Croppie/croppie.css">
<style>
  img#item-img-output {
    max-width: 180px;
  }
  #upload-demo {
      width: 250px;
      height: 250px;
      padding-bottom: 25px;
    }
</style>
 
<div class="content-body">
  <div class="container-fluid">
    <?php #pr($message); ?>
    <!-- row -->
    <div class="row">
      <div class="col-lg-12">
        <div class="profile card card-body px-3 pt-3 pb-0">
          <div class="profile-head">
            <div class="photo-content">
              <div class="cover-photo"></div>
            </div>
            <div class="profile-info">
              <div class="profile-photo">
                <?php if($pimage){
                 echo '<img alt="image" class="img-fluid rounded-circle"  src="https://dietghar.com/diet/'.$pimage.'">';
                }else{ ?>
                <!-- <img src="<?php echo base_url(); ?>dgassets/user/images/profile/profile.png" class="img-fluid rounded-circle" alt=""> -->
                <?= $message->gender == 1 ? '<img alt="image" class="img-fluid rounded-circle"  src="https://dietghar.com/diet/dgassets/user/images/profile/man_1.png">' : '<img alt="image" class="img-fluid rounded-circle" src="https://dietghar.com/diet/dgassets/user/images/profile/woman_1.png">';
                }
                ?>
              </div>
              <div class="profile-details">
                <div class="profile-name px-3 pt-2">
                  <h4 class="text-primary mb-0">Full Name</h4>
                  <p><?= $message->first_name . ' ' . $message->last_name; ?></p>
                  <h5><a href="javascript:void()" data-toggle="modal" data-target="#sendMessageModal">Change Photo</a>
                </div>
                <div class="profile-email px-2 pt-2">
                  <h4 class="text-muted mb-0">Mobile No.</h4>
                  <p> +91 <?= $message->mobile_no; ?></p>
                </div>
                <div class="dropdown ml-auto">
                  <!-- male female icon -->
                  <?='' //$message->gender == 1 ? '<img alt="image" width="50" src="https://dietghar.com/diet/dgassets/user/images/profile/man_1.png">' : '<img alt="image" width="50" src="https://dietghar.com/diet/dgassets/user/images/profile/woman_1.png">' ?>


                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xl-4">
        <div class="card">
          <div class="card-body">
            <div class="profile-statistics mb-5">
              <div class="text-center">
                <div class="row">
                  <div class="col">
                    <h3 class="m-b-0"><?= dobsimple($message->dob, 0, 0); ?></h3><span>Age</span>
                  </div>
                  <div class="col">
                    <h3 class="m-b-0"><?= $message->height; ?></h3><span>Height</span>
                  </div>
                  <div class="col">
                    <h3 class="m-b-0"><?= $message->weight; ?></h3><span>Weight (kg)</span>
                  </div>
                </div>
                <div class="mt-4">
                  <a href="https://facebook.com/DietGhar" target="_blank" class="btn btn-primary mb-1 mr-1">Follow @FB</a>
                  <a href="https://instagram.com/DietGhar" target="_blank" class="btn btn-secondary mb-1">Follow @IG</a>
                </div>
  
              </div>
              <!-- Modal -->
              <div class="modal fade" id="sendMessageModal">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Upload Photo</h5><button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <div class="modal-body">

                      <form class="comment-form" action="<?php echo base_url(); ?>User/upload_profile_photo" method="post" enctype="multipart/form-data">
                        <div class="row">
                          <div class="col-lg-12">
                            <!-- <img  src="#" alt="" id="item-img-output" /> &nbsp; -->
                             
                            <!-- <a href="javascript:void(0)" id="startcropping"> Crop </a> -->
                            <img src="" class="gambar img-responsive img-thumbnail" id="item-img-output" />
                          </div>
                          <br /><br /><br />
                          <div class="col-lg-12">
                            <div class="form-group">
                              <label class="text-black font-w600">Select<span class="required">*</span></label>
                              <input type="file" class=" item-img form-control" name="pphoto" placeholder="Author" id="imagefile" onchange="loadFile(event)">
                            </div>
                          </div>
                          <div class="col-lg-8">

                          </div>
                          <div class="col-lg-12">
                            <div class="form-group mb-0">
                              <input type="button" value="Upload" class="submit btn btn-primary" name="Upload" onclick="saveimage()">
                            </div>
                          </div>
                        </div>
                      </form>

                    </div>
                  </div>
                </div>
              </div>
              <!-- MODAL2 IMAGE CROP POPUP-->
              <div class="modal fade" id="cropImagePop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                      <div id="upload-demo" class="center-block"></div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="button" id="cropImageBtn" class="btn btn-primary">Crop</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!--<div class="profile-interest mb-5">
<h5 class="text-primary d-inline">Interest</h5>
<div class="row mt-4 sp4" id="lightgallery">
<a href="<?php echo base_url(); ?>dgassets/user/images/profile/2.jpg" data-exthumbimage="<?php echo base_url(); ?>dgassets/user/images/profile/2.jpg"
data-src="<?php echo base_url(); ?>dgassets/user/images/profile/2.jpg" class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
<img src="<?php echo base_url(); ?>dgassets/user/images/profile/2.jpg" alt="" class="img-fluid">
</a>
<a href="<?php echo base_url(); ?>dgassets/user/images/profile/3.jpg" data-exthumbimage="<?php echo base_url(); ?>dgassets/user/images/profile/3.jpg"
data-src="<?php echo base_url(); ?>dgassets/user/images/profile/3.jpg" class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
<img src="<?php echo base_url(); ?>dgassets/user/images/profile/3.jpg" alt="" class="img-fluid">
</a>
<a href="<?php echo base_url(); ?>dgassets/user/images/profile/4.jpg" data-exthumbimage="<?php echo base_url(); ?>dgassets/user/images/profile/4.jpg" data-src="<?php echo base_url(); ?>dgassets/user/images/profile/4.jpg" class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
<img src="<?php echo base_url(); ?>dgassets/user/images/profile/4.jpg" alt="" class="img-fluid">
</a>
<a href="<?php echo base_url(); ?>dgassets/user/images/profile/3.jpg" data-exthumbimage="<?php echo base_url(); ?>dgassets/user/images/profile/3.jpg" data-src="<?php echo base_url(); ?>dgassets/user/images/profile/3.jpg" class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
<img src="<?php echo base_url(); ?>dgassets/user/images/profile/3.jpg" alt="" class="img-fluid">
</a>
<a href="<?php echo base_url(); ?>dgassets/user/images/profile/4.jpg" data-exthumbimage="<?php echo base_url(); ?>dgassets/user/images/profile/4.jpg" data-src="<?php echo base_url(); ?>dgassets/user/images/profile/4.jpg" class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
<img src="<?php echo base_url(); ?>dgassets/user/images/profile/4.jpg" alt="" class="img-fluid">
</a>
<a href="<?php echo base_url(); ?>dgassets/user/images/profile/2.jpg" data-exthumbimage="<?php echo base_url(); ?>dgassets/user/images/profile/2.jpg"
data-src="<?php echo base_url(); ?>dgassets/user/images/profile/2.jpg" class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
<img src="<?php echo base_url(); ?>dgassets/user/images/profile/2.jpg" alt="" class="img-fluid">
</a>
</div>
</div>-->
            <!--<div class="profile-news">
<h5 class="text-primary d-inline">Our Latest News</h5>
<div class="media pt-3 pb-3">
<img src="<?php echo base_url(); ?>dgassets/user/images/profile/5.jpg" alt="image" class="mr-3 rounded" width="75">
<div class="media-body">
<h5 class="m-b-5"><a href="post-details.html"
class="text-black">Collection of textile samples</a></h5>
<p class="mb-0">I shared this on my fb wall a few months back, and I thought.</p>
</div>
</div>
<div class="media pt-3 pb-3">
<img src="<?php echo base_url(); ?>dgassets/user/images/profile/6.jpg" alt="image" class="mr-3 rounded" width="75">
<div class="media-body">
<h5 class="m-b-5"><a href="post-details.html"
class="text-black">Collection of textile samples</a></h5>
<p class="mb-0">I shared this on my fb wall a few months back, and I thought.</p>
</div>
</div>
<div class="media pt-3 pb-3">
<img src="<?php echo base_url(); ?>dgassets/user/images/profile/7.jpg" alt="image" class="mr-3 rounded"
width="75">
<div class="media-body">
<h5 class="m-b-5"><a href="post-details.html"
class="text-black">Collection of textile samples</a></h5>
<p class="mb-0">I shared this on my fb wall a few months back, and I thought.</p>
</div>
</div>
</div>-->
          </div>
        </div>
      </div>
      <div class="col-xl-8">
        <div class="card">
          <div class="card-body">
            <div class="profile-tab">
              <div class="custom-tab-1">
                <ul class="nav nav-tabs">
                  <li class="nav-item"><a href="#my-posts" data-toggle="tab" class="nav-link active show">Personal</a></li>
                  <li class="nav-item"><a href="#about-me" data-toggle="tab" class="nav-link">Medical</a></li>
                  <li class="nav-item"><a href="#profile-settings" data-toggle="tab" class="nav-link">Lifestyle</a></li>
                </ul>
                <div class="tab-content">
                  <div id="my-posts" class="tab-pane fade active show">
                    <!--<div class="pt-3">
<div class="settings-form">
<h4 class="text-primary  text-center pb-3">Account Setting</h4>
<form>
<div class="form-row">
<div class="form-group col-md-6"><label>Full Name</label><input type="email" placeholder="Email" class="form-control"></div>
<div class="form-group col-md-6"><label>DOB</label><input type="password" placeholder="Password" class="form-control"></div>
</div>
<div class="form-row">
<div class="form-group col-md-6"><label>Gender</label><input type="email" placeholder="Email" class="form-control"></div>
<div class="form-group col-md-6"><label>Mobile No.</label><input type="password" placeholder="Password" class="form-control"></div>
</div>
<div class="form-group"><label>Address</label><input type="text" placeholder="1234 Main St" class="form-control"></div>
<div class="form-row">
<div class="form-group col-md-3"><label>City</label><input type="text" class="form-control"></div>
<div class="form-group col-md-3"><label>State</label><input type="text" class="form-control"></div>
<div class="form-group col-md-3"><label>Country</label><input type="text" class="form-control"></div>
<div class="form-group col-md-3"><label>Pincode</label><input type="text" class="form-control"></div>
</div>
<button class="btn btn-primary" type="submit">Submit Details</button>
</form>
</div>
</div>-->
                    <div class="profile-about-me">
                      <div class="pt-4 border-bottom-1 pb-3">
                        <h4 class="text-primary">About Me</h4>
                        <p class="mb-2"><?php echo "---------"; ?></p>
                      </div>
                    </div>
                    <div class="profile-personal-info">
                      <h4 class="text-primary mb-4">Personal Information</h4>
                      <div class="row mb-2">
                        <div class="col-sm-3 col-5">
                          <h5 class="f-w-500">Full Name <span class="pull-right">:</span></h5>
                        </div>
                        <div class="col-sm-9 col-7"><span><?= $message->first_name . ' ' . $message->last_name; ?></span></div>
                      </div>
                      <div class="row mb-2">
                        <div class="col-sm-3 col-5">
                          <h5 class="f-w-500">Date of Birth <span class="pull-right">:</span></h5>
                        </div>
                        <div class="col-sm-9 col-7"><span><?= $message->dob; ?></span></div>
                      </div>
                      <div class="row mb-2">
                        <div class="col-sm-3 col-5">
                          <h5 class="f-w-500">Gender <span class="pull-right">:</span></h5>
                        </div>
                        <div class="col-sm-9 col-7"><span><?= $message->gender == 1 ? 'Male' : 'Female' ?></span></div>
                      </div>
                      <div class="row mb-2">
                        <div class="col-sm-3 col-5">
                          <h5 class="f-w-500">Mobile No. <span class="pull-right">:</span></h5>
                        </div>
                        <div class="col-sm-9 col-7"><span>+91 <?= $message->mobile_no; ?></span></div>
                      </div>
                      <div class="row mb-2">
                        <div class="col-sm-3 col-5">
                          <h5 class="f-w-500">Address <span class="pull-right">:</span></h5>
                        </div>
                        <div class="col-sm-9 col-7"><span><?= $message->house_no . ' ' . $message->address . ' ' . $message->city . ' ' . $message->state . ' ' . $message->country; ?></span>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div id="about-me" class="tab-pane fade">
                    <div class="row pt-5">
                      <div class="col-12">
                        <div class="profile-skills mb-5">
                          <?php  if($disname !== 'false'): ?>
                            <h4 class="text-primary mb-2">You have :</h4>
                            <?php else : 
                                if($message->gender==1): 
                              ?>
                              <center>
                              <h4 class="text-primary mb-2 ml-5">You are healthy <br> <img src="<?=base_url('assets/images/user/fit-man.png'); ?>" alt="" style="width:200px ;"></h4></center>
                              <?php else: ?>
                              <center>
                              <h4 class="text-primary mb-2 center">You are healthy <br> <img src="<?=base_url('assets/images/user/fit-woman.png'); ?>" alt="" style="width:200px ;"></h4></center>
                              <?php 
                              endif;
                              endif ; ?>
                        </div>
                      </div>
                      <!-- <div class="col-6">
                        <div class="profile-skills mb-5">
                          <h4 class="text-primary mb-2">Do you have Thyroid?</h4>
                          <?= $message->is_thyroid == 1 ? '<button type="button" class="btn btn-rounded btn-success">'.$message->thyroid.'</button>' : '<button type="button" class="btn btn-rounded btn-danger">No</button>' ?>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="profile-skills mb-5">
                          <h4 class="text-primary mb-2">Do you have Blood Pressure issues?</h4>
                          <?= $message->bp == 1 ? '<button type="button" class="btn btn-rounded btn-success">Yes</button>' : '<button type="button" class="btn btn-rounded btn-danger">No</button> ' ?>


                        </div>
                      </div>
                      <div class="col-6">
                        <div class="profile-skills mb-5">
                          <h4 class="text-primary mb-2">Do you have Heart Aliment?</h4>
                          <?= $message->heart_ailment == 1 ? '<button type="button" class="btn btn-rounded btn-success">Yes</button>' : ' <button type="button" class="btn btn-rounded btn-danger">No</button>' ?>


                        </div>
                      </div>
                      <div class="col-6">
                        <div class="profile-skills mb-5">
                          <h4 class="text-primary mb-2">Do you have Heart Diabetes?</h4>
                          <?= $message->is_diabetes == 1 ? '<button type="button" class="btn btn-rounded btn-success">'.$message->diabetes.'</button>' : '<button type="button" class="btn btn-rounded btn-danger">No</button> ' ?>


                        </div>
                      </div>
                      <div class="col-6">
                        <div class="profile-skills mb-5">
                          <h4 class="text-primary mb-2">Do you have PCOD/PCOS?</h4>
                          <?= $message->pcos == 1 ? '<button type="button" class="btn btn-rounded btn-success">Yes</button>' : '<button type="button" class="btn btn-rounded btn-danger">No</button>' ?>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="profile-skills mb-5">
                          <h4 class="text-primary mb-2">Outing per week</h4>
                          <?= $message->how_many_times_eat_in_week >= 1 ? '<button type="button" class="btn btn-rounded btn-success">Yes</button>' : '<button type="button" class="btn btn-rounded btn-danger">No</button>' ?>
                        </div>
                      </div>   -->
                      <?php  #pr($disname);
                      if($disname !== 'false') {
                          foreach($disname as $i=>$disease){
                        ?>
                        <div class="col-6">
                          <div class="profile-skills mb-5">
                            <h4 class="text-danger mb-2"><?=$disease['p_category'];  ?></h4>
                            <?= $disease['name']; ?>
                          </div>
                        </div>  
                        <?php
                          }
                        } 
                      ?>
                    </div> <!-- row -->
                  </div>
                  <div id="profile-settings" class="tab-pane fade">
                    <div class="pt-3">
                      <div class="settings-form">
                        <h4 class="text-primary">Lifestyle Information</h4>
                        <form>
                          <div class="form-row">
                            <div class="form-group col-md-6 mb-5"><label>Your Lifestyle</label>
                              <input type="text" placeholder="<?= $message->lifestyle; ?>" class="form-control text-primary" readonly>
                            </div>
                            <div class="form-group col-md-6"><label>Your Workout</label><input type="text" placeholder="<?= $message->workout_follow; ?>" class="form-control" readonly></div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-6"><label>Wakeup Time</label><input type="text" placeholder="<?= $message->wakeup_time; ?>" class="form-control" readonly></div>
                            <div class="form-group col-md-6"><label>Breakfast Time</label><input type="text" placeholder="<?= $message->breakfast_time; ?>" class="form-control" readonly></div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-4"><label>Lunch Time</label><input type="text" placeholder="<?= $message->lunch_time; ?>" class="form-control" readonly></div>
                            <div class="form-group col-md-4"><label>Dinner Time</label><input type="text" placeholder="<?= $message->dinner_time; ?>" class="form-control" readonly></div>
                            <div class="form-group col-md-4"><label>Sleep Time</label><input type="text" placeholder="<?= $message->sleep_time; ?>" class="form-control" readonly></div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Modal -->
              <div class="modal fade" id="replyModal">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Post Reply</h5>
                      <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <div class="modal-body">
                      <form><textarea class="form-control" rows="4">Message</textarea></form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Reply</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--********************************** Content body end ***********************************-->
<?php include('footer.php'); ?>
<script src="https://foliotek.github.io/Croppie/croppie.js"></script>
<script>
  var myelem ={};
  $("#item-img-output").attr("src", "https://via.placeholder.com/180");
  var loadFile = function(event) {
    console.log('load file called:');
    var output = document.getElementById('item-img-output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
  var $uploadCrop,tempFilename,rawImg,imageId;

  function readFile(input) {
    if (input.files && input.files[0]) {
      console.log('read file called:');
      var reader = new FileReader();
      reader.onload = function (e) {
        $('.upload-demo').addClass('ready');
        $('#cropImagePop').modal('show');
        rawImg = e.target.result;
      }
      reader.readAsDataURL(input.files[0]);
    }
    else {
      alert('Sorry - youre browser doesnt support the FileReader API');
      //swal("Sorry - you're browser doesn't support the FileReader API");
    }
  }

  // get cropped image
    $uploadCrop = $('#upload-demo').croppie({
    viewport: {
      width: 180,
      height: 180,
    },
    enforceBoundary: false,
    enableExif: true
  });

  // on modal show
  $('#cropImagePop').on('shown.bs.modal', function () {
    // alert('Shown pop');
    $uploadCrop.croppie('bind', {
      url: rawImg
    }).then(function () {
      console.log('jQuery bind complete');
    });
  });

  $('.item-img').on('change', function () {
    imageId = $(this).data('id'); tempFilename = $(this).val();
    $('#cancelCropBtn').data('id', imageId); readFile(this);
  });

  // on click of crop button
  $('#cropImageBtn').on('click', function (ev) {
    $uploadCrop.croppie('result', {
      type: 'base64',
      format: 'jpeg',
      size: { width: 180, height: 180 }
    }).then(function (resp) {
      $('#item-img-output').attr('src', resp);
      console.log('cropped image:');
      console.log(resp);
      console.log('call ajax to save the profileimage on the disk');
      myelem.img = resp

      $('#cropImagePop').modal('hide');
    });
  });

  function saveimage(){
    console.clear();
    $.ajax({  
          url: "./saveProfileimage/",  
          type: "POST",  
          data: {'image':myelem.img , id: <?=$_SESSION['id'];?>},  
          dataType: 'TEXT',
          contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
          success: function(status) {
              // $('#result').append(status);
              console.log(status);
              // on status reload refresh
              if(status==1){
                location.reload(true);
              }
          }
      });
  }
</script>