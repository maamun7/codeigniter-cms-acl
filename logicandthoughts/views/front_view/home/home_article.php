<?php if(!empty($home_article)){ ?>
<?php $i=0; ?>
<?php foreach($home_article as $items){$i++ ?>			
	<div class="one-third column">
		<div class="box">
			<h2 class="featured" ><?php echo character_limiter($items['article_name'],25); ?></h2>
			<div class="texts justify">
				<?php echo character_limiter(htmlspecialchars_decode($items['deatils']),200); ?>
			</div>				
			<div class="button center">
				 <?php if(strlen(htmlspecialchars_decode($items['deatils']))>250){?><a href="content/view_content/<?php echo $items['article_id']; ?>">Read More</a><?php } ?>
			</div>
		</div>
	</div>	
	<?php if($i==3){break;} ?>
	<?php } ?>
<?php } ?>