<script src="<?php echo base_url(); ?>my-assets/admin/js/category.js"></script>
<h2>Category list</h3>
<div class="row-fluid">
	<div>
		<form class="well form-inline" method="post" action="<?php echo base_url(); ?>admin/categories/category_search_list">
			<label class="text"> Search Keyword </label> 
			<input type="text" name="key_word"> 
			<button type="submit" class="btn">Search</button>
		</form>
	</div>
</div>
<?php 
if(!empty($category_list)){
?>
<table class="table table-striped table-condensed table-bordered table-colored-header">
	<thead>
		<tr>
			<th>#</th>
			<th>Category Name</th>
			<th>Created Date</th>
			<th>Last Modyfied Date</th>
			<th><center>Action</center></th>
		</tr>
	</thead>
	<tbody>
	{category_list}
		<tr>
			<td>{sl}</td>
			<td>{categories_name}</td>
			<td>{created_date}</td>
			<td>{modyfied_date}</td>
			<td>
				<center>
					<a href="<?php echo base_url().'admin/categories/category_update_form/{categories_id}'; ?>"><i title="Edit" class="icon-edit"></i></a>&nbsp; | &nbsp;
					<span class="deleteCategory" name="{categories_id}"><i class="icon-trash"></i></span>&nbsp; | &nbsp;
					<span><i class="{sts_class} categoryStatusChange" name="{categories_id}"></i></span>
				</center>
			</td>
		</tr>
	{/category_list}
	</tbody>
</table>
<div id="pagin"><center><?php if(isset($links)){echo $links;} ?></center></div>
<?php 
}else{
	echo"<center>No Data Found </center>";
}
?>
<div class="test"></div>
