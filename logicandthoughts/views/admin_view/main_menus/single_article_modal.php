<script>
	jQuery(document).ready(function(){
		jQuery('.clickArticles').click(function(){
			var select_article_id = $(this).attr("name");
			var get_val = $(".get_vaal_"+select_article_id).val();
			$("#single_article").val(get_val);
			$("#content_id").val(select_article_id);
		}); 
	});
</script>

<div class="popUpSelection" style="float:left;">
	<div class="popUpSelectionHead">Article</div>
	<?php
	if(!empty($article_list)){
		foreach($article_list as $data){ ?>
			<span class="clickArticles" name="<?php print_r($data['article_id']); ?>" value="<?php print_r($data['article_id']); ?>" data-dismiss="modal" > <?php print_r($data['article_name']); ?></span><br/>
			<input type="hidden" class="get_vaal_<?php print_r($data['article_id']); ?>" value="<?php print_r($data['article_name']); ?>" />
	<?php
		}
	}
	?>
</div>	