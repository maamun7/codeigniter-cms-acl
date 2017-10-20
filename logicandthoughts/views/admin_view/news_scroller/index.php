<script src="<?php echo base_url(); ?>my-assets/admin/js/articles.js"></script>
<div class="row-fluid">
	<div class="well">
		<h2>News Scroller list</h3>
	</div>
</div>
<?php 
if(!empty($article_list)){
?>
<table class="table table-striped table-condensed table-bordered table-colored-header">
	<thead>
		<tr>
			<th>#</th>
			<th>Article Name</th>
			<th>Status</th>
			<th>Category</th> 
			<th>Sub Category</th>
			<th>News Scroller View</th>
			<th><center>Action</center></th>
		</tr>
	</thead>
	<tbody>
	{article_list}
		<tr>
			<td>{sl}</td>
			<td>{article_name}</td>
			<td><center><span class="articleStsChange" name="{article_id}"><i class="{sts_class}"></i></span></center></td>
			<td>{categories_name}</td>
			<td>{sub_cat_name}</td>
			<td><center><span class="news_scroller_view" name="{article_id}"><i class="{sts_news_scroller}"></i></span></center></td>
			<td>
				<center>
					<a href="<?php echo base_url().'admin/articles/article_update_form/{article_id}'; ?>"><i title="Edit" class="icon-edit"></i></a>
				</center>
			</td>
		</tr>
	{/article_list}
	</tbody>
</table>
<div id="pagin"><center><?php if(isset($links)){echo $links;} ?></center></div>
<?php 
}else{
	echo"<center>No Data Found </center>";
}
?>
<div class="test"></div>
