<!-- CONTENT -->   
<div class="five columns blog-sidebar">
	<div class="widget widget_interio_portfolio">
		<h3 class="title">Related Articles</h3>
		<div class="recent recent-portfolio">
			<ul>
			<?php
				if(!empty($reltded_contents)){
					 $i=0;
					foreach($reltded_contents as $related_content){$i++;
				?>
					<li>
						<div class="post-thumbnail">
							<a class="mini-thumb portfolio-pic" href="<?php echo base_url(); ?>content/view_content/<?php print_r($related_content['article_id']); ?>" title="Modeling" >
								<img src="<?php echo base_url(); ?>uploads/articles/article_fet_img/thumb_img/latest_img/<?php print_r($related_content['featured_image']); ?>" alt="" />                                
								<div class="recent-cap"><img src="<?php echo base_url(); ?>uploads/articles/article_fet_img/thumb_img/latest_img/<?php print_r($related_content['featured_image']); ?>" alt="" /> </div>
							</a>
						</div>
					</li>    
				<?php if($i==8){break;} ?>
				<?php } ?>
				<?php } ?>
			</ul>
		</div>
	</div>                            
</div>
<div class="eleven columns">
	<article>                     
		<div class="eleven columns alpha omega thumbnail">
			<figure>
				<a href="<?php echo base_url(); ?>uploads/articles/article_fet_img/thumb_img/high_img/{picture}" class="prettyPhoto" data-rel="prettyPhoto[blog]" >
					<img src="<?php echo base_url(); ?>uploads/articles/article_fet_img/thumb_img/high_img/{picture}" alt="Another Blog Post"/>
					<div class="overlay" ><span class="ov-lb"></span></div>
				</a>
			</figure>
		</div>  
		<div class="eleven columns alpha omega">
			<div class="portfolio_details">
				<div class="pdw">
					<span class="p_label">Category:</span>
					<span class="p_text">{categoriy}</span>
				</div>
				<div class="pdw">
					<span class="p_label">Date:</span>
					<span class="p_text"><?php echo (isset($date)) ? get_date_small_month($date) :'' ?></span>
				</div>                                    
			</div>   
		</div>
		<p class="justify">
			<span class="dropcap dropcap-rounded" >M</span>
			<?php if(isset($detail)){ print_r(htmlspecialchars_decode($detail));}?> 
		</p>
	</article><!--blog post-->                        
</div>
