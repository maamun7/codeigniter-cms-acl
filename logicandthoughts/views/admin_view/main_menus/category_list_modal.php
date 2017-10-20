<script>
	jQuery(document).ready(function(){
		jQuery('.clickArticles').click(function(){
			var select_items = $(this).attr("name");
			var get_value = $(".get_vall_"+select_items).val();
			$("#all_article").val(get_value);
			$("#content_id").val(select_items);
		});
	});
</script>

<div class="popUpSelection" style="float:left;">
	<div class="popUpSelectionHead">Select Category</div>
	<?php
	if(!empty($category_list)){
		foreach($category_list as $data){ ?>
			<span class="clickArticles" name="<?php print_r($data['categories_id']); ?>" data-dismiss="modal" > <?php print_r($data['categories_name']); ?></span><br/>
			<input type="hidden" class="get_vall_<?php print_r($data['categories_id']); ?>" value="<?php print_r($data['categories_name']); ?>" />
	<?php
		}
	}
	?>
</div>	