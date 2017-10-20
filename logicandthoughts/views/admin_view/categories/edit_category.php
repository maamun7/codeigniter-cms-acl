<script src="<?php echo base_url(); ?>my-assets/admin/js/category.js"></script>
<div class="row-fluid">
	<div class="span12">
		<div class="box box-bordered box-color">
			<div class="box-title">
				<h3>New Slider</h3>
			</div>
			<div class="box-content nopadding">
				<form action="<?php echo base_url(); ?>admin/categories/category_update" method="POST" id="add_category" enctype="multipart/form-data" class='form-horizontal form-bordered'>
					<div class="control-group">
						<label for="category_name" class="control-label">Category Name</label>
						<div class="controls">
							<input type="text" name="category_name" id="category_name" placeholder="Category Name" value="{category_name}" class="input-xlarge required" >
						</div>
					</div>				
					<div class="control-group">
						<label class="control-label">Status</label>
						<div class="controls">
							<label class='radio'>
								<input type="radio" name="status" checked="checked" <?php if($status ==1){ echo "checked='checked'";} ?> value="1"> Active
							</label>
							<label class='radio'>
								<input type="radio" name="status" <?php if($status ==0){ echo "checked='checked'";} ?> value="0"> Inactive
							</label>
							<input type="hidden" name="category_id" value="{cat_id}">
						</div>
					</div>						
					<div class="form-actions">
						<input type="submit" class="btn btn-primary" name="edit_category" value="Save Changes">
						<a href="<?php echo base_url(); ?>admin/categories/" class="btn">Cancel</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>