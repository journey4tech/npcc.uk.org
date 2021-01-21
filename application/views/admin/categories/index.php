<script>
function confirm_delete(){
var deletedata=confirm("Are you sure you want to delete ?");
if(deletedata==true){
return true;
}else{
return false;
}
}
</script>
<section class="content">
	<div class="row">
		<div class="col-md-3">
			<a href="<?=site_url(ADMIN_PATH.'/category/create')?>">
				<button type="submit" class="btn btn-primary">Add Category</button>
			</a>
		</div>
	</div>
	</br>
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Categories Listing</h3>
				</div>
				 
				<div class="box-body">
					 <?php $this->load->view('admin/include/_messages'); ?>
					<table class="table table-striped table-bordered table-hover " id="" >
						<thead>
							<tr>
								
								 <th>ID</th>
								<th>Title</th>
								<th>Menu Order</th>
								<th>Show in Menu</th>
								<th>Status</th>
								<th>Options</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i=1;
							foreach($records as $row){
							//print_r($row);
							?>
							<tr>
								
								 <td><?php echo $i; ?></td>
								<td class="center "><?=$row['name']?></td>
								 
									<td><?php echo $row['rank'] ?></td>
								 
								<td class="text-center">
									<?php
									if($row['show_home']=='1')
									{
									?>
									<a href="<?=site_url(ADMIN_PATH.'/category/change_show_menu/1/'.$row['id'])?>"> <span class="btn btn-success btn-xs">Show in Menu</span></a>
									<?php
									}
									else if($row['show_home']=='0')
									{
									?>
									<a href="<?=site_url(ADMIN_PATH.'/category/change_show_menu/0/'.$row['id'])?>"> <span class="btn btn-danger btn-xs">Not Showing</span></a>
									<?php
									}
									?>
								</td>
								
								<td class="text-center">
									<?php
									if($row['status']=='1')
									{
									?>
									<a href="<?=site_url(ADMIN_PATH.'/category/change_status/1/'.$row['id'])?>"> <span class="btn btn-success btn-xs">Active</span></a>
									<?php
									}
									else if($row['status']=='0')
									{
									?>
									<a href="<?=site_url(ADMIN_PATH.'/category/change_status/0/'.$row['id'])?>"> <span class="btn btn-danger btn-xs">Inactive</span></a>
									<?php
									}
									?>
								</td>
								<td class="center">
									<a class="btn btn-info btn-xs"  href="<?=site_url(ADMIN_PATH.'/category/edit/'.$row['id']) ?>">
										<i class="fa fa-pencil"></i> Ediit
									</a>
									<a onclick="return confirm_delete();" class="btn btn-danger btn-xs" href="<?=site_url(ADMIN_PATH.'/category/delete/'.$row['id']) ?>">
										<i class="fa fa-trash"></i> Delete
									</a>
								</td>
							</tr>
							<?php
							$i++;
							 } ?>
							
							
						</tbody>
					</table>
				</div>
				</div><!--/span-->
				
				</div><!--/row-->
			</div>

		 

		 <!-- google map -->
		 