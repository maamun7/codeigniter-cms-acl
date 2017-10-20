<script src="<?php echo base_url(); ?>my-assets/admin/js/articles.js"></script>
<div class="row-fluid">
	<div class="span12">
		<div class="box box-bordered box-color">
			<div class="box-title">
				<h3>New Article</h3>
			</div>
			<div class="box-content nopadding">
				<form action="<?php echo base_url(); ?>admin/articles/insert_article" id="add_articles" method="POST" enctype="multipart/form-data" class='form-horizontal form-bordered'>
					<div class="control-group">
						<label for="category_id" class="control-label">Select Category</label>
						<div class="controls">
							<select name="category_id" class="selectCategoryName span5" id="category_id">
								<option selected="selected" value="">..Select Category..</option> 
								{category_list}
									<option value="{categories_id}">{categories_name}</option>  
								{/category_list}
							</select>
						</div>
					</div>	
					<div class="control-group">
						<label for="article_name" class="control-label">Article Name</label>
						<div class="controls">
							<input type="text" name="article_name" id="article_name" placeholder="Article Name" class="span6 required">
						</div>
					</div>
					<div class="control-group">
						<label for="article_name" class="control-label">Featured Image</label>
						<div class="controls">
							<input type="file" name="userfile" class="input-block-level">
						</div>
					</div>
					<div class="control-group">
						<label for="article_details" class="control-label">Details</label>
						<div class="controls">
							<textarea name="article_details" id="article_details"></textarea>
						</div>
					</div>	
					<div class="control-group">
						<label class="control-label">Is Latest News</label>
						<div class="controls">
							<input type="checkbox" name="is_latest_news" id="is_latest_news" value="1">
						</div>
					</div>	
					<div class="control-group">
						<label class="control-label">Show in Bottom Slider</label>
						<div class="controls">
							<input type="checkbox" name="in_scroller_view" id="in_scroller_view" value="1">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Show in Home Page</label>
						<div class="controls">
							<input type="checkbox" name="in_home_view" id="in_home_view" value="1">
						</div>
					</div>						
					<div class="control-group">
						<label class="control-label">Status</label>
						<div class="controls">
							<select name="status" class="span3" id="status">
								<option value="1" selected="selected">Published</option> 
								<option value="0">Unpublished</option>  
							</select>
						</div>
					</div>						
					<div class="form-actions">
						<button type="submit" class="btn btn-primary" name="add-category">Save</button>
						<a href="<?php echo base_url(); ?>admin/articles/" class="btn">Cancel</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	var editor = CKEDITOR.replace( 'article_details', {
		//filebrowserBrowseUrl : 'my-assets/ckfinder/ckfinder.html',
		//filebrowserImageBrowseUrl : '<?php echo base_url(); ?>my-assets/common/plugins/ckfinder/ckfinder.html?type=Images',
		filebrowserImageBrowseUrl : '<?php echo base_url(); ?>admin/articles/browse_article_image',
		//filebrowserFlashBrowseUrl : '<?php echo base_url(); ?>my-assets/common/plugins/ckfinder/ckfinder.html?type=Flash',
		//filebrowserUploadUrl : '<?php echo base_url(); ?>my-assets/common/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		//filebrowserImageUploadUrl : '<?php echo base_url(); ?>my-assets/common/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserImageUploadUrl : '<?php echo base_url(); ?>admin/articles/upload_image_path_change',
		//filebrowserFlashUploadUrl : '<?php echo base_url(); ?>my-assets/common/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKFinder.setupCKEditor( editor, '../' );
</script>