<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- main navigation start  -->
<nav class="main">
	<ul id="menu-main-menu" class="sf-menu">
		<li class="<?php echo $current_menu; ?>"> <a href="<?php echo base_url(); ?>">Home</a></li>	
		<?php if(!empty($menu_lists)){ ?>		
		<?php foreach($menu_lists as $menu_list ){ ?>	
		<li class="<?php echo $menu_list['active_menu']; ?> this_menu_id">
			<a href="<?php if(($menu_list['leb1_con_id']!=0) && ($menu_list['leb1_con_id']!="")){ echo base_url();} echo $menu_list['leb1_link']; if($menu_list['leb1_con_id']!=0 && $menu_list['leb1_con_id']!=""){echo "/".$menu_list['leb1_con_id'];} ?>"><?php echo $menu_list['leb1_name']; ?> </a>
			<?php if(!empty($menu_list['sub_lebel'])){ ?>
				<ul class="sub-menu">
					<?php foreach($menu_list['sub_lebel'] as $main_sub ){ ?>
						<li class="this_menu_id" name="<?php echo $menu_list['leb1_id']; ?>"><a href="<?php echo $main_sub['link'];if($main_sub['contentid']!=0 && $main_sub['contentid']!=""){echo "/".$main_sub['contentid'];} ?>"> <?php echo $main_sub['name']; ?> </a></li>
					<?php } ?>
				</ul>
			<?php } ?>
		</li>
		<?php } ?>
		<?php } ?>		
		<li class="<?php echo $current_menu; ?>"> <a href="<?php echo base_url(); ?>content/contact_us">Contact Us</a></li>	
	</ul>
</nav> 
<span class="url" name="<?php echo base_url(); ?>"></span>
<!-- End Navigation Menu -->
<!--
<nav id="nav">
	<ul>
         <li class="<?php echo $current_menu; ?> this_menu_id" name="">
			<a href="<?php echo base_url(); ?>" class="active">
				<i class="icon-nav icon-home"></i>
				Home
			</a>
			<span>Welcome intro</span>
		</li>
		<?php if(!empty($menu_lists)){ ?>		
		<?php foreach($menu_lists as $menu_list ){ ?>
		<li class="<?php echo $menu_list['active_menu']; ?> this_menu_id" name="<?php echo $menu_list['leb1_id']; ?>">
			<a href="<?php if($menu_list['leb1_con_id']!=0 && $menu_list['leb1_con_id']!=""){ echo base_url();} echo $menu_list['leb1_link']; if($menu_list['leb1_con_id']!=0 && $menu_list['leb1_con_id']!=""){echo "/".$menu_list['leb1_con_id'];} ?>">
				<i class="<?php if(!empty($menu_list['menu_icon'])){ echo $menu_list['menu_icon']; }else{ echo "icon-nav icon-portfolio";} ?>"></i>
				<?php echo $menu_list['leb1_name']; ?>
			</a>
			<span><?php if(isset($menu_list['bottom_text'])){ echo character_limiter($menu_list['bottom_text'],13); } ?></span>
			<?php if(!empty($menu_list['sub_lebel'])){ ?>
			<ul>
				<?php foreach($menu_list['sub_lebel'] as $main_sub ){ ?>
					<li class=" this_menu_id" name="<?php echo $menu_list['leb1_id']; ?>"><a href="<?php echo $main_sub['link'];if($main_sub['contentid']!=0 && $main_sub['contentid']!=""){echo "/".$main_sub['contentid'];} ?>"> <?php echo $main_sub['name']; ?> </a></li>
				<?php } ?>
			</ul>
			<?php } ?>
		</li>
			<?php } ?>
		<?php } ?>
	</ul> 
</nav>
<span class="url" name="<?php echo base_url(); ?>"></span>
-->
<!-- main navigation end -->



<script type="text/javascript">
   $(document).ready(function(){
      var baseUrl = $(".url").attr('name'); 
	$(".this_menu_id").click(function()
	{
		var id=$(this).attr('name');
		var dataString = 'menu_id='+ id;
            //alert(dataString);
			$.ajax
		   ({
				type: "POST",
				url: baseUrl+"front/menu/menu_active_sts_change",
				data: dataString,
				cache: false,
				success: function(data)
				{
					// location.reload();
					//$(".test").html(data);
				}
			});
	});
});
</script>
