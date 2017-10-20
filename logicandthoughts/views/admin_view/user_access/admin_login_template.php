<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<!-- Apple devices fullscreen -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<!-- Apple devices fullscreen -->
	<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />
	
	<title>Logic & Thoughts Admin</title>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/bootstrap.min.css">
	<!-- Bootstrap responsive -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/bootstrap-responsive.min.css">
	<!-- icheck -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/plugins/icheck/all.css">
	<!-- Theme CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/style.css">
	<!-- jQuery -->
	<script src="<?php echo base_url(); ?>assets/admin/js/jquery.min.js"></script>	
	<!-- Nice Scroll -->
	<!-- icheck -->
	<script src="<?php echo base_url(); ?>assets/admin/js/plugins/icheck/jquery.icheck.min.js"></script>
	<!-- Bootstrap -->
		<script src="<?php echo base_url(); ?>assets/admin/js/bootstrap.min.js"></script>
	<!-- Theme framework -->
	<script src="<?php echo base_url(); ?>assets/admin/js/eakroko.min.js"></script>

	<!--[if lte IE 9]>
		<script src="js/plugins/placeholder/jquery.placeholder.min.js"></script>
		<script>
			$(document).ready(function() {
				$('input, textarea').placeholder();
			});
		</script>
	<![endif]-->
	

	<!-- Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico" />
	<!-- Apple devices Homescreen icon -->
	<link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-precomposed.png" />

</head>
<body class='login' style="background-color: #008000 !important;">
	<div class="wrapper">
		{msg_content}
		<h1><a href="<?php echo base_url(); ?>admin/admin_dashboard"><!--<img src="<?php echo base_url(); ?>my-assets/front/images/common_img/logo.jpg" alt="logo" width="70" height="6">--> <span style="color:#ff0000;font-size:30px;">LOGIC & THOUGHTS ADMIN</a></h1>
		{content}
	</div>
    <div id="footer">
        <p>
            Logic & Thoughts <span class="font-grey-4">|</span><a href="<?php echo base_url(); ?>" target="_blank">View Site</a> 
        </p>
    </div>
    </body>    
</html>