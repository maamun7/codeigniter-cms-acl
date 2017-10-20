<script src="<?php echo base_url(); ?>my-assets/admin/js/our_clients.js"></script>
<h2>Settings List</h3>
<div class="row-fluid">
	<div>
		<form class="well form-inline" method="post" action="<?php echo base_url(); ?>admin/our_clients/search_list">
		<!--	<label class="text"> Search Keyword </label> 
			<input type="text" name="key_word"> 
			<button type="submit" class="btn">Search</button> -->
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
			<th>Email</th>
			<th>Phone</th>
			<th>Mobile</th>
			<th><center>Status</center></th>
			<th><center>Action</center></th>
		</tr>
	</thead>
	<tbody>
	{data_lists}
		<tr>
			<td>{sl}</td>
			<td>{company_name}</td>
			<td><img src="<?=base_url()?>my-assets/front/images/common_img/{logo}" height="50" width="50" /></td>			
			<td>{email_address}</td>
			<td>{phone_no}</td>
			<td>{mobile_no}</td>
			<td><center><span name="{id}"><i class="{sts_class}"></i></span></center></td>
			<td>
				<center>
					<a href="<?php echo base_url().'admin/basic_settings/edit/{id}'; ?>"><i title="Edit" class="icon-edit"></i></a>
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
