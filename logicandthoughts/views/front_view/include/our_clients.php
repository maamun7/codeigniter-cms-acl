
<!-- Gap -->
<div class="gap gap40 clearfix"></div>

<!-- Clients Carousel -->       
<div class="clearfix">
	<div id="clients-carousel" class="clients-carousel clients">
		
		<h3 class="title">Our Clients</h3>
		
		<div class="nxt" id="nxt_clients_carousel"> &#xe850;</div>
		<div class="prv" id="prv_clients_carousel"> &#xe84f;</div>
		<ul class="cc_carousel" id="clients_carousel">
			<?php if(!empty($client_list_data)){ ?>
			<?php foreach($client_list_data as $client_list){?>	
			 <li>
				<a title="<?php echo $client_list['company_name']; ?>" class="bwWrapper" href="<?php echo $client_list['web_link']; ?>" target="_blank">
					<img alt="client06" src="<?php echo base_url(); ?>uploads/our_client/thumb_img/<?php echo $client_list['company_logo']; ?>">
				</a>
			 </li>
			<?php } ?>
			<?php } ?>
		</ul>
	</div>
</div>
<!-- End Clients Carousel -->