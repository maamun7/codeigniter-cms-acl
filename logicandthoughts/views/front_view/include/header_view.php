<!-- Top Band - If you dont want to use Sticky menu please remove sticky class below -->
<div class="band main sticky" >
	<!-- HEADER -->
	<div class="container header">
		<div class="three columns" style="padding-bottom:5px;">
			<h1 class="logo" ><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?><?php if(isset($logo)){print_r($logo);} ?>" height="<?php if(isset($height)){print_r($height);} ?>" width="<?php if(isset($width)){print_r($width);} ?>" alt="logic&thoughts" /></a></h1>
		</div>
		<div class="thirteen columns navbar" >
			 <!-- Search Button -->
				<div class="top_search">
					<!--<form id="customsearch" action="#" method="get" role="search">
						<div class="search_field">
							<input type="text"  class="search_text" value="?" onfocus="this.value='';" onblur="this.value='?';" name="s" id="s" >
						</div>
					</form>-->
				</div>
			<!-- end Search Button -->
			<!-- Navigation Menu -->
			{main_navigation_bar}
		</div><!--end thirteen --> 
	</div><!--end container -->   
	<!-- End HEADER -->  
</div><!-- End of Main Band-->
<div class="band title" >
<!-- Sub_Header -->
	<div class="container sub_header">
		<div class="sixteen columns">
			<div class="slogan">
				<?php if(isset($company_moto)){print_r($company_moto);} ?>
			</div>
			<div class="right_sub_text">
				<?php if(isset($phone_no)){ ?> Call Us: &nbsp;<span style="color:#fff important;"><?php print_r($phone_no); ?></span> <?php }?>
			</div>
		</div>
	</div><!-- End Sub_Header -->