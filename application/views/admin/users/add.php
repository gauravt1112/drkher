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
	<h1>Add User</h1>
</div>
<div id="breadcrumb">
	<a href="#" title="Go to Home" class="tip-bottom"><i class="glyphicon glyphicon-home"></i> Home</a>
	<a href="<?php echo site_url('admin/users')?>" title="Go to Users" class="tip-bottom">Users</a>
	<a href="#" class="current">Add User</a>
</div>
<div class="container-fluid">
	
	<div class="row">
		<div class="col-12">

			<div class="widget-box">
				<div class="widget-title">
					<span class="icon">
						<i class="glyphicon glyphicon-th"></i>
					</span>
					<h5>Add User</h5>
				</div>
				<div class="widget-content nopadding">
					<form class="form-horizontal form-inline" method="post" action="<?php echo current_url(); ?>" name="basic_validate" id="main-form">
						<div class="form-group">
							<label class="control-label">Register as</label>
							<div class="controls">
								<select name="register_as" id="register_as" class="required">
								  <option value="">-Select-</option>
								  <option value="individual">Individual</option>
								  <option value="group">Group</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">Select category</label>
							<div class="controls">
								<select name="rot_category" id="rot_category" class="required">
								  <option value="">-Select-</option>
								  <option value="district-3140" data-price="<?php echo $rot_price['individual'].','.$rot_price['spouse'];?>">Rotarian from District 3140</option>
								  <option value="other-district" data-price="<?php echo $rot_price['individual'].','.$rot_price['spouse'];?>">Rotarian from other District</option>
								  <option value="rotract" data-price="<?php echo $rot_price['individual'].','.$rot_price['spouse'];?>">Rotract</option>
								  <option value="non-rotarian" data-price="<?php echo $non_rot_price['individual'].','.$non_rot_price['individual'];?>">Non Rotarian</option>
								</select>
							</div>
						</div>
	  					<div id="rotary_div" style="display:none;">
							<div class="form-group">
								<label class="control-label">Rotatry Club of</label>
								<div class="controls">
									<div id="rotary_club_of">
									<select name="rotary_club_of" class="required">
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
									<select name="district_designation">
									  <option value="0">-Select-</option>
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
									<select name="club_designation" class="required">
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
						<div class="form-group" id="type_section">
							<label class="control-label">Type of registration</label>
							<div class="controls">
								<select name="user_type" id="user_type" class="required">
								  <option value="">-Select-</option>
								  <option value="regular" data-price="">Regular</option>
								  <option value="patron" data-price="<?php echo $patron_price['individual'].','.($patron_price['couple']-$patron_price['individual']);?>">Patron</option>
								</select>
							</div>
						</div>
	 					<input type="hidden" id="price_temp" value="">
						<div class="form-group">
							<div class="row">
								<div class="col-3">
									<label class="control-label">First name</label>
									<div class="controls">
										<input type="text" name="rotarian_name" class="required" id="rotarian_name">
									</div>
								</div>
								<div class="col-3 ">
									<label class="control-label">Middle name</label>
									<div class="controls">
										<input type="text" name="rot_middle_name" class="" id="rot_middle_name">
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
									<label class="control-label">Gender</label>
									<div class="controls">
										<select name="gender" id="gender" class="required">
										  <option value="">-Select-</option>
										  <option value="male" data-reverse="female">Male</option>
										  <option value="female" data-reverse="male">Female</option>
										</select>
									</div>
								</div>
								<div class="col-3">
									<label class="control-label">Badge Name</label>
									<div class="controls">
										<input type="text" name="badge_name" class="required alpha">
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
										  <option value="Veg">Veg</option>
										  <option value="Non-Veg">Non-Veg</option>
										  <option value="Jain">Jain</option>
										</select>
									</div>
								</div>
								<div class="col-3">
									<label class="control-label">Amount</label>
									<div class="controls">
										<input type="text" name="rotarian_price" id="rotarian_price" class="number" >
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-3">
									<label class="control-label">Name Of Spouse</label>
									<div class="controls">
										<input type="text" name="spouse_name" id="spouse_name">
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
									<label class="control-label">Gender</label>
									<div class="controls">
										<select name="spouse_gendar" id="spouse_gendar">
										  <option value="">-Select-</option>
										  <option value="male" data-reverse="female">Male</option>
										  <option value="female" data-reverse="male">Female</option>
										</select>
									</div>
								</div>
								<div class="col-3">
									<label class="control-label">Badge Name</label>
									<div class="controls">
										<input type="text" name="spouse_badge_name" class="alpha" id="spouse_badge_name">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-3">
									<label class="control-label">Meal preference</label>
									<div class="controls">
										<select name="spouse_meal_pref" id="spouse_meal_pref">
										  <option value="">-Select-</option>
										  <option value="Veg">Veg</option>
										  <option value="Non-Veg">Non-Veg</option>
										  <option value="Jain">Jain</option>
										</select>
									</div>
								</div>
								<div class="col-3">
									<label class="control-label">Amount</label>
									<div class="controls">
										<input type="text" name="spouse_price" id="spouse_price" class="number" >
									</div>
								</div>
							</div>
							</div>
						</div>
						<div class="form-group" id="group_div" style="display:none">
							<div class="row">
								<div class="col-3">
									<label class="control-label">Rotarian Single</label>
									<div class="controls">
										<input type="text" name="rot_single" class="txt_member number" data-price="<?php echo $rot_price['individual'];?>">
									</div>
								</div>
								<div class="col-3">
									<label class="control-label">Amount</label>
									<div class="controls">
										<input type="text" class="txt_amount number" name="rot_single_amount" >
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-3">
									<label class="control-label">Rotarian Couple</label>
									<div class="controls">
										<input type="text" name="rot_cupple" class="txt_member couple number" data-price="<?php echo $rot_price['individual']+$rot_price['spouse'];?>">
									</div>
								</div>
								<div class="col-3">
									<label class="control-label">Amount</label>
									<div class="controls">
										<input type="text" class="txt_amount number" name="rot_cupple_amount" >
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-3">
									<label class="control-label">Non Rotarian Single</label>
									<div class="controls">
										<input type="text" name="non_rot_single" class="txt_member number" data-price="<?php echo $non_rot_price['individual'];?>">
									</div>
								</div>
								<div class="col-3">
									<label class="control-label">Amount</label>
									<div class="controls">
										<input type="text" class="txt_amount number" name="non_rot_single_amount" >
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-3">
									<label class="control-label">Non Rotarian Couple</label>
									<div class="controls">
										<input type="text" name="non_rot_cupple" class="txt_member couple number" data-price="<?php echo $non_rot_price['individual']+$non_rot_price['individual'];?>">
									</div>
								</div>
								<div class="col-3">
									<label class="control-label">Amount</label>
									<div class="controls">
										<input type="text" class="txt_amount number" name="non_rot_cupple_amount" >
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-3">
									<label class="control-label">Patron Single</label>
									<div class="controls">
										<input type="text" name="patron_single" class="txt_member number" data-price="<?php echo $patron_price['individual'];?>">
									</div>
								</div>
								<div class="col-3">
									<label class="control-label">Amount</label>
									<div class="controls">
										<input type="text" class="txt_amount number" name="patron_single_amount" >
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-3">
									<label class="control-label">Patron Coule</label>
									<div class="controls">
		  								<input type="text" name="patron_cupple" class="txt_member couple number" data-price="<?php echo $patron_price['couple'];?>">
									</div>
								</div>
								<div class="col-3">
									<label class="control-label">Amount</label>
									<div class="controls">
		  								<input type="text" class="txt_amount number" name="patron_cupple_amount" >
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">Total Amount</label>
							<div class="controls">
								<input type="text" name="total_price" class="number" id="total_price" >&nbsp;&nbsp;<span id='discountext' style="font-size:13px;color:green;display:none;">You get a flat 1000/- discount per person</span>
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
								<input type="text" class="required" name="state">
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
						<div class="form-group">
							<label class="control-label">Payment</label>
							<div class="controls">
							      <select id="payment_mode" class="required" name="mode_of_payment">
							        <option value="">Select</option>
							        <option value="cash">Cash</option>
							        <option value="cheque">Cheque</option>
							        <!-- <option value="direct_transfer">Direct Transfer</option> -->
							        <option value="credit_debit_cards">Credit / Debit Card</option>
							      </select>
							</div>
						</div>
						<div class="form-group hide_div" id="cash">
							<label class="control-label">Dated</label>
							<div class="controls">
								<input type="text" name="cash_date" class="datepicker" value="<?=date('d-m-Y')?>">
							</div>
							<label class="control-label">Address</label>
							<div class="controls">
								<p>Rtn. Saurabh Sonawala, 2nd floor, Maneesha, 69A Nepean Sea Road,<br>Mumbai - 400006, Ph: 23610015.</p>
							</div>
							<!-- <label class="control-label">Address</label>
							<div class="controls">
								<textarea name="cash_addr"></textarea>
							</div> -->
						</div>
						<div class="form-group hide_div" id="cheque">
							<label class="control-label">Cheque Number</label>
							<div class="controls">
								<input type="text" name="cheque_number" class="number required" maxlength="6" minlength="6">
							</div>
							<label class="control-label">Bank</label>
							<div class="controls">
								<input type="text" name="bank" class="required">
							</div>
							<label class="control-label">Branch</label>
							<div class="controls">
								<input type="text" name="branch" class="required">
							</div>
							<label class="control-label">Amount</label>
							<div class="controls">
								<input type="text" name="amount" id="cheque_amount" class="number required">
							</div>
							<label class="control-label">Dated</label>
							<div class="controls">
								<input type="text" name="dated" class="datepicker" value="<?=date('d-m-Y')?>">
							</div>
							<label class="control-label">Address</label>
							<div class="controls">
								<p>Rtn. Saurabh Sonawala, 2nd floor, Maneesha, 69A Nepean Sea Road,<br>Mumbai - 400006, Ph: 23610015.</p>
							</div>
						</div>
						<div class="form-group hide_div" id="direct_transfer">
							<label class="control-label">&nbsp;</label>
							<div class="controls"><em>Bank account details</em></div>
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