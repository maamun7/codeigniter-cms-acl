var baseUrl = "http://logic-thought.com/";
	$(document).ready(function(){ 
		$("#main_menu").validate({  
			rules:{
				//menu_item_type:{required:true},
				menu_title:{required:true},
				menu_type:{required:true}
			},
			messages:{
				//menu_item_type:{required:"Select Menu Item type"},
				menu_title:{required:"Enter Title"},
				menu_type:{required:"Select Menu Location"}
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

$(document).ready(function(){    
	$(".deleteMainMenu").click(function()
	{	
		var id=$(this).attr('name');		
		var dataString = 'menu_id='+ id;
		var x = confirm("Are You Sure,want to delete it?");	
		if (x==true){
			$.ajax
		   ({
				type: "POST",
				url: baseUrl+"admin/main_menus/delete",
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
	$(".mainMenuStatusChange").click(function()
	{
		var id=$(this).attr('name');			
		var dataString = 'menu_id='+ id;
			$.ajax
		   ({
				type: "POST",
				url: baseUrl+"admin/main_menus/change_status",
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
	
