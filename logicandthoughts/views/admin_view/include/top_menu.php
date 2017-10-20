<!--- Top Menu Start ---->
<div id="navigation">
	<div class="container-fluid">
		<a href="#" id="brand">LOGIC</a>
		<a href="#" class="toggle-nav" rel="tooltip" data-placement="bottom" title="Toggle navigation"><i class="icon-reorder"></i></a>
		<ul class='main-nav'>
			<li <?php if($active=="home"){echo"class='active'";}?> >
				<a href="<?php echo base_url(); ?>admin/admin_dashboard/">
					<span>Dashboard</span>
				</a>
			</li>
			<li <?php if($active=="featured_image" || $active=="main_menu"){echo"class='active'";}?> >
				<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
					<span>Menus</span>
					<span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
					<li <?php if($active=="main_menu"){echo"class='active'";}?> ><a href="<?php echo base_url(); ?>admin/main_menus">Main Menus</a></li>
				</ul>
			</li>
			<li <?php if(isset($active) && $active=="slider" || $active=="news_scroll"){echo"class='active'";}?> >
				<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
					<span>Home Content</span>
					<span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
					<li <?php if(isset($active) && $active=="slider"){echo"class='active'";}?> ><a href="<?php echo base_url(); ?>admin/home_slider">Home Slider</a></li>
					<li <?php if(isset($active) && $active=="news_scroll"){echo"class='active'";}?> ><a href="<?php echo base_url(); ?>admin/news_scrollers">News Scroller</a></li>
				</ul>
			</li>
			<li <?php if(isset($active) && $active=="users" || $active=="basic_settings" || $active=="system_settings"){echo"class='active'";}?> >
				<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
					<span>Systems</span>
					<span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
					<li <?php if(isset($active) && $active=="basic_settings"){echo"class='active'";}?>><a href="<?php echo base_url(); ?>admin/basic_settings">Basic Settings</a></li>	
					<li <?php if(isset($active) && $active=="system_settings"){echo"class='active'";}?>><a href="<?php echo base_url(); ?>admin/system_settings" >System Settings</a></li>
					<li <?php if(isset($active) && $active=="users"){echo"class='active'";}?>><a href="<?php echo base_url(); ?>admin/users">User</a></li>
					<li <?php if(isset($active) && $active=="users"){echo"class='active'";}?>><a href="<?php echo base_url(); ?>admin/permissions" >Permission</a></li>						
				</ul>
			</li>
		</ul>
		<div class="user">
			<ul class="icon-nav">
				<!--<li class='dropdown'>
					<a href="#" class='dropdown-toggle' data-toggle="dropdown"><i class="icon-envelope-alt"></i><span class="label label-lightred">4</span></a>
					<ul class="dropdown-menu pull-right message-ul">
						<li>
							<a href="#">
								<img src="asset/img/demo/user-1.jpg" alt="">
								<div class="details">
									<div class="name">Jane Doe</div>
									<div class="message">
										Lorem ipsum Commodo quis nisi ...
									</div>
								</div>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="asset/img/demo/user-2.jpg" alt="">
								<div class="details">
									<div class="name">John Doedoe</div>
									<div class="message">
										Ut ad laboris est anim ut ...
									</div>
								</div>
								<div class="count">
									<i class="icon-comment"></i>
									<span>3</span>
								</div>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="asset/img/demo/user-3.jpg" alt="">
								<div class="details">
									<div class="name">Bob Doe</div>
									<div class="message">
										Excepteur Duis magna dolor!
									</div>
								</div>
							</a>
						</li>
						<li>
							<a href="components-messages.html" class='more-messages'>Go to Message center <i class="icon-arrow-right"></i></a>
						</li>
					</ul>
				</li>--->
				<li class='dropdown colo'>
					<a href="#" class='dropdown-toggle' data-toggle="dropdown"><i class="icon-tint"></i></a>
					<ul class="dropdown-menu pull-right theme-colors">
						<li class="subtitle">
							Predefined colors
						</li>
						<li>
							<span class='red'></span>
							<span class='orange'></span>
							<span class='green'></span>
							<span class="brown"></span>
							<span class="blue"></span>
							<span class='lime'></span>
							<span class="teal"></span>
							<span class="purple"></span>
							<span class="pink"></span>
							<span class="magenta"></span>
							<span class="grey"></span>
							<span class="darkblue"></span>
							<span class="lightred"></span>
							<span class="lightgrey"></span>
							<span class="satblue"></span>
							<span class="satgreen"></span>
						</li>
					</ul>
				</li>
			</ul>
			{logindata}
		</div>
	</div>
</div><!--- Top Menu End #navigation ---->

