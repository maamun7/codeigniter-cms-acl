<div id="content">
	<!-- Block Domestic -->
	<?php
	if(!empty($home_categorys)){ 
		foreach($home_categorys as $home_category){
			if(!empty($home_category['sub_cat_name'])){
	?>
			<!-- Block Categories 1 -->
			<h3 class="blocktitle"><?php echo$home_category['sub_cat_name']; ?><span><a href="tiger-zone.php">MORE</a></span></h3>
			<section id="cat2news">
				<!-- Block Featured  -->
				<div class="featured">
					<div class="thumb">
						<div class="hover-wrap"> <span class="overlay-img"></span></div>
						<img src="<?php echo base_url(); ?>uploads/articles/article_fet_img/thumb_img/med_img/<?php if(isset($home_category['articles'][0]['featured_image'])){ echo $home_category['articles'][0]['featured_image'];} ?>" alt="">
						<div class="overlay">
							<div class="title-carousel">
								<div class="ticarousel"><?php if(isset($home_category['articles'][0]['article_name'])){ print_r(character_limiter(htmlspecialchars_decode($home_category['articles'][0]['deatils']),350));} ?></div>
							</div>
						</div>
					</div>
					<div class="excerpt">
						<div class="desc">
							<p><?php if(isset($home_category['articles'][0]['article_name'])){ print_r(character_limiter(htmlspecialchars_decode($home_category['articles'][0]['deatils']),300));} ?></p>
							<a href="<?php echo base_url();?>content/view_content/<?php if(isset($home_category['articles'][0]['article_id'])){ echo $home_category['articles'][0]['article_id'];} ?>"><i class="fa fa-external-link"></i> READMORE </a>
						</div>
					</div>
				</div>
				<!-- Block Category Area -->
				<!-- Block Other Category -->
				<?php 
				if(!empty($home_category['articles'])){
					array_shift($home_category['articles']);
				}
				if(!empty($home_category['articles'])){
				?>
					<div class="othercat">
						<div class="otitle">OTHER POST</div>
						<ul class="oc-horizon">
						<?php
							$i =0;
							foreach($home_category['articles'] as $rows){$i++;
							if($i == 4){ break;}
						?> 
							<li>
								<div class="octhumb">
									<a href="<?php echo base_url();?>content/view_content/<?php print_r($rows['article_id']); ?>"><img src="<?php echo base_url(); ?>uploads/articles/article_fet_img/thumb_img/small_img/<?php print_r($rows['featured_image']); ?>" alt=""></a>
								</div>
								<div class="desc">
									<a href="<?php echo base_url();?>content/view_content/<?php print_r($rows['article_id']); ?>"><?php echo character_limiter($rows['article_name'],35);?></a>
									<h4><a href="<?php echo base_url();?>content/view_content/<?php print_r($rows['article_id']); ?>"> <?php print_r(character_limiter(htmlspecialchars_decode($rows['deatils']),75));?> </a></h4>
								</div>
							</li>
							<?php
							}
							?>
						</ul>
					</div>
				<?php
				}
				?>
			</section>
	<?php 
			}
		}
	}
	?>
	<div class="line1"></div>
</div>
