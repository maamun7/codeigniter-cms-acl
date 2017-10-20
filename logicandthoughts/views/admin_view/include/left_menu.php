<div id="left">
	<form action="" method="GET" class='search-form'>
		<div class="search-pane">
			<input type="text" name="search" placeholder="Search here...">
			<button type="submit"><i class="icon-search"></i></button>
		</div>
	</form>
	<div class="subnav">
		<div class="subnav-title">
			<a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>Content</span></a>
		</div>
		<ul class="subnav-menu">
			<li <?php if($active=="categories"){echo"class='active'";}?> ><a href="<?php echo base_url(); ?>admin/categories">Category</a></li>				
			<li <?php if($active=="articles"){echo"class='active'";}?> ><a href="<?php echo base_url(); ?>admin/articles">Article</a></li>	
		</ul>
	</div>
	<div class="subnav">
		<div class="subnav-title">
			<a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span> Panel</span></a>
		</div>
		<ul class="subnav-menu">
			<li <?php if($active=="our_client"){echo"class='active'";}?> ><a href="<?php echo base_url(); ?>admin/our_clients">Our Clients</a></li>	
		</ul>
	</div>
	<!--<div class="subnav">
		<div class="subnav-title">
			<a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>Tiger Zone</span></a>
		</div>
		<ul class="subnav-menu">
			<!--<li class='dropdown'>
				<a href="#" data-toggle="dropdown">Articles</a>
				<ul class="dropdown-menu">
					<li><a href="#">Action #1</a></li>
					<li><a href="#">Antoher Link</a></li>
					<li class='dropdown-submenu'>
						<a href="#" data-toggle="dropdown" class='dropdown-toggle'>Go to level 3</a>
						<ul class="dropdown-menu">
							<li><a href="#">This is level 3</a></li>
							<li><a href="#">Unlimited levels</a></li>
							<li><a href="#">Easy to use</a></li>
						</ul>
					</li>
				</ul>
			</li>
			<li <?php if(isset($active) && $active=="player_prof"){echo"class='active'";}?>><a href="<?php echo base_url(); ?>admin/player_profiles">Player Profile</a></li>
		</ul>
	</div>-->
</div><!--- #left---->