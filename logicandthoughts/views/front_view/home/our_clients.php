<div class="grid_12 jcarousellite product-carousel clearfix">
	<!-- divider with title start -->
	<section class="divider-with-title carousel clearfix">
		<div class="title">
		</div>
		<ul class="carousel-nav">
			<li>
				<a class="carousel-nav-1 prev" href="#"></a> 
			</li>

			<li>
				<a class="carousel-nav-1 next" href="#"></a> 
			</li>
		</ul>
	</section><!-- divider with title end -->
	<ul id="carousel-1" class="carousel-li">
		<?php if(!empty($bottom_article)){ ?>
		<?php $i=0; ?>
		<?php foreach($bottom_article as $itemss){$i++ ?>	
		<li>
			<div class="product-slider-wrap">
				<div id="slider-1" class="nivoSlider product-slider">
				<?php $j=0; ?>
				<?php foreach($bottom_article as $val){$j++ ?>	
					<img src="<?php echo base_url(); ?>uploads/our_client/thumb_img/<?php echo $val['company_logo']; ?>" alt="blog" />
				<?php if($j==3){ break;} ?>
				<?php } ?>
				</div>
				<div class="slider-shadow"></div>
			</div>
			<div class="product-description">
				<h5><?php echo character_limiter($itemss['article_name'],20); ?></h5>
				<span class="product-date">
					Date: <?php echo $itemss['created_date']; ?>
				</span>
				<p><?php echo character_limiter(htmlspecialchars_decode($itemss['deatils']),350); ?> <?php if(strlen(htmlspecialchars_decode($itemss['deatils']))>350){?><a href="content/view_content/<?php echo $itemss['article_id']; ?>"><b style="color:#038c7f">More</b></a><?php } ?></p>  
			</div>
		</li>
		<?php if($i==3){ break;} ?>
		<?php } ?>
		<?php } ?>
	</ul>
	</div>