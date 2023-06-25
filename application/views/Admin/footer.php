<!-- Footer -->
			<div class="navbar navbar-expand-lg navbar-light">
				<div class="text-center d-lg-none w-100">
					<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
						<i class="icon-unfold mr-2"></i>
						Footer
					</button>
				</div>

				<div class="navbar-collapse collapse" id="navbar-footer">
					<span class="navbar-text">
						&copy; 2019 - 2022. <a href="#">Diet Ghar</a> by <a href="#" target="_blank">Diet Ghar</a>
					</span>

				
				</div>
			</div>
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>
<!-- // testing the session // remove if not required-->
 
	<script type="text/javascript">
		//common parameters
 
			var base_url = '<?=base_url()?>';
 
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
					headers: {
						"Auth":  '<?=$_SESSION['Token'];?>'
					},
					success: function (data) {
						// console.log('%c ajax->'+data,'color:red');
							// var parsed_data = JSON.parse(data);
							resp = data;        
					}
				});
				return resp;
			}
		</script>
		<?php 
		if ($ctrl == 'Admin_recipe') { # if controller is admin recipe include its js
			include('include/adminRecipeJs.php');
		}elseif($ctrl == ''){

		}else{
			
		}
			
		?>












<script type="text/javascript">var sc_project=8042139; var sc_invisible=1; var sc_security="034832da";</script><script type="text/javascript" src="https://www.statcounter.com/counter/counter.js" async></script><noscript><div class="statcounter"><a title="website statistics" href="https://statcounter.com/" target="_blank"><img class="statcounter" src="https://c.statcounter.com/8042139/0/034832da/1/" alt="website statistics" referrerPolicy="no-referrer-when-downgrade"></a></div></noscript>
</body>
</html>
