<div class="clearfix">
	<div id="portfolio-carousel" class="portfolio-carousel">
		
		<h3 class="title">Latest</h3>
		
		<div class="nxt" id="nxt_portfolio_carousel"> &#xe850;</div>
		<div class="prv" id="prv_portfolio_carousel"> &#xe84f;</div>                    
		<ul id="portfolio_carousel" class="portfolio pc_carousel p4col">   
			<?php if(!empty($latest_article)){ ?>
			<?php foreach($latest_article as $rows){ ?>	
				<li>
					<div class="portfolio-thumb thumb-p4col">
						<a title="Modeling" data-rel="prettyPhoto[portfolio]" class="prettyPhoto zoom " href="<?php echo base_url(); ?>uploads/articles/article_fet_img/thumb_img/high_img/<?php echo $rows['featured_image']; ?>">
						<img src="<?php echo base_url(); ?>uploads/articles/article_fet_img/thumb_img/latest_img/<?php echo $rows['featured_image']; ?>" alt="" />
						<div class="overlay"><span class="ov-lb"></span></div>
						</a>
					</div>
					<div class="portfolio-info info-p4col">
						<a class="portfolio-title" title="Modeling" href="content/view_content/<?php echo $rows['article_id']; ?>">
							<h3 class="title"><?php echo character_limiter($rows['article_name'],10); ?></h3>
						</a>
						<div class="portfolio-types">
							<div class="button right small">
								<a href="content/view_content/<?php echo $rows['article_id']; ?>">Details ... </a>
							</div>
						</div>
					</div>
				</li>  
			<?php } ?>
			<?php } ?>	           
		</ul>
	</div>
</div>
<!-- End portfolio Carousel -->