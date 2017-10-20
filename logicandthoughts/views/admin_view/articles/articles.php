<script src="<?php echo base_url(); ?>my-assets/admin/js/articles.js"></script>
<h2>Article list</h3>
<div class="row-fluid">
	<div>
		<form class="well form-inline" method="post" action="<?php echo base_url(); ?>admin/articles/search_list">
			<label class="text"> Search Keyword </label> 
			<input type="text" name="key_word"> 
			<button type="submit" class="btn">Search</button>
		</form>
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
			<th>Is Latest </th>
			<!--<th>Bottom Slider</th>-->
			<th>View In Home</th>
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
			<td><center><span class="is_latest_news" name="{article_id}"><i class="{is_latest_news}"></i></span></center></td>
			<!--<td><center><span class="news_scroller_view" name="{article_id}"><i class="{sts_news_scroller}"></i></span></center></td>-->
			<td><center><span class="home_page_view" name="{article_id}"><i class="{is_home_view}"></i></span></center></td>
			<td>
				<center>
					<a href="<?php echo base_url().'admin/articles/article_update_form/{article_id}'; ?>"><i title="Edit" class="icon-edit"></i></a>&nbsp; | &nbsp;
					<span class="deleteArticles" name="{article_id}"><i class="icon-trash"></i></span>
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
