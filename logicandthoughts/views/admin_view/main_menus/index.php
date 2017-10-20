<script src="<?php echo base_url(); ?>my-assets/admin/js/main_menus.js"></script>
<h2>Menu Manager : Menus Items</h3>
<div class="row-fluid">
	<div>
		<form class="well form-inline" action="<?php echo base_url(); ?>admin/main_menus/search_list" method="post">
			<label class="text"> Search Keyword </label> 
			<input type="text" name="key_word"> 
			<button type="submit" class="btn">Search</button>
		</form>
	</div>
</div>
<script language="javascript">
// Menu Re-ordering
	$(document).ready(function(){
		$("#menu-pages").sortable({
			update: function(event, ui) {
				$.post("<?php echo base_url(); ?>admin/main_menus/update_ordering",{ type: "orderPages", pages:$('#menu-pages').sortable('serialize') } );		
				//location.reload();
			}
		});
	});
</script>

<?php 
if(!empty($menu_lists)){
?>
<table class="table table-striped table-condensed table-bordered table-colored-header" id="linksSortable ">
	<thead>
		<tr>
			<th>#</th>
			<th>Title</th>
			<th><center>Status</center></th>
			<th>Menu Type</th>
			<th>URL</th>
			<th><center>Action</center></th>
		</tr>
	</thead>
	<tbody id="menu-pages">
	<?php foreach($menu_lists as $menu_list): ?>
		<tr class="page" id="page_<?php echo $menu_list['id']; ?>">
			<td><?php echo $menu_list['sl']; ?></td>			
			<td><?php echo str_repeat('|-- ',$menu_list['level']).$menu_list['name']; ?></td>			
			<td><center><i class="<?php echo $menu_list['sts_class']; ?> mainMenuStatusChange" name="<?php echo $menu_list['id']; ?>"></i></span></center></td>
			<td><?php echo $menu_list['menutype']; ?></td>
			<td><?php echo $menu_list['link']; ?></td>
			<td>
				<center>
					<a href="<?php echo base_url().'admin/main_menus/edit/'.$menu_list['id']; ?>"><i title="Edit" class="icon-edit"></i></a>&nbsp; | &nbsp;
					<span class="deleteMainMenu" name="<?php echo $menu_list['id']; ?>"><i class="icon-trash"></i></span>
				</center>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	<tfoot>
	</tfoot>
</table>
<div id="pagin"><center><?php if(isset($links)){echo $links;} ?></center></div>
<?php	
}else{
	echo "No data found";
}
?>

