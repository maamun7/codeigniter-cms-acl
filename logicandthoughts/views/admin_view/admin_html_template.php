<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<!-- Apple devices fullscreen -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<!-- Apple devices fullscreen -->
	<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />
	
	<title><?php echo (isset($title)) ? $title :"Welcome to Logic & Thoughts Admin" ?></title>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/bootstrap.min.css">
	<!-- Bootstrap responsive -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/bootstrap-responsive.min.css">
	<!-- jQuery UI -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/plugins/jquery-ui/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/plugins/jquery-ui/smoothness/jquery.ui.theme.css">
	<!-- PageGuide -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/plugins/pageguide/pageguide.css">
	<!-- Fullcalendar -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/plugins/fullcalendar/fullcalendar.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/plugins/fullcalendar/fullcalendar.print.css" media="print">
	<!-- chosen -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/plugins/chosen/chosen.css">
	<!-- select2 -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/plugins/select2/select2.css">
	<!-- icheck -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/plugins/icheck/all.css">
	<!-- Theme CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/style.css">
	<!-- Color CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/themes.css">
	
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>my-assets/admin/css/customize_style.css">
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/admin/img/favicon.ico">


	<!-- jQuery -->
	<script src="<?php echo base_url(); ?>assets/admin/js/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>my-assets/common/js/jquery_validate.js"></script>
	
	
	
	<!--[if lte IE 9]>
		<script src="<?php echo base_url(); ?>assets/admin/js/plugins/placeholder/jquery.placeholder.min.js"></script>
		<script>
			$(document).ready(function() {
				$('input, textarea').placeholder();
			});
		</script>
	<![endif]-->

	<!-- Favicon -->
	<!-- Apple devices Homescreen icon -->
	<link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-precomposed.png" />	
	<script src="<?php echo base_url(); ?>my-assets/common/plugins/ckeditor/ckeditor.js"></script>
	<script src="<?php echo base_url(); ?>my-assets/common/plugins/ckfinder/ckfinder.js"></script>
</head>
<body>
	<?=$this->load->view('admin_view/include/header')?>	
	<div class="container-fluid" id="content">
		<script type="text/javascript">
			$('body').on('hidden', '.modal', function () {
			  $(this).removeData('modal');
			});
		</script>
		<div id="main">
			<div class="container-fluid" style="margin-top:60px;margin-bottom:60px;height:auto;overflow:auto;">
				{left_menu}
				{super_sub_menu}
				{msg_content}				
				{content}
			</div><!--- #Content---->
		</div><!--- #main---->
	</div>
	<?=$this->load->view('admin_view/include/footer')?>
</body>
	<!-- Nice Scroll -->
	<script src="<?php echo base_url(); ?>assets/admin/js/plugins/nicescroll/jquery.nicescroll.min.js"></script>
	<!-- jQuery UI -->
	<script src="<?php echo base_url(); ?>assets/admin/js/plugins/jquery-ui/jquery.ui.core.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/admin/js/plugins/jquery-ui/jquery.ui.widget.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/admin/js/plugins/jquery-ui/jquery.ui.mouse.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/admin/js/plugins/jquery-ui/jquery.ui.draggable.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/admin/js/plugins/jquery-ui/jquery.ui.resizable.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/admin/js/plugins/jquery-ui/jquery.ui.sortable.min.js"></script>
	<!-- Touch enable for jquery UI -->
	<script src="<?php echo base_url(); ?>assets/admin/js/plugins/touch-punch/jquery.touch-punch.min.js"></script>
	<!-- slimScroll -->
	<script src="<?php echo base_url(); ?>assets/admin/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<!-- Bootstrap -->
	<script src="<?php echo base_url(); ?>assets/admin/js/bootstrap.min.js"></script>
	<!-- vmap -->
	<script src="<?php echo base_url(); ?>assets/admin/js/plugins/vmap/jquery.vmap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/admin/js/plugins/vmap/jquery.vmap.world.js"></script>
	<script src="<?php echo base_url(); ?>assets/admin/js/plugins/vmap/jquery.vmap.sampledata.js"></script>
	<!-- Bootbox -->
	<script src="<?php echo base_url(); ?>assets/admin/js/plugins/bootbox/jquery.bootbox.js"></script>
	<!-- Flot -->
	<script src="<?php echo base_url(); ?>assets/admin/js/plugins/flot/jquery.flot.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/admin/js/plugins/flot/jquery.flot.bar.order.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/admin/js/plugins/flot/jquery.flot.pie.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/admin/js/plugins/flot/jquery.flot.resize.min.js"></script>
	<!-- imagesLoaded -->
	<script src="<?php echo base_url(); ?>assets/admin/js/plugins/imagesLoaded/jquery.imagesloaded.min.js"></script>
	<!-- PageGuide -->
	<script src="<?php echo base_url(); ?>assets/admin/js/plugins/pageguide/jquery.pageguide.js"></script>
	<!-- FullCalendar -->
	<script src="<?php echo base_url(); ?>assets/admin/js/plugins/fullcalendar/fullcalendar.min.js"></script>
	<!-- Chosen -->
	<script src="<?php echo base_url(); ?>assets/admin/js/plugins/chosen/chosen.jquery.min.js"></script>
	<!-- select2 -->
	<script src="<?php echo base_url(); ?>assets/admin/js/plugins/select2/select2.min.js"></script>
	<!-- icheck -->
	<script src="<?php echo base_url(); ?>assets/admin/js/plugins/icheck/jquery.icheck.min.js"></script>

	<!-- Theme framework -->
	<script src="<?php echo base_url(); ?>assets/admin/js/eakroko.min.js"></script>
	<!-- Theme scripts -->
	<script src="<?php echo base_url(); ?>assets/admin/js/application.min.js"></script>
	<!-- Just for demonstration -->
	<script src="<?php echo base_url(); ?>assets/admin/js/demonstration.min.js"></script>
</html>