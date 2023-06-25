<script>
	
	// $res = calljax()
	function makefeatured(id , stat,elem){
		var param1 = "'"+id+"','success',this";
		var param2 = "'"+id+"','NA',this";
		if(stat == 'success'){
			var url = base_url+'Admin_recipe/makefeatured/'+id+'/0';
			var param = {'featured':0 };
			var res = callajax(param,url);
			$(elem).parent().html('<button type="button" class="btn btn-outline-danger btn-icon rounded-pill" onclick="makefeatured('+param2+')"><i class="icon-x"></i></button>');

		}else if(stat == 'NA'){
			var url = base_url+'Admin_recipe/makefeatured/'+id+'/1';
			param = {'featured':1 };
			var res = callajax(param,url);
			$(elem).parent().html('<button type="button" class="btn btn-outline-success btn-icon rounded-pill" onclick="makefeatured('+param1+')"><i class="icon-check"></i></button>');
		}

		console.log(res);
 
		// location.reload();
	}
</script>