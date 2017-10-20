<head>
	<!-- Basic Page Needs
    ================================================== -->
	<meta charset="utf-8">
	<title><?php echo (isset($title)) ? $title :"Welcome to Logic and Thoughts" ?></title>
    <meta name="description" content="Interio Responsive and Retina HTML Template" /> 
    <meta name="keywords" content="responsive,retina,clean,minimal,html,template,theme" /> 
	<meta name="robots" content="index, follow" />
    <!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
    
	<!-- Mobile Specific Metas
    ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<!-- Favicons
	================================================== -->
	<link href="images/favicon.ico" rel="shortcut icon" /> 

	<!-- Apple Touch Icons
	================================================== 
	<link rel="apple-touch-icon" href="" /> 
	<link rel="apple-touch-icon" sizes="114x114" href="" /> 
	<link rel="apple-touch-icon" sizes="72x72" href="" /> 
	<link rel="apple-touch-icon" sizes="144x144" href="" />
    ================================================== -->

	<!-- stylesheets------------------------------------
	================================================== -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/skeleton.css" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/base.css" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/layout.css?v1.1" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/prettyPhoto.css?ver=1.0" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/shortcodes.css?ver=1.1" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/fontello.css?ver=1.0" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/responsive.css?ver=1.0" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/retina.css?ver=1.0" type="text/css"  />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/custom-style.css?ver=1.0" type="text/css" media="all" />
	<!---================== Customized CSS	=============-->
	<link href="<?php echo base_url(); ?>my-assets/front/css/customize.css" rel="stylesheet">
    
    <!-- Google Font Styleshhet (Codystar font face)-->
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Codystar">

    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/admin/img/favicon.ico" />
	
	 <!-- Scripts
	================================================== -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/jquery.1.8.3.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/jquery.easing.js?1.3"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/portfolio.js?ver=1.0"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/retina.js?ver=1.0"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/fitvids.js?ver=1.0"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/jquery.tweet.js?ver=1.0"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/jquery.carouFredSel-6.1.0-packed.js?ver=6.1.0"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/jquery.BlackAndWhite.min.js?ver=0.2.4"></script>
    <script type="text/javascript" src='<?php echo base_url(); ?>assets/front/js/plugins.js?ver=1.0'></script>
    <script type="text/javascript" src='<?php echo base_url(); ?>assets/front/js/tooltips.js?ver=1.0'></script>
    <script type="text/javascript" src='<?php echo base_url(); ?>assets/front/js/shortcodes.js?ver=1.0'></script>
    <script type="text/javascript" src='<?php echo base_url(); ?>assets/front/js/jquery.prettyPhoto.js?ver=3.1.5'></script>
    <script type="text/javascript" src='<?php echo base_url(); ?>assets/front/js/custom.js?ver=1.1'></script>
	<script type="text/javascript" src='<?php echo base_url(); ?>assets/front/js/jquery.flexslider-min.js?ver=1'></script>

	<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
	<![endif]-->

    <!-- FlexSlider -->
    <script type="text/javascript" src='js/jquery.flexslider-min.js?ver=1'></script>
    <script type="text/javascript">
		jQuery(document).ready(function($) {
			$('.flexslider').flexslider({
				animation: "slide",
				slideshowSpeed: 5000,
				animationSpeed: 900,
				prevText: "",
				nextText: ""
			});
		});
	</script>
    <!-- End FlexSlider -->  
  
    <!-- Portfolio carousel -->
    <script type="text/javascript">
	
		jQuery(document).ready(function($) {

			$('#portfolio_carousel').carouFredSel({
				prev: '#prv_portfolio_carousel',
				next: '#nxt_portfolio_carousel',
				responsive: true,
				direction:'left',
				width: '100%',
				scroll:{
					'items':1,
					'easing': 'swing',
					'duration': 1000,
					'pauseOnHover':true
					},
				auto:{
					'timeoutDuration':5000},
				swipe: {
					onMouse: true,
					onTouch: true
						},
				items: {
					visible: {
						min: 1,
						max: 4
					}
				}
			});

		});	
	</script>
    <!-- End Portfolio Carousel -->

    <!-- Client Carousel -->
    <script type="text/javascript">
	
		jQuery(document).ready(function($) {
			
			try {
				$('#clients_carousel').carouFredSel({
					prev: '#prv_clients_carousel',
					next: '#nxt_clients_carousel',
					responsive: true,
					direction:'right',
					width: '100%',
					scroll:{
						'items':1,
						'easing': 'swing',
						'duration': 600,
						'pauseOnHover':true
						},
					auto:{
						'timeoutDuration':4000},
					swipe: {
						onMouse: true,
						onTouch: true
							},
					items: {
						visible: {
							min: 1,
							max: 6
						}
					}
				});
			} catch(e){}

		});	
	</script>
    <!-- End Client Carousel -->

    <!-- Twitter Feeds Ticker (API v1.1) -->
    <script type="text/javascript">
    
		function _twitter(){
			jQuery(".tweet").tweet({
			  modpath: 'twitter/',
			  username: 'tohidgolkar',
			  page: 1,
			  count: 10,
			  loading_text: "loading ..."
			}).bind("loaded", function() {
			  var ul = jQuery(this).find(".tweet_list");
			  var ticker = function() {
				setTimeout(function() {
				  var top = ul.position().top;
				  var h = ul.height();
				  var incr = (h / ul.children().length);
				  var newTop = top - incr;
				  if (h + newTop <= 0) newTop = 0;
				  ul.animate( {top: newTop}, 500 );
				  ticker();
				}, 5000);
			  };
			  ticker();
			});
		}

	jQuery(document).ready(function($) {
        
        // hook twitter function
       _twitter();
       
    });
	
    jQuery(window).resize(function() {
        
        // reload the twitter for responsive design
       _twitter();
       
    });
    </script>
    <!-- End Twitter Feeds Ticker (API v1.1) -->
</head>