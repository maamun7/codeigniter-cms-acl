<div class="row">
    <div class="twelve columns">
        <nav class="topbar">
            <div class="six columns">
                <ul class="sf-menu" id="tobar"  style="display:none">
                      <li class="current">
                        <a class="" href="#"> HOME </a>
                        <ul>
                          <li><a href="index-2.php">Home 1</a></li>
                          <li><a href="index-3.php">Home 2</a></li>
                          <li><a href="index-4.php">Home 3</a></li>
                          <li><a href="index-5.php">Home 4</a></li>
                          <li><a href="index-6.php">Home 5 </a></li>
                        </ul>
                      </li>
                      <li >
                        <a class="" href="#"> PAGE </a>
                        <ul>
                          <li><a href="archive.php">Blog 1</a></li>
                          <li><a href="archive_two.php">Blog 2</a></li>
                          <li><a href="archive_three.php">Blog 3</a></li>
                          <li><a href="single.php">Page / Single </a></li>
                          <li><a href="single-review.php">Page / Single Review</a></li>
                          <li><a href="single-soundcloud.php">Page Souncloud</a></li>
                          <li><a href="single-gallery.php">Page Gallery</a></li>
                          <li><a href="single-video.php">Page Video</a></li>
                          <li><a href="single.php">Typography</a></li>
                          <li><a href="single-left.php">Page Sidebar Left</a></li>
                          <li><a href="single-fullwidth.php">Page Full Width</a></li>
                          <li><a href="single-element.php">Element</a></li>
                        </ul>
                      </li>
                      <li >
                        <a class="" href="#"> ABOUT </a>
                      </li>
                      <li class="current">
                            <a href="#" class="">LEVEL</a>
                            <ul class="dropdown">
                              <li><a href="#">Level 2</a></li>
                              <li><a href="#">Level 2</a></li>
                              <li class="current"><a href="#">Level 2, Has Dropdown</a>
                                <ul>
                                  <li><a href="#">Level 3</a></li>
                                  <li><a href="#">Level 3</a></li>
                                  <li class="current"><a href="#">Level 4</a>
                                      <ul>
                                          <li><a href="#">Level 4</a></li>
                                          <li><a href="#">Level 4</a></li>
                                          <li class="divider"></li>
                                          <li><a href="#">Level 4</a></li>
                                        </ul>
                                   </li>
                                </ul>
                              </li>
                              <li><a href="#">Level 2</a></li>
                              <li><a href="#">Level 2</a></li>
                            </ul>
                          </li>
                </ul>
            </div>
			<div class="two columns">
				<?php
				if ($this->auth->is_logged()){ ?>
					{logged_info}
				<?php }else{ ?>
				<ul class="sf-menu" id="topsearch"> 
                    <li> <a href="<?php echo base_url()."users/signin"; ?>">Sign In</a></li> 
                    <li> <a href="<?php echo base_url()."users/"; ?>">Sign Up</a></li>
				</ul>
				<?php } ?>
            </div>
            <div class="three columns">
                <ul class="sf-menu" id="topsearch">
                    <li>
                        <div class='input-container'>
                            <input class="custom-text" type="text" name="search" placeholder="Search">
                            <div class="icon-ph"><i class="fa fa-search"></i></div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
	</div>