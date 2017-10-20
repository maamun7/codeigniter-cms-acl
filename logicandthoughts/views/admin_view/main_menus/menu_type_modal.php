<script>
	jQuery(document).ready(function(){
		jQuery('.click-item').click(function(){
			var clickItems = $(this).attr("name");
			switch(clickItems)
			{
				case "Single Article":
					$(".menu_item_type").val("");
					$(".menu_item_type").val("Single Article");
					var url = "content/view_content";
					$(".JQClass").show();
					$("#menu_links").attr("readonly",true); 
					$("#single_article").val(clickItems);
					$(".all_article").removeClass("in");
					$(".all_article").removeClass("required");
					$(".single_article").addClass("in");
					$(".single_article").addClass("required");
					$("#menu_links").val(url);
					break;
				case "All Article List":
					$(".menu_item_type").val("");
					$(".menu_item_type").val("All Article List");
					var url = "content/view_category";
					$(".JQClass").show();
					$("#menu_links").attr("readonly",true); 
					$("#all_article").val(clickItems);
					$(".single_article").removeClass("in");
					$(".single_article").removeClass("required");
					$(".all_article").addClass("in");
					$(".all_article").addClass("required");
					$(".commnClass").slideUp();
					$("#menu_links").val(url);
					break;
				case "External Link":
					$(".menu_item_type").val("");
					$(".menu_item_type").val("External Link");
					$(".JQClass").hide();
					$("#menu_links").attr("readonly",false); 
					$("#menu_links").val(""); 
					$("#content_id").val("");
					break;
			}
			//alert(clickItems);  
		}); 
	});
</script>
<div class="popUpSelection" style="float:left;">
	<div class="popUpSelectionHead">Article</div>
	<span class="click-item" name="Single Article" data-dismiss="modal" >Single Article</span><br/>
	<span class="click-item" name="All Article List" data-dismiss="modal" >All Article List</span><br/>
</div>		
<div class="popUpSelection" style="float:right;">
	<div class="popUpSelectionHead">System Links</div>
	<span class="click-item" name="External Link" data-dismiss="modal" >External Link</span><br/>
</div>
	