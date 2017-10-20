var baseUrl = "http://logic-thought.com/";
	$(document).ready(function()
	{
		$("#submit_poll").click(function()
		{	
			$("#poll_form").submit(function(e)
			{
				$("#poll-msg").html("<img src='<?php echo base_url(); ?>my-assets/front/images/css_usage_img/loader.gif'/>");
				var postData = $(this).serializeArray();
				var formURL = $(this).attr("action");
				$.ajax(
				{
					url : formURL,
					type: "POST",
					data : postData,
					success:function(data,textStatus,jqXHR) 
					{
						$("#poll-msg").html('<pre style="margin-left:20px;">'+data+'</pre>');
					},
					error: function(jqXHR,textStatus,errorThrown) 
					{
						$("#poll-msg").html('<pre style="margin-left:20px;>'+textStatus+'</pre>');
					}
				});
				e.preventDefault();	//STOP default action
				e.unbind();
			});	
			$("#poll_form").submit(); //SUBMIT FORM
		});
	});
	
	$(document).ready(function(){ 
		$(".seePollResult").click(function()
		{	
			var baseUrl = $(".myBaseUrl").attr('name');
			var id=$(this).attr('name');
			var dataString = 'poll_id='+ id;	
				//alert(baseUrl);
			$.ajax
		   ({
				type: "POST",
				url: baseUrl+"module/load_poll_result",
				data: dataString,
				cache: false,
				beforeSend: function(){
					$('#loader').show();
				},
				complete: function(){
					$('#loader').hide();
				},
				success: function(datas)
				{
					$("#PollResultView").show();
					$("#PollResultView").html(datas);
					$(".formPoll").hide();
					$(".backToPoll").removeClass("displayNone");
					//$('.'+id).show();
					//alert(datas);
				} 
			});
		});
		
		$(".backToPoll").click(function()
		{
			$("#PollResultView").hide();
			$(".formPoll").show();
			$(".backToPoll").addClass("displayNone");
		});
	});	
	
	///////////////////////////// Quize /////////////////////////////
	
	$(document).ready(function()
	{
		$("#submit_quize").click(function()
		{	
			$("#quize_form").submit(function(e)
			{
				$("#quize-msg").html("<img src='<?php echo base_url(); ?>my-assets/front/images/css_usage_img/loader.gif'/>");
				var postData = $(this).serializeArray();
				var formURL = $(this).attr("action");
				$.ajax(
				{
					url : formURL,
					type: "POST",
					data : postData,
					success:function(data,textStatus,jqXHR) 
					{
						$("#quize-msg").html('<pre style="margin-left:20px;">'+data+'</pre>');
					},
					error: function(jqXHR,textStatus,errorThrown) 
					{
						$("#quize-msg").html('<pre style="margin-left:20px;>'+textStatus+'</pre>');
					}
				});
				e.preventDefault();	//STOP default action
				e.unbind();
			});	
			$("#quize_form").submit(); //SUBMIT FORM
		});
	});
	
	$(document).ready(function(){ 
		$(".seeQuizeResult").click(function()
		{	
			var baseUrl = $(".myBaseUrl").attr('name');
			var id=$(this).attr('name');
			var dataString = 'quize_id='+ id;	
				//alert(dataString);
			$.ajax
		   ({
				type: "POST",
				url: baseUrl+"module/load_quize_result",
				data: dataString,
				cache: false,
				beforeSend: function(){
					$('#loader').show();
				},
				complete: function(){
					$('#loader').hide();
				},
				success: function(datas)
				{
					$("#QuizeResultView").show();
					$("#QuizeResultView").html(datas);
					$(".formQuize").hide();
					$(".backToQuize").removeClass("displayNone");
					//$('.'+id).show();
					//alert(datas);
				} 
			});
		});
		
		$(".backToQuize").click(function()
		{
			$("#QuizeResultView").hide();
			$(".formQuize").show();
			$(".backToQuize").addClass("displayNone");
		});
	});