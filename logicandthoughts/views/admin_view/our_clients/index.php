<script src="<?php echo base_url(); ?>my-assets/admin/js/our_clients.js"></script>
<h2>Our Client Lists</h3>
<div class="row-fluid">
	<div>
		<form class="well form-inline" method="post" action="<?php echo base_url(); ?>admin/our_clients/search_list">
			<label class="text"> Search Keyword </label> 
			<input type="text" name="key_word"> 
			<button type="submit" class="btn">Search</button>
		</form>
	</div>
</div>
<?php 
if(!empty($data_lists)){
?>
<table class="table table-striped table-condensed table-bordered table-colored-header">
	<thead>
		<tr>
			<th>#</th>
			<th>Company Name</th>
			<th>Company Logo</th>
			<th>Web Links</th>
			<th>Status</th>
			<th><center>Action</center></th>
		</tr>
	</thead>
	<tbody>
	{data_lists}
		<tr>
			<td>{sl}</td>
			<td>{company_name}</td>
			<td><img src="<?=base_url()?>uploads/our_client/thumb_img/{company_logo}" height="50" width="50" /></td>			
			<td>{web_link}</td>
			<td><center><span class="ourClientChangeSts" name="{id}"><i class="{sts_class}"></i></span></center></td>
			<td>
				<center>
					<a href="<?php echo base_url().'admin/our_clients/edit/{id}'; ?>"><i title="Edit" class="icon-edit"></i></a>&nbsp; | &nbsp;
					<span class="deleteOurClient" name="{id}"><i class="icon-trash"></i></span>
				</center>
			</td>
		</tr>
	{/data_lists}
	</tbody>
</table>
<div id="pagin"><center><?php if(isset($links)){echo $links;} ?></center></div>
<?php 
}else{
	echo"<center>No Data Found </center>";
}
?>
<div class="test"></div>
