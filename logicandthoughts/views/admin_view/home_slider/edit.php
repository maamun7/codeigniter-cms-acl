<script src="<?php echo base_url(); ?>my-asset/admin/js/home_slider.js"></script>
<div class="row-fluid">
	<div class="span12">
		<div class="box box-bordered box-color">
			<div class="box-title">
				<h3>New Slider</h3>
			</div>
			<div class="box-content nopadding">
				<form action="<?php echo base_url(); ?>admin/home_slider/update" method="POST" id="edit_home_slider" enctype="multipart/form-data" class='form-horizontal form-bordered'>
					<div class="control-group">
						<label for="slider_heading" class="control-label">Heading</label>
						<div class="controls">
							<input type="text" name="slider_heading" id="slider_heading" value="{slider_heading}" placeholder="Slider Heading" class="input-xlarge required">
						</div>
					</div>
					<div class="control-group">
						<label for="url_path" class="control-label">URL Path  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; http://</label>
						<div class="controls">
							<input type="text" name="url_path" id="url_path" value="{url_path}" placeholder="www.example.com..." class="input-xlarge required">
						</div>
					</div>
					<div class="control-group">
						<label for="slider_details" class="control-label">Slider Details</label>
						<div class="controls">
							<textarea name="slider_details" id="slider_details" rows="5" class="input-block-level required">{slider_details}</textarea>
						</div>
					</div>
					<div class="control-group">
						<label for="slider_img" class="control-label">Upload Image</label>
						<div class="controls">
							<input type="file" name="userfile" class="input-block-level">
							<img src="<?=base_url()?>uploads/home_slider/thumb_img/{slider_image}" height="100" width="60">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Status</label>
						<div class="controls">
							<label class='radio'>
								<input type="radio" name="status" <?php if($status ==1){ echo "checked='checked'";} ?> value="1"> Active
							</label>
							<label class='radio'>
								<input type="radio" name="status" <?php if($status ==0){ echo "checked='checked'";} ?> value="0"> Inactive
							</label>
						</div>
					</div>	
					<div class="control-group">
						<label class="control-label">Slider Sorting</label>
						<div class="controls">
							<input type="text" name="slider_sorting" value="{slider_sorting}" class="span2 required">
							<input type="hidden" name="slider_id" value="{slider_id}">
						</div>
					</div>
					
					<div class="form-actions">
						<button type="submit" class="btn btn-primary" value="add_slider">Save Changes</button>
						<button type="button" class="btn" value="form_cancel">Cancel</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>