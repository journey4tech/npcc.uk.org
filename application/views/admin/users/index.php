 
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Users Listing</h3>
				</div>
				
				<div class="box-body">
					
					<table class="table table-striped table-bordered table-hover " id="datatable" >
						<thead>
							<tr>
								
								<th>ID</th>
								<th>Name</th>
								<th>Email</th>
								<th>Created at</th>
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
								<td class="center "><?=$row['firstname']?> <?=$row['lastname']?></td>
								 
									<td><?php echo $row['email'] ?></td>
									<td><?php echo $row['created_date'] ?></td>
								 
								<td class="text-center">
									<?php
									if($row['status']=='1')
									{
									?>
									  <span class="btn btn-success btn-xs">Active</span> 
									<?php
									}
									else if($row['status']=='0')
									{
									?>
									  <span class="btn btn-danger btn-xs">Inactive</span> 
									<?php
									}
									?>
								</td>
								
								 
								<td class="center">

									<a class="btn btn-success btn-xs"  href="<?=site_url(ADMIN_PATH.'/users/show/'.$row['id']) ?>">
										<i class="fa fa-eye"></i> View
									</a>
									<!-- <a onclick="return confirm_delete();" class="btn btn-danger btn-xs" href="<?=site_url(ADMIN_PATH.'/users/delete/'.$row['id']) ?>">
										<i class="fa fa-trash"></i> Delete
									</a> -->
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

		 