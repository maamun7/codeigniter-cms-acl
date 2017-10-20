var baseUrl = "http://logic-thought.com/";
$(document).ready(function(){    
	$(".deleteMenuFetImg").click(function()
	{	
		var id=$(this).attr('name');
		var dataString = 'featured_id='+ id;
		var x = confirm("Are You Sure ?");	
		if (x==true){
			$.ajax
		   ({
				type: "POST",
				url: baseUrl+"admin/menu_featured_images/delete",
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
	$(".menuFetImgChangeSts").click(function()
	{	
		var id=$(this).attr('name');
		var dataString = 'featured_id='+ id;
			$.ajax
		   ({
				type: "POST",
				url: baseUrl+"admin/menu_featured_images/change_status",
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
	$("#add_menu_featured").validate({  
		rules:{
			featured_title:{required:true},
			url_link:{required:true},
			menu_id:{required:true},
			status:{required:true},
			userfile:{required: true,accept:'gif|jpg|png|jpeg'},
		},
		messages:{
			featured_title:{required:"Enter Slider Heading"},
			url_link:{required:"Enter URL Path"},
			menu_id:{required:"Select Menu"},
			userfile:{required:"Select an Image"},
			status:{required:"Select an Status"},
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
	$("#edit_menu_featured").validate({  
		rules:{
			featured_title:{required:true},
			url_link:{required:true},
			menu_id:{required:true},
			status:{required:true}
		},
		messages:{
			featured_title:{required:"Enter Slider Heading"},
			url_link:{required:"Enter URL Path"},
			menu_id:{required:"Select Menu"},
			status:{required:"Select an Status"}
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