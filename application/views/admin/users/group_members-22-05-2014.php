<style type="text/css">
.quick-actions .green, .quick-actions li:hover {
	background: #428BCA;
}
.quick-actions .green a,.quick-actions li a:hover {
	color:#fff;
}
div.alert{
	display: block;
}
</style>
<div id="content-header">
	<h1>Manage Group Members</h1>
</div>
<div id="breadcrumb">
	<a href="#" title="Go to Home" class="tip-bottom"><i class="glyphicon glyphicon-home"></i> Home</a>
	<a href="<?php echo site_url('admin/users/groups')?>" title="Go to User groups" class="tip-bottom">User Groups</a>
	<a href="#" class="current">Group Member</a>
</div>
<div class="container-fluid">
	
	<div class="row">
		<div class="col-12">
			<?php if($this->session->flashdata('success_msg')) { ?>
				<br><div class="alert alert-success">
				<?php echo $this->session->flashdata('success_msg');?>
				<a class="close" data-dismiss="alert" href="#">×</a>
				</div>
			<?php } ?>
			<?php if($this->session->flashdata('error_msg')) { ?>
				<br><div class="alert alert-danger">
				<?php echo $this->session->flashdata('error_msg');?>
				<a class="close" data-dismiss="alert" href="#">×</a>
				</div>
			<?php } ?>
			<div class="widget-box">
				<div class="widget-title">
					<span class="icon">
						<i class="glyphicon glyphicon-th"></i>
					</span>
					<h5>Group Member</h5>
				</div>
				<div class="widget-content nopadding">
					<table class="table table-bordered table-striped table-hover data-table">
						<thead>
							<tr>
								<th>Id</th>
								<th>Member Type</th>
								<th>Rotarian Name</th>
								<th>Badge Name</th>
								<th>Updated</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php for($i=0; $i<count($members); $i++) { ?>
							<tr>
								<td><?php echo $members[$i]['member_id']?></td>
								<td><?php echo $members[$i]['member_type']?></td>
								<td><?php echo $members[$i]['rotarian_name']?></td>
								<td><?php echo $members[$i]['badge_name']?></td>
								<td><?php echo date('d-m-Y, h:i a', strtotime($members[$i]['updated']))?></td>
								<td align="center">
									<a href="<?php echo site_url('admin/users/edit_member/'.$members[$i]['pk_grpuser_id']); ?>" class="btn btn-primary btn-mini">Edit</a>
									<a href="<?php echo site_url('admin/users/delete_member/'.$members[$i]['fk_user_id'].'/'.$members[$i]['pk_grpuser_id']); ?>" class="btn btn-danger btn-delete btn-mini">Delete</a>
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