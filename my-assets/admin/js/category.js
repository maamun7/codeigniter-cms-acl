var baseUrl = "http://logic-thought.com/";
$(document).ready(function(){    
	$(".deleteCategory").click(function()
	{	
		var id=$(this).attr('name');
		var dataString = 'cat_id='+ id;
		var x = confirm("Are You Sure ?");	
		if (x==true){
			$.ajax
		   ({
				type: "POST",
				url: baseUrl+"admin/categories/delete_category",
				data: dataString,
				cache: false,
				success: function(datas)
				{
					location.reload();
					//$(".test").html(datas);
				} 
			});
		}
	});
});

$(document).ready(function(){    
	$(".categoryStatusChange").click(function()
	{	
		var id=$(this).attr('name');
		var dataString = 'cat_id='+ id;
			$.ajax
		   ({
				type: "POST",
				url: baseUrl+"admin/categories/change_category_status",
				data: dataString,
				cache: false,
				success: function(datas)
				{
					location.reload();
					//$(".test").html(datas);
				} 
			});
	});
});

 $(document).ready(function(){ 
	$("#add_category").validate({  
		rules:{
			category_name:{required:true}
		},
		messages:{
			category_name:{required:"Enter Category Name"}
		},
		invalidHandler: function(form, validator) { 
			var errors = validator.numberOfInvalids();
			if (errors){  
				var message = errors == 1 ? 'You missed 1 field. It has been highlighted': 'You missed ' + errors + ' fields. They have been highlighted';    
				$("div.error span").html(message); 
				$("div.error").show();        
			}else {
				$("div.error").hide();
			}
		}           
	});	
}); 