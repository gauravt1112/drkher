<?php
header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename=users-'.date('d-m-Y').'.xls');
?>
<table border="1" style="border-collapse:collapse;">
<thead>
	<tr>
		<th>Booking Id</th>
		<th>Id</th>
		<th>Category</th>
		<th>Rotary Club of</th>
		<th>District Designation</th>
		<th>Club Designation</th>
		<th>Club Name</th>
		<th>Type</th>
		<th>Rotarian Name</th>
		<th>Badge Name</th>
		<th>Gender</th>
		<th>Meal Preference</th>
		<th>Spouse</th>
		<th>Spouse Badge Name</th>
		<th>Spouse Gender</th>
		<th>Spouse Meal Preference</th>
		<th>Rotarian Price</th>
		<th>Spouse Price</th>
		<th>Total Price</th>
		<th>Address Line 1</th>
		<th>Address Line 2</th>
		<th>Address Line 3</th>
		<th>Landmark</th>
		<th>State</th>
		<th>City</th>
		<th>Pincode</th>
		<th>Telephone</th>
		<th>Mobile</th>
		<th>Email</th>
		<th>Mode of Payment</th>
		<th>Cash Date</th>
		<th>Cheque Number</th>
		<th>Bank</th>
		<th>Branch</th>
		<th>Amount</th>
		<th>Dated</th>
		<th>Updated</th>
		<th>Payment</th>
	</tr>
</thead>
<tbody>
	<?php
	$cat_array = array(
		"district-3140" => "Rotarian from District 3140",
		"other-district" => "Rotarian from other District",
		"rotract" => "Rotract",
		"non-rotarian" => "Non Rotarian",
	); 
	for($i=0; $i<count($users); $i++) {
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
		$club_designation = $this->mdl_club_designations->get_club_designations($users[$i]['club_designation']);
		$district_designation = $this->mdl_district_designations->get_district_designations($users[$i]['district_designation']);
	?>
	<tr align="center">
		<td><?php echo $users[$i]['booking_id']?></td>
		<td><?php echo $users[$i]['registration_id']?></td>
		<td><?php echo $cat_array[$users[$i]['rot_category']]?></td>
		<td><?php echo $users[$i]['rotary_club_of']?></td>
		<td><?php if(!empty($district_designation['title'])) echo $district_designation['title'];?></td>
		<td><?php if(!empty($club_designation['title'])) echo $club_designation['title'];?></td>
		<td><?php echo $users[$i]['nonrot_club']?></td>
		<td><?php echo $users[$i]['user_type']?></td>
		<td><?php echo $users[$i]['rotarian_name'].' '.$users[$i]['rot_middle_name'].' '.$users[$i]['rot_last_name'];?></td>
		<td><?php echo $users[$i]['badge_name']?></td>
		<td><?php echo $users[$i]['gender']?></td>
		<td><?php echo $users[$i]['meal_pref']?></td>
		<td><?php echo $users[$i]['spouse_name'].' '.$users[$i]['spouse_middle_name'].' '.$users[$i]['spouse_last_name'];?></td>
		<td><?php echo $users[$i]['spouse_badge_name']?></td>
		<td><?php echo $users[$i]['spouse_gendar']?></td>
		<td><?php echo $users[$i]['spouse_meal_pref']?></td>
		<td><?php echo $users[$i]['rotarian_price']?></td>
		<td><?php echo $users[$i]['spouse_price']?></td>
		<td><?php echo $users[$i]['total_price']?></td>
		<td><?php echo $users[$i]['addr_line1']?></td>
		<td><?php echo $users[$i]['addr_line2']?></td>
		<td><?php echo $users[$i]['addr_line3']?></td>
		<td><?php echo $users[$i]['landmark']?></td>
		<td><?php echo $users[$i]['state']?></td>
		<td><?php echo $users[$i]['city']?></td>
		<td><?php echo $users[$i]['pincode']?></td>
		<td><?php echo $users[$i]['telephone']?></td>
		<td><?php echo $users[$i]['mobile']?></td>
		<td><?php echo $users[$i]['email']?></td>
		<td><?php echo $users[$i]['mode_of_payment']?></td>
		<td><?php if($users[$i]['mode_of_payment'] == 'cash') echo date('d-m-Y', strtotime($users[$i]['cash_date']))?></td>
		<td><?php echo $users[$i]['cheque_number']?></td>
		<td><?php echo $users[$i]['bank']?></td>
		<td><?php echo $users[$i]['branch']?></td>
		<td><?php echo $users[$i]['amount']?></td>
		<td><?php if($users[$i]['mode_of_payment'] == 'cheque') echo date('d-m-Y', strtotime($users[$i]['cash_date']))?></td>
		<td><?php echo date('d-m-Y, h:i a', strtotime($users[$i]['updated']))?></td>
		<td class="<?php echo $users[$i]['payment_status']?>"><?php echo ucwords($users[$i]['payment_status']);?></td>								
	</tr>
	<?php } ?>
</tbody>
</table> 