<style type="text/css">
.quick-actions .green, .quick-actions li:hover {
	background: #428BCA;
}
.quick-actions .green a,.quick-actions li a:hover {
	color:#fff;
}
.pending {
	color:#428BCA;
}
.received {
	color:green;
}
.expired {
	color:#D9534F;
}
</style>
<div id="content-header">
	<h1>Manage Users</h1>
</div>
<div id="breadcrumb">
	<a href="#" title="Go to Home" class="tip-bottom"><i class="glyphicon glyphicon-home"></i> Home</a>
	<a href="#" class="current">Users</a>
</div>
<div class="container-fluid">
	
	<div class="row">
		<div class="col-12" style="text-align: left;margin-bottom:-15px;">
			<ul class="quick-actions">
				<li <?php if($utype == 'individual') echo "class='green'";?>>
					<a href="<?=site_url('admin/users')?>">Individuals</a>
				</li>
				<li <?php if($utype == 'group') echo "class='green'";?>>
					<a href="<?=site_url('admin/users/groups')?>">Groups</a>
				</li>
			</ul>
		</div>
		<div class="col-12">

			<div class="widget-box">
				<div class="widget-title">
					<span class="icon">
						<i class="glyphicon glyphicon-th"></i>
					</span>
					<h5>Groups</h5>
				</div>
				<div class="widget-content nopadding">
					<table class="table table-bordered table-striped table-hover data-table">
						<thead>
							<tr>
								<th>Booking Id</th>
								<th>Id</th>
								<th>Category</th>
								<th>Rotarian Name</th>
								<th>Badge Name</th>
								<th>Total Price</th>
								<th>Updated</th>
								<th>Payment</th>
								<th>Members</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php for($i=0; $i<count($users); $i++) {
								if($users[$i]['mode_of_payment'] == "cash") {
									$cash_date = new DateTime($users[$i]['cash_date']);
									$today = new DateTime(date('Y-m-d',time()));
									$date_diff = $cash_date->diff($today);
									if($date_diff->days > 7) {
										$updateData = array("payment_status" => "expired");
										$this->mdl_users->update_user($users[$i]['pk_user_id'], $updateData);
									}
								}
								if($users[$i]['mode_of_payment'] == "cheque") {
									$cash_date = new DateTime($users[$i]['dated']);
									$today = new DateTime(date('Y-m-d',time()));
									$date_diff = $cash_date->diff($today);
									if($date_diff->days > 7) {
										$updateData = array("payment_status" => "expired");
										$this->mdl_users->update_user($users[$i]['pk_user_id'], $updateData);
									}
								}
							?>
							<tr>
								<td><?php echo $users[$i]['booking_id']?></td>
								<td><?php echo $users[$i]['registration_id']?></td>
								<td><?php echo $users[$i]['rot_category']?></td>
								<td><?php echo $users[$i]['rotarian_name']?></td>
								<td><?php echo $users[$i]['badge_name']?></td>
								<td><?php echo $users[$i]['total_price']?></td>
								<td><?php echo date('d-m-Y, h:i a', strtotime($users[$i]['updated']))?></td>
								<td class="<?php echo $users[$i]['payment_status']?>"><?php echo ucwords($users[$i]['payment_status']);?></td>
								<?php 
								if($users[$i]['rot_single'] == 0 && $users[$i]['rot_cupple'] == 0 && $users[$i]['non_rot_single'] == 0 && $users[$i]['non_rot_cupple'] == 0 && $users[$i]['patron_single'] == 0 && $users[$i]['patron_cupple'] == 0) {
									echo '<td align="center">No members added</td>';
								?>
								<?php } else { ?>
								<td align="center">
									<?php
										$group_count = $this->mdl_users->get_members($users[$i]['pk_user_id']);
										$mem_count = $users[$i]['rot_single'] + $users[$i]['rot_cupple'] + $users[$i]['non_rot_single'] + $users[$i]['non_rot_cupple'] + $users[$i]['patron_single'] + $users[$i]['patron_cupple'];
										//echo count($group_count)." --- ".$mem_count;
										if($mem_count != count($group_count)) {
									?>
									<a href="<?php echo site_url('admin/users/add_member/'.$users[$i]['pk_user_id']); ?>" class="btn btn-primary btn-mini">Add</a>
									<?php }?>
									<a href="<?php echo site_url('admin/users/group_members/'.$users[$i]['pk_user_id']); ?>" class="btn btn-primary btn-mini">Manage</a>
								</td>
								<?php } ?>
								<td align="center">
									<a href="<?php echo site_url('admin/users/edit_group/'.$users[$i]['pk_user_id']); ?>" class="btn btn-primary btn-mini">Edit</a>
									<a href="<?php echo site_url('admin/users/delete/'.$users[$i]['pk_user_id'].'/group'); ?>" class="btn btn-danger btn-delete btn-mini">Delete</a>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>  
				</div>
			</div>
		</div>
	</div>
</div>