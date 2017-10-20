<script src="<?php echo base_url(); ?>my-assets/admin/js/home_slider.js"></script>
<h2>Slider list</h3>
<div class="row-fluid">
	<div>
		<form class="well form-inline" method="post" action="<?php echo base_url(); ?>admin/home_slider/search_list">
			<label class="text"> Search Keyword </label> 
			<input type="text" name="key_word"> 
			<button type="submit" class="btn">Search</button>
		</form>
	</div>
</div>
<?php 
if(!empty($slider_list)){
?>
<table class="table table-striped table-condensed table-bordered table-colored-header">
	<thead>
		<tr>
			<th>#</th>
			<th>Slider Heading</th>
			<th>URL Path</th>
			<th><center>Published</center></th>
			<th><center>Sorting Index</center></th>
			<th><center>Action</center></th>
		</tr>
	</thead>
	<tbody>
	{slider_list}
		<tr>
			<td>{sl}</td>
			<td>{slider_heading}</td>
			<td>{url_path}</td>			
			<td><center><i class="{sts_class} HomeSliderChangeSts" name="{slider_id}"></i></span></center></td>
			<td><center>{slider_sorting}</center></td>
			<td>
				<center>
					<a href="<?php echo base_url().'admin/home_slider/edit/{slider_id}'; ?>"><i title="Edit" class="icon-edit"></i></a>&nbsp; | &nbsp;
					<span class="deleteHomeSlider" name="{slider_id}"><i class="icon-trash"></i></span>
				</center>
			</td>
		</tr>
	{/slider_list}
	</tbody>
</table>
<div id="pagin"><center><?php if(isset($links)){echo $links;} ?></center></div>
<?php 
}else{
	echo"<center>No Data Found </center>";
}
?>
<div class="test"></div>
