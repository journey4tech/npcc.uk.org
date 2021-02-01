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
			<a href="<?=site_url(ADMIN_PATH.'/team/create')?>">
				<button type="submit" class="btn btn-primary">Add Team</button>
			</a>
		</div>
	</div>
	</br>
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Team Listing</h3>
				</div>
				
				<div class="box-body">
					
					<table class="table table-striped table-bordered table-hover " id="" >
						<thead>
							<tr>
								
								 <th>ID</th>
								 <!-- <th>Image</th> -->
								<th>Title</th>
								<th>Year</th>
								<th>Designation</th>
								<th>Show In Home</th>
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
								 <!-- <td><img src="<?=base_url()?>/user_upload/teams/<?=$row['image']?>"
								alt="" title="" width="90px" height="100px" /></td> -->
								<td class="center "><?=$row['name']?></td>
								<td><?php echo  $this->Team_model->team_year_name_by_id($row['team_year_id']);?></td>
								 
									<td><?php echo $row['designation'] ?></td>
								 
								 
								
								<td class="text-center">
									<?php
									if($row['show_home']=='1')
									{
									?>
									<a href="<?=site_url(ADMIN_PATH.'/team/change_show_home/1/'.$row['id'])?>"> <span class="btn btn-success btn-xs">Yes</span></a>
									<?php
									}
									else if($row['show_home']=='0')
									{
									?>
									<a href="<?=site_url(ADMIN_PATH.'/team/change_show_home/0/'.$row['id'])?>"> <span class="btn btn-danger btn-xs">No</span></a>
									<?php
									}
									?>
								</td>

								<td class="text-center">
									<?php
									if($row['status']=='1')
									{
									?>
									<a href="<?=site_url(ADMIN_PATH.'/team/change_status/1/'.$row['id'])?>"> <span class="btn btn-success btn-xs">Active</span></a>
									<?php
									}
									else if($row['status']=='0')
									{
									?>
									<a href="<?=site_url(ADMIN_PATH.'/team/change_status/0/'.$row['id'])?>"> <span class="btn btn-danger btn-xs">Inactive</span></a>
									<?php
									}
									?>
								</td>
								<td class="center">
									<a class="btn btn-info btn-xs"  href="<?=site_url(ADMIN_PATH.'/team/edit/'.$row['id']) ?>">
										<i class="fa fa-pencil"></i> Edit
									</a>
									<a onclick="return confirm_delete();" class="btn btn-danger btn-xs" href="<?=site_url(ADMIN_PATH.'/team/delete/'.$row['id']) ?>">
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

		 