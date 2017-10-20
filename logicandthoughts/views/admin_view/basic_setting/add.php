<script src="<?php echo base_url(); ?>my-assets/admin/js/basic_settings.js"></script>
<div class="row-fluid">
	<div class="span12">
		<div class="box box-bordered box-color">
			<div class="box-title">
				<h3>New Basic Settings</h3>
			</div>
			<div class="box-content nopadding">
				<form action="<?php echo base_url(); ?>admin/basic_settings/add" id="basic_settings" method="POST" enctype="multipart/form-data" class='form-horizontal form-bordered'>
					<div class="control-group">
						<label for="company_name" class="control-label">Company Name</label>
						<div class="controls">
							<input type="text" name="company_name" id="company_name" placeholder="Enter Company Name" class="span6 required">
						</div>
					</div>
					<div class="control-group">
						<label for="company_moto" class="control-label">Company Moto/Slogan</label>
						<div class="controls">
							<input type="text" name="company_moto" id="company_moto" placeholder="Enter Company Slogan" class="span6 required">
						</div>
					</div>
					<div class="control-group">
						<label for="contact_details" class="control-label">Contact Address</label>
						<div class="controls">
							<textarea name="contact_details" class="span6" id="contact_details"></textarea>
						</div>
					</div>
					<div class="control-group">
						<label for="email" class="control-label">Email</label>
						<div class="controls">
							<input type="text" name="email" id="email" placeholder="Enter Email" class="span6 required">
						</div>
					</div>
					<div class="control-group">
						<label for="phone_number" class="control-label">Phone Number</label>
						<div class="controls">
							<input type="text" name="phone_number" id="phone_number" placeholder="Enter Phone NUmber" class="span6 required">
						</div>
					</div>						
					<div class="control-group">
						<label for="mobile_number" class="control-label">Mobile Number</label>
						<div class="controls">
							<input type="text" name="mobile_number" id="mobile_number" placeholder="Enter Mobile Number" class="span6 required">
						</div>
					</div>	
					<div class="control-group">
						<label for="article_name" class="control-label">Company Logo</label>
						<div class="controls">
							<input type="file" name="userfile" class="input-block-level required">
						</div>
					</div>
					<div class="control-group">
						<label for="logo_height" class="control-label">Logo Height</label>
						<div class="controls">
							<input type="text" name="logo_height" id="logo_height" placeholder="Enter Logo Height" class="span6 required">
						</div>
					</div>
					<div class="control-group">
						<label for="logo_width" class="control-label">Logo Weight</label>
						<div class="controls">
							<input type="text" name="logo_width" id="logo_width" placeholder="Enter Logo Width" class="span6 required">
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