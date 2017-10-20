<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<!-- Apple devices fullscreen -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<!-- Apple devices fullscreen -->
	<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />
	
	<title>404 Page Not Found<</title>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/bootstrap.min.css">
	<!-- Bootstrap responsive -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/bootstrap-responsive.min.css">
	<!-- Theme CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/style.css">

</head>
<body class='error' style="background-color:#008000 !important;">
	<div class="wrapper">
		<div class="code"><span style="color:#ff0000 !important;">404</span><i style="color:#ff0000 !important;" class="icon-warning-sign"></i></div>
		<div class="desc">Oops! Sorry, that page could'nt be found.</div>
		<form action="#" class='form-horizontal'>
			<div class="input-append">
				<input type="text" name="search" placeholder="Search a site..">
				<button type='submit' class='btn'><i class="icon-search"></i></button>
			</div>
		</form>
		<div class="buttons">
			<div class="pull-left"><a href="<?php echo base_url(); ?>" class="btn"><i class="icon-arrow-left"></i> Back</a></div>
		</div>
	</div>
	<div id="footer">
		<p>Logic and Thoughts</p>
		<a href="#" class="gototop"><i class="icon-arrow-up"></i></a>
	</div>
</body>
</html>