var baseUrl = "http://logic-thought.com/";

 $(document).ready(function(){ 
	$("#add_our_clients").validate({  
		rules:{
			company_name:{required:true},
			client_details:{required:true},
			userfile:{required: true,accept:'gif|jpg|png|jpeg'}
		},
		messages:{
			company_name:{required:"Enter Company Name"},
			client_details:{required:"Enter Details"},
			userfile:{required:"Select an image"}
		},
		invalidHandler: function(form, validator) { 
		var errors = validator.numberOfInvalids();
		if (errors) {  
			var message = errors == 1 ? 'You missed 1 field. It has been highlighted': 'You missed ' + errors + ' fields. They have been highlighted';    
			$("div.error span").html(message); 
			$("div.error").show();        
		} else {
		$("div.error").hide();}
		}           
	});	
}); 

 $(document).ready(function(){ 
	$("#edit_our_clients").validate({  
		rules:{
			company_name:{required:true},
			client_details:{required:true}
		},
		messages:{
			company_name:{required:"Enter Company Name"},
			client_details:{required:"Enter Details"}
		},
		invalidHandler: function(form, validator) { 
		var errors = validator.numberOfInvalids();
		if (errors) {  
			var message = errors == 1 ? 'You missed 1 field. It has been highlighted': 'You missed ' + errors + ' fields. They have been highlighted';    
			$("div.error span").html(message); 
			$("div.error").show();        
		} else {
		$("div.error").hide();}
		}           
	});	
}); 

$(document).ready(function(){    
	$(".deleteOurClient").click(function()
	{	
		var id=$(this).attr('name');
		var dataString = 'client_id='+ id;
		var x = confirm("Are You Sure ?");	
		if (x==true){
			$.ajax
		   ({
				type: "POST",
				url: baseUrl+"admin/our_clients/delete",
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
	$(".ourClientChangeSts").click(function()
	{	
		var id=$(this).attr('name');
		var dataString = 'client_id='+ id;
		//alert(dataString);
			$.ajax
		   ({
				type: "POST",
				url: baseUrl+"admin/our_clients/change_status",
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



