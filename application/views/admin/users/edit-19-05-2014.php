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
	<h1>Edit User</h1>
</div>
<div id="breadcrumb">
	<a href="#" title="Go to Home" class="tip-bottom"><i class="glyphicon glyphicon-home"></i> Home</a>
	<a href="<?php echo site_url('admin/users')?>" title="Go to Users" class="tip-bottom">Users</a>
	<a href="#" class="current">Edit User</a>
</div>
<div class="container-fluid">
	
	<div class="row">
		<div class="col-12">

			<div class="widget-box">
				<div class="widget-title">
					<span class="icon">
						<i class="glyphicon glyphicon-th"></i>
					</span>
					<h5>Edit User</h5>
				</div>
				<div class="widget-content nopadding">
					<form class="form-horizontal" method="post" action="<?php echo current_url(); ?>" name="basic_validate" id="main-form">
						<div class="form-group">
							<label class="control-label">Register as</label>
							<div class="controls">
								<label><?php echo ucwords($user['register_as']);?></label>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">Select category</label>
							<div class="controls">
								<select name="rot_category" id="rot_category" class="required">
								  <option value="">-Select-</option>
								  <option value="district-3140" data-price="<?php echo $rot_price['individual'].','.$rot_price['spouse'];?>" <?php if($user['rot_category'] =="district-3140") echo 'selected';?>>Rotarian from District 3140</option>
								  <option value="other-district" data-price="<?php echo $rot_price['individual'].','.$rot_price['spouse'];?>" <?php if($user['rot_category'] =="other-district") echo 'selected';?>>Rotarian from other District</option>
								  <option value="rotract" data-price="<?php echo $rot_price['individual'].','.$rot_price['spouse'];?>" <?php if($user['rot_category'] =="rotract") echo 'selected';?>>Rotract</option>
								  <option value="non-rotarian" data-price="<?php echo $non_rot_price['individual'].','.$non_rot_price['individual'];?>" <?php if($user['rot_category'] =="non-rotarian") echo 'selected';?>>Non Rotarian</option>
								</select>
							</div>
						</div>
	  					<div id="rotary_div" <?php if($user['rot_category'] == "rotract" || $user['rot_category'] == "non-rotarian") echo 'style="display:none;"';?> >
							<div class="form-group">
								<label class="control-label">Rotatry Club of</label>
								<div class="controls">
									<div id="rotary_club_of" <?php if($user['rot_category'] == "other-district") echo "style='display:none;'";?>>		
										<select name="rotary_club_of" class="required">
										  <option value="">-Select-</option>
										  <?php foreach($rotary_clubs as $clubs) { ?>
											<option value="<?php echo $clubs['club_title'];?>" <?php if($user['rotary_club_of'] == $clubs['club_title']) echo 'selected';?>><?php echo $clubs['club_title'];?></option>
										  <?php } ?>
										</select>
									</div>
									<span <?php if($user['rot_category'] != "other-district") echo "style='display:none;width:auto;'";?> id="rot_club_text"><input type="text" name="rotary_club_of_other" value="<?php echo $user['rotary_club_of'];?>" style="width:250px;" class="required"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label">District Designation</label>
								<div class="controls">
									<select name="district_designation">
									  <option value="0">-Select-</option>
									  <?php foreach($district_designations as $row) { ?>
										<option value="<?php echo $row['pk_ddesignation_id'];?>" <?php if($user['district_designation'] ==$row['pk_ddesignation_id']) echo 'selected';?>><?php echo $row['title'];?></option>
									  <?php } ?>
									  <option value="0" <?php if($user['district_designation'] == 0) echo 'selected';?>>None</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label">Club Designation</label>
								<div class="controls">
									<select name="club_designation" class="required">
									  <option value="">-Select-</option>
									  <?php foreach($club_designations as $row) { ?>
										<option value="<?php echo $row['pk_cdesignation_id'];?>" <?php if($user['club_designation'] ==$row['pk_cdesignation_id']) echo 'selected';?>><?php echo $row['title'];?></option>
									  <?php } ?>
									</select>
								</div>
							</div>
	  					</div>
						<div class="form-group" id="club_name" <?php if($user['rot_category'] != "non-rotarian") echo 'style="display:none;"';?>>
							<label class="control-label">Club name</label>
							<div class="controls">
								<input type="text" name="nonrot_club" value="<?=$user['nonrot_club']?>">
							</div>
						</div>
						<div class="form-group" id="type_section">
							<label class="control-label">Type of registration</label>
							<div class="controls">
								<select name="user_type" id="user_type" class="required">
								  <option value="">-Select-</option>
								  <option value="regular" data-price="" <?php if($user['user_type'] =="regular") echo 'selected';?>>Regular</option>
								  <option value="patron" data-price="<?php echo $patron_price['individual'].','.($patron_price['couple']-$patron_price['individual']);?>" <?php if($user['user_type'] =="patron") echo 'selected';?>>Patron</option>
								</select>
							</div>
						</div>
	 					<input type="hidden" id="price_temp" value="<?php echo $user['rotarian_price'].','.$user['spouse_price'];?>">
						<div class="form-group">
							<div class="row">
								<div class="col-3">
									<label class="control-label">First Name</label>
									<div class="controls">
										<input type="text" name="rotarian_name" class="required" id="rotarian_name" value="<?php echo $user['rotarian_name'];?>">
									</div>
								</div>
								<div class="col-3">
									<label class="control-label">Middle name</label>
									<div class="controls">
										<input type="text" name="rot_middle_name" class="" id="rot_middle_name" value="<?php echo $user['rot_middle_name'];?>">
									</div>
								</div>
								<div class="col-3">
									<label class="control-label">Last name</label>
									<div class="controls">
										<input type="text" name="rot_last_name" class="required" id="rot_last_name" value="<?php echo $user['rot_last_name'];?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-3">
									<label class="control-label">Gender</label>
									<div class="controls">
										<select name="gender" id="gender" class="required">
										  <option value="">-Select-</option>
										  <option value="male" data-reverse="female" <?php if($user['gender'] =="male") echo 'selected';?>>Male</option>
										  <option value="female" data-reverse="male" <?php if($user['gender'] =="female") echo 'selected';?>>Female</option>
										</select>
									</div>
								</div>
								<div class="col-3">
									<label class="control-label">Badge Name</label>
									<div class="controls">
										<input type="text" name="badge_name" class="required alpha" value="<?php echo $user['badge_name'];?>">
									</div>
								</div>
							</div>
	  						<div id="individual_div">
							<div class="row">
								<div class="col-3">
									<label class="control-label">Meal preference</label>
									<div class="controls">
										<select name="meal_pref" class="required">
										  <option value="">-Select-</option>
										  <option value="Veg" <?php if($user['meal_pref'] =="Veg") echo 'selected';?>>Veg</option>
										  <option value="Non-Veg" <?php if($user['meal_pref'] =="Non-Veg") echo 'selected';?>>Non-Veg</option>
										  <option value="Jain" <?php if($user['meal_pref'] =="Jain") echo 'selected';?>>Jain</option>
										</select>
									</div>
								</div>
								<div class="col-3">
									<label class="control-label">Amount</label>
									<div class="controls">
										<input type="text" name="rotarian_price" id="rotarian_price" value="<?php echo $user['rotarian_price'];?>" >
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-3">
									<label class="control-label">Name Of Spouse</label>
									<div class="controls">
										<input type="text" name="spouse_name" id="spouse_name" value="<?php echo $user['spouse_name'];?>">
									</div>
								</div>
								<div class="col-3">
									<label class="control-label">Middle name</label>
									<div class="controls">
										<input type="text" name="spouse_middle_name" id="spouse_middle_name" value="<?php echo $user['spouse_middle_name'];?>">
									</div>
								</div>
								<div class="col-3">
									<label class="control-label">Last name</label>
									<div class="controls">
										<input type="text" name="spouse_last_name" id="spouse_last_name" value="<?php echo $user['spouse_last_name'];?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-3">
									<label class="control-label">Gender</label>
									<div class="controls">
										<select name="spouse_gendar" id="spouse_gendar">
										  <option value="">-Select-</option>
										  <option value="male" data-reverse="female" <?php if($user['spouse_gendar'] =="male") echo 'selected';?>>Male</option>
										  <option value="female" data-reverse="male" <?php if($user['spouse_gendar'] =="female") echo 'selected';?>>Female</option>
										</select>
									</div>
								</div>
								<div class="col-3">
									<label class="control-label">Badge Name</label>
									<div class="controls">
										<input type="text" name="spouse_badge_name" class="alpha" id="spouse_badge_name" value="<?php echo $user['spouse_badge_name'];?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-3">
									<label class="control-label">Meal preference</label>
									<div class="controls">
										<select name="spouse_meal_pref" id="spouse_meal_pref">
										  <option value="">-Select-</option>
										  <option value="Veg" <?php if($user['spouse_meal_pref'] =="Veg") echo 'selected';?>>Veg</option>
										  <option value="Non-Veg" <?php if($user['spouse_meal_pref'] =="Non-Veg") echo 'selected';?>>Non-Veg</option>
										  <option value="Jain" <?php if($user['spouse_meal_pref'] =="Jain") echo 'selected';?>>Jain</option>
										</select>
									</div>
								</div>
								<div class="col-3">
									<label class="control-label">Amount</label>
									<div class="controls">
										<input type="text" name="spouse_price" id="spouse_price" value="<?php echo $user['spouse_price'];?>" >
									</div>
								</div>
							</div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">Total Amount</label>
							<div class="controls">
								<input type="text" name="total_price" id="total_price" value="<?php echo $user['total_price'];?>" >&nbsp;&nbsp;<span id='discountext' style="font-size:13px;color:green;display:none;">You get a flat 1000/- discount per person</span>
							</div>
						</div>
						<div class="form-group">
							<!-- <label class="control-label">Address</label> -->
							<!-- <div class="controls">
								<textarea name="address" class="required"><?php //echo $user['address'];?></textarea>
							</div> -->
							<label class="control-label">Address Line1</label>
							<div class="controls">
								<input type="text" name="addr_line1" class="required" style="width:320px;" value="<?php echo $user['addr_line1'];?>">
							</div>
							<label class="control-label">Address Line2</label>
							<div class="controls">
								<input type="text" name="addr_line2" class="" style="width:320px;" value="<?php echo $user['addr_line2'];?>">
							</div>
							<label class="control-label">Address Line3</label>
							<div class="controls">
								<input type="text" name="addr_line3" class="" style="width:320px;" value="<?php echo $user['addr_line3'];?>">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">Landmark</label>
							<div class="controls">
								<input type="text" class="required" name="landmark" value="<?php echo $user['landmark'];?>">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">State</label>
							<div class="controls">
								<input type="text" class="required" name="state" value="<?php echo $user['state'];?>">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">City</label>
							<div class="controls">
								<input type="text" class="required" name="city" value="<?php echo $user['city'];?>">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">Pincode</label>
							<div class="controls">
								<input type="text" class="required number" name="pincode" value="<?php echo $user['pincode'];?>">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">Office Tel No.</label>
							<div class="controls">
								<input type="text" class="number" name="telephone" value="<?php echo $user['telephone'];?>" >
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">Mobile</label>
							<div class="controls">
								<input type="text" class="number" name="mobile" maxlength="10" minlength="10" value="<?php echo $user['mobile'];?>">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">E-mail</label>
							<div class="controls">
								<input type="text" class="required email" name="email" value="<?php echo $user['email'];?>">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">Payment</label>
							<div class="controls">
							      <select id="payment_mode" class="required" name="mode_of_payment">
							        <option value="">Select</option>
							        <option value="cash" <?php if($user['mode_of_payment'] =="cash") echo 'selected';?>>Cash</option>
							        <option value="cheque" <?php if($user['mode_of_payment'] =="cheque") echo 'selected';?>>Cheque</option>
							        <!-- <option value="direct_transfer" <?php //if($user['mode_of_payment'] =="direct_transfer") echo 'selected';?>>Direct Transfer</option> -->
							        <option value="credit_debit_cards" <?php if($user['mode_of_payment'] =="credit_debit_cards") echo 'selected';?>>Credit / Debit Card</option>
							      </select>
							</div>
						</div>
						<div class="form-group <?php if($user['mode_of_payment'] !="cash") echo 'hide_div';?>" id="cash">
							<label class="control-label">Dated</label>
							<div class="controls">
								<input type="text" name="cash_date" class="datepicker" value="<?php echo date('Y-m-d', strtotime($user['cash_date']));?>">
							</div>
							<label class="control-label">Address</label>
							<div class="controls">
								<p>Rtn. Saurabh Sonawala, 2nd floor, Maneesha, 69A Nepean Sea Road,<br>Mumbai - 400006, Ph: 23610015.</p>
							</div>
							<!-- <label class="control-label">Address</label>
							<div class="controls">
								<textarea name="cash_addr"><?php //echo $user['cash_addr'];?></textarea>
							</div> -->
						</div>
						<div class="form-group <?php if($user['mode_of_payment'] !="cheque") echo 'hide_div';?>" id="cheque">
							<label class="control-label">Cheque Number</label>
							<div class="controls">
								<input type="text" name="cheque_number" value="<?php echo $user['cheque_number'];?>" class="number required" maxlength="6" minlength="6">
							</div>
							<label class="control-label">Bank</label>
							<div class="controls">
								<input type="text" name="bank" value="<?php echo $user['bank'];?>" class="required">
							</div>
							<label class="control-label">Branch</label>
							<div class="controls">
								<input type="text" name="branch" value="<?php echo $user['branch'];?>" class="required">
							</div>
							<label class="control-label">Amount</label>
							<div class="controls">
								<input type="text" name="amount" id="cheque_amount" value="<?php echo $user['amount'];?>" class="required">
							</div>
							<label class="control-label">Dated</label>
							<div class="controls">
								<input type="text" name="dated" value="<?php echo date('Y-m-d', strtotime($user['dated']));?>" class="required datepicker">
							</div>
							<label class="control-label">Address</label>
							<div class="controls">
								<p>Rtn. Saurabh Sonawala, 2nd floor, Maneesha, 69A Nepean Sea Road,<br>Mumbai - 400006, Ph: 23610015.</p>
							</div>
						</div>
						<div class="form-group <?php if($user['mode_of_payment'] !="direct_transfer") echo 'hide_div';?>" id="direct_transfer">
							<label class="control-label">&nbsp;</label>
							<div class="controls"><em>Bank account details</em></div>
						</div>
						<div class="form-group">
							<label class="control-label">Payment Status</label>
							<div class="controls">
							      <select id="payment_status" class="required" name="payment_status">
							        <option value="">Select</option>
							        <option value="pending" <?php if($user['payment_status'] =="pending") echo 'selected';?>>Pending</option>
							        <option value="received" <?php if($user['payment_status'] =="received") echo 'selected';?>>Received</option>
							        <option value="expired" <?php if($user['payment_status'] =="expired") echo 'selected';?>>Expired</option>
							      </select>
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