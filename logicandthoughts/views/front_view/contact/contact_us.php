<div class="band content" >
    
    <div class="container">
        <script type="text/javascript">
            var base_url = "<?php echo base_url();?>";
            var myAddress = "<?php if(isset($contact_address)){print_r($contact_address);} ?>";
        </script>
        <div class="sixteen columns texts-wrap">
       		
            <!-- Goolge Map -->
            <div id="googlemap" class="gmap gmap_custom_1 full"></div>
            
            <!-- Google Map Scripts -->
            <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
            <script type="text/javascript">
                var latlng = new google.maps.LatLng(23.752927, 90.392831);
                var myOptions = {
                    zoom:17,
                    center: latlng,
                    scrollwheel: true,
                    scaleControl: true,
                    disableDefaultUI: false,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                var googlemap = new google.maps.Map(document.getElementById("googlemap"),
                myOptions);
                
                var geocoder_googlemap = new google.maps.Geocoder();
                var address = "Kawran Bazar";
                geocoder_googlemap.geocode( { 'address': address}, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        googlemap.setCenter(results[0].geometry.location);
                        
                        // Marker Image
                        var image = base_url+"assets/front/images/office.png";
                            var marker = new google.maps.Marker({
                                map: googlemap, 
                                icon: image,
                                position: googlemap.getCenter()
                            });
                                // Infobox Text
                                var contentString = myAddress;
                                var infowindow = new google.maps.InfoWindow({
                                    content: contentString
                                });
                                            
                                google.maps.event.addListener(marker, 'click', function() {
                                  infowindow.open(googlemap,marker);
                                });
                                
                    } else {
                    alert("Geocode was not successful for the following reason: " + status);
                }
                });
            </script>
            <!-- End Google Map Scripts -->
            
            <!-- Gap -->
            <div class="gap gap30 clearfix" ></div>

            <div class="two-thirds column alpha">
                
                <h3 class="title">Contact Form</h3>
                
                <div class="wpcf7">
                    <form action="#" method="post" class="wpcf7-form">
                    	
                        <p>Your Name (required)<br>
                            <span class="wpcf7-form-control-wrap your-name">
                            <input name="your-name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" type="text">
                            </span>
                        </p>
                    	
                        <p>Your Email (required)<br>
                            <span class="wpcf7-form-control-wrap your-email">
                            <input name="your-email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" type="email">
                            </span>
                        </p>
                    	
                        <p>Subject<br>
                            <span class="wpcf7-form-control-wrap your-subject">
                            <input name="your-subject" value="" size="40" class="wpcf7-form-control wpcf7-text" type="text">
                            </span>
                        </p>
                    	
                        <p>Your Message<br>
                            <span class="wpcf7-form-control-wrap your-message">
                            <textarea name="your-message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea"></textarea>
                            </span>
                        </p>
                    	
                        <p>
                        	<input value="Send" class="wpcf7-form-control wpcf7-submit" type="submit">
                        </p>
                    </form>
                </div>
                
            </div>
            <div class="one-third column omega">
                <h3 class="title"><span class="icon-globe sz-m"></span>Address:</h3>
                
                	<p><strong><?php if(isset($contact_address)){print_r(nl2br($contact_address));} ?></strong></p>
                
                    <span class="icon-phone-squared sz-xs" ></span><strong>Tel</strong>: <?php if(isset($phone_no)){print_r($phone_no);} ?>,<?php if(isset($mobile_no)){print_r($mobile_no);} ?><br/>
                    <span class="icon-print sz-xs" ></span><strong>Fax:</strong>  <?php if(isset($phone_no)){print_r($phone_no);} ?><br/>
                    <span class="icon-mail sz-xs" ></span><strong>Email:</strong> <?php if(isset($email_address)){print_r($email_address);} ?> <br/>
                    
                <!-- Gap -->
            	<div class="gap gap30 clearfix" ></div>
            
            
                <h3 class="title"><span class="icon-clock-5 sz-m" ></span>Business Hours</h3>
                    
                    <span class="icon-clock-1 sz-xs" ></span><strong>Saturday</strong> to<strong> Thurseday</strong>: 9.30 AM&nbsp; – 6.00 PM<div class="clearfix"></div>
                    <span class="icon-clock-1 sz-xs" ></span><strong></strong><strong>Friday</strong>: Closed<div class="clearfix"></div>

               <!-- Gap -->
            	<div class="gap gap30 clearfix" ></div>
                
                <h3 class="title">We are Social</h3>
                
                    <div class="social-icon"><a data-original-title="Facebook" href="http://facebook.com" target="_blank"><span class="ibox icon-facebook"></span></a></div>
                    <div class="social-icon"><a data-original-title="Twitter" href="http://twitter.com" target="_blank"><span class="ibox icon-twitter"></span></a></div>
                    <div class="social-icon"><a data-original-title="Vimeo" href="http://vimeo.com" target="_blank"><span class="ibox icon-vimeo"></span></a></div>
                    <div class="social-icon"><a data-original-title="Flickr" href="#" target="_blank"><span class="ibox icon-flickr"></span></a></div>
                    <div class="social-icon"><a data-original-title="Pinterest" href="#" target="_blank"><span class="ibox icon-pinterest"></span></a></div>
                    <div class="social-icon"><a data-original-title="Linkedin-circled" href="#" target="_blank"><span class="ibox icon-linkedin-circled"></span></a></div>
                
            </div>
            <!-- CLEAR -->
            <div class="clear"></div> 
            <!-- HR Line (Shadow Style) -->
            <div class="hr hr_shadow hr20 clearfix"></div>
          </div>	
    </div><!-- container -->
 </div>