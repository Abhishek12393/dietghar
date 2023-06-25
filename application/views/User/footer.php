<!--**********************************Footer start***********************************-->
<div class="footer">
<div class="copyright">
<p>Copyright © DietGhar.com <?php $year = date("Y"); echo $year; ?> </p>
<!-- <p><?php print_r($message->mobile_no); ?></p> -->
</div>
</div>
<!--**********************************Footer end***********************************-->
</div>
<!-- Required vendors -->
<?php if($pagename != 'Meal Plan'): ?>
	<script src="<?php echo base_url(); ?>dgassets/user/vendor/global/global.min.js"></script>
	<?php endif ; ?>
<script src="<?php echo base_url(); ?>dgassets/user/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="<?php echo base_url(); ?>dgassets/user/vendor/chart.js/Chart.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>dgassets/user/js/custom.min.js"></script>
<script src="<?php echo base_url(); ?>dgassets/user/js/deznav-init.js"></script>
<script src="<?php echo base_url(); ?>dgassets/user/vendor/lightgallery/js/lightgallery-all.min.js"></script>
<script>$('#lightgallery').lightGallery({thumbnail: true,});</script>
<script src="<?php echo base_url(); ?>dgassets/user/vendor/owl-carousel/owl.carousel.js"></script>
<!-- Chart piety plugin files -->
<script src="<?php echo base_url(); ?>dgassets/user/vendor/peity/jquery.peity.min.js"></script>
<!-- Apex Chart -->
<script src="<?php echo base_url(); ?>dgassets/user/vendor/apexchart/apexchart.js"></script>


 
<script type="text/javascript">
//common parameters
	let userid = <?php echo $id; ?> ;
  var base_url1 = '<?=base_url()?>';
  var base_url2 = 'https://dietghar.com/chat/';
	
  // common ajax call 
	function callajax(param,url=''){
		console.log('ajax called'+url);
		// if (url != '') {
		// 	url = base_url2+""+url;
		// }else{
		// 		url = base_url2+""
		// }
		$.ajax({
			url: url ,
			method: "POST",
				async: false,
			data: param,
			dataType: 'TEXT',
			success: function (data) {
				// console.log('%c ajax->'+data,'color:red');
					// var parsed_data = JSON.parse(data);
					resp = data;        
			}
		});
		return resp;
	}
</script>
<script>
	function carouselReview(){
		/*  testimonial one function by = owl.carousel.js */
		jQuery('.testimonial-one').owlCarousel({
			loop:true,
			autoplay:true,
			margin:30,
			nav:false,
			dots: false,
			left:true,
			navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
			responsive:{
				0:{items:1},
				484:{items:1},
				882:{items:1},
				1200:{items:1},
				1540:{items:1},
				1740:{items:1}
			}
		})
		jQuery('.testimonial-two').owlCarousel({
			loop:true,
			autoplay:true,
			margin:30,
			nav:false,
			dots: false,
			left:true,
			navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
			responsive:{
				0:{items:1},
				484:{items:1},
				882:{items:2},	
				1200:{items:2},			
				1540:{items:2},
				1740:{items:2}
			}
		})	
		jQuery('.testimonial-three').owlCarousel({
			loop:true,
			autoplay:true,
			margin:30,
			nav:false,
			dots: false,
			left:true,
			navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
			responsive:{
				0:{items:1},
				484:{items:1},
				882:{items:3},	
				1200:{items:3},			
				1540:{items:3},
				1740:{items:3}
			}
		})	
		jQuery('.testimonial-four').owlCarousel({
			loop:true,
			autoplay:true,
			margin:30,
			nav:false,
			dots: false,
			left:true,
			navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
			responsive:{
				0:{items:1},
				484:{items:1},
				882:{items:3},	
				1200:{items:3},			
				1540:{items:3},
				1740:{items:3}
			}
		})	
		jQuery('.testimonial-five').owlCarousel({
			loop:true,
			autoplay:true,
			margin:30,
			nav:false,
			dots: false,
			left:true,
			navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
			responsive:{
			0:{items:1},
			484:{items:1},
			882:{items:3},	
			1200:{items:3},			
			1540:{items:3},
			1740:{items:3}
			}
		})	
		jQuery('.testimonial-six').owlCarousel({
			loop:true,
			autoplay:true,
			margin:30,
			nav:false,
			dots: false,
			left:true,
			navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
			responsive:{
			0:{items:1},
			484:{items:1},
			882:{items:3},	
			1200:{items:3},			
			1540:{items:3},
			1740:{items:3}
			}
		})
		jQuery('.testimonial-seven').owlCarousel({
			loop:true,
			autoplay:true,
			margin:30,
			nav:false,
			dots: false,
			left:true,
			navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
			responsive:{
			0:{items:1},
			484:{items:1},
			882:{items:3},	
			1200:{items:3},			
			1540:{items:3},
			1740:{items:3}
			}
		})	
	}
	jQuery(window).on('load',function(){
		setTimeout(function(){
			
			carouselReview();
		}, 1000); 
	});
</script>

<?php 
	#chat code called 
	include_once 'include/footer_chat.php'; // chat process code of js
 // chat process code of js
?>

<?php 
if($page == 'dashboard'): ?>
	<!-- Dashboard 1 -->
	<script src="<?php echo base_url(); ?>dgassets/user/js/dashboard/dashboard-1.js"></script>
	<script>
		jQuery(window).on('load',function(){
			var resp = callajax("{param:'param'}",base_url1+'userApi/getloss');
		});
	</script>
<?php 
elseif($page== 'female_measurement' || $page== 'male_measurement'):  
	include_once 'include/footer_measurement.php';
 
endif; 
?>
</body>
</html>	