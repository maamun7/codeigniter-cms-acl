	var baseUrl = "http://logic-thought.com/";
	$(document).ready(function(){ 
		//Retrieve Course name For using when insert Chapter name
		$(".selectCategoryName").change(function()
		{
			var id=$(this).val();
			var dataString = 'cat_id='+ id;
			//alert(dataString);
			$.ajax
		   ({
				type: "POST",
				url: baseUrl+"admin/articles/retrieve_sub_category",
				data: dataString,
				cache: false,
				success: function(html)
				{
					$(".retrieveSubCatName").html(html);
					//$(".test").html(html);
				} 
			});
		});
	});
	
   $(document).ready(function(){ 
		$("#add_articles").validate({  
			rules:{
				category_id:{required:true},
				sub_category_id:{required:true},
				article_name:{required:true}
			},
			messages:{
				category_id:{required:"Select Category Name"},
				sub_category_id:{required:"Select Sub Category Name"},
				article_name:{required:"Enter Article Name"}
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
		$(".deleteArticles").click(function()
		{	
			var id=$(this).attr('name');		
			var dataString = 'article_id='+ id;
			var x = confirm("Are You Sure ?");	
			if (x==true){
				$.ajax
			   ({
					type: "POST",
					url: baseUrl+"admin/articles/delete",
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
		$(".articleStsChange").click(function()
		{
			var id=$(this).attr('name');
			var dataString = 'article_id='+ id;
				$.ajax
			   ({
					type: "POST",
					url: baseUrl+"admin/articles/change_status",
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
		$(".news_scroller_view").click(function()
		{
			var id=$(this).attr('name');
			var dataString = 'article_id='+ id;
				$.ajax
			   ({
					type: "POST",
					url: baseUrl+"admin/articles/news_scroller_status",
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
		$(".home_page_view").click(function()
		{
			var id=$(this).attr('name');
			var dataString = 'article_id='+ id;
				$.ajax
			   ({
					type: "POST",
					url: baseUrl+"admin/articles/home_page_view_status",
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
		$(".is_latest_news").click(function()
		{
			var id=$(this).attr('name');
			var dataString = 'article_id='+ id;
				$.ajax
			   ({
					type: "POST",
					url: baseUrl+"admin/articles/latest_article_status",
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
