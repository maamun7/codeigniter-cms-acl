var baseUrl = "http://logic-thought.com/";
$(document).ready(function(){    
	$(".deleteHomeSlider").click(function()
	{	
		var id=$(this).attr('name');
		var dataString = 'slider_id='+ id;
		var x = confirm("Are You Sure ?");	
		if (x==true){
			$.ajax
		   ({
				type: "POST",
				url: baseUrl+"admin/home_slider/delete",
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
	$(".HomeSliderChangeSts").click(function()
	{	
		var id=$(this).attr('name');
		var dataString = 'slider_id='+ id;
			$.ajax
		   ({
				type: "POST",
				url: baseUrl+"admin/home_slider/change_status",
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
	$("#add_home_slider").validate({  
		rules:{
			slider_heading:{required:true},
			url_path:{required:true},
			slider_details:{required:true},
			userfile:{required: true,accept:'gif|jpg|png|jpeg'},
			slider_sorting:{number:true}
		},
		messages:{
			slider_heading:{required:"Enter Slider Heading"},
			url_path:{required:"Enter Slider URL Path"},
			slider_details:{required:"Enter Slider Details"},
			userfile:{required:"Select an image"},
			slider_sorting:{number:"Must be number"}
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
	$("#edit_home_slider").validate({  
		rules:{
			slider_heading:{required:true},
			url_path:{required:true},
			slider_details:{required:true},
			slider_sorting:{number:true}
		},
		messages:{
			slider_heading:{required:"Enter Slider Heading"},
			url_path:{required:"Enter Slider URL Path"},
			slider_details:{required:"Enter Slider Details"},
			slider_sorting:{number:"Must be number"}
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