<script src="<?php echo base_url(); ?>assets/front/js/vendor/jquery.validate.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>my-assets/front/js/user_registration.js" type="text/javascript"></script>

<div id="content">
	<center><h2 class="ntitle">Sign up</h2></center>
	<section id="listnews">
		<div class="two columns">
		</div>
		<div class="seven columns">
			<form class="form-horizontal" id="userRegistration" method="POST" action="<?php echo base_url().'users/do_registered';?>">
				<div class="control-group">
					<label class="control-label" for="username"></label>
					<div class="controls">
						<div class="error"> <span></span> </div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="first_name">First Name</label>
					<div class="controls">
						<input type="text" name="first_name" id="first_name" placeholder="Enter First Name" class="required" required>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="last_name">Last Name</label>
					<div class="controls">
						<input type="text" name="last_name" id="last_name" placeholder="Enter Last Name" class="required" required>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="username">Email</label>
					<div class="controls">
						<input type="text" name="username" id="username" placeholder="Enter Email" class="required">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="password">Password</label>
					<div class="controls">
						<input type="password" id="password" name="password" placeholder="Enter Password" class="required" >
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="con_pass">Re-type Password</label>
					<div class="controls">
						<input type="password" id="con_pass" name="con_pass" placeholder="Confirm Password" class="required" >
					</div>
				</div>
				<div class="controls">
					<div class="one columns">
						<input type="submit" class="button [radius round]" value="Join Now">
					</div>
					<div class="seven columns">
						All ready registered <a href="<?php echo base_url().'users/signin'; ?>" >Sign in </a> here
					</div>
				</div>
			</form>
		</div>
		<div class="one columns">
		</div>
	</section>
		<div class="line1"></div>
</div>