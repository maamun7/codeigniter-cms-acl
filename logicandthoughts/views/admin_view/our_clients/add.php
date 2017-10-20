<script src="<?php echo base_url(); ?>my-assets/admin/js/did_you_knows.js"></script>
<div class="row-fluid">
	<div class="span12">
		<div class="box box-bordered box-color">
			<div class="box-title">
				<h3>New Our Client</h3>
			</div>
			<div class="box-content nopadding">
				<form action="<?php echo base_url(); ?>admin/our_clients/insert" id="add_our_clients" method="POST" enctype="multipart/form-data" class='form-horizontal form-bordered'>
					<div class="control-group">
						<label for="company_name" class="control-label">Company Name</label>
						<div class="controls">
							<input type="text" name="company_name" id="company_name" placeholder="Enter Company Name" class="span6 required">
						</div>
					</div>
					<div class="control-group">
						<label for="article_name" class="control-label">Company Logo</label>
						<div class="controls">
							<input type="file" name="userfile" class="input-block-level required">
						</div>
					</div>
					<div class="control-group">
						<label for="client_details" class="control-label">Details</label>
						<div class="controls">
							<textarea name="client_details" id="client_details"></textarea>
						</div>
					</div>	
					<div class="control-group">
						<label for="web_links" class="control-label">Web Link</label>
						<div class="controls">
							<input type="text" name="web_links" id="web_links" placeholder="Enter Web Link" class="span6 required">
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
						<a href="<?php echo base_url(); ?>admin/our_clients/" class="btn">Cancel</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	var editor = CKEDITOR.replace( 'client_details', {
		//filebrowserBrowseUrl : 'my-assets/ckfinder/ckfinder.html',
		//filebrowserImageBrowseUrl : '<?php echo base_url(); ?>my-assets/common/plugins/ckfinder/ckfinder.html?type=Images',
		filebrowserImageBrowseUrl : '<?php echo base_url(); ?>admin/our_clients/browse_did_you_know_image',
		//filebrowserFlashBrowseUrl : '<?php echo base_url(); ?>my-assets/common/plugins/ckfinder/ckfinder.html?type=Flash',
		//filebrowserUploadUrl : '<?php echo base_url(); ?>my-assets/common/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		//filebrowserImageUploadUrl : '<?php echo base_url(); ?>my-assets/common/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserImageUploadUrl : '<?php echo base_url(); ?>admin/our_clients/upload_image_path_change',
		//filebrowserFlashUploadUrl : '<?php echo base_url(); ?>my-assets/common/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKFinder.setupCKEditor( editor, '../' );
</script>