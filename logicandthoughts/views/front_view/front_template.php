<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html> <!--<![endif]-->
<?php $this->load->view('front_view/include/head'); ?>
<body>
	<!-- Wrap (boxed or wide)-->
	<div id="wrap" class="wrap wide">
        <div class="band top_border" > </div>
		<?php $this->load->view('front_view/include/header'); ?>
			<div class="container">
				<?php if(isset($header_contents)){ echo $header_contents;} ?> 
			   <!-- Project Navigation -->
			</div>
		</div> <!-- end band-->  
		<div class="band content" >
			<div class="container">
				<!-- content start -->
				{content}
				<div>{our_clients}</div>
			</div>
		</div>
		<?php $this->load->view('front_view/include/footer'); ?>
	</div>
</body>
</html>