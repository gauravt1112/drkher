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
	<h1>Edit Member</h1>
</div>
<div id="breadcrumb">
	<a href="#" title="Go to Home" class="tip-bottom"><i class="glyphicon glyphicon-home"></i> Home</a>
	<a href="<?php echo site_url('admin/users/groups')?>" title="Go to User groups" class="tip-bottom">User Groups</a>
	<a href="#" class="current">Edit Member</a>
</div>
<div class="container-fluid">
	
	<div class="row">
		<div class="col-12">

			<div class="widget-box">
				<div class="widget-title">
					<span class="icon">
						<i class="glyphicon glyphicon-th"></i>
					</span>
					<h5>Edit Member</h5>
				</div>
				<div class="widget-content nopadding">
					<form class="form-horizontal" method="post" action="<?php echo current_url(); ?>" name="basic_validate" id="main-form">
						<div class="form-group">
							<label class="control-label">Member Id.</label>
							<div class="controls">
								<input type="text" name="member_id" value="<?php echo $member['member_id'];?>" readonly>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">Member Type</label>
							<div class="controls">
								<label><?php echo $member['member_type'];?></label>
							</div>
						</div>
						<div class="form-group" id="rot_div">
							<label class="control-label">Select category</label>
							<div class="controls">
								<select name="rot_category" id="rot_category" class="required">
								  <option value="">-Select-</option>
								  <option value="district-3140" <?php if($member['rot_category'] == "district-3140") { echo 'selected'; }?> <?php if(($member['member_type'] == "Non Rotarian Single") || ($member['member_type'] == "Non Rotarian Couple")) { echo 'disabled';}?> >Rotarian from District 3140</option>
								  <option value="other-district" <?php if($member['rot_category'] == "other-district") { echo 'selected';}?> <?php if(($member['member_type'] == "Non Rotarian Single") || ($member['member_type'] == "Non Rotarian Couple")) { echo 'disabled';}?> >Rotarian from other District</option>
								  <option value="rotract" <?php if($member['rot_category'] == "rotract") { echo 'selected'; }?> <?php if(($member['member_type'] == "Rotarian Single") || ($member['member_type'] == "Rotarian Couple")) { echo 'disabled';}?> >Rotract</option>
								  <option value="non-rotarian" <?php if($member['rot_category'] == "non-rotarian") {echo 'selected'; }?> <?php if(($member['member_type'] == "Rotarian Single") || ($member['member_type'] == "Rotarian Couple")) { echo 'disabled';}?> >Non Rotarian</option>
								</select>
							</div>
						</div>
	  					<div id="rotary_div" <?php if($member['rot_category'] == "rotract" || $member['rot_category'] == "non-rotarian") echo 'style="display:none;"';?> >
							<div class="form-group">
								<label class="control-label">Rotatry Club of</label>
								<div class="controls">
									<div id="rotary_club_of" <?php if($member['rot_category'] == "other-district") echo "style='display:none;'";?>>									
										<select name="rotary_club_of" id="rot_club_select" class="required">
										  <option value="">-Select-</option>
										  <?php foreach($rotary_clubs as $clubs) { ?>
											<option value="<?php echo $clubs['club_title'];?>" <?php if($member['rotary_club_of'] == $clubs['club_title']) echo 'selected';?>><?php echo $clubs['club_title'];?></option>
										  <?php } ?>
										</select>
									</div>
									<span <?php if($member['rot_category'] != "other-district") echo 'style="display:none;width:auto;"';?> id="rot_club_text"><input type="text" name="rotary_club_of_other" style="width:250px;" value="<?php echo $member['rotary_club_of'];?>" class="required"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label">District Designation</label>
								<div class="controls">
									<select name="district_designation" id="dist_desig_select" class="">
									  <option value="">-Select-</option>
									  <?php foreach($district_designations as $row) { ?>
										<option value="<?php echo $row['pk_ddesignation_id'];?>" <?php if($member['district_designation'] == $row['pk_ddesignation_id']) { echo "selected"; }?>><?php echo $row['title'];?></option>
									  <?php } ?>
									  <option value="0" <?php if($member['district_designation'] == 0) { echo "selected"; }?>>None</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label">Club Designation</label>
								<div class="controls">
									<select name="club_designation" id="club_desig_select" class="required">
									  <option value="">-Select-</option>
									  <?php foreach($club_designations as $row) { ?>
										<option value="<?php echo $row['pk_cdesignation_id'];?>" <?php if($member['club_designation'] == $row['pk_cdesignation_id']) { echo "selected"; }?>><?php echo $row['title'];?></option>
									  <?php } ?>
									</select>
								</div>
							</div>
	  					</div>
						<div class="form-group" id="club_name" <?php if($member['rot_category'] != "non-rotarian") echo 'style="display:none;"';?>>
							<label class="control-label">Club name</label>
							<div class="controls">
								<input type="text" name="nonrot_club" class="">
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-3">
									<label class="control-label">First Name</label>
									<div class="controls">
										<input type="text" name="rotarian_name" class="required" value="<?php echo $member['rotarian_name'];?>">
									</div>
								</div>
								<div class="col-3">
									<label class="control-label">Middle name</label>
									<div class="controls">
										<input type="text" name="rot_middle_name" class="" id="rot_middle_name" value="<?php echo $member['rot_middle_name'];?>">
									</div>
								</div>
								<div class="col-3">
									<label class="control-label">Last name</label>
									<div class="controls">
										<input type="text" name="rot_last_name" class="required" id="rot_last_name" value="<?php echo $member['rot_last_name'];?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-3">
									<label class="control-label">Badge Name</label>
									<div class="controls">
										<input type="text" name="badge_name" class="required alpha" value="<?php echo $member['badge_name'];?>">
									</div>
								</div>
								<div class="col-3">
									<label class="control-label">Gender</label>
									<div class="controls">
										<select name="gender" id="rot_gender" class="required">
										  <option value="">-Select-</option>
										  <option value="male" data-reverse="female" <?php if($member['gender'] == "male") echo 'selected';?>>Male</option>
										  <option value="female" data-reverse="male" <?php if($member['gender'] == "female") echo 'selected';?>>Female</option>
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
										  <option value="Veg" <?php if($member['meal_pref'] == "Veg") echo 'selected';?>>Veg</option>
										  <option value="Non-Veg" <?php if($member['meal_pref'] == "Non-Veg") echo 'selected';?>>Non-Veg</option>
										  <option value="Jain" <?php if($member['meal_pref'] == "Jain") echo 'selected';?>>Jain</option>
										</select>
									</div>
								</div>
							</div>
							<div id="spouse_div" <?php if($member['member_type'] == "Rotarian Single" || $member['member_type'] == "Non Rotarian Single" || $member['member_type'] == "Patron Single") echo "style='display:none;'"?> >
								<div class="row">
									<div class="col-3">
										<label class="control-label">Name Of Spouse</label>
										<div class="controls">
											<input type="text" name="spouse_name" class="required" value="<?php echo $member['spouse_name'];?>">
										</div>
									</div>
									<div class="col-3">
										<label class="control-label">Middle name</label>
										<div class="controls">
											<input type="text" name="spouse_middle_name" id="spouse_middle_name" value="<?php echo $member['spouse_middle_name'];?>">
										</div>
									</div>
									<div class="col-3">
										<label class="control-label">Last name</label>
										<div class="controls">
											<input type="text" name="spouse_last_name" id="spouse_last_name" value="<?php echo $member['spouse_last_name'];?>">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-3">
										<label class="control-label">Badge Name</label>
										<div class="controls">
											<input type="text" name="spouse_badge_name" class="required alpha" id="spouse_badge_name" value="<?php echo $member['spouse_badge_name'];?>">
										</div>
									</div>
									<div class="col-3">
										<label class="control-label">Gender</label>
										<div class="controls">
											<select name="spouse_gendar" id="rot_spouse_gendar" class="required">
											  <option value="">-Select-</option>
											  <option value="male" data-reverse="female" <?php if($member['spouse_gendar'] == "male") echo 'selected';?>>Male</option>
											  <option value="female" data-reverse="male" <?php if($member['spouse_gendar'] == "female") echo 'selected';?>>Female</option>
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
											  <option value="Veg" <?php if($member['spouse_meal_pref'] == "Veg") echo 'selected';?>>Veg</option>
											  <option value="Non-Veg" <?php if($member['spouse_meal_pref'] == "Non-Veg") echo 'selected';?>>Non-Veg</option>
											  <option value="Jain" <?php if($member['spouse_meal_pref'] == "Jain") echo 'selected';?>>Jain</option>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<!-- <label class="control-label">Address</label>
							<div class="controls">
								<textarea name="address" class="required"><?php //echo $member['address'];?></textarea>
							</div> -->
							<label class="control-label">Address Line1</label>
							<div class="controls">
								<input type="text" name="addr_line1" class="required" style="width:320px;" value="<?php echo $member['addr_line1'];?>">
							</div>
							<label class="control-label">Address Line2</label>
							<div class="controls">
								<input type="text" name="addr_line2" class="" style="width:320px;" value="<?php echo $member['addr_line2'];?>">
							</div>
							<label class="control-label">Address Line3</label>
							<div class="controls">
								<input type="text" name="addr_line3" class="" style="width:320px;" value="<?php echo $member['addr_line3'];?>">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">Landmark</label>
							<div class="controls">
								<input type="text" class="required" name="landmark" value="<?php echo $member['landmark'];?>">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">State</label>
							<div class="controls">
								<input type="text" class="required" name="state" value="<?php echo $member['state'];?>">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">City</label>
							<div class="controls">
								<input type="text" class="required" name="city" value="<?php echo $member['city'];?>">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">Pincode</label>
							<div class="controls">
								<input type="text" class="required number" name="pincode" value="<?php echo $member['pincode'];?>">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">Office Tel No.</label>
							<div class="controls">
								<input type="text" class="number" name="telephone" value="<?php echo $member['telephone'];?>">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">Mobile</label>
							<div class="controls">
								<input type="text" class="number" name="mobile" minlength="10" maxlength="10" value="<?php echo $member['mobile'];?>">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">E-mail</label>
							<div class="controls">
								<input type="text" class="required email" name="email" value="<?php echo $member['email'];?>">
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