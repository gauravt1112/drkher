<?php
header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename='.$primary_user['registration_id'].'.xls');
?>
<table border="1" style="border-collapse:collapse;">
	<thead>
		<tr>
			<th>Id</th>
			<th>Rotary Club of</th>
			<th>District Designation</th>
			<th>Club Designation</th>
			<th>Club Name</th>
			<th>Member Type</th>
			<th>Rotarian Name</th>
			<th>Badge Name</th>
			<th>Gender</th>
			<th>Meal Preference</th>
			<th>Spouse</th>
			<th>Spouse Badge Name</th>
			<th>Spouse Gender</th>
			<th>Spouse Meal Preference</th>
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
			<th>Updated</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			for($i=0; $i<count($members); $i++) { 				
			$club_designation = $this->mdl_club_designations->get_club_designations($members[$i]['club_designation']);
			$district_designation = $this->mdl_district_designations->get_district_designations($members[$i]['district_designation']);
		?>
		<tr align="center">
			<td><?php echo $members[$i]['member_id']?></td>
			<td><?php echo $members[$i]['rotary_club_of']?></td>
			<td><?php if(!empty($district_designation['title'])) echo $district_designation['title'];?></td>
			<td><?php if(!empty($club_designation['title'])) echo $club_designation['title'];?></td>
			<td><?php echo $members[$i]['nonrot_club']?></td>
			<td><?php echo $members[$i]['member_type']?></td>
			<td><?php echo $members[$i]['rotarian_name']?></td>
			<td><?php echo $members[$i]['badge_name']?></td>
			<td><?php echo $members[$i]['gender']?></td>
			<td><?php echo $members[$i]['meal_pref']?></td>
			<td><?php echo $members[$i]['spouse_name'].' '.$members[$i]['spouse_middle_name'].' '.$members[$i]['spouse_last_name'];?></td>
			<td><?php echo $members[$i]['spouse_badge_name']?></td>
			<td><?php if($members[$i]['member_type'] == "Rotarian Couple" || $members[$i]['member_type'] == "Non Rotarian Couple" || $members[$i]['member_type'] == "Patron Couple") echo $members[$i]['spouse_gendar']?></td>
			<td><?php echo $members[$i]['spouse_meal_pref']?></td>
			<td><?php echo $members[$i]['addr_line1']?></td>
			<td><?php echo $members[$i]['addr_line2']?></td>
			<td><?php echo $members[$i]['addr_line3']?></td>
			<td><?php echo $members[$i]['landmark']?></td>
			<td><?php echo $members[$i]['state']?></td>
			<td><?php echo $members[$i]['city']?></td>
			<td><?php echo $members[$i]['pincode']?></td>
			<td><?php echo $members[$i]['telephone']?></td>
			<td><?php echo $members[$i]['mobile']?></td>
			<td><?php echo $members[$i]['email']?></td>
			<td><?php echo date('d-m-Y, h:i a', strtotime($members[$i]['updated']))?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>  