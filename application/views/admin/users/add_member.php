<style type="text/css">
fieldset strong {
	display: inline-block;
	width: 160px;
}
fieldset label, .orange {
	color: #F38F1E;
}
fieldset label.error {
	display: inline;
	padding-left: 10px;
}
form#main-form input[type="text"],form#main-form textarea {
	width: 200px;
}
div.hide_div { display: none;}
div.alert { display: none; }
</style>
<div id="content-header">
	<h1>Add Member</h1>
</div>
<div id="breadcrumb">
	<a href="#" title="Go to Home" class="tip-bottom"><i class="glyphicon glyphicon-home"></i> Home</a>
	<a href="<?php echo site_url('admin/users/groups')?>" title="Go to User groups" class="tip-bottom">User Groups</a>
	<a href="#" class="current">Add Member</a>
</div>
<div class="container-fluid">
	
	<div class="row">
		<div class="col-12">

			<div class="widget-box">
				<div class="widget-title">
					<span class="icon">
						<i class="glyphicon glyphicon-th"></i>
					</span>
					<h5>Add Member</h5>
				</div>
				<div class="widget-content nopadding">
					<form class="form-horizontal" method="post" action="<?php echo current_url(); ?>" name="basic_validate" id="main-form">
						<div class="form-group">
							<label class="control-label">Member Id.</label>
							<div class="controls">
								<input type="text" name="member_id" value="<?php echo $member_id;?>" readonly>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">Member Type</label>
							<div class="controls">
								<select name="member_type" id="member_type" class="required">
								  <option value="">-Select-</option>
								  <?php
								  	$rot_single = $this->mdl_users->get_usercount_by_type($user['pk_user_id'], "Rotarian Single");
								   if($user['rot_single'] != 0 && ($rot_single < $user['rot_single'])) { ?>
								  	<option value="Rotarian Single">Rotarian Single</option>
								  <?php } ?>
								  <?php
								  	$rot_cupple = $this->mdl_users->get_usercount_by_type($user['pk_user_id'], "Rotarian Couple"); 
								  	if($user['rot_cupple'] != 0 && ($rot_cupple < $user['rot_cupple'])) { ?>
								  	<option value="Rotarian Couple">Rotarian Couple</option>
								  <?php } ?>
								  <?php
								  	$non_rot_single = $this->mdl_users->get_usercount_by_type($user['pk_user_id'], "Non Rotarian Single"); 
								  	if($user['non_rot_single'] != 0 && ($non_rot_single < $user['non_rot_single'])) { ?>
								  	<option value="Non Rotarian Single">Non Rotarian Single</option>
								  <?php } ?>
								  <?php
								  	$non_rot_cupple = $this->mdl_users->get_usercount_by_type($user['pk_user_id'], "Non Rotarian Couple"); 
								  	if($user['non_rot_cupple'] != 0 && ($non_rot_cupple < $user['non_rot_cupple'])) { ?>
								  	<option value="Non Rotarian Couple">Non Rotarian Couple</option>
								  <?php } ?>
								  <?php
								  	$patron_single = $this->mdl_users->get_usercount_by_type($user['pk_user_id'], "Patron Single"); 
								  	if($user['patron_single'] != 0 && ($patron_single < $user['patron_single'])) { ?>
								  	<option value="Patron Single">Patron Single</option>
								  <?php } ?>
								  <?php
								  	$patron_cupple = $this->mdl_users->get_usercount_by_type($user['pk_user_id'], "Patron Couple");
								  	if($user['patron_cupple'] != 0 && ($patron_cupple < $user['patron_cupple'])) { ?>
								  	<option value="Patron Couple">Patron Couple</option>
								  <?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group" id="rot_div">
							<label class="control-label">Select category</label>
							<div class="controls">
								<select name="rot_category" id="rot_category" class="required">
								  <option value="">-Select-</option>
								  <option value="district-3140">Rotarian from District 3140</option>
								  <option value="other-district">Rotarian from other District</option>
								  <option value="rotract">Rotract</option>
								  <option value="non-rotarian">Non Rotarian</option>
								</select>
							</div>
						</div>
	  					<div id="rotary_div" style="display:none;">
							<div class="form-group">
								<label class="control-label">Rotatry Club of</label>
								<div class="controls">
									<div id="rotary_club_of">
									<select name="rotary_club_of" id="rot_club_select" class="required">
									  <option value="">-Select-</option>
									  <?php foreach($rotary_clubs as $clubs) { ?>
										<option value="<?php echo $clubs['club_title'];?>"><?php echo $clubs['club_title'];?></option>
									  <?php } ?>
									</select>
									</div>
									<span style="display:none;width:auto;" id="rot_club_text"><input type="text" name="rotary_club_of_other" style="width:250px;" class="required"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label">District Designation</label>
								<div class="controls">
									<select name="district_designation" id="dist_desig_select">
									  <option value="">-Select-</option>
									  <?php foreach($district_designations as $row) { ?>
										<option value="<?php echo $row['pk_ddesignation_id'];?>"><?php echo $row['title'];?></option>
									  <?php } ?>
									  <option value="0">None</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label">Club Designation</label>
								<div class="controls">
									<select name="club_designation" id="club_desig_select" class="required">
									  <option value="">-Select-</option>
									  <?php foreach($club_designations as $row) { ?>
										<option value="<?php echo $row['pk_cdesignation_id'];?>"><?php echo $row['title'];?></option>
									  <?php } ?>
									</select>
								</div>
							</div>
	  					</div>
						<div class="form-group" id="club_name" style="display:none;">
							<label class="control-label">Club name</label>
							<div class="controls">
								<input type="text" name="nonrot_club">
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-3">
									<label class="control-label">First Name</label>
									<div class="controls">
										<input type="text" name="rotarian_name" class="required">
									</div>
								</div>
								<div class="col-3">
									<label class="control-label">Middle name</label>
									<div class="controls">
										<input type="text" name="rot_middle_name" id="rot_middle_name">
									</div>
								</div>
								<div class="col-3">
									<label class="control-label">Last name</label>
									<div class="controls">
										<input type="text" name="rot_last_name" class="required" id="rot_last_name">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-3">
									<label class="control-label">Badge Name</label>
									<div class="controls">
										<input type="text" name="badge_name" class="required alpha">
									</div>
								</div>
								<div class="col-3">
									<label class="control-label">Gender</label>
									<div class="controls">
										<select name="gender" id="rot_gender" class="required">
										  <option value="">-Select-</option>
										  <option value="male" data-reverse="female">Male</option>
										  <option value="female" data-reverse="male">Female</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-3">
									<label class="control-label">Meal preference</label>
									<div class="controls">
										<select name="meal_pref" class="required">
										  <option value="">-Select-</option>
										  <option value="Veg">Veg</option>
										  <option value="Non-Veg">Non-Veg</option>
										  <option value="Jain">Jain</option>
										</select>
									</div>
								</div>
							</div>
							<div id="spouse_div" style="display:none;">
								<div class="row">
									<div class="col-3">
										<label class="control-label">Name Of Spouse</label>
										<div class="controls">
											<input type="text" name="spouse_name" class="required">
										</div>
									</div>
									<div class="col-3">
										<label class="control-label">Middle name</label>
										<div class="controls">
											<input type="text" name="spouse_middle_name" id="spouse_middle_name">
										</div>
									</div>
									<div class="col-3">
										<label class="control-label">Last name</label>
										<div class="controls">
											<input type="text" name="spouse_last_name" id="spouse_last_name">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-3">
										<label class="control-label">Badge Name</label>
										<div class="controls">
											<input type="text" name="spouse_badge_name" class="alpha required" id="spouse_badge_name">
										</div>
									</div>
									<div class="col-3">
										<label class="control-label">Gender</label>
										<div class="controls">
											<select name="spouse_gendar" id="rot_spouse_gendar" class="required">
											  <option value="">-Select-</option>
											  <option value="male" data-reverse="female">Male</option>
											  <option value="female" data-reverse="male">Female</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-3">
										<label class="control-label">Meal preference</label>
										<div class="controls">
											<select name="spouse_meal_pref" id="spouse_meal_pref" class="required">
											  <option value="">-Select-</option>
											  <option value="Veg">Veg</option>
											  <option value="Non-Veg">Non-Veg</option>
											  <option value="Jain">Jain</option>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<!-- <label class="control-label">Address</label>
							<div class="controls">
								<textarea name="address" class="required"></textarea>
							</div> -->
							<label class="control-label">Address Line1</label>
							<div class="controls">
								<input type="text" name="addr_line1" class="required" style="width:320px;">
							</div>
							<label class="control-label">Address Line2</label>
							<div class="controls">
								<input type="text" name="addr_line2" class="" style="width:320px;">
							</div>
							<label class="control-label">Address Line3</label>
							<div class="controls">
								<input type="text" name="addr_line3" class="" style="width:320px;">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">Landmark</label>
							<div class="controls">
								<input type="text" class="required" name="landmark">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">State</label>
							<div class="controls">
								<input type="text" class="required" name="state" value="">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">City</label>
							<div class="controls">
								<input type="text" class="required" name="city">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">Pincode</label>
							<div class="controls">
								<input type="text" class="required number" name="pincode">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">Office Tel No.</label>
							<div class="controls">
								<input type="text" class="number" name="telephone">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">Mobile</label>
							<div class="controls">
								<input type="text" class="number" minlength="10" maxlength="10" name="mobile">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">E-mail</label>
							<div class="controls">
								<input type="text" class="required email" name="email">
							</div>
						</div>
						<div class="form-actions">
							<input type="submit" value="Submit" class="btn btn-primary">
						</div>
					</form>  
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url('resources/frontend');?>/js/main.js"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
	$("#main-form").validate();
});
</script>