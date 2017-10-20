<ul class="portfolio p2col sixteen columns">  
	<?php if(!empty($contents)){ ?>
	<?php foreach($contents as $rows){?>                     
	<li data-id="1100" data-type="photography ">
		<div class="portfolio-thumb thumb-p2col">
			<a href="<?php echo base_url(); ?>content/view_content/<?php echo $rows['article_id']; ?>" class="prettyPhoto zoom " data-rel="prettyPhoto[portfolio]" title="YouTube Video">
				<img src="<?php echo base_url(); ?>uploads/articles/article_fet_img/thumb_img/high_img/<?php print_r($rows['featured_image']); ?>"  alt="" />
				<!--<div class="overlay" ><span class="ov-vd"></span></div>-->
			</a>
		</div>
		<div class="portfolio-info info-p2col" >
			<a href="<?php echo base_url(); ?>content/view_content/<?php echo $rows['article_id']; ?>" title="YouTube Video" class="portfolio-title">
				<h3 class="title"><h4><?php echo character_limiter($rows['article_name'],60); ?></h4></h3>
			</a>
			<div class="portfolio-types"></div>
			<?php echo character_limiter(htmlspecialchars_decode($rows['deatils']),150); ?>                  
			<div class="portfolio-more button center"><?php if(strlen(htmlspecialchars_decode($rows['deatils']))>150){?><a href="<?php echo base_url(); ?>content/view_content/<?php echo $rows['article_id']; ?>" class="read-more-link" >View Details</a><?php } ?></div>							
		</div>
	</li>
	<?php } ?>
	<?php } ?>	
</ul>
 <div class="pagination button center">
 <?php if(isset($links)){echo $links;} ?>
	<!--<a href="#" class="selected">1</a>
	<a href="#/" class="inactive" >2</a>
	<a href="#" class="inactive" >3</a>
	<a href="#" class="inactive" >4</a>
	<a href="#" class="inactive" >Next Page &gt;</a> -->
</div>