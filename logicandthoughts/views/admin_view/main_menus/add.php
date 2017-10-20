<script src="<?php echo base_url(); ?>my-assets/admin/js/main_menus.js"></script>

<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h4 id="myModalLabel">Select a Menu Item Type:</h4>
	</div>
	<div class="modal-body">
		Loading...
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
	</div>
</div>

<div class="row-fluid">
	<div class="span12">
		<div class="box box-bordered box-color">
			<div class="box-title">
				<h3>New Menu</h3>
			</div>
			<form action="<?php echo base_url(); ?>admin/main_menus/insert" id="main_menu" method="POST" enctype="multipart/form-data" class='form-horizontal form-bordered'>
				<div style="float:left;width:100%">
					<div class="span6">
						<div class="control-group">
							<label for="menu_title" class="control-label">Menu Item Type</label>
							<div class="controls">
								<input type="text" name="menu_item_type" id="menu_item_type" readonly="readonly" placeholder="Menu Item Type" class="menu_item_type span9 input-xlarge">
								<span style="width:70px;height:55px;border:1px solid #ccc;padding:6px 10px;">
									<a data-toggle="modal" href="<?php echo base_url().'admin/main_menus/menu_selection_type' ?>" data-target="#myModal" title="View And Edit Options"  >Select</a>
								</span>
							</div>
						</div>	
						<div class="control-group">
							<label for="menu_title" class="control-label">Title</label>
							<div class="controls">
								<input type="text" name="menu_title" id="menu_title" placeholder="Menu Title" class="span9 input-xlarge required">
							</div>
						</div>	
						<div class="control-group">
							<label for="menu_alias" class="control-label">Alias</label>
							<div class="controls">
								<input type="text" name="menu_alias" id="menu_alias" placeholder="Menu Alias" class="span9 input-xlarge">
							</div>
						</div>	
						<div class="control-group">
							<label for="category_id" class="control-label">Select Parent Item</label>
							<div class="controls">
								<select name="parent_id" id="parent_id" class="span9">
									<option selected="selected" value="">..Select Parent Item..</option> 									
									<?php if($parent_menu !=''){ ?>
										{parent_menu}
											<option value="{id}">{parent_menu}</option>  
										{/parent_menu}
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="control-group">
							<label for="menu_links" class="control-label">Links <br><span style="font-size:10px;">Give External Link after "htpp://"</span></label>
							<div class="controls">
								<input type="text" name="menu_links" id="menu_links" placeholder="Menu Link" readonly="readonly" class="span9 input-xlarge required">
							</div>
						</div>	
						<div class="control-group">
							<label for="menu_type" class="control-label">Location</label>
							<div class="controls">
								<select name="menu_type" id="menu_type" class="span9">									
									<option value="mainmenu">Main Menu</option> 
									<option value="topmenu">Top Menu</option> 
									<option value="footermenu">Footer Menu</option> 								
								</select>
							</div>
						</div>
						<!--<div class="control-group">
							<label for="menu_icon" class="control-label">Menu Icon</label>
							<div class="controls">
								<select name="menu_icon" id="menu_icon" class="span9">									
									<option selected="selected" value="">--Select Icon--</option> 							
									<option value="icon-nav icon-home">Home Icon</option> 							
									<option value="icon-nav icon-about">About Icon</option> 							
									<option value="icon-nav icon-portfolio">Portfolio Icon</option> 							
									<option value="icon-nav icon-contact">Contact Icon</option> 							
									<option value="icon-nav icon-blog">Blog Icon</option> 							
								</select>
							</div>
						</div>	
						<div class="control-group">
							<label for="menu_bottom_txt" class="control-label">Bottom Text</label>
							<div class="controls">
								<input type="text" name="menu_bottom_txt" id="menu_bottom_txt" placeholder="Menu Bottom Text" class="span9 input-xlarge required">
							</div>
						</div>-->					
						<div class="control-group">
							<label class="control-label">Status</label>
							<div class="controls">
								<label class='radio'>
									<input type="radio" name="status" checked="checked" value="1"> Published
								</label>
								<label class='radio'>
									<input type="radio" name="status" value="0"> Unpublished
								</label>
							</div>
						</div>	
					</div>
					<div class="span6 JQClass">
						<div class="accordion" id="accordion2">
							<div class="accordion-group">
								<div class="accordion-heading">
									<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
										Article List
									</a>
								</div>
								<div id="collapseOne" class="accordion-body collapse single_article">
									<div class="accordion-inner">
										<label for="category_id" class="control-label">Select Articles</label>
										<div class="controls">
											<input type="text" name="single_article" id="single_article" readonly="readonly" class="single_article span7 input-xlarge">
											<span style="font-size:12px;">
												<a class="btn" data-toggle="modal" href="<?php echo base_url().'admin/main_menus/all_single_article' ?>" data-target="#myModal" title="View And Edit Options" >Select/Change</a>
											</span>
										</div>	
									</div>
								</div>
							</div>
							<div class="accordion-group">
								<div class="accordion-heading">
									<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
										Category List
									</a>
								</div>
								<div id="collapseTwo" class="accordion-body collapse all_article">
									<div class="accordion-inner">
										<label for="category_id" class="control-label">Select Category</label>
										<div class="controls">
											<input type="text" name="all_article" id="all_article" readonly="readonly" class="all_article span7 input-xlarge">
											<span style="font-size:12px;">
												<a class="btn" data-toggle="modal" href="<?php echo base_url().'admin/main_menus/all_category' ?>" data-target="#myModal" title="View And Edit Options" >Select/Change</a>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="accordion-group">
								<div class="accordion-heading">
									<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
										Metadata Option
									</a>
								</div>
								<div id="collapseThree" class="accordion-body collapse">
									<div class="accordion-inner">
										<div class="accordion-inner">
											<div class="control-group single_article">
												<label for="meta_description" class="control-label">Meta Description</label>
												<div class="controls">
													<textarea name="meta_description" id="meta_description" class="input-block-level"> </textarea>
												</div>
											</div>	
										</div>
										<div class="accordion-inner">
											<div class="control-group single_article">
												<label for="category_id" class="control-label">Meta Keyword</label>
												<div class="controls">
													<textarea name="meta_keyword" id="meta_keyword" class="input-block-level"> </textarea>
												</div>
											</div>	
										</div>
									</div>
								</div>
							</div>
						</div>
						<input type="hidden" name="content_id" id="content_id" class="content_id">
					</div>
				</div>
				<div class="form-actions">
					<button type="submit" class="btn btn-primary" name="add-category">Save</button>
					<a href="<?php echo base_url(); ?>admin/main_menus/" class="btn">Cancel</a>
				</div>
			</form>
		</div>
	</div>
</div>