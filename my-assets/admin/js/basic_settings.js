var baseUrl = "http://logic-thought.com/";

 $(document).ready(function(){ 
	$("#basic_settings").validate({  
		rules:{
			company_name:{required:true},
			contact_details:{required:true},
			email:{required:true,email: true},
			phone_number:{required:true},
			mobile_number:{required:true},
			logo_height:{required:true},
			logo_width:{required:true}
		},
		messages:{
			company_name:{required:"Company Name is Required"},
			contact_details:{required:"Contact Address is Required"},
			email:{required:"Email is Required",email:"Enter valid email"},
			phone_number:{required:"Phone Number is Required"},
			mobile_number:{required:"Mobile Number is Required"},
			logo_height:{required:"Logo Height is Required"},
			logo_width:{required:"Logo Width is Required"}
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



