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
					<form class="form-horizontal" method="post" action="<?php echo current_url(); ?>" name="basic_validate" id="main-form">
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
									<select name="district_designation" class="required">
									  <option value="">-Select-</option>
									  <?php foreach($district_designations as $row) { ?>
										<option value="<?php echo $row['pk_ddesignation_id'];?>"><?php echo $row['title'];?></option>
									  <?php } ?>
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
						<div class="form-group" id="type_section">
							<label class="control-label">Type</label>
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
									<label class="control-label">Name</label>
									<div class="controls">
										<input type="text" name="rotarian_name" class="required" id="rotarian_name">
									</div>
								</div>
								<div class="col-3">
									<label class="control-label">Badge Name</label>
									<div class="controls">
										<input type="text" name="badge_name" class="required">
									</div>
								</div>
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
										<input type="text" name="rotarian_price" id="rotarian_price" readonly>
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
									<label class="control-label">Badge Name</label>
									<div class="controls">
										<input type="text" name="spouse_badge_name" id="spouse_badge_name">
									</div>
								</div>
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
								<div class="col-3">
									<label class="control-label">Amount</label>
									<div class="controls">
										<input type="text" name="spouse_price" id="spouse_price" readonly>
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
										<input type="text" class="txt_amount" name="rot_single_amount" readonly>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-3">
									<label class="control-label">Rotarian Couple</label>
									<div class="controls">
										<input type="text" name="rot_cupple" class="txt_member number" data-price="<?php echo $rot_price['individual']+$rot_price['spouse'];?>">
									</div>
								</div>
								<div class="col-3">
									<label class="control-label">Amount</label>
									<div class="controls">
										<input type="text" class="txt_amount" name="rot_cupple_amount" readonly>
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
										<input type="text" class="txt_amount" name="non_rot_single_amount" readonly>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-3">
									<label class="control-label">Non Rotarian Couple</label>
									<div class="controls">
										<input type="text" name="non_rot_cupple" class="txt_member number" data-price="<?php echo $non_rot_price['individual']+$non_rot_price['individual'];?>">
									</div>
								</div>
								<div class="col-3">
									<label class="control-label">Amount</label>
									<div class="controls">
										<input type="text" class="txt_amount" name="non_rot_cupple_amount" readonly>
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
										<input type="text" class="txt_amount" name="patron_single_amount" readonly>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-3">
									<label class="control-label">Patron Coule</label>
									<div class="controls">
		  								<input type="text" name="patron_cupple" class="txt_member number" data-price="<?php echo $patron_price['couple'];?>">
									</div>
								</div>
								<div class="col-3">
									<label class="control-label">Amount</label>
									<div class="controls">
		  								<input type="text" class="txt_amount" name="patron_cupple_amount" readonly>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">Total Amount</label>
							<div class="controls">
								<input type="text" name="total_price" id="total_price" readonly>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">Address</label>
							<div class="controls">
								<textarea name="address" class="required"></textarea>
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
								<input type="text" class="number" name="mobile">
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
							        <option value="direct_transfer">Direct Transfer</option>
							        <option value="credit_debit_cards">Credit / Debit Card</option>
							      </select>
							</div>
						</div>
						<div class="form-group hide_div" id="cash">
							<label class="control-label">Dated</label>
							<div class="controls">
								<input type="text" name="cash_date" class="datepicker">
							</div>
							<label class="control-label">Address</label>
							<div class="controls">
								<textarea name="cash_addr"></textarea>
							</div>
						</div>
						<div class="form-group hide_div" id="cheque">
							<label class="control-label">Cheque Number</label>
							<div class="controls">
								<input type="text" name="cheque_number">
							</div>
							<label class="control-label">Bank</label>
							<div class="controls">
								<input type="text" name="bank">
							</div>
							<label class="control-label">Branch</label>
							<div class="controls">
								<input type="text" name="branch">
							</div>
							<label class="control-label">Amount</label>
							<div class="controls">
								<input type="text" name="amount">
							</div>
							<label class="control-label">Dated</label>
							<div class="controls">
								<input type="text" name="dated" class="datepicker">
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