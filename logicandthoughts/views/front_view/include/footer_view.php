<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
 <!-- TWITTER -->   
<div class="band twitter" >
	<div class="container">
		<div class="sixteen columns" >
		
			<div class="twitter_icon">
				 <span class="icon-twitter sz-l"></span>
			</div>
			<div class="tweet"></div>
			
		</div>
	</div><!-- container -->
</div><!-- end band-->    
<!-- End TWITTER -->

<!-- FOOTER -->
<footer class="band footer" >
	<div class="container">
		<div class="widget widget_text four columns">
			<div class="textwidget">
				<h5 class="logo" >
					Logic and Thoughts
				</h5>
				<p>
					Interio is a responsive multipurpose HTML Template.<br/>
				   Corporate and clean design in unlimited colors and possibility.<br/>
				   Buy this <strong><a href="#">HTML Template</a></strong>
				</p>
			</div>
		</div>
		<div class="widget widget_text four columns" style="visibility:hidden;">
			<h4 class="title">Links</h4>
			<div class="textwidget">
				<ul class="links">
					<li><a href="#">About Us</a></li>
					<li><a href="#">Privacy policy</a></li>
					<li><a href="#">Terms of Use</a></li>
					<li><a href="#">Sitemap</a></li>
					<li><a href="#">Forum</a></li>
					<li><a href="#">Contact Us</a></li>
				</ul>
			</div>
		</div>
		<div class="widget widget_interio_portfolio four columns" style="visibility:hidden">
			<h4 class="title">Latest Project</h4>
			<div class="recent recent-portfolio">
				<ul>
					<li>
						<div class="post-thumbnail">
							<a class="mini-thumb portfolio-pic" href="portfolio-single.html" title="Screenr Video" >
								<img src="photos/1-150x100.jpg" alt="" />                                
								<div class="recent-cap">Screenr Video</div>
							</a>
						</div>
					</li>
					<li>
						<div class="post-thumbnail">
							<a class="mini-thumb portfolio-pic" href="portfolio-single.html" title="Modeling" >
								<img src="photos/2-150x100.jpg" alt="" />                                
								<div class="recent-cap">Modeling</div>
							</a>
						</div>
					</li>
					<li>
						<div class="post-thumbnail">
							<a class="mini-thumb portfolio-pic" href="portfolio-single.html" title="Golgraphic.com">
								<img src="photos/3-150x100.jpg" alt="" />                                
								<div class="recent-cap">Golgraphic.com</div>
							</a>
						</div>
					</li>
					<li>
						<div class="post-thumbnail">
							<a class="mini-thumb portfolio-pic" href="portfolio-single.html" title="Lorem Eagle" >
								<img src="photos/4-150x100.jpg" alt="" />                                
								<div class="recent-cap">Lorem Eagle</div>
							</a>
						</div>
					</li>
				 </ul>
			</div>
		</div>
		<div class="widget widget_interio_contact four columns">
			<h4 class="title">Contact</h4>
			<div class="address">
				<p><?php if(isset($contact_address)){print_r(nl2br($contact_address));} ?></p>
				<div> <span class="icon-phone-squared sz-xs" ></span><?php if(isset($phone_no)){print_r($phone_no);} ?>,<?php if(isset($mobile_no)){print_r($mobile_no);} ?></div>
				<div><a href="mailto:" target="_blank"><span class="icon-mail sz-xs" ></span><?php if(isset($email_address)){print_r($email_address);} ?></a> </div>
				<!--<div><a href="http://maps.google.com" target="_blank"><span class="icon-location-1 sz-xs" ></span>See Map</a> </div>-->
			</div>
		</div>	
	</div><!-- container -->
</footer><!-- end footer-->    
<footer class="band bottom">
<div class="container">
	<div class="sixteen columns">
		<div class="seven columns alpha">
			<div class="copyright">
				Copyright &copy; 2014. Developed by <a href="http://logic-thought.com" target="_blank" >Logic & Thoughts</a>
			</div>
		</div>
		<div class="two columns">
			<div class="gototop"><a href="#top" class="tooltips top" title="Go to Top">&#xe851;</a></div>
		</div>
		<div class="seven columns omega">
			<div class="social">
				<ul class="social_icons">
					<li class="icon email"><a class="tooltips top" href="mailto:" target="_blank" title="Email"> </a></li>	
					<li class="icon twitter"><a class="tooltips top" href="#"  target="_blank"  title="Twitter"> </a></li>	
					<li class="icon facebook"><a class="tooltips top" href="#"  target="_blank"  title="Facebook"> </a></li>	
					<li class="icon ihavegot"><a class="tooltips top" href="#"  target="_blank"  title="ihavegot"> </a></li>	
					<li class="icon vimeo"><a class="tooltips top" href="#"  target="_blank"  title="Vimeo"> </a></li>	
					<li class="icon pinterest"><a class="tooltips top" href="#"  target="_blank"  title="Pinterest"> </a></li>	
					<li class="icon flickr"><a class="tooltips top" href="#"  target="_blank"  title="Flickr"> </a></li>	
					<li class="icon google"><a class="tooltips top" href="#"  target="_blank"  title="Google"> </a></li>	
					<li class="icon youtube"><a class="tooltips top" href="#"  target="_blank"  title="Youtube"> </a></li>
					<li class="icon dribbble"><a class="tooltips top" href="#"  target="_blank"  title="Dribbble"> </a></li>
					<li class="icon linkedin"><a class="tooltips top" href="#"  target="_blank"  title="Linkedin"> </a></li>
					<li class="icon rss"><a class="tooltips top" href="#"  target="_blank"  title="RSS"> </a></li>
					<li class="icon sitemap"><a class="tooltips top" href="#"  target="_blank"  title="Sitemap"> </a></li>   
				</ul>
			</div>
		</div>
	</div>
</div><!-- container -->
</footer><!-- end footer-->   
