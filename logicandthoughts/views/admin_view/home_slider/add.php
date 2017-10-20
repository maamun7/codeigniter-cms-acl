<script src="<?php echo base_url(); ?>my-assets/admin/js/home_slider.js"></script>
<div class="row-fluid">
	<div class="span12">
		<div class="box box-bordered box-color">
			<div class="box-title">
				<h3>New Slider</h3>
			</div>
			<div class="box-content nopadding">
				<form action="<?php echo base_url(); ?>admin/home_slider/insert" id="add_home_slider" method="POST" enctype="multipart/form-data" class='form-horizontal form-bordered'>
					<div class="control-group">
						<label for="slider_heading" class="control-label">Heading</label>
						<div class="controls">
							<input type="text" name="slider_heading" id="slider_heading" placeholder="Slider Heading" class="input-xlarge required">
						</div>
					</div>
					<div class="control-group">
						<label for="url_path" class="control-label">URL Path  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; http://</label>
						<div class="controls">
							<input type="text" name="url_path" id="url_path" placeholder="www.example.com..." class="input-xlarge">
						</div>
					</div>
					<div class="control-group">
						<label for="slider_details" class="control-label">Slider Details</label>
						<div class="controls">
							<textarea name="slider_details" id="slider_details" rows="5" class="input-block-level"> </textarea>
						</div>
					</div>
					<div class="control-group">
						<label for="slider_img" class="control-label">Upload Image</label>
						<div class="controls">
							<input type="file" name="userfile" class="input-block-level required">
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
					<div class="control-group">
						<label class="control-label">Slider Sorting</label>
						<div class="controls">
							<input type="text" name="slider_sorting" class="span2 required">
						</div>
					</div>
					<div class="form-actions">
						<input type="submit" class="btn btn-primary" value="Save" name="add-slider">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>