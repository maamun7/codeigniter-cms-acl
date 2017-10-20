<div id="content">
	<center><h2 class="ntitle">Sign In</h2></center>
	<section id="listnews">
		<div class="two columns">
		</div>
		<div class="seven columns">
			<form class="form-horizontal" id="userRegistration" method="POST" action="<?php echo base_url().'users/do_login';?>">
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
				<div class="controls">
					<div class="one columns">
						<input type="submit" class="button [radius round]" value="Login">
					</div>
					<div class="seven columns">
						All ready registered <a href="<?php echo base_url().'users'; ?>" >Sign Up </a> here
					</div>
				</div>
			</form>
		</div>
		<div class="one columns">
		</div>
	</section>
	<div class="line1"></div>
</div>