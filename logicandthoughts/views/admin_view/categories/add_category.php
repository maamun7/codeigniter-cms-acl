<script src="<?php echo base_url(); ?>my-assets/admin/js/category.js"></script>
<div class="row-fluid">
	<div class="span12">
		<div class="box box-bordered box-color">
			<div class="box-title">
				<h3>New Category</h3>
			</div>
			<div class="box-content nopadding">
				<form action="<?php echo base_url(); ?>admin/categories/insert_category" id="add_category" method="POST" enctype="multipart/form-data" class='form-horizontal form-bordered'>
					<div class="control-group">
						<label for="category_name" class="control-label">Category Name</label>
						<div class="controls">
							<input type="text" name="category_name" id="category_name" placeholder="Category Name" class="input-xlarge required">
						</div>
					</div>				
					<div class="control-group">
						<label class="control-label">Status</label>
						<div class="controls">
							<label class='radio'>
								<input type="radio" name="status" checked="checked" value="1"> Active
							</label>
							<label class='radio'>
								<input type="radio" name="status" value="0"> Inactive
							</label>
						</div>
					</div>						
					<div class="form-actions">
						<input type="submit" class="btn btn-primary" value="Save" name="add-category">
						<a href="<?php echo base_url(); ?>admin/categories/" class="btn">Cancel</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>