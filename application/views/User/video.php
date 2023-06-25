<?php include('header.php'); include('sidebar.php');?>
<!--********************************** Content body start ***********************************-->
<div class="content-body">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
 
<div class="card">
<link rel="stylesheet" href="<?php echo base_url(); ?>dgassets/user/video-light-box/videolightbox.css" type="text/css" />	
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>dgassets/user/video-light-box/overlay-minimal.css"/>
<script src="<?php echo base_url(); ?>dgassets/user/video-light-box/jquery.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>dgassets/user/video-light-box/swfobject.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>dgassets/user/video-light-box/jquery.tools.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>dgassets/user/video-light-box/videolightbox.js" type="text/javascript"></script>
<div class="card-body pb-1">
<div class="row" id="lightgallery">
<?php foreach($list as $video){ 
  #pr($video);
  $tbim = $video['thumbnail_link'] == ''? 'https://upload.wikimedia.org/wikipedia/commons/5/5a/No_image_available_500_x_500.svg':$video['thumbnail_link'];
  ?>
  <a href="<?php echo $video['yt_link'] ; ?>" class="overlay"><img src="<?="$tbim"; ?>" style="width:80%;"/></a>

  <!-- <a href="https://www.youtube.com/watch?v=m3DDvtqjDb2" class="overlay"><img src="https://bitmovin.com/wp-content/uploads/2016/06/thumbnail-seek.png" style="width:80%;"/></a> -->
<?php } ?>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!--********************************** Content body end ***********************************-->
<!-- Modal -->
<div class="modal fade" id="UpdateWeight">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Update Weight</h5>
<button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
</div>
<div class="modal-body">
<form>
<div class="form-group"><input type="text" class="form-control" placeholder="Add weight"></div>
<button class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>
</div>
<div class="modal fade" id="UpdateInch">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Update Inch</h5>
<button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
</div>
<div class="modal-body">
<form>
<div class="form-group"><input type="text" class="form-control" placeholder="Add inch"></div>
<button class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>
</div>
<?php include('footer.php'); ?>