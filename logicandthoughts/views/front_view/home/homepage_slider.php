<!-- SLIDER -->   
	<div class="container ">
		<div class="sixteen columns">
			<div class="flexslider">
				<ul class="slides">
					<?php if(!empty($home_sliders)){ ?>
					<?php foreach($home_sliders as $rows){ ?>	
						<li>
							<img src="<?php echo base_url(); ?>uploads/home_slider/thumb_img/<?php if(isset($rows['slider_image'])){ echo $rows['slider_image']; } ?>" alt="" />
							<div class="flex_caption full_caption">
								<h4><?php if(isset($rows['slider_heading'])){ echo substr($rows['slider_heading'], 0, 10); } ?> </span> <?php if(isset($rows['slider_heading'])){ echo substr($rows['slider_heading'], 10, 20); } ?></h4>
								<div class="caption_text">
									<?php if(isset($rows['slider_details'])){ echo character_limiter($rows['slider_details'],300); } ?>
								</div>
							</div>
						</li>
					<?php } ?>
					<?php } ?>
				</ul>
			</div><!-- End Flexslider -->
			<!-- Slider Shadow -->
			<div class="slider_shadow shadow1">
				<img src="<?php echo base_url(); ?>my-assets/front/images/all_img/slider_shadow1.png" alt="shadow1" />
			</div>
			<!-- End Slider Shadow -->
		</div> 
	</div><!-- container -->
	<!-- End SLIDER --> 